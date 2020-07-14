@extends ("plantilla")
@section('titulo')
  Agregar peliculas
@endsection
@section ("principal")
<!-- Vista de agregar peliculas-->
<ul class="errores"> 
  @foreach ($errors->all() as $error)
    <li>
      {{$error}}
    </li>
  @endforeach
</ul>

<form class="" action="/agregarPelicula" method="post">
    {{csrf_field()}}
    
        <div class="form-group">
            <label for="title">Titulo de la pelicula</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Titulo de la pelicula a agregar">
        </div>

        <div class="form-group">
            <label for="rating">Rating de la pelicula</label>
            <input type="text" class="form-control" name="rating" value="{{old('rating')}}" placeholder="Rating de la pelicula">
        </div>

        <div class="form-group">
            <label for="awards">Premios de la pelicula</label>
            <input type="text" class="form-control" name="awards" value="{{old('awards')}}" placeholder="Premios de la pelicula">
        </div>

        <div class="form-group">
            <label for="release_date">Fecha de estreno</label>
            <input type="date" class="form-control" name="release_date" value="{{old('release_date')}}" placeholder="Fecha de estreno">
        </div>

        <div class="form-group">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">agregar</button>
        </div>
</form>

@endsection