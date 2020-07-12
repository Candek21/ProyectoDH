@extends("plantilla")

@section("titulo")
    Detalle de Pelicula
@endsection

@section("principal")
    <h1> Detalle de la pelicula {{$peli["title"]}} </h1>    
    <br>
    
    <p> {{$peli["title"]}} fue estrenada el {{ date('d-M-Y', strtotime($peli["release_date"])) }}, 
        pertenece al genero {{$peli->genero["name"]}},
        con {{$peli["awards"]}} premios ganados 
        y un rating de {{$peli["rating"]}} puntos.
        <p>Actores:</p>
     <ul>
     @forelse ($peli -> actores as $actor)
     <li>
     {{$actor->getNombreCompleto()}}
     </li>
    @empty
    <p> No tiene actores </p>
     @endforelse
     </ul>
    </p>
    
    
@endsection