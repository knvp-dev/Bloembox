<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
	protected $cart;
	public function __construct(CartRepository $cart){
		$this->cart = $cart;
	}

    public function addItemToCart($product_id){
    	$this->cart->addFlowers($product_id);
        return redirect()->back();
    }

    public function addCardToCart(Request $request){
        $this->cart->addCard($request);
        return redirect('/');
    }

    public function updateCartItem($row_id,$qty){
    	$this->cart->update($row_id,$qty);
        return redirect()->back();
    }

    public function removeCartItem($row_id){
    	$this->cart->remove($row_id);
        return redirect()->back();
    }

    public function removeCard($row_id){
        $this->cart->removeCard($row_id);
        return redirect()->back();
    }

}
