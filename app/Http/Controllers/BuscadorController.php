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
            $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                            ->join('provincias','distritos.provincia_id','=','provincias.id')
                            ->join('regions','provincias.region_id','=','regions.id')
                            ->join('users','avisos.usuario_id','=','users.id')
                            ->join('categorias','avisos.categoria_id','=','categorias.id')
                            ->select('avisos.*',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario', 
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            ->get();
        }elseif ($categoria == ''){
            if($criterio == 'usuario'){
                $id_usuario = User::where('nombre','like','%'.$buscar.'%')
                                    ->orwhere('apellido','like','%'.$buscar.'%')->first();
                if($id_usuario){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario', 
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('usuario_id',$id_usuario->id);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'region'){
                $id_region = Region::where('nombre','like','%'.$buscar.'%')->first();
                if($id_region){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('region_id',$id_region->id);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'provincia'){
                $id_provincia = Provincia::where('nombre','like','%'.$buscar.'%')->first();
                if($id_provincia){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('provincia_id',$id_provincia->id);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'distrito'){
                $id_distrito = Distrito::where('nombre','like','%'.$buscar.'%')->first();
                if($id_distrito){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('distrito_id',$id_distrito->id);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'titulo'){
                $avisos = Aviso::where('titulo','like','%'.$buscar.'%')
                                ->join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get();

            }elseif($criterio == 'contenido'){
                $avisos = Aviso::where('contenido','like','%'.$buscar.'%')
                            ->join('distritos','avisos.distrito_id','=','distritos.id')
                            ->join('provincias','distritos.provincia_id','=','provincias.id')
                            ->join('regions','provincias.region_id','=','regions.id')
                            ->join('users','avisos.usuario_id','=','users.id')
                            ->join('categorias','avisos.categoria_id','=','categorias.id')
                            ->select('avisos.*',
                                    'distritos.nombre as nombre_distrito',
                                    'provincias.nombre as nombre_provincia',
                                    'regions.nombre as nombre_region',
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario',
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            ->get();    
            }
        }elseif($categoria != '' && ($buscar == '' || $criterio == '')){
            $avisos = Aviso::where('categoria_id','=',$categoria)
                ->join('distritos','avisos.distrito_id','=','distritos.id')
                ->join('provincias','distritos.provincia_id','=','provincias.id')
                ->join('regions','provincias.region_id','=','regions.id')
                ->join('users','avisos.usuario_id','=','users.id')
                ->join('categorias','avisos.categoria_id','=','categorias.id')
                ->select('avisos.*',
                        'distritos.nombre as nombre_distrito',
                        'provincias.nombre as nombre_provincia',
                        'regions.nombre as nombre_region',
                        'users.nombre as nombre_usuario',
                        'users.apellido as apellido_usuario',
                        'users.avatar as avatar_usuario',
                        'categorias.nombre as nombre_categoria')
                ->orderBy('id','desc')
                ->get();
        }else{
            if($criterio == 'usuario'){
                $id_usuario = User::where('nombre','like','%'.$buscar.'%')
                                    ->orwhere('apellido','like','%'.$buscar.'%')->first();
                if($id_usuario){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario', 
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('usuario_id',$id_usuario->id)
                                ->where('categoria_id',$categoria);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'region'){
                $id_region = Region::where('nombre','like','%'.$buscar.'%')->first();
                if($id_region){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('region_id',$id_region->id)
                                ->where('categoria_id',$categoria);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'provincia'){
                $id_provincia = Provincia::where('nombre','like','%'.$buscar.'%')->first();
                if($id_provincia){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('provincia_id',$id_provincia->id)
                                ->where('categoria_id',$categoria);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'distrito'){
                $id_distrito = Distrito::where('nombre','like','%'.$buscar.'%')->first();
                if($id_distrito){

                    $avisos = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                                ->join('provincias','distritos.provincia_id','=','provincias.id')
                                ->join('regions','provincias.region_id','=','regions.id')
                                ->join('users','avisos.usuario_id','=','users.id')
                                ->join('categorias','avisos.categoria_id','=','categorias.id')
                                ->select('avisos.*',
                                        'distritos.nombre as nombre_distrito',
                                        'provincias.nombre as nombre_provincia',
                                        'regions.nombre as nombre_region',
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get()
                                ->where('distrito_id',$id_distrito->id)
                                ->where('categoria_id',$categoria);
                }else{
                    $avisos = [];
                }
            }elseif($criterio == 'titulo'){
                $avisos = Aviso::where('titulo','like','%'.$buscar.'%')
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
                                        'users.nombre as nombre_usuario',
                                        'users.apellido as apellido_usuario',
                                        'users.avatar as avatar_usuario',
                                        'categorias.nombre as nombre_categoria')
                                ->orderBy('id','desc')
                                ->get();

            }elseif($criterio == 'contenido'){
                $avisos = Aviso::where('contenido','like','%'.$buscar.'%')
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
                                    'users.nombre as nombre_usuario',
                                    'users.apellido as apellido_usuario',
                                    'users.avatar as avatar_usuario',
                                    'categorias.nombre as nombre_categoria')
                            ->orderBy('id','desc')
                            ->get();    
            }
        }
        return [ 'avisos' => $avisos];
    }
}
