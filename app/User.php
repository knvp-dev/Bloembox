<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'send_address',
        'send_number',
        'send_postalcode',
        'send_city',
        'invoice_address',
        'invoice_number',
        'invoice_postalcode',
        'invoice_city',
        'email',
        'password',
        'company',
        'company_name',
        'company_contact',
        'VAT'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function confirmAccount(){
        $this->confirmed = 1;
        $this->confirmation_code = null;
        $this->save();
    }
}
