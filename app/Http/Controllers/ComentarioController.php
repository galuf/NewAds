<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comentario;

class ComentarioController extends Controller
{
    public function index(Request $request){
        
        if(\Auth::guest()){
            return back()->withErrors(['comentario'=> 'Debe iniciar sesion']);
        }else{
        
            $v = Validator::make(['comentario' => $request['comentario']],
                    ['comentario'=> 'required|string'], 
                    ['comentario.required'=> 'Debe ingresar un comentario']);
            if($v->fails()){
                return back()->withErrors($v->messages());
            }else{
                Comentario::create([
                    'usuario_id' => \Auth::user()->id,
                    'aviso_id' => $request['aviso_id'],
                    'contenido' => $request['comentario']
                ]);
                return back();
            }
        }
    }
}
