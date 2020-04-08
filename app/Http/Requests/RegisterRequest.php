<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',  //|regex:/^[A-Za-z ]+$/i',
            'apellidos' => 'required|string|max:255', //|regex:/^[A-Za-z ]+$/i',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'El nombre es requerido',
            //'nombre.regex' => 'El nombre solo debe contener letras',
            'apellidos.required' => 'El apellido es requerido',
            //'apellidos.regex' => 'EL apellido solo debe contener letras',
            'email.unique' => 'El email ya se encuentra registrado',
            'email.required' => 'El email es requerido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener como minimo 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coninciden'
        ];
    }
}
