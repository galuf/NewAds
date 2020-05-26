<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;
use App\Distrito;
use App\Provincia;
Use App\Region;
Use App\User;

class BuscadorController extends Controller
{
    public function index(Request $request){
        $buscar = $request->busqueda;
        $criterio = $request->filtro;
        $categoria = $request->categoria;

        if($categoria == '' && ($buscar == '' || $criterio == '')){
            $avisos = Aviso::where('estado','=',1)
                            ->join('distritos','avisos.distrito_id','=','distritos.id')
                            ->join('provincias','distritos.provincia_id','=','provincias.id')
                            ->join('regions','provincias.region_id','=','regions.id')
                            ->join('users','avisos.usuario_id','=','users.id')
                            ->join('categorias','avisos.categoria_id','=','categorias.id')
                            ->select('avisos.*',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.id as id_usuario',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario', 
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            //->get()
                            ->paginate(15);
        }elseif ($categoria == ''){
            if($criterio == 'usuario'){
                $id_usuario = User::where('nombre','like','%'.$buscar.'%')
                                    ->orwhere('apellido','like','%'.$buscar.'%')->first();
                if($id_usuario){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario', 
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('usuario_id',$id_usuario->id)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'region'){
                $id_region = Region::where('nombre','like','%'.$buscar.'%')->first();
                if($id_region){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.region_id',$id_region->id)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'provincia'){
                $id_provincia = Provincia::where('nombre','like','%'.$buscar.'%')->first();
                if($id_provincia){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.provincia_id',$id_provincia->id)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'distrito'){
                $id_distrito = Distrito::where('nombre','like',$buscar)->first();
                if($id_distrito){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.distrito_id',$id_distrito->id)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'titulo'){
                $avisos = Aviso::where('titulo','like','%'.$buscar.'%')
                                ->where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->paginate(15);

            }elseif($criterio == 'contenido'){
                $avisos = Aviso::where('contenido','like','%'.$buscar.'%')
                            ->where('estado','=',1)
                            ->join('distritos','avisos.distrito_id','=','distritos.id')
                            ->join('provincias','distritos.provincia_id','=','provincias.id')
                            ->join('regions','provincias.region_id','=','regions.id')
                            ->join('users','avisos.usuario_id','=','users.id')
                            ->join('categorias','avisos.categoria_id','=','categorias.id')
                            ->select('avisos.*',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.id as id_usuario',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario',
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            //->get()
                            ->paginate(15);    
            }
        }elseif($categoria != '' && ($buscar == '' || $criterio == '')){
            $avisos = Aviso::where('categoria_id','=',$categoria)
                ->where('estado','=',1)
                ->join('distritos','avisos.distrito_id','=','distritos.id')
                ->join('provincias','distritos.provincia_id','=','provincias.id')
                ->join('regions','provincias.region_id','=','regions.id')
                ->join('users','avisos.usuario_id','=','users.id')
                ->join('categorias','avisos.categoria_id','=','categorias.id')
                ->select('avisos.*',
                        'distritos.nombre as nombre_distrito',
                        'provincias.nombre as nombre_provincia',
                        'regions.nombre as nombre_region',
                        'users.id as id_usuario',
                        'users.nombre as nombre_usuario',
                        'users.apellido as apellido_usuario',
                        'users.avatar as avatar_usuario',
                        'categorias.nombre as nombre_categoria')
                ->orderBy('id','desc')
                ->paginate(15);
                //->get();
        }else{
            if($criterio == 'usuario'){
                $id_usuario = User::where('nombre','like','%'.$buscar.'%')
                                    ->orwhere('apellido','like','%'.$buscar.'%')->first();
                if($id_usuario){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario', 
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('usuario_id',$id_usuario->id)
                                ->where('categoria_id',$categoria)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'region'){
                $id_region = Region::where('nombre','like','%'.$buscar.'%')->first();
                if($id_region){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.region_id',$id_region->id)
                                ->where('avisos.categoria_id',$categoria)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'provincia'){
                $id_provincia = Provincia::where('nombre','like','%'.$buscar.'%')->first();
                if($id_provincia){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.provincia_id',$id_provincia->id)
                                ->where('avisos.categoria_id',$categoria)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'distrito'){
                $id_distrito = Distrito::where('nombre','like',$buscar)->first();
                if($id_distrito){

                    $avisos = Aviso::where('estado','=',1)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get()
                                ->where('avisos.distrito_id',$id_distrito->id)
                                ->where('avisos.categoria_id',$categoria)
                                ->paginate(15);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'titulo'){
                $avisos = Aviso::where('titulo','like','%'.$buscar.'%')
                                ->where('estado','=',1)
                                ->where('categoria_id',$categoria)
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.id as id_usuario',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                //->get();
                                ->paginate(15);

            }elseif($criterio == 'contenido'){
                $avisos = Aviso::where('contenido','like','%'.$buscar.'%')
                            ->where('estado','=',1)
                            ->where('categoria_id',$categoria)
                            ->join('distritos','avisos.distrito_id','=','distritos.id')
                            ->join('provincias','distritos.provincia_id','=','provincias.id')
                            ->join('regions','provincias.region_id','=','regions.id')
                            ->join('users','avisos.usuario_id','=','users.id')
                            ->join('categorias','avisos.categoria_id','=','categorias.id')
                            ->select('avisos.*',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.id as id_usuario',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario',
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            //->get();
                            ->paginate(15);    
            }
        }
        return ['avisos' => $avisos];
    }
}
