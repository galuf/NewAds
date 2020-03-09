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
}
