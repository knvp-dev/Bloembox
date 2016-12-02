<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
    protected $table = "card_categories";

    public function cards(){
    	return $this->hasMany('App\Card','category_id');
    }
}
