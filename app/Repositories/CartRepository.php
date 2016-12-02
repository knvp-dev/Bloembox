<?php 

namespace App\Repositories;

use App\Product;
use App\Card;
use Cart;

class CartRepository {

	protected $cart;

	public function __construct(){
		$this->cart = $this->getCartContents();
	}

	public function addFlowers($product_id){
		$product = $this->getFlowersById($product_id);

		$cart_item = Cart::add($product->id, $product->name, 1, $product->price, ['options' => ['unique_id' => $this->getRandomId()]]);

		Cart::associate($cart_item->rowId, Product::class);

		return $cart_item;
	}

	public function addCard($request)
	{
		$card = $this->getCardById($request->card_id);

		$flowers = Cart::get($request->flowers_row_id);

		$flower = Product::find($flowers->id)->first();

		$cartitem = Cart::update($flowers->rowId, ['price' => $flower->price + $card->price,'options' => ['card' => $card, 'message' => $request->message]]);
	}

	public function update($row_id, $qty){

	}

	public function removeCard($row_id){
		$cart_item = Cart::get($row_id);
		Cart::update($row_id, ['price' => $cart_item->price - $cart_item->options->card->price,'options' => ['unique_id' => $this->getRandomId()]]);
	}

	public function remove($row_id){
		Cart::remove($row_id);
	}

	protected function getFlowersById($product_id){
		return Product::find($product_id);
	}

	protected function getCardById($card_id)
	{
		return Product::find($card_id);
	}

	public function getCartContents(){
		return Cart::content();
	}

	protected function getRandomId(){
		return mt_rand(100000,999999) + round(microtime(true) * 1000);
	}

}