<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;

class Card extends Model
{
    protected $table = "cards";

    public function priceInEuros(){
		return number_format($this->price / 100,2);
	}
}
