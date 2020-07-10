<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula; 

class PeliculasController extends Controller
{
    public function peliculas (){

    // Logica en PHP, para procesar los datos, etc
      $peliculas= pelicula::all(); 
      $arrayPeliculas= $peliculas->toArray();
      $nuevoArray = array_rand($arrayPeliculas, 5);
      $randomsPeliculas = [];
      $ultimasPeliculas= [];
    
    //   foreach($arrayPeliculas as $peliculas){
    //       for ($i = 0; $i < 6; $i++){
    //         if($peliculas["id"] == $nuevoArray[$i]){
    //             echo $peliculas["id"] . "<br>";
    //             $randomsPeliculas[] = $peliculas;
    //         }
    //       }
    //     }
        for ($i = 0; $i < 5; $i++){
            $randomsPeliculas[] = $arrayPeliculas[$nuevoArray[$i]];
        }      
         $contador= count($peliculas);
         for ($i=$contador-5; $i<$contador; $i++){
              $ultimasPeliculas[]= $arrayPeliculas[$i];
              
         }
    $ultimasPeliculas = compact("ultimasPeliculas") ;
    $randomsPeliculas = compact('randomsPeliculas');
    // Retornamos la vista
    return view("inicio", $ultimasPeliculas, $randomsPeliculas);
}
    public function titulos (){
        return view ("titulos");
    }
     public function listado  (){
        return view ("listadoPeliculas");
}
}