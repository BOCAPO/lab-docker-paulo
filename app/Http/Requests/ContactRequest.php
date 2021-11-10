<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'form.ctt_email' => 'email|required',
            'form.ctt_whatsapp' => '',
            'form.ctt_phone' => ''
        ];
    }
}
