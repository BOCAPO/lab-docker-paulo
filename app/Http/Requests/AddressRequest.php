<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'form.end_zipcode' => 'required|max:9',
            'form.end_address' => 'required|max:150',
            'form.end_number' => 'required|max:100',
            'form.end_district' => 'required|max:60',
            'form.end_state' => 'required|max:2',
            'form.end_city' => 'required|max:60'
        ];
    }
}
