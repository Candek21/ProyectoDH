@extends("plantilla")

@section("titulo")
    Detalle de Pelicula
@endsection

@section("principal")
    <h1> Detalle de la pelicula {{$peli["title"]}} </h1>    
    <br>
    
    <p> {{$peli["title"]}} fue estrenada el {{ date('d-M-Y', strtotime($peli["release_date"])) }}, 
        pertenece al genero X,
        con {{$peli["awards"]}} premios ganados 
        y un rating de {{$peli["rating"]}} puntos.
    </p>

    
@endsection