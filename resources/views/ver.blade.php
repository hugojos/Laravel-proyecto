@extends('layouts.app1')
@section('content')
  <div class="container misproductos">
    <h1 style="margin-left: 20px; text-decoration: underline;">Tus articulos</h1>
    @foreach ($articulos as $key => $value)
      <div class="articulo">
        <div class="izq">
          <a href="/articles/{{$value->id}}" style="color:black; text-decoration:none;">
          <h1>{{$value->title}}</h1>
          <img src="/storage/products/{{$value->img1}}" style='width:20%'  alt="">

          <p>{{$value->description}} <span style="color:green;">${{$value->price}}</span></p>
          </a>
        </div>
        <div class="der">
          <div class="forms">
            <form class="" action="/articles/edit/{{$value->id}}" method="post">
              {{ csrf_field() }}
              <input class="btn btn-primary" type="submit" name="" value="Editar">
            </form>
            <form class="" action="{{route('deleteArticle')}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE')}}
              <input type="hidden" name="id_producto" value="{{$value->id}}">
              <input class="btn btn-danger"type="submit" name="" value="Eliminar">
            </form>
          </div>
          <div class="datos">
            <p>Publicado el: {{$value->created_at}}</p>
            <p>Modificado por ultima vez: {{$value->updated_at}}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
