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
        
        $aviso = new Aviso();

        $aviso->usuario_id =$request->usuario_id;
        $aviso->categoria_id =$request->categoria_id;
        $aviso->distrito_id =$request->distrito_id;
        $aviso->estado = 1;
        $aviso->direccion =$request->direccion;
        $aviso->telefono =$request->telefono;
        $aviso->email =$request->email;
        $aviso->titulo =$request->titulo;
        $aviso->imagen =$request->imagen;
        $aviso->contenido =$request->contenido;
        $aviso->fecha_inicio =$request->fecha_inicio;
        $aviso->save();
    }
}
