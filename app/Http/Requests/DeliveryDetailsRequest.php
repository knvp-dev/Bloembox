<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeliveryDetailsRequest extends Request
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
        // $rules = $this->rules;

        // if(Input::get('hospital'))

        return [
            'recipient' =>  'required|min:2',
            'street'    =>  'required|min:2',
            'number'    =>  'required|min:1',
            'postalcode'=>  'required|min:4|max:4',
            'city'      =>  'required|min:2'
        ];
    }
}
