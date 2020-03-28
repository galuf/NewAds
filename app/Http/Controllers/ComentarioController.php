<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comentario;

class ComentarioController extends Controller
{
    public function index(Request $request){
        
        if(!$request->ajax()) return redirect('/');

        $comentario = new Comentario();

        $comentario->usuario_id = \Auth::user()->id;
        $comentario->aviso_id = $request->aviso_id;
        $comentario->contenido = $request->contenido;
        $comentario->save();
    }
}
