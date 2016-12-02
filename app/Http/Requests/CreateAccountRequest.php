<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAccountRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname'             =>  'required|min:2',
            'lastname'              =>  'required|min:2',
            'email'                 =>  'required|email|unique:users',
            'password'              =>  'required|min:6|confirmed',
            'password_confirmation' =>  'required|min:6'
        ];
    }
}
