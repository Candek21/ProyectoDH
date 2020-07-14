@extends('plantilla')
@section('titulo')
  Página principal
@endsection
@section ("principal")
    
    <!-- Ultimas 5 peliculas agregadas -->

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Ultimas peliculas añadidas</h4>
    @forelse ($ultimasPeliculas as $peli)
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$peli["title"]}}</strong>
          <form class="" action="{{ url('/detallePelicula/' . $peli['id']) }}" method="get">
            {{csrf_field()}}
            <input type="submit" name="" value="Detalles">
          </form>
          
        </div>
        <span class="text-muted">Estrenada el: {{ date('d-M-Y', strtotime($peli["release_date"])) }}</span>
      </div>
    </div>
    @empty
    <h6> No hay peliculas <h6>
    @endforelse
  </div>
 <!-- Peliculas recomentadas aleatoriamente -->
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Recomendaciones de peliculas</h4>
    @forelse ($randomsPeliculas as $peli) 
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$peli["title"]}}</strong>
          <form class="" action="{{ url('/detallePelicula/' . $peli['id']) }}" method="get">
            {{csrf_field()}}
            <input type="submit" name="" value="Detalles">
          </form>
        </div>
        <span class="text-muted">{{ date('d-M-Y', strtotime($peli["release_date"])) }}</span>
      </div>
    </div>
    @empty
    <h6> No hay peliculas <h6>
    @endforelse
  </div>
@endsection