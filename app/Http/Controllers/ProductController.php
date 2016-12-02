<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Card;
use Cart;

class ProductController extends Controller
{
    public function index($product_type){
    	$products = Product::where('product_type',$product_type)->get();
    	return view('pages.products.index', compact('products','product_type'));
    }

    public function showProductDetail($type, $slug)
    {
        $product = Product::whereSlug($slug)->first();
        return view('pages.products.detail', compact('product'));
    }

    public function showCards($flowers_row_id){
    	$cards = Product::where("product_type",'card')->get();
    	return view('pages.cards.index', compact('cards','flowers_row_id'));
    }

    public function showCardCustomization($card_id, $flowers_row_id){
    	$card = Product::find($card_id);
        $cart_item = Cart::get($flowers_row_id);
    	return view('pages.cards.detail', compact('cart_item','card'));
    }
}
