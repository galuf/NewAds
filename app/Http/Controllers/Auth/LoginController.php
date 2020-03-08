<?php
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt(['email' =>$request->email , 'password' => $request->password])){
            return redirect()->route('index');
        }
        return back()
        ->withErrors(['email' => 'Usuario o Contraseña incorrectos'])
        ->withInput(request(['email']));
    }               

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('index');
    }
}
