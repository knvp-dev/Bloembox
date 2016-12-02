<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderItem;

class Order extends Model
{
	protected $guarded = [];
    
	public function user(){
		return $this->hasOne(User::class, 'id');
	}

	public function orderitems(){
		return $this->hasMany(OrderItem::class);
	}

	public function payment(){
		return $this->hasOne(Payment::class);
	}

	public function hasBeenCompleted(){
		return !! $this->completed;
	}

	public function priceInEuros(){
		return number_format($this->price / 100,2);
	}

}
