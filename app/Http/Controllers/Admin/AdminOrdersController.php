<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests;

class AdminOrdersController extends Controller
{
    public function showOpenOrders(){
    	$orders = Order::whereCompleted(0)->with('user','payment')->get();
    	return view('admin.orders.open')->with('orders',$orders);
    }

    public function showCompletedOrders(){
    	$orders = Order::whereCompleted(1)->with('user','payment')->get();
    	return view('admin.orders.completed')->with('orders',$orders);
    }

    public function showOrderDetail($id){
    	$order = Order::whereId($id)->first();
    	return view('admin.orders.detail')->with('order',$order);
    }
}
