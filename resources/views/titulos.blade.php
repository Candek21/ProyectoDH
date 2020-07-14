@extends('plantilla')
@section('titulo')
  Titulos de peliculas
@endsection
@section ("principal")

@section("buscador")
<!-- Buscador -->
<form class="form-inline my-2 my-lg-0" action="/buscador" method="get">
      <input name="tituloPelicula" required="required" class="form-control mr-sm-2" type="search" placeholder="Ingresar titulo..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
@endsection

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Listado de peliculas</h4>
    @forelse ($arraysPeliculas as $titulo) 
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$titulo["title"]}}</strong>
          <a href="{{ url('/detallePelicula/' . $titulo['id']) }}" class="">Detalles </a>
        </div>
        <span class="text-muted">Género: {{$titulo->genero["name"]}}</span>
      </div>
    </div>
    @empty
    <h6> No hay peliculas <h6>
    @endforelse
  </div>
  {{$arraysPeliculas->links()}}
@endsection