<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Card;
use App\Order;

class OrderItem extends Model
{
	protected $table = "orderitems";

    protected $guarded = [];

    public function product(){
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function order(){
    	return $this->hasOne(Order::class);
    }
}
