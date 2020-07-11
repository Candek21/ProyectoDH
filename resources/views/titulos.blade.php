@extends('plantilla')
@section('titulo')
  Titulos de peliculas
@endsection
@section ("principal")
    <ul>@forelse($arraysPeliculas as $titulo)
       <li> 
        <a href="{{ url('/detallePelicula/' . $titulo['id']) }}" class=""> 
        {{$titulo["title"]}}  
        </a>
       </li>
        
        @empty
       <!-- Si no se encontro -->
        <p> No se encontraron peliculas </p>
    @endforelse
    </ul>
    
    <!-- Buscador -->
  <form class="form-inline my-2 my-lg-0" action="/buscador" method="get">
    <input name="tituloPelicula" required="required" class="form-control mr-sm-2" type="text" placeholder="Ingresar titulo..." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">buscar</button>
  </form>

  {{$arraysPeliculas->links()}}
@endsection