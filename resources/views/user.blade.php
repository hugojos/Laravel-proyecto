@extends('layouts.app')
@section('content')
  <div class="" style="padding: 0 50px;">
    <h1>{{$user->alias}}</h1>
    <p>Nombre: {{$user->first_name}}</p>
    <p>Apellido: {{$user->last_name}}</p>
    <p>Correo: {{$user->email}}</p>

    <hr style="border: 0.3px solid black!important;">
      <h1>Sus publicaciones</h1>
      <div class="" style="display:flex;">
        @foreach ($posts as $key => $value)
          <div class="" style="margin: 30 20px; min-width:150px;">
            <h1>{{$value->title }}</h1>
            <p>{{$value->description}}</p>
            <p>Precio: <span style="color:green;">{{$value->price}}</span></p>
          </div>
        @endforeach
      </div>
@endsection
