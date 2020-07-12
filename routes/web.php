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
      
//Buscador de peliculas  
Route::get("/buscador", 'PeliculasController@buscar');

// Pagina de detalle de cada pelicula
Route::get('/detallePelicula/{id}', "PeliculasController@detalle");
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get("/agregarPelicula", function (){
    return view("agregarPelicula");
});
Route::post ("agregarPelicula", "PeliculasController@agregar");

Route::get("/actualizarPelicula", function(){
    return view("actualizarPelicula");
});

Route::post("/borrarPelicula", "peliculasController@borrar");

Route::get('/borrarPelicula', 'PeliculasController@listadoBorrar');

Route::get('/buscadorBorrar', "PeliculasController@buscarBorrar");
