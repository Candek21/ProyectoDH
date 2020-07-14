@extends("plantilla")
@section('titulo')
  Detalles de {{$peli["title"]}}
@endsection
@section("titulo")
    Detalle de Pelicula
@endsection

@section("principal")
    <h1 class="display-4 font-italic"> Detalles de la pelicula {{$peli["title"]}}.</h1>    
    <br>
    
    <p class="lead my-3"> {{$peli["title"]}} fue estrenada el {{ date('d-M-Y', strtotime($peli["release_date"])) }}, 
        pertenece al genero {{$peli->genero["name"]}},
        con {{$peli["awards"]}} premios ganados 
        y un rating de {{$peli["rating"]}} puntos.
        <p>Actores:</p>
        <div class="col-md-3">
        <ul class="list-group list-group-flush">
            @forelse ($peli -> actores as $actor)
                <li class="list-group-item">
                    {{$actor->getNombreCompleto()}}
                </li>
            @empty
                <p> No tiene actores </p>
            @endforelse
        </ul>
        </div>
    </p>
    
    
@endsection