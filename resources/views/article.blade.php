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
.jumbotron {
  padding: 2rem 2rem;
}
textarea {
  width: 80vw !important;
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
      <form method="post" action="{{route('addToCart')}}">
        <button type="button" name="button" class="btn btn-danger">Comprar</button>
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$post->id}}">
        <button type="submit" name="button" class="btn btn-light">Agregar al carrito</button>
      </form>

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
        <a href="{{route('mostrar')}}" class="btn btn-danger">Cancelar</a>
      </form>
    </div>
  </div>
@endif
<hr>
<h3 class="text-center">Comentarios</h3>
<hr>

<!--Div para agregfar comentarios -->
@if (!$asd == 1)

  <!-- CAJA DE COMENTARIOS -->

    <div class="row" style="margin-bottom: 20px;">
      <form class="" action="/articles/{{$post->id}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="h5 ml-5 mt-5" for="comment">Deja tu comentario...</label><br>
          <textarea rows="5" name="comment"class="form-control ml-4" id="comment" style="resize:none;"
          placeholder=@if (!Auth::user())
            "Inicia sesion para poder escribir comentarios!"
          @elseif (count($comments)== 0)
              "No hay comentarios acerca de este articulo, se el primero en comentar!"
          @else
            "Escribe un comentario"
          @endif
          @if (!Auth::user())
            disabled
          @endif></textarea>
        </div>
        @if (!Auth::user())
          <a href="/login" class="btn btn-success ml-5">Iniciar sesión</a>
        @else
          <button type="submit" name="btn-comentar" class="btn btn-success ml-5">Comentar</button>
        @endif
      </form>
    </div>



@endif


<!-------------------------------->

<div class="" style="display:flex;flex-direction:column-reverse;">
  @foreach ($comments as $key => $value)
    <div class="comentarios row text-left">
      <div class="col-xs-10 col-md-10">
        <div class="jumbotron m-3">
          <div class="comment-body">
            <div class="comment-header d-flex flex-wrap justify-content-between">
              <h4 class="comment-title"><a href="/users/{{$value->user_id}}" style="font-size:35px;color:black;">{{$value->user->alias}}</a></h4>
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
            <div class="comment-footer"><span class="text-muted">Publicado el : {{$value->created_at}}</span></div>
            <hr>
          </div>
        </div>
      </div>
    </div>
  @endforeach
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
