<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";

	public function priceInEuros(){
		return number_format($this->price / 100,2);
	}
}
