@extends("plantilla")

@section("titulo")
    Actualizar peliculas
@endsection

@section("principal")

<div class="d-flex flex-row-reverse p-3 my-3 -50 bg-purple rounded shadow-sm">

  <svg width="3em" height="3em" viewBox="0 0 16 16" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"  aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
<h1 class="">DHMOVIES</h1>
<form class="form-inline my-2 my-lg-0" action="/buscadorActualizar" method="get">
      <input name="tituloPelicula" required="required" class="form-control mr-sm-2" type="text" placeholder="Ingresar titulo..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">buscar</button>
    </form>
  </div>

<!-- <form action="/buscador" method="get">
    <div class="panel-body">
        <label class="label-control">Ingrese el titulo de una pelicula para ver los detalles</label>
        <input type="text" name="tituloPelicula" class="form-control" placeholder="Ingresar el titulo..." required="required">
        <br>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">buscar</button>
    </div>
</form> -->
<br>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Listado de peliculas</h4>
    @forelse ($arrayPeliculas as $peliculas) 
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$peliculas["title"]}}</strong>
          <form class="" action="/actualizarPelicula" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$peliculas->id}}">
            <input type="submit" name="" value="Actualizar pelicula">
          </form>
        </div>
        <span class="text-muted">Rating: {{$peliculas["rating"]}}</span>
      </div>
    </div>

    @empty
    <h6> No hay peliculas <h6>
    @endforelse
  </div>
  {{$arrayPeliculas->links()}}


@endsection