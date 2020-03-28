<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;

class AvisoPrincipalController extends Controller
{
    public function index(Request $request)
    //cambio de edel para git hub
    {
        if(!$request->ajax()) return redirect('/'); 

        $aviso = Aviso::join('distritos','avisos.distrito_id','=','distritos.id')
                        ->join('provincias','distritos.provincia_id','=','provincias.id')
                        ->join('regions','provincias.region_id','=','regions.id')
                        ->select('avisos.*', 'distritos.nombre as nombre_distrito','provincias.nombre as nombre_provincia','regions.nombre as nombre_region')
                        ->get();

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
        
        return [
            'aviso' => $aviso,
            'region' =>$aviso->distrito->provincia->region,
            'provincia' => $aviso->distrito->provincia,
            'usuario' => $aviso->usuario,
            'comentarios' => $aviso->comentarios
        ];
    }
}

// {"4":{"id":5,
//     "usuario_id":1,
//     "categoria_id":11,
//     "distrito_id":210101,
//     "estado":1,
//     "direccion":"Jr Acora #567 (frente al estadio)",
//     "telefono":"969641703",
//     "email":"alex@alex.com",
//     "titulo":"Gran Pollada Bailable",
//     "imagen":"\/img\/categoria\/11jpg",
//     "contenido":"Te invitamos a la gran pollada bailable, ven y divi\u00e9rtete con tus amigos y ayuda al centro medico peruano.",
//     "fecha_inicio":"2020-3-25 17:16:42",
//     "fecha_final":null,"fecha_baja":null,
//     "created_at":"2020-03-25 22:16:43",
//     "updated_at":"2020-03-25 22:16:43",
//     "nombre_distrito":"Puno",
//     "nombre_provincia":"Puno ",
//     "nombre_region":"Puno",
//     "nombre_usuario":"administrador",
//     "apellido_usuario":"admin",
//     "nombre_categoria":"Eventos"}}
