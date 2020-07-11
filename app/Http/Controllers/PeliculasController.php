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
        $arraysPeliculas= pelicula::paginate(5);
        $peliculas= compact("arraysPeliculas");
      
        return view ("/titulos", $peliculas);
    }
      public function buscar(Request $dataForm) {
        $titulo  = $dataForm["tituloPelicula"] ;
        $arraysPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arraysPeliculas");

        return view("/titulos", $vac);
    }
     public function listado  (){

        return view ("listadoPeliculas");
    }

    public function detalle($id) {
        $peliculas = pelicula::all();
        foreach ($peliculas as $peli) {
            if ($peli["id"] == $id) {
                $vacPeliculas = compact("peli");
                return view("detallePelicula", $vacPeliculas);
            }
        }
    }

}