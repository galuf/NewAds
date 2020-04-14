<?php
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request,$url='index',$id=''){

        if(Auth::attempt(['email' =>$request->email , 'password' => $request->password], false)){
            $usuario = User::where('email','=',$request->email)->first();
            return response()->json(['usuario' => $usuario],200); 
        }else{
            return response()->json(['errors' => ['login' => ['Los datos que ingresaste son incorrectos']]],422);
        }
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return response()->json('Cerraste Sesion',200);
    }
}
