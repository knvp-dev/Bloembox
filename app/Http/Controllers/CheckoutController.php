<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\DeliveryDetailsRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Order;
use App\OrderItem;
use Mollie;

class CheckoutController extends Controller
{
	protected $order;

	public function __construct(OrderRepository $order)
	{
        $this->middleware('auth');
		$this->order = $order;
	}

    public function index(){
    	return view('pages.checkout.cart');
    }

    public function showDelivery(){
        if(Cart::count() > 0)
        {
            $cart_rowId = Cart::content()->first()->rowId;
            return view('pages.checkout.delivery',compact('cart_rowId'));
        }else{
            return redirect('/checkout/overview');
        }
          
    }

    public function createOrder(DeliveryDetailsRequest $request){
        $order = $this->order->create($request->all());
        return redirect()->back();
    }

    public function showOverview()
    {
        $orders = Order::where('user_id',Auth::user()->id)->with('orderitems.product')->get();
        return view('pages.checkout.overview', compact('orders'));
    }


    public function showSuccess($order_id){
        $order = Order::whereId($order_id)->first();
        return view('pages.checkout.success', compact('order'));
    }

}
