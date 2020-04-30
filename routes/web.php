<?php


// Route::get('/', function () {
//     return view('/paginas.contenido');
//     //return view('/');
// })->name('index');

// Route::get('/aviso_principal','AvisoPrincipalController@index');
Route::get('/regiones','RegionController@index');
Route::get('/provincia','ProvinciaController@index');
Route::get('/distrito','DistritoController@index');
// Route::get('/usuario','UserController@index');
Route::post('/aviso_crear','AvisoPrincipalController@create');

Route::get('/editarAviso','AvisoPrincipalController@index');
Route::get('/contenido/{id?}','AvisoPrincipalController@ver');
Route::get('/misAvisos','AvisoPrincipalController@misAvisos');

// //Auth::routes();
// Route::get('/registro', function(){
//   return view('/auth.registro');
// })->name('registro');
Route::get('/buscador','BuscadorController@index');
Route::get('/misFavoritos','FavoritoController@verFavoritos');
Route::get('/favoritoUnico','FavoritoController@favoritoUnico');
Route::get('/perfilAjeno','UserController@perfilAjeno');
// Route::get('/categoria/{id}','CategoriaController@index');
Route::put('/favoritoQuitar','FavoritoController@quitarFavorito');
Route::put('/activarFavorito','FavoritoController@activarFavorito');
Route::put('/editarPerfil','UserController@editarPerfil');
Route::put('/editarAviso','AvisoPrincipalController@editarAviso');
Route::put('/quitarAviso','AvisoPrincipalController@quitarAviso');
// Route::get('/ver-contenido',function(){
//   return view('paginas.veraviso');
// })->name('ver-contenido');

// Route::get('/poner-aviso', function(){
//   return view('/paginas.poneraviso');
// })->name('poneraviso');

Route::get('/{any}',function(){
  return view('layouts.app');
})->where('any','.*');

Route::post('/comentar','ComentarioController@index')->name('subirComentario');
Route::post('/favorito','FavoritoController@index');
Route::post('/login/{url?}/{id?}', 'Auth\LoginController@login')->name('login');
Route::post('/register/{url?}/{id?}','Auth\RegisterController@create')->name('register');
Route::post('/logoutver-contenido','Auth\LoginController@logout')->name('logout');
