<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'emailr' => 'required|string|email|max:255|unique:users,email',
    //         'password_r' => 'required|string|min:6|confirmed',
    //     ]);
    // }
    //generamos un cambio desde Rama Edel
    public function create(Request $data)
    {
        $this->validate($data,[
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'emailr' => 'required|string|email|max:255|unique:users,email',
            'password_r' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'nombre' => $data['name'],
            'apellido' => $data['lastname'],
            'email' => $data['emailr'],
            'password' => Hash::make($data['password_r']),
        ]);

        if(Auth::attempt(['email'=>$data['emailr'] , 'password' => $data['password_r'] ])){
            return redirect()->route('index');
        }
        return back()
        ->withErrors(['name' => 'Nombre de usuario incorrecto',
                      'lastaname' => 'Apellidos de usuario incorrectos',
                      'emailr' => 'Email incorrecto',
                      'password_r' => 'La contraseña debe tener como minimo 6 caracteres',
                      'password_r_confirmation' => 'Las contraseñas no coninciden' ]);
    }
}
