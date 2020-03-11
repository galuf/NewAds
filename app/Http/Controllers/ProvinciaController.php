<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{
    public function index(Request $request){
        
        if(!$request->ajax()) return redirect('/');
        if(!isset($request->region_id) || $request->region_id == ''){
            return [
                'provincia' => [],
            ];
        }else{
            $provincia = Provincia::where('region_id','=',$request->region_id)->get();   
            return [
                'provincia' => $provincia,
            ];
        }
    }    
}
