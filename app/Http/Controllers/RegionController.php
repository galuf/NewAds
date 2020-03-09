<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
class RegionController extends Controller
{
    public function index(Request $request){
        
        if(!$request->ajax()) return redirect('/');

        $region = Region::all();

        return [
            'region' => $region,
        ];
    }
}
