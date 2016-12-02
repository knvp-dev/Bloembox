<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $fillable = [
		"order_id",
		"amount"
	];

	protected $casts = [
		"amount" => "double"
	];

    public function hasBeenPaid(){
		return !! $this->paid;
	}

	public function order(){
		return $this->hasOne(Order::class);
	}

	public function updatePaymentStatus(){
		$this->paid = 1;
		$this->save();
	}
}
