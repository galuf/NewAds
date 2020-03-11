<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        
        if(Auth::check()){
            $usuario = Auth::user();
            //return $usuario;
            return [
                'usuario' => $usuario,
            ];
        }else {
            return [
                'usuario' => []
            ];
        }
    }
}
