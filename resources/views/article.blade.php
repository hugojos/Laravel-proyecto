@extends('layouts.app')
@section('content')
  <div class="articulo">
    <div class="izq">
      <h1>{{$post->title}}</h1>
      <br><br><br>
      <h3>Descripcion del articulo</h3>
      <p>{{$post->description}}</p>
    </div>
    <div class="der">
      <h2>${{$post->price}}</h2>
    </div>
  </div>
  <div class="comentarios">
    <h3>Comentarios</h3>
    <textarea name="name" rows="8" cols="80" style="resize: none;"></textarea>
  </div>
@endsection
