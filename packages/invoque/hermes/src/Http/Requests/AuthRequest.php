<?php

namespace Invoque\Hermes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(){ return true; }

    public function rules()
    {
        $rules = [
            'usr_username' => 'required|email|min:4',
            'usr_password' => 'required|min:6'
        ];

        return $rules;
    }
}
