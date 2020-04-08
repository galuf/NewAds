<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Debe ingresar su email',
            'email.email' => 'Ingrese un email correcto',
            'password.required' => 'Debe ingresar su contraseña'
        ];
    }
}
