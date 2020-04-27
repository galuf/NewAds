<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Region;
use App\Provincia;
use App\Distrito;
use App\User;
class UserController extends Controller
{
    public function index(Request $request){
        
        if(Auth::check()){
            $usuario = Auth::user();
            //return $usuario;
            return [
                'usuario' => $usuario,
            ];
        }else {
            return [
                'usuario' => []
            ];
        }
    }
    public function editarPerfil(Request $request){

        if($request->imagen != ''){
            $exploded = explode(',',$request->imagen);
            $decoded = base64_decode($exploded[1]);
            
            if (str_contains($exploded[0],'jpeg'))
                $extension = 'jpg';
            else{
                $extension = 'png'; 
            }
            
            $filename = time().'-'.str_replace(' ','',$request->titulo).'.'.$extension;
        
            $src='/img/avatar/'.$filename;
            $path = public_path().$src;
            file_put_contents($path,$decoded);
        }else{
            $src = '';
        }
        
        $usuario = User::findOrFail($request->id);
        
        if($request->region_id != '') {
            $region = Region::find($request->region_id);
            $usuario->region = $region->nombre;
        }
        if($request->provincia_id != '') {
            $provincia = Provincia::find($request->provincia_id);
            $usuario->provincia = $provincia->nombre;
        }
        if($request->distrito_id != '') {
            $distrito = Distrito::find($request->distrito_id);
            $usuario->distrito = $distrito->nombre;
        }

        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        if($src != '') $usuario->avatar = $src;   
        $usuario->save(); 
        return response()->json(['usuario' => $usuario],200);
    }
}
