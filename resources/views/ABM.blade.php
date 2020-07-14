  @extends('plantilla')
@section('titulo')
  Alta, baja y modificación de peliculas
@endsection
@section ("principal") 
   
<form action="/agregarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Pelicula</button>
</form>
<br>
<form action="/actualizarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar Pelicula</button>
</form>
<br>
<form action="/borrarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Borrar Pelicula</button>
</form>
@endsection
