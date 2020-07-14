@extends("plantilla")
@section('titulo')
  Formulario para actualizar peliculas
@endsection
@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")


<form class="" action="/Actualizar" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <input type="hidden" class="form-control" name="id" value="{{$pelicula['id']}}">
    </div>
    <div class="form-group">
        <label for="title">Titulo de la pelicula: {{$pelicula["title"]}}</label>
        <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Titulo de la pelicula a agregar">
    </div>

    <div class="form-group">
        <label for="rating">Rating de la pelicula: {{$pelicula["rating"]}}</label>
        <input type="text" class="form-control" value="{{old('rating')}}" name="rating" placeholder="Rating de la pelicula">
    </div>

    <div class="form-group">
        <label for="awards">Premios de la pelicula: {{$pelicula["awards"]}}</label>
        <input type="text" class="form-control" value="{{old('awards')}}" name="awards" placeholder="Premios de la pelicula">
    </div>

    <div class="form-group">
        <label for="release_date">Fecha de estreno: {{ date('d-M-Y', strtotime($pelicula["release_date"])) }}</label>
        <input type="date" class="form-control" value="{{old('release_date')}}" name="release_date" placeholder="Fecha de estreno">
    </div>

    <div class="form-group">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">actualizar</button>
    </div>

</form>

@endsection