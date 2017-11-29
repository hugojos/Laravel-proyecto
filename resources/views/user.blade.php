@extends('layouts.app')
@section('content')
  @if ($asd==1)
    <div class="mostrar" style="padding: 0 50px;">
      <h1>{{$user->alias}}</h1><br>
      <p>Nombre: {{$user->first_name}}</p>
      <p>Apellido: {{$user->last_name}}</p>
      <p>Correo: {{$user->email}}</p>
      @guest

      @else
      @if($user->id == Auth::user()->id)
      <div class="">
        <form class="" action="/users/{{$user->id}}" method="post">
          {{ csrf_field() }}
          <input type="submit" name="" value="Editar">
        </form>
      </div>
      @endif
    </div>
    @endguest
  @endif
  @if ($asd==2)
    <div class="form" style="padding: 0 50px;">
      <h1>{{$user->alias}}</h1><br>
      <form class="" action="/users/{{$user->id}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>Nombre: <input type="text" name="first_name" value="{{$user->first_name}}"></p>
        <p>Apellido: <input type="text" name="last_name" value="{{$user->last_name}}"></p>
        <p>Correo: <input type="email" name="email" value="{{$user->email}}"></p>
        <p>Su constraseña: <input type="password" name="password" value=""></p>  
        <input type="submit" name="" value="Guardar">
      </form>
    </div>

  @endif
    <hr style="border: 0.3px solid black!important;">
      <h1>Sus publicaciones</h1>
      <div class="" style="display:flex;">
        @foreach ($posts as $key => $value)
          <div class="" style="margin:20px; max-width:200px;border: 1px solid black;text-align:center; width:200px;">
            <h1>{{$value->title }}</h1>
            <p>{{$value->description}}</p>
            <p>Precio: <span style="color:green;">{{$value->price}}</span></p>
          </div>
        @endforeach
      </div>
@endsection
