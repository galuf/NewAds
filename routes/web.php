<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Aviso;

Route::get('/', function () {

//     $avisos = Aviso::all();

//     foreach($avisos as $aviso){
//         echo "<div>";
//         echo "<h2>".$aviso->titulo."</h2>";
//         echo "Categoria : ".$aviso->categoria->nombre. "<br/>";
//         echo "Publicado en : ".$aviso->distrito->nombre." ".$aviso->distrito->provincia->nombre ." ". $aviso->distrito->provincia->region->nombre. "<br/>";  
        
//         echo "direccion : ".$aviso->direccion. "<br/>";
//         echo "telefono : ".$aviso->telefono. "<br/>";
//         echo " COntenido " . $aviso->contenido . "<br/>";
//         echo "fecha : " . $aviso->fecha_inicio;
//         // echo $image->user->name." ---- ". $image->image_path."------" .$image->description;
//         // echo "<h4>Comentarios : </h4>";
//         // foreach($image->comments as $comment){
//         //     $usuario = User::where('id',$comment->user_id)->first();
//         //     echo "<strong> Comentario de ". $usuario->name. " : </strong>";
//         //     echo $comment->content . "<br/>";
//         // }

//         // echo "<h4>Likes : </h4>";
//         // foreach($image->likes as $like){
//         //     $gusta = User::where('id',$like->user_id)->first();
//         //     echo "<strong> Le gusta a ". $gusta->name. " </strong>";
//         // }
// //        
//         echo "<hr/>";
//         echo "</div>";
//     }
//     
    return view('/paginas.principal');
    //return view('/');
})->name('index');

Route::get('/aviso_principal','AvisoPrincipalController@index');
Route::get('/regiones','RegionController@index');
Route::get('/provincia','ProvinciaController@index');
Route::get('/distrito','DistritoController@index');
Route::get('/usuario','UserController@index');
Route::post('/aviso_crear','AvisoPrincipalController@create');
//Auth::routes();

Route::post('/login/{url?}', 'Auth\LoginController@login')->name('login');
Route::post('/register/{url?}','Auth\RegisterController@create')->name('register');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/registro', function(){
  return view('/auth.registro');
})->name('registro');

Route::get('/poner-aviso', function(){
  return view('/paginas.poneraviso');
})->name('poneraviso');