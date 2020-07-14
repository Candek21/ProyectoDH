<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
use App\Genero; 
use Auth;

class PeliculasController extends Controller
{
    public function peliculas (){

    // Logica en PHP, para procesar los datos, etc
      $peliculas= pelicula::all(); 
      $arrayPeliculas= $peliculas->toArray();
    
      $nuevoArray = array_rand($arrayPeliculas, 5);
      $randomsPeliculas = [];
      $ultimasPeliculas= [];
    
    //Obtener 5 peliculas random
        for ($i = 0; $i < 5; $i++){
            $randomsPeliculas[] = $arrayPeliculas[$nuevoArray[$i]];
        }   
    //Ultimas 5 peliculas agregadas       
         $contador= count($peliculas);
         for ($i=$contador-5; $i<$contador; $i++){
             
            $ultimasPeliculas[]= $arrayPeliculas[$i];
         }
    //Damos vuelta el array para mostrar primero la ultima pelicula agregada     
    $ultimasPeliculas = array_reverse($ultimasPeliculas);
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


    public function detalle($id) {
        $peliculas = pelicula::all();
        foreach ($peliculas as $peli) {
            if ($peli["id"] == $id) {
                $vacPeliculas = compact("peli");
                return view("detallePelicula", $vacPeliculas);
            }
        }
    }
    public function agregar(Request $req){
           $reglas = [
            "title" => "string|min:3|unique:movies,title",
            "rating" => "numeric|min:0|max:10",
            "awards" => "integer|min:0",
            "release_date" => "date"  
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute debe tener un minimo de :min",
            "max" => "El campo :attribute debe tener un maximo de max",
            "date" => "El campo :attribute debe ser una fecha",
            "numeric" => "El campo :attribute debe ser un número",
            "integer" => "El campo :attribute debe ser un número entero",
            "unique" => "El campo :attribute se encuentra repetido"
        ];

        $this->validate($dataForm, $reglas, $mensajes);
        $peliculaNueva = new Pelicula();
        $peliculaNueva->title =$req["title"];
        $peliculaNueva->rating =$req["rating"];
        $peliculaNueva->awards =$req["awards"];
        $peliculaNueva->release_date =$req["release_date"];

        $peliculaNueva-> save();

        return redirect ('/titulo');
    }
//Borrar peliculas
    public function listadoBorrar(){
        $arraysPeliculas= pelicula::paginate(5);
        $peliculas= compact("arraysPeliculas");
      
        return view ("/borrarPelicula", $peliculas);

    }

    public function borrar(Request $req){
        //esto va a tener nuestro id
        $id = $req["id"];
        $pelicula = Pelicula::find($id);

        $pelicula->delete();

        return redirect("/borrarPelicula");
    }

    public function buscarBorrar(Request $dataForm){
        $titulo  = $dataForm["tituloPelicula"] ;
        $arraysPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arraysPeliculas");

        return view("/borrarPelicula", $vac);
    }
//Actualizar peliculas
    public function listadoActualizar(){
        $usuarioLog = Auth::user();
        $arrayPeliculas = pelicula::paginate(5);
        $vac = compact("arrayPeliculas");
        $usuario = compact("usuarioLog");

        return view("actualizarPelicula", $vac, $usuario);
    }

    public function buscarActualizar(Request $dataForm) {
        $titulo  = $dataForm["tituloPelicula"];
        $arrayPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arrayPeliculas");

        return view("/actualizarPelicula", $vac);
    }

    public function peliculaAActualizar(Request $dataForm) {
        $id = $dataForm["id"];
        $pelicula = Pelicula::find($id);
        $vac = compact("pelicula");

        return view("/formActualizar", $vac);
    }

    public function actualizar(Request $dataForm) {



        $id = $dataForm["id"];
        $nuevaPelicula = Pelicula::find($id);

        $nuevaPelicula->title = $dataForm["title"];
        $nuevaPelicula->rating = $dataForm["rating"];
        $nuevaPelicula->awards = $dataForm["awards"];
        $nuevaPelicula->release_date = $dataForm["release_date"];

        $nuevaPelicula->save();

        return redirect("/actualizarPelicula");
    } 
    
    public function listadoAPI(){
        $bdPeliculas = pelicula::all();
        $i = 0;
        //Recorremos bdPeliculas y asigamos sus valores a un nuevo array películasAPI
        foreach($bdPeliculas as $pelicula){
            $aux = [];
        
            $peliculasAPI[$i]["title"] = $pelicula->title;
            $peliculasAPI[$i]["rating"] = $pelicula->rating;
            $peliculasAPI[$i]["awards"] = $pelicula->awards;
            $peliculasAPI[$i]["release_date"] = $pelicula->release_date;
            $peliculasAPI[$i]["genero"] = $pelicula->genero["name"];  

            // Obtenemos los nombres de todos los actores y los guardamos en un array para despues asignarlo a la posicion "actores"
            foreach($pelicula->actores as $actores){
                $aux[] = $actores->getNombreCompleto();   
            }

            $peliculasAPI[$i]["actores"] = $aux;  
            $i++; 
            
        }
        return json_encode($peliculasAPI);
    }
}



