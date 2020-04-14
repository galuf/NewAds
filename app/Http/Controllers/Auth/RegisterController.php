<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
class RegisterController extends Controller
{
    public function create(RegisterRequest $request, $url = 'index' ,$id='')
    {   
        //return response()->json('Todo correcto', 200);
        User::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellidos'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if(Auth::attempt(['email'=>$request['email'] , 'password' => $request['password'] ])){
            if($id != '') return redirect($url.'?ads='.$id);
            $usuario = User::where('email','=',$request['email'])->first();
            return response()->json(['usuario' => $usuario],200);
            //return response()->json('Todo correcto', 200);
            //return redirect()->route($url);
        }
    }    
    
}
