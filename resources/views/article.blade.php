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
.descripcion .rating-star i{
  font-size: 20px;
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
  </style>
  <div class="modal" id="hs-modal" tabindex="-1" role="dialog" aria-labelledby="hs-modal" aria-hidden="true">
    <div class="h-100 d-flex justify-content-center align-items-center" id="salirCartel">
      <div class="modal-dialog bg-light" id="cartel">
        <div class="moda-content p-2">
          <div class="modal-header">
            <h5 class="modal-title">¿Seguro que quiere eliminar este comentario?</h5>
          </div>
          <div class="modal-body d-flex flex-wrap">
            <div class="col-md-6 col-xs-12 mb-2" >
              <button type="button" class="btn btn-danger btn-block" id="si" name="button">Si</button>
            </div>
            <div class="col-md-6 col-xs-12">
              <button type="button" id="no" class="btn btn-secondary btn-block" name="button">No</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@if ($asd==0)

  <div class="producto row p-3">
    <div class="foto-producto col-xs-12 col-md-6 col-xl-6">

      <div class="carrousel ">
        <div class="carrousel-images">
          <img class="w-100" src="/storage/products/{{$post->img1}}" alt="">
          <img class="w-100" src="/storage/products/{{$post->img2}}" alt="">
        </div>
        <button type="button" class="prev">&lt;</button>
        <button type="button" class="next">&gt;</button>
      </div>

    </div>
    <div class="descripcion col-xs-12 col-md-6 col-xl-6">
      <div class="rating-star d-flex justify-content-between">
        <div class="">
          <i class="fa fa-star h3" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half-o" aria-hidden="true"></i>
        </div>
        @if (Auth::user())
          <i class="fa fa-heart" aria-hidden="true" style="
            @if($fav)
              color:red;
            @else
              color:black;
            @endif
            "
           id="fav"></i>
        @endif
        <script type="text/javascript">
        var token = document.querySelector('meta[name="csrf-token"]').content;
        var $fav = $('#fav');

        $fav.click(function(){
          if ($fav.css('color') == 'rgb(255, 0, 0)') {
            $.ajax({
              type: 'POST',
              url: '/deleteFav',
              data: {
                id: {{$post->id}},
                '_token': token
              }}).done(function(){
                $fav.css('color','black');
              });
          } else {
            $.ajax({
              type: 'POST',
              url: '/addFav',
              data: {
                id: {{$post->id}},
                '_token': token
              }}).done(function(){
                $fav.css('color','red');
          });
        }});
        </script>
      </div>
      <span class="text-muted aling-middle">  4.5 | {{count($comments)}} Comentario/s</span>
      <h2 class="d-block">{{$post->title}}</h2>
      <span class="h2 text-success">${{$post->price}}</span>
      <p class="lead">{{$post->description}}</p>
      <hr>
      <div class="padding-bottom-1x mb-2">
        <span class="text-medium">Categoria: </span>
        <a class="" href="/categorias/{{$nombre}}">{{$category->name}}</a>
      </div>
      <div class="compartir">
        <span class="text-muted">Compartir:</span>
        <a href="https://www.facebook.com/hugo.sajama.56" target="_blank"><i class="fa fa-facebook-square text-dark" style="font-size:20px" aria-hidden="true"></i></a>
        <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square text-dark" style="font-size:20px" aria-hidden="true"></i></a>
        <a href="http://www.instagram.com"><i class="fa fa-instagram text-dark" style="font-size:20px" aria-hidden="true"></i></a>
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
      <h2 class="padding-top d-block"><input class="form-control" type="text" name="title" value="{{$post->title}}"></h2>
      <span class="precio d-flex">$<input type="text" name="price" class="form-control"value="{{$post->price}}"></span>
      <textarea name="descriptio" rows="5" cols="80" class="form-control mt-2" style="resize: none;">{{$post->description}}</textarea>
      <hr>
      <div class="padding-bottom-1x mb-2 d-flex align-items-center">
        <span class="text-medium">Categoria: </span>
        <select class="form-control custom-select" name="category">
          @foreach (\App\Category::All() as $key => $value)
            <option value="{{$value->id}}" {{ $value->name == $category->name ? 'selected' : '' }}>{{$value->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="">
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
<!--Div para agregrar comentarios -->
@if (!$asd == 1)

  <!-- CAJA DE COMENTARIOS -->

    <div class="row mb-3">
      <form class="w-75" action="/articles/{{$post->id}}" method="post">
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


    <div class="comentarios row text-left d-flex flex-column-reverse">
      @foreach ($comments as $key => $value)
      <div class="col-xs-10 col-md-10">
        <div class="jumbotron m-3" style="position: relative;">
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
            <hr>
            <p class="comment-text comentario" id="">{{$value->content}}</p>
            @if (Auth::user())
              @if (Auth::user()->id==$value->user_id)
                <div class="formEdit" style="display: none;" id="">
                  <input type="hidden" id="comentario_id" name="id" value="{{$value->id}}">
                  <textarea name="comment" rows="3" cols="120" class="comentarioEditado w-100" style="resize: none;overflow:hidden;" id="">{{$value->content}}</textarea>
                  <i class="fa fa-check text-success guardarCambios" aria-hidden="true" id="" title="Guardar"></i>
                  <i class="fa fa-times text-danger cancelarCambios" aria-hidden="true" id="" title="Cancelar"></i>
                </div>
                <i style="position:absolute;top:5px;right:20px;" class="fa fa-pencil editar" aria-hidden="true" id=""  title="Editar"></i>
                <i style="position:absolute;top:5px;right:4px;" class="fa fa-trash eliminar" aria-hidden="true" id="" title="Eliminar"></i>
              @endif
            @endif
            <div class="comment-footer" id="tiempo">
              <span class="text-muted">Publicado el : {{$value->created_at}}</span>
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

  var $guardarCambios = $('.guardarCambios');
  var $cancelarCambios = $('.cancelarCambios');
  var $editar = $('.editar');
  var $eliminar = $('.eliminar');
  var $hs_modal = $('#hs-modal');

  $editar.each(function(i,e){
    $(e).click(function(){
        $(this).hide().prev().show().siblings('.comentario').hide().siblings('#tiempo').hide();
    })
  });

  $guardarCambios.each(function(i,e){
    $(e).click(function(){
      $.ajax({
        type:'POST',
        url: '/editarComent',
        data: {
          id: $(e).siblings('#comentario_id').val(),
          comment : $(e).siblings('.comentarioEditado').val(),
          '_token': token
        }
      }).done(function(){
        $(e).parent().hide().prev().show().text($(e).siblings('.comentarioEditado').val()).siblings('.editar').show().siblings('#tiempo').show();
        $(e).parent().next().show();
      })
    })
  })

  $cancelarCambios.each(function(i,e){
    $(e).click(function(){
      $(this).siblings('textarea').val($(this).parent().prev().text()).parent().hide().prev().show().siblings('.editar').show().siblings('#tiempo').show();
    })
  })

  $eliminar.each(function(i,e){
    $(e).click(function(){
      $('#si').click(function(){
        $.ajax({
          type: 'POST',
          url: '/eliminarComent',
          data: {
            id: $(e).siblings('.formEdit').children('#comentario_id').val(),
            '_token': token
          }
        }).done(function(){
            $(e).parents('.col-md-10').remove()
            $hs_modal.fadeOut('fast');
          })
      });
      $('#no').click(function(){
        $hs_modal.fadeOut('fast');
      })
      $hs_modal.fadeIn().css('background','rgba(0,0,0,0.5)').children('div.modal-dialog').css({top: -80, opacity: 0}).animate({top: -20, opacity: 1});
      $('#salirCartel').click(function(clickDelMouse){
        if (clickDelMouse.target == this) {
          $hs_modal.fadeOut('fast');
        };
      });
    });
  });

</script>

@endsection
