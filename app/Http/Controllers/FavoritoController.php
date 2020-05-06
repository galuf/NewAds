<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorito;

class FavoritoController extends Controller
{
    public function index(Request $request){
        $favorito = new Favorito();
        $favorito->aviso_id = $request->aviso_id;
        $favorito->usuario_id = $request->usuario_id;
        $favorito->estado_favorito = 1;
        $favorito->save();

        return response()->json('Ingresate Favorito',200);
    }

    public function verFavoritos(Request $request){
        
        $favoritos = Favorito::join('avisos','favoritos.aviso_id','=','avisos.id')
        //where('usuario_id','=',$request->user_id)
//                                ->join('avisos','favoritos.aviso_id','=','avisos.id')
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('favoritos.*',
                                    'avisos.id as aviso_id',    
                                    'avisos.direccion',
                                    'avisos.telefono',
                                    'avisos.email',
                                    'avisos.titulo',
                                    'avisos.imagen',
                                    'avisos.contenido',
                                    'avisos.fecha_inicio',
                                    'avisos.categoria_id',
                                    'avisos.estado',
                                    'avisos.usuario_id as id_usuario',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario',
                                    'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('usuario_id','=',$request->user_id)
                                ->where('estado_favorito','=',1);
        return ['favoritos' => $favoritos];
    }
    public function favoritoUnico(Request $request){
        $usuario_id = $request->usuario_id;
        $aviso_id = $request->aviso_id;

        $favorito = Favorito::where('usuario_id','=',$usuario_id)
                            ->where('aviso_id','=',$aviso_id)
                            ->get();
        if($favorito){
            return ['favorito' => $favorito];
        }else{
            return ['favorito' => [] ];
        }
    }
    public function quitarFavorito(Request $request){
        $far = Favorito::findOrFail($request->id);
        $far->estado_favorito = 0;
        $far->save();
    }
    public function activarFavorito(Request $request){
        $far = Favorito::findOrFail($request->id);
        $far->estado_favorito = 1;
        $far->save();
    }
}
