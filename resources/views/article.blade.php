@extends('layouts.app1')
@section('content')

<style media="screen">

.producto{
  margin: 100px 0 0 0;
  position: relative;
  padding-top: 74px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 15px;
  border: 1px solid #e1e7ec;
  border-radius: 7px;
}

.foto-producto img{
  max-width: 100%;
}
.precio{
  font-size: 30px;
}
.descripcion .rating-star i{
  font-size: 20px;
}
.descripcion i{
  font-size: 30px;
  margin: 3px;
}
</style>


<div class="producto row p-3">
  <div class="foto-producto col-xs-12 col-md-6 col-xl-6">
    <img src="oferta1.png" alt="Foto del producto">
  </div>
  <div class="descripcion col-xs-12 col-md-6 col-xl-6">
    <div class="rating-star">
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star-half-o" aria-hidden="true"></i>
    </div>
    <span class="text-muted aling-middle">  4.5 | 3 Comentarios</span>
    <h2 class="padding-top d-block">{{$post->title}}</h2>
    <span class="precio">${{$post->price}}</span>
    <p>{{$post->description}}</p>
    <hr>
    <div class="padding-bottom-1x mb-2">
      <span class="text-medium">Categoria: </span>
      <a class="" href="#">Mujer</a>
    </div>
    <div class="compartir">
      <span class="text-muted">Compartir:</span>
      <i class="fa fa-facebook-square" aria-hidden="true"></i>
      <i class="fa fa-twitter-square" aria-hidden="true"></i>
      <i class="fa fa-instagram" aria-hidden="true"></i>
    </div>
    <hr>
    <button type="button" name="button" class="btn btn-primary">Comprar</button>
  </div>
</div>
<hr>
<h3 class="text-center">Comentarios</h3>
<hr>
@foreach ($comments as $key => $value)

  <div class="comentarios row text-left">
    <div class="col-xs-10 col-md-10">
      <div class="jumbotron m-3">
        <div class="">
          <img class="img-rounded" src="perfil.jpg" alt="Foto usuario" width="200px">
        </div>
        <div class="comment-body">
          <div class="comment-header d-flex flex-wrap justify-content-between">
            <h4 class="comment-title">Titulo del comentario</h4>
            <div class="mb-2">
              <div class="rating-star">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <p class="comment-text">{{$value->content}}</p>
          <div class="comment-footer"><a href="/users/{{$value->user_id}}"><span class="text-muted">{{$value->alias}}</span></a></div>
          <hr>
        </div>
      </div>
    </div>
  </div>
@endforeach


<div class="comentarios row text-left">
  <div class="col-xs-10 col-md-10">
    <div class="jumbotron m-3">
      <div class="">
        <img class="img-rounded" src="perfil.jpg" alt="Foto usuario" width="200px">
      </div>
      <div class="comment-body">
        <div class="comment-header d-flex flex-wrap justify-content-between">
          <h4 class="comment-title">Titulo del comentario</h4>
          <div class="mb-2">
            <div class="rating-star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
        <div class="comment-footer"><span class="text-muted">Nombre usuario</span></div>
        <hr>
      </div>
    </div>
  </div>
</div>
@endsection
