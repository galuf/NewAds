<?php

Route::get('/regiones','RegionController@index');
Route::get('/provincia','ProvinciaController@index');
Route::get('/distrito','DistritoController@index');

Route::post('/aviso_crear','AvisoPrincipalController@create');

Route::get('/editarAviso','AvisoPrincipalController@index');
Route::get('/contenido/{id?}','AvisoPrincipalController@ver');
Route::get('/misAvisos','AvisoPrincipalController@misAvisos');

Route::get('/buscador','BuscadorController@index');
Route::get('/misFavoritos','FavoritoController@verFavoritos');
Route::get('/perfilAjeno','UserController@perfilAjeno');

Route::put('/editarPerfil','UserController@editarPerfil');
Route::put('/editarAviso','AvisoPrincipalController@editarAviso');
Route::put('/quitarAviso','AvisoPrincipalController@quitarAviso');

Route::get('/unicoFavorito','FavoritoController@favoritoUnico');
Route::put('/quitarFavorito','FavoritoController@quitarFavorito');
Route::put('/activarFavorito','FavoritoController@activarFavorito');
Route::post('/comentAviso','ComentarioController@index');
Route::get('/comentsAds/{id?}','ComentarioController@comentarios');
Route::post('/favorito','FavoritoController@index');

Route::delete('/quitarComentario','ComentarioController@destroy');

Route::get('/{any}',function(){
  return view('layouts.app');
})->where('any','.*');

Route::post('/login/{url?}/{id?}', 'Auth\LoginController@login')->name('login');
Route::post('/register/{url?}/{id?}','Auth\RegisterController@create')->name('register');
Route::post('/logoutver-contenido','Auth\LoginController@logout')->name('logout');
