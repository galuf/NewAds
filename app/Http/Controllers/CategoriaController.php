<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;

class CategoriaController extends Controller
{
    public function index($id){

        $avisos = Aviso::where('categoria_id',$id)->get();
        return view('paginas.categorias' ,['avisos'=> $avisos]);
    }
}
