<?php

namespace App\Repositories;

use Auth;
use DB;
use Cart;
use App\Payment;
use App\Order;
use App\OrderItem;

class OrderRepository {

	protected $order;
	protected $request;
	protected $cart_item;


	/**
	 * Create the order/orderitems/payment
	 *
	 * @return Order
	 **/

	public function create($request)
	{

		$this->request = $request;

		$this->request['user_id'] = Auth::user()->id;

		$this->getCartItem();

		$this->removeItemFromCart();

		$this->prepareData();

		$this->createOrder();

		$this->createOrderItem();

		$this->createPayment();

		return $this->order;
	
	}

	/**
	 * Create order
	 *
	 **/
	
	protected function createOrder()
	{
		$this->order = Order::create($this->request);
	}


	/**
	 * Refactor request for database field input
	 *
	 * @return Request
	 **/

	protected function prepareData()
	{
		unset($this->request['cart_rowId']);
	}


	/**
	 * Remove item from session cart
	 *
	 **/

	protected function removeItemFromCart()
	{
		Cart::remove($this->request['cart_rowId']);
	}


	/**
	 * Create orderitem for each product in order
	 *
	 **/

	protected function createOrderItem(){

		OrderItem::create(
		[
			"order_id" => $this->order->id,
			"product_id" => $this->cart_item->id,
			"price" => $this->cart_item->price
		]);

		if($this->cart_item->options->card)
		{
			OrderItem::create([
				"order_id"	=> $this->order->id,
				"product_id" => $this->cart_item->options->card->id,
				"price" => $this->cart_item->options->card->price,
				"extra" => $this->cart_item->options->message
			]);
		}
	}



	/**
	 * Create payment for specific order
	 *
	 * @return Payment
	 **/

	protected function createPayment(){

		$payment = Payment::create([
			"order_id" => $this->order->id,
			"amount" => $this->getTotalPrice()
		]);

		$this->order->payment_id = $payment->id;
		$this->order->price = $this->getTotalPrice();
		$this->order->save();

		return $payment;
		
	}



	/**
	 * Get total price for this order
	 *
	 * @return number
	 **/

	protected function getTotalPrice(){
		$price = 0;

		foreach($this->order->orderitems as $orderitem){
			$price += $orderitem->price;
		};
		
		return $price;
	}



	/**
	 * get cart item from cart
	 *
	 * @return cart_item
	 **/

	protected function getCartItem()
	{
		return $this->cart_item = Cart::get($this->request['cart_rowId']);
	}
}