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
  width: 55%;
  height: auto;
  margin: 0 auto;
}
.carrousel-images {
  display: flex;
  transition: all .6s;
}
.carrousel-images img {
  max-height: 449px;
  max-width: 384px;
}
img {
  object-fit: cover;
}

.img-carrousel {
  width:100%;
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

a i{
  color: black;
}
.seguro {
  position: fixed;
  width: 100%;
  height: 100vh;
  background-color: rgba(0,0,0,0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000000;
}
.cartel {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 30px;
  background-color: #f2f2f2;
}
.cartel div {
  display: flex;
  justify-content: space-around;
}
.cartel button {
  width: 40%;
}
</style>
<div class="seguro" style="display:none; margin-top: -100px;">
  <div class="cartel">
    <p>¿Seguro que quiere eliminar este comentario?</p>
    <hr>
    <div class="">
      <button type="button" id="si" name="button">Si</button>
      <button type="button" id="no" name="button">No</button>

    </div>
  </div>
</div>
@if ($asd==0)

  <div class="producto row p-3">
    <div class="foto-producto col-xs-12 col-md-6 col-xl-6">

      <div class="carrousel ">
        <div class="carrousel-images">
          <img class="img-carrousel" src="/storage/products/{{$post->img1}}" alt="">
          <img class="img-carrousel" src="/storage/products/{{$post->img2}}" alt="">
        </div>
        <button type="button" class="prev">&lt;</button>
        <button type="button" class="next">&gt;</button>
      </div>

    </div>
    <div class="descripcion col-xs-12 col-md-6 col-xl-6">
      <div class="rating-star" style="display:flex; justify-content: space-between;">
        <div class="">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half-o" aria-hidden="true"></i>
        </div>
        @if (Auth::user())
          <i class="fa fa-heart" aria-hidden="true" style="font-size:25px;

            @if($fav)
              color:red;
            @else
              color:black;
            @endif

            " id="fav"></i>
        @endif
        <script type="text/javascript">
        var token = document.querySelector('meta[name="csrf-token"]').content;
        var fav = document.querySelector('#fav');
        var xhr= new XMLHttpRequest();
        fav.addEventListener('click',function(event){
          if (fav.style.color=="red") {
            fav.style.color= "black"
            xhr.onreadystatechange = function(){
              if (this.readyState == 4) {
                console.log('elimino');
              }
            };
            //console.log(buscador.value);
            //console.log(event.key);
            xhr.open("POST","/deleteFav", true);
            //xhr.responseType = 'json';
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send('id='+{{$post->id}});
          } else {
            fav.style.color = "red"
            xhr.onreadystatechange = function(){
              if (this.readyState == 4) {
                console.log('agrego');
              }
            };
            //console.log(buscador.value);
            //console.log(event.key);
            xhr.open("POST","/addFav", true);
            //xhr.responseType = 'json';
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send('id='+{{$post->id}});
          }
        })
        </script>
      </div>
      <span class="text-muted aling-middle">  4.5 | {{count($comments)}} Comentario/s</span>
      <h2 class="padding-top d-block">{{$post->title}}</h2>
      <span class="precio" style="color:#85bb65;">${{$post->price}}</span>
      <p>{{$post->description}}</p>
      <hr>
      <div class="padding-bottom-1x mb-2">
        <span class="text-medium">Categoria: </span>
        <a class="" href="/categorias/{{$nombre}}">{{$category->name}}</a>
      </div>
      <div class="compartir">
        <span class="text-muted">Compartir:</span>
        <a href="https://www.facebook.com/hugo.sajama.56" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>
      <hr>
      <div class="row">
        <form method="post" action="{{route('addToCart')}}">
          {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$post->id}}">
            <button type="" name="button" class="btn btn-danger m-2">Comprar</button>
        </form>
        <form method="post" action="{{route('addToCartBack')}}">
          {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$post->id}}">
            <button type="submit" name="button" class="btn btn-success m-2">Agregar al carrito</button>
        </form>
      </div>
    </div>
  </div>
@endif
@if ($asd==1)
  <div class="producto row p-3">
    <div class="foto-producto col-xs-12 col-md-6 col-xl-6">

      <div class="carrousel ">
        <div class="carrousel-images">
          <img class="img-carrousel" src="/storage/products/{{$post->img1}}" alt="">
          <img class="img-carrousel" src="/storage/products/{{$post->img2}}" alt="">
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
      <span class="text-muted aling-middle">  4.5 | {{count($comments)}} Comentario/s</span>
      <form class="" action="{{route('editArticle')}}" method="post">
        {{ csrf_field() }}
        {{method_field('PUT')}}
      <h2 class="padding-top d-block"><input style="border:none; border-bottom: 1px solid black; width: 100%;" type="text" name="title" value="{{$post->title}}"></h2>
      <span class="precio">$<input type="text" name="price" style="border:none; border-bottom: 1px solid black; width: 94%;"value="{{$post->price}}"></span>
      <textarea name="descriptio" rows="5" cols="80" style="border:none; border-bottom: 1px solid black;resize: none;width:100%;">{{$post->description}}</textarea>
      <hr>
      <div class="padding-bottom-1x mb-2">
        <span class="text-medium">Categoria: </span>
        <select class="" name="category">
          @foreach (\App\Category::All() as $key => $value)
            <option value="{{$value->id}}" {{ $value->name == $category->name ? 'selected' : '' }}>{{$value->name}}</option>
          @endforeach
        </select>
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
      <form class="" action="/articles/{{$post->id}}" method="post" style="width:80%">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="h5 ml-5 mt-5" for="comment">Deja tu comentario...</label><br>
          <textarea rows="5" name="comment"class="form-control ml-4" id="comment" style="resize:none;overflow:hidden;"
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


    <div class="comentarios row text-left"  style="display:flex;flex-direction:column-reverse;">
      @foreach ($comments as $key => $value)
      <div class="col-xs-10 col-md-10" style="position:relative;">
        <div class="jumbotron m-3"style="position: relative;">
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
            <p class="comment-text" id="comentario">{{$value->content}}</p>
            @if (Auth::user()->id==$value->user_id)
              <div class="" id="formedit" style="display:none">
                <input type="hidden" name="id" value="{{$value->id}}">
                <textarea name="comment" rows="3" cols="120" style="resize: none;overflow:hidden;width:100%;" id="comentarioEditado">{{$value->content}}</textarea>
                <i class="fa fa-check" aria-hidden="true"style="color:green" id="aceptarComentario" title="Guardar"></i>
                <i class="fa fa-times" aria-hidden="true" style="color:red" id="cancelarComentario" title="Cancelar"></i>
              </div>
              <i style="position:absolute;top:5px;right:20px;" class="fa fa-pencil" aria-hidden="true" id="editar"  title="Editar"></i>
              <i style="position:absolute;top:5px;right:4px;" class="fa fa-trash" aria-hidden="true" id="eliminar" title="Eliminar"></i>
            @endif
            <div class="comment-footer" id="tiempo"><span class="text-muted">Publicado el : {{$value->created_at}}</span></div>
            <hr>
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

  var editar = document.querySelectorAll('#editar');
  var eliminar = document.querySelectorAll('#eliminar');
  var comment = document.querySelector('#comentario');
  var comentarioEditado = document.querySelector('#comentarioEditado');
  var formedit = document.querySelector('#formedit');
  var tiempo = document.querySelector('#tiempo');
  var cancelarComentario = document.querySelectorAll('#cancelarComentario');
  var aceptarComentario = document.querySelectorAll('#aceptarComentario');
  var idComment = document.querySelector('#idComment');
  var seguro = document.querySelector('.seguro');
  editar.forEach(function(e){
    e.addEventListener('click', function(){
      e.style.display = "none";
      e.previousElementSibling.previousElementSibling.style.display = "none";
      e.previousElementSibling.style.display = "block";
      tiempo.style.display= "none";
    });
    cancelarComentario.forEach(function(a){
      a.addEventListener('click',function(){
        a.style.display = "inline";
        e.style.display="inline";
        e.previousElementSibling.previousElementSibling.style.display = "block";
        e.previousElementSibling.style.display = "none";
        e.previousElementSibling.childNodes[3].value = a.parentNode.previousElementSibling.textContent;
        tiempo.style.display= "block";
      });
    });
    aceptarComentario.forEach(function(i){
      i.addEventListener('click', function(){
        e.style.display = "inline";
        e.previousElementSibling.previousElementSibling.textContent = e.previousElementSibling.childNodes[3].value;
        e.previousElementSibling.previousElementSibling.style.display = "block";
        tiempo.style.display = "block";
        e.previousElementSibling.style.display = "none";
        xhr.open('POST','/editarComent',true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.send('comment='+i.previousElementSibling.value+'&id='+i.previousElementSibling.previousElementSibling.value);
        console.log(xhr.responseText)
    });
    eliminar.forEach(function(o){
      o.addEventListener('click',function(){
        seguro.style.display= "grid";
        document.querySelector('#si').addEventListener('click',function(){
          xhr.open('POST','/eliminarComent',true);
          xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xhr.setRequestHeader('X-CSRF-TOKEN', token);
          xhr.send('id='+o.previousElementSibling.previousElementSibling.childNodes[1].value);
          xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200) {
              o.parentNode.parentNode.parentNode.remove()
            }
          }
          seguro.style.display = "none";
        });
        document.querySelector('#no').addEventListener('click',function(){
          seguro.style.display = "none";
        })
      });
    });
  });


});


</script>

@endsection
