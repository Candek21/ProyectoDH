@extends('plantilla')
@section('titulo')
  Página principal
@endsection
@section ("principal")
    
    <!-- Ultimas 5 peliculas agregadas -->

    <ul> <h1>Ultimas 5 peliculas agregadas</h1>
    @foreach($ultimasPeliculas as $peli)
    <li>{{$peli["title"]}} </li>
    @endforeach
    </ul>

   <!-- @forelse($ultimasPeliculas as $peli)
    <li>{{$peli["title"]}} </li>
    @empty
    <p> No hay peliculas </p>
    @endforelse-->

    <!-- 5 peliculas Randoms -->

    <ul>
    <h1>5 peliculas randoms</h1> @foreach($randomsPeliculas as $peli)
    <li>{{$peli["title"]}}</li>
    @endforeach
    </ul>
@endsection