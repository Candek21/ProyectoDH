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

//Pagina principal
Route::get('/inicio', 'PeliculasController@peliculas');
//Listado de peliculas      
Route::get('/titulo', 'PeliculasController@titulos' ); 
      
//Buscador de peliculas  
Route::get("/buscador", 'PeliculasController@buscar');

// Pagina de detalle de cada pelicula
Route::get('/detallePelicula/{id}', "PeliculasController@detalle");
Auth::routes();

// Al loguearse o registrarse nos mande a nuestra página /inicio
Route::get('/', 'PeliculasController@peliculas');
Route::get('/home', 'PeliculasController@peliculas');

//Agregar pelicula
Route::get("/agregarPelicula", function (){
    return view("agregarPelicula");
}) -> middleware('admin');
Route::post ("agregarPelicula", "PeliculasController@agregar") -> middleware('admin');

Route::get("/actualizarPelicula", function(){
    return view("actualizarPelicula") -> middleware('admin');
});
//Borrar pelicula
Route::post("/borrarPelicula", "peliculasController@borrar")-> middleware('admin');

Route::get('/borrarPelicula', 'PeliculasController@listadoBorrar')-> middleware('admin');

Route::get('/buscadorBorrar', "PeliculasController@buscarBorrar")-> middleware('admin');
//A
Route::get('/ABM', function(){
    return view('ABM');
}) -> middleware('admin');
//Actualizar pelicula
Route::get('/actualizarPelicula', 'PeliculasController@listadoActualizar') -> middleware('admin');

Route::post('/actualizarPelicula', 'PeliculasController@peliculaAActualizar') -> middleware('admin');

Route::get('/buscadorActualizar', "PeliculasController@buscarActualizar") -> middleware('admin');

Route::post('/Actualizar', "PeliculasController@Actualizar") -> middleware('admin');
