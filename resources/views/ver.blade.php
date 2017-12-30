@extends('layouts.app1')
@section('content')
<div class="f2f2f2">
    <div class="modal" id="hs-modal" tabindex="-1" role="dialog" aria-labelledby="hs-modal" aria-hidden="true">
      <div class="h-100 d-flex justify-content-center align-items-center" id="salirCartel">
        <div class="modal-dialog bg-light" id="cartel">
          <div class="moda-content">
            <div class="modal-header">
              <h5 class="modal-title">¿Seguro que quiere eliminar este articulo?</h5>
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
    <div class="container misproductos">
      <h1 class="text-center mb-5">Tus articulos</h1>
      @foreach ($articulos as $key => $value)
        <div class="row articulo">
          <div class="col-xs-12 col-md-6 text-center">
            <a href="/articles/{{$value->id}}" class="text-dark" style="text-decoration:none;">
              <div class="card card-block">
                <div class="card-header text-center">
                  <h1>{{$value->title}}</h1>
                  <img src="/storage/products/{{$value->img1}}" style='width:50%'  alt="">
                </div>
                <div class="card-body">
                  <p>{{$value->description}} <span class="text-success">${{$value->price}}</span></p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="col-12 text-right p-0 mb-3">
              <form class="mt-2 col-md-6 mx-auto p-0" action="/articles/edit/{{$value->id}}" method="post">
                {{ csrf_field() }}
                <input class="btn btn-primary btn-block" type="submit" name="" value="Editar">
              </form>
              <form class="mt-1 col-md-6 mx-auto p-0" class="" action="{{route('deleteArticle')}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <input type="hidden" name="id_producto" value="{{$value->id}}">
                <button id="boton" class="btn btn-danger btn-block eliminar" type="button">Eliminar</button>
              </form>
            </div>
            <div class="col-12">
              <p class="text-muted mb-0 mt-5">Publicado el: {{$value->created_at}}</p>
              <p class="text-muted">Modificado por ultima vez: {{$value->updated_at}}</p>
            </div>
          </div>
        </div>
        <hr>
      @endforeach

      <script type="text/javascript">
      $('document').ready(function(){
        var $hs_modal = $('#hs-modal');
        var $cartel = $('#salirCartel');

        $('.eliminar').each(function(i,botonEliminar){
          $(botonEliminar).click(function(){
            $('#si').click(function(){
              $(botonEliminar).parent().submit()
            });
            $('#no').click(function(){
              $hs_modal.fadeOut('fast');
            })

            $hs_modal.fadeIn().css('background','rgba(0,0,0,0.5)').find('div.modal-dialog').css({top: -80, opacity: 0}).animate({top: -20, opacity: 1});
            $cartel.click(function(clickDelMouse){
              if (clickDelMouse.target == this) {
                $hs_modal.fadeOut('fast');
              };
            });
          });
        });
      });
        </script>
      </div>
    </div>
  @endsection
