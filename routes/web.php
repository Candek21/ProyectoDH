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

Route::get('/home', 'PeliculasController@peliculas');
      


Route::get('/titulo', 'PeliculasController@titulos' ); 
      

Route::get ("/listadoPeliculas", 'PeliculasController@listado');
//Buscador de peliculas  
Route::get("/buscador", 'PeliculasController@buscar');

// Pagina de detalle de cada pelicula
Route::get('/detallePelicula/{id}', "PeliculasController@detalle");