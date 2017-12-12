@extends('layouts.app')
@section('content')
  <div class="articulo">
    <div class="izq">
      <h1>{{$post->title}}</h1>
      <h4>Imagenes:</h4>
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
    <!-- CAJA DE COMENTARIOS -->
    @if (Auth::user())
      <form class="" action="/articles/{{$post->id}}" method="post">
        {{ csrf_field() }}
        <textarea name="comment" rows="4" cols="80" style="resize: none;" placeholder="Escribe un comentario"></textarea>
        <input type="submit" name="" value="Publicar">
      </form>
    @else
      <h1>Registrate para poder añadir comentarios</h1>  <br><br><br>
    @endifs
    <!-------------------------------->
    @foreach ($comments as $key => $value)
      <div class="comentario">
        <div class="top">
          <a href="/users/{{$value->user_id}}">{{$value->alias}}</a>
          <p>Publicado el: {{$value->created_at}}</p>
        </div>
        <div class="bottom">
          <p>{{$value->content}}</p>
        </div>
      </div>
      
    @endforeach
  </div>
@endsection
