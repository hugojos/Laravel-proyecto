@extends('layouts.app1')
@section('content')

<style media="screen">
.body{
  background-color: rgb(246, 246, 246);
}
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
.parallax{
  background-image: url("/images/parallax.jpg");
  height: 150px;
  background-attachment: fixed;
  filter: grayscale(70);
}
      /*---------------CARROUSEL----------------*/

.carrousel {
  overflow: hidden;
  position: relative;
  width: 63%;
  height: auto;
  margin: 0 auto;
}
.carrousel-images {
  display: flex;
  transition: all .6s;
}

img {
  object-fit: cover;
}
.carrousel button {
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto auto;
  height: 30px;

}

.carrousel button.prev {
  left: 30px;
}
.carrousel button.next {
  right: 30px;
}

</style>

@if ($asd==0)
  <div class="producto row p-3">
    <div class="foto-producto col-xs-12 col-md-6 col-xl-6">

      <div class="carrousel ">
        <div class="carrousel-images">
          <img src="/storage/products/{{$post->img1}}" alt="">
          <img src="/storage/products/{{$post->img2}}" alt="">
        </div>
        <button type="button" class="prev">&lt;</button>
        <button type="button" class="next">&gt;</button>
      </div>

    </div>
    <div class="descripcion col-xs-12 col-md-6 col-xl-6">
      <div class="rating-star">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
      </div>
      <span class="text-muted aling-middle">  4.5 | {{count($comments)}} Comentarios</span>
      <h2 class="padding-top d-block">{{$post->title}}</h2>
      <span class="precio" style="color:#85bb65;">${{$post->price}}</span>
      <p>{{$post->description}}</p>
      <hr>
      <div class="padding-bottom-1x mb-2">
        <span class="text-medium">Categoria: </span>
        <a class="" href="#">{{$category->name}}</a>
      </div>
      <div class="compartir">
        <span class="text-muted">Compartir:</span>
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
      <hr>
      <button type="button" name="button" class="btn btn-danger">Comprar</button>
      <button type="button" name="button" class="btn btn-light">Agregar al carrito</button>
    </div>
  </div>
@endif
@if ($asd==1)
  <div class="producto row p-3">
    <div class="foto-producto col-xs-12 col-md-6 col-xl-6">

      <div class="carrousel ">
        <div class="carrousel-images">
          <img src="/storage/products/{{$post->img1}}" alt="">
          <img src="/storage/products/{{$post->img2}}" alt="">
        </div>
        <button type="button" class="prev">&lt;</button>
        <button type="button" class="next">&gt;</button>
      </div>

    </div>
    <div class="descripcion col-xs-12 col-md-6 col-xl-6">
      <div class="rating-star">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-half-o" aria-hidden="true"></i>
      </div>
      <span class="text-muted aling-middle">  4.5 | {{count($comments)}} Comentarios</span>
      <form class="" action="{{route('editArticle')}}" method="post">
        {{ csrf_field() }}
        {{method_field('PUT')}}
      <h2 class="padding-top d-block"><input style="border:none; border-bottom: 1px solid black" type="text" name="title" value="{{$post->title}}"></h2>
      <span class="precio">$<input type="text" name="price" style="border:none; border-bottom: 1px solid black"value="{{$post->price}}"></span>
      <textarea name="descriptio" rows="5" cols="80" style="border:none; border-bottom: 1px solid black">{{$post->description}}</textarea>
      <hr>
      <div class="padding-bottom-1x mb-2">
        <span class="text-medium">Categoria: </span>
        <a class="" href="#">{{$category->name}}</a>
      </div>
      <div class="compartir">
        <span class="text-muted">Compartir:</span>
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
      <hr>
        <input type="hidden" name="id" value="{{$post->id}}">
        <button type="submit" name="" class="btn btn-primary">Listo</button>
      </form>
      <a href="{{route('mostrar')}}" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
@endif
<hr>
<h3 class="text-center">Comentarios</h3>
<hr>

<!--Div para agregfar comentarios -->
<div class="parallax container"></div>

    <form class="row" method="post">
      <div class="form-group">
        <label class="text-muted h5 ml-5 col-xs-12">Deja tu comentario...</label><br>
          <textarea rows="5" cols="40" class="ml-5" name="comment" form="usrform" placeholder="Cuentanos un poco de este producto"></textarea>
        </div>
        <button type="submit" name="btn-comentar" class="btn btn-success ml-5 col-xs-12">Comentar</button>
    </form>



@foreach ($comments as $key => $value)
  <div class="comentarios row text-left">
    <div class="col-xs-12 col-md-12 col-xl-12">
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
          <p class="comment-text">{{var_dump($values)}}</p>
          <div class="comment-footer"><a href="/users/{{$value->user->id}}"><span class="text-muted">{{$value->user->alias}}</span></a></div>
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
        <div class="comment-footer"><span class="text-muted"></span></div>
        <hr>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var carrousel = document.querySelector('.carrousel')
  var carrito = document.querySelector('.carrousel-images')

  var imagenActual = 0

  var cantidadImagenes = document.querySelectorAll('.carrousel img').length

  document.querySelector('button.prev').addEventListener('click', function () {
      if (imagenActual > 0) {
        imagenActual--
      } else {
        imagenActual = cantidadImagenes - 1
      }
        carrito.style.transform = 'translateX(' + (-carrousel.offsetWidth * imagenActual) + 'px)';
  })

  document.querySelector('button.next').addEventListener('click', function () {
      if (imagenActual < (cantidadImagenes - 1)) {
        imagenActual++
      } else {
        imagenActual = 0
      }
      carrito.style.transform = 'translateX(' + (-carrousel.offsetWidth * imagenActual) + 'px)';
  })

  carrito.addEventListener('transitionend', function () {
  console.log('fin de la transition')
  })
</script>
@endsection
