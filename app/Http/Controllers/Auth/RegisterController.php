<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create(Request $data)
    {
        $datos = [  'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'emailr' => $data['emailr'],
                    'password_r' => $data['password_r'],
                    'password_r_confirmation' => $data['password_r_confirmation']];

        $errores = ['name.regex' => 'El nombre de usuario solo debe contener letras',
                    'lastname.regex' => 'EL apellido de  usuario solo debe contener letras',
                    'emailr.unique' => 'El email ya se encuentra registrado',
                    'password_r.min' => 'La contraseña debe tener como minimo 6 caracteres',
                    'password_r.confirmed' => 'Las contraseñas no coninciden'];
            
        $v = Validator::make( $datos,[
            'name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/i',
            'lastname' => 'required|string|max:255|regex:/^[A-Za-z ]+$/i',
            'emailr' => 'required|string|email|max:255|unique:users,email',
            'password_r' => 'required|string|min:6|confirmed'
        ],$errores);
        
        if($v->fails()){
            return back()->withErrors($v->messages());
        }else{
            User::create([
                'nombre' => $data['name'],
                'apellido' => $data['lastname'],
                'email' => $data['emailr'],
                'password' => Hash::make($data['password_r']),
            ]);
            if(Auth::attempt(['email'=>$data['emailr'] , 'password' => $data['password_r'] ])){
                return redirect()->route('index');
            }
        }    
    }
}
