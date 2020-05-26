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

        $comentario->usuario_id = $request->user_id;
        $comentario->aviso_id = $request->aviso_id;
        $comentario->contenido = $request->contenido;
        $comentario->save();
    }
    public function comentarios($id=0){
        
        $comentarios = Comentario::join('users','comentarios.usuario_id','=','users.id')
                            ->select('comentarios.*',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar')
                            ->where('comentarios.aviso_id','=',$id)
                            ->orderBy('id','desc')
                            ->paginate(3);
                            //->get();

        //$aviso = Aviso::find($id);
        //return view('paginas.veraviso',['aviso' => $aviso]);
        //$usuario = [];
        //foreach($aviso->comentarios as $comentario){
        //    array_push($usuario,$comentario->user);
        //}

        // return [
        //     'aviso' => $aviso,
        //     'region' =>$aviso->distrito->provincia->region,
        //     'provincia' => $aviso->distrito->provincia,
        //     'distrito' => $aviso->distrito,
        //     'usuario' => $aviso->usuario,
        //     'comentarios' => $aviso->comentarios,
        //     'categoria' =>$aviso->categoria,
        //     'coment_user' => $usuario,
        // ];
        return ['comentarios' => $comentarios];
    }
    
    public function destroy(Request $request){
        $comentario = Comentario::findOrFail($request->id);
        $comentario->delete();
        //$res=Comentario::find($request->$id)->delete();
    }
}
