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
            if($extension == 'jpg'){
                $img_origen = imagecreatefromjpeg($path);
                $ancho_origen = imagesx($img_origen);
                $alto_origen = imagesy($img_origen);
                $ancho_limite = 720;
                if($ancho_origen > $alto_origen){
                    $ancho_origen = $ancho_limite;
                    $alto_origen = $ancho_limite*imagesy($img_origen)/imagesx($img_origen);    
                }else{
                    $alto_origen = $ancho_limite;
                    $ancho_origen = $ancho_limite*imagesx($img_origen)/imagesy($img_origen);
                }
                $img_destino = imagecreatetruecolor($ancho_origen,$alto_origen);
                imagecopyresized($img_destino,$img_origen, 0,0,0,0,$ancho_origen,$alto_origen, imagesx($img_origen),imagesy($img_origen));
                imagejpeg($img_destino,$path);
            }else{
                $img_origen = imagecreatefrompng($path);
                $ancho_origen = imagesx($img_origen);
                $alto_origen = imagesy($img_origen);
                $ancho_limite = 520;
                if($ancho_origen > $alto_origen){
                    $ancho_origen = $ancho_limite;
                    $alto_origen = $ancho_limite*imagesy($img_origen)/imagesx($img_origen);    
                }else{
                    $alto_origen = $ancho_limite;
                    $ancho_origen = $ancho_limite*imagesx($img_origen)/imagesy($img_origen);
                }
                $img_destino = imagecreatetruecolor($ancho_origen,$alto_origen);
                imagecopyresized($img_destino,$img_origen, 0,0,0,0,$ancho_origen,$alto_origen, imagesx($img_origen),imagesy($img_origen));
                imagepng($img_destino,$path);
            }

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
    public function perfilAjeno(Request $request){
        $usuario = User::find($request->id);
        return ['usuario' => $usuario];
    }
}
