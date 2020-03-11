<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distrito;
class DistritoController extends Controller
{
    public function index(Request $request){
        
        if(!$request->ajax()) return redirect('/');
        if(!isset($request->provincia_id) && !isset($request->region_id ) || ($request->region_id == '' && $request->provincia_id == '')){
            return [
                'distrito' => [],
            ];
        }else{
            $distrito = Distrito::where('region_id','=',$request->region_id)
                                  ->where('provincia_id','=', $request->provincia_id)->get();   
            return [
                'distrito' => $distrito,
            ];
        }
    }
}
