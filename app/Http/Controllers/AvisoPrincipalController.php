<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;
use App\Comentario;
class AvisoPrincipalController extends Controller
{
    public function index(Request $request)
    //cambio de edel para git hub
    {
        //if(!$request->ajax()) return redirect('/'); 

        $aviso = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                        ->join('provincias','distritos.provincia_id','=','provincias.id')
                        ->join('regions','provincias.region_id','=','regions.id')
                        ->join('categorias','avisos.categoria_id','=','categorias.id')
                        ->select('avisos.*', 
                                'distritos.nombre as nombre_distrito',
                                'provincias.nombre as nombre_provincia',
                                'regions.nombre as nombre_region',
                                'categorias.nombre as nombre_categoria')
                        ->get()
                        ->where('id','=',$request->ads)
                        ->first();

        return [
            'aviso' => $aviso,
        ];
    }

    public function create(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        if($request->imagen != ''){
            $exploded = explode(',',$request->imagen);
            $decoded = base64_decode($exploded[1]);
            
            if (str_contains($exploded[0],'jpeg'))
                $extension = 'jpg';
            else{
                $extension = 'png'; 
            }
            
            $filename = time().'-'.str_replace(' ','',$request->titulo).'.'.$extension;
        
            $src='/img/avisos/'.$filename;
            $path = public_path().$src;
            file_put_contents($path,$decoded);
        }else{
            $src='/img/categoria/'.$request->categoria_id.'.jpg';
        }

        $aviso = new Aviso();

        $aviso->usuario_id =$request->usuario_id;
        $aviso->categoria_id =$request->categoria_id;
        $aviso->distrito_id =$request->distrito_id;
        $aviso->provincia_id = $request->provincia_id;
        $aviso->region_id = $request->region_id;
        $aviso->estado = 1;
        $aviso->direccion =$request->direccion;
        $aviso->telefono =$request->telefono;
        $aviso->email =$request->email;
        $aviso->titulo =$request->titulo;
        $aviso->imagen =$src;
        $aviso->contenido =$request->contenido;
        $aviso->fecha_inicio =$request->fecha_inicio;
        $aviso->save();
    }
    public function ver($id=0){
        // $aviso = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
        //         ->join('provincias','distritos.provincia_id','=','provincias.id')
        //         ->join('regions','provincias.region_id','=','regions.id')
        //         ->join('users','avisos.usuario_id','=','users.id')
        //         ->join('categorias','avisos.categoria_id','=','categorias.id')
        //         ->select('avisos.*',
        //                 'distritos.nombre as nombre_distrito',
        //                 'provincias.nombre as nombre_provincia',
        //                 'regions.nombre as nombre_region',
        //                 'users.nombre as nombre_usuario',
        //                 'users.apellido as apellido_usuario',
        //                 'categorias.nombre as nombre_categoria')
        //         ->get()
        //         ->where('id','=',$id)->first();
        $aviso = Aviso::find($id);
        //return view('paginas.veraviso',['aviso' => $aviso]);
        $usuario = [];
        foreach($aviso->comentarios as $comentario){
            array_push($usuario,$comentario->user);
        }

        return [
            'aviso' => $aviso,
            'region' =>$aviso->distrito->provincia->region,
            'provincia' => $aviso->distrito->provincia,
            'distrito' => $aviso->distrito,
            'usuario' => $aviso->usuario,
            'comentarios' => $aviso->comentarios,
            'categoria' =>$aviso->categoria,
            'coment_user' => $usuario,
        ];
    }
    public function misAvisos(Request $request){
        $user_id = $request->id;
        $aviso = Aviso::where('usuario_id','=',$user_id)
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
                                'users.nombre as nombre_usuario',
                                'users.apellido as apellido_usuario',
                                'users.avatar as avatar_usuario',
                                'categorias.nombre as nombre_categoria')
                        ->orderBy('id','desc')
                        ->get();
        return ['aviso' => $aviso];
    }
    public function editarAviso(Request $request){
        if($request->imagen != ''){
            $exploded = explode(',',$request->imagen);
            $decoded = base64_decode($exploded[1]);
            
            if (str_contains($exploded[0],'jpeg'))
                $extension = 'jpg';
            else{
                $extension = 'png'; 
            }
            
            $filename = time().'-'.str_replace(' ','',$request->titulo).'.'.$extension;
        
            $src='/img/avisos/'.$filename;
            $path = public_path().$src;
            file_put_contents($path,$decoded);
        }else{
            $src='';
        }

        $aviso = Aviso::findOrFail($request->id);
        
        $aviso->categoria_id = $request->categoria_id;
        $aviso->distrito_id = $request->distrito_id;
        $aviso->provincia_id = $request->provincia_id;
        $aviso->region_id = $request->region_id;
        $aviso->direccion = $request->direccion;
        $aviso->telefono = $request->telefono;
        $aviso->titulo = $request->titulo;
        if($src != '') $aviso->imagen = $src;
        $aviso->contenido = $request->contenido;
        $aviso->save();
    }
    public function quitarAviso(Request $request){
        $aviso = Aviso::findOrFail($request->id);
        $aviso->estado = 0;
        $aviso->save();
    }
}