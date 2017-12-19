@extends('layouts.app1')
@section('content')
  <style media="screen">
    .seguro {
      position: fixed;
      width: 100%;
      height: 100vh;
      background-color: rgba(0,0,0,0.5);
      display: flex;
      justify-content: center;
      align-items: center;
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
    @media (min-width: 575px){
    .container {
      max-width: 950px;
    }
  </style>
  <div class="f2f2f2">
    <div class="seguro" style="display:none">
      <div class="cartel">
        <p>¿Seguro que quieres eliminar este articulo?</p>
        <hr>
        <div class="">
          <button type="button" id="si" name="button">Si</button>
          <button type="button" id="no" name="button">No</button>

        </div>
      </div>
    </div>
    <div class="container misproductos">
      <h1 style="text-align:center; margin-bottom:40px;">Tus articulos</h1>
      @foreach ($articulos as $key => $value)
        <div class="articulo">
          <div class="izq">
            <a href="/articles/{{$value->id}}" style="color:black; text-decoration:none;">
              <h1>{{$value->title}}</h1>
              <img src="/storage/products/{{$value->img1}}" style='width:40%'  alt="">

              <p>{{$value->description}} <span style="color:green;">${{$value->price}}</span></p>
            </a>
          </div>
          <div class="der">
            <div class="forms">
              <form class="" action="/articles/edit/{{$value->id}}" method="post">
                {{ csrf_field() }}
                <input class="btn btn-primary" type="submit" name="" value="Editar">
              </form>
              <form class="eliminar" class="" action="{{route('deleteArticle')}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <input type="hidden" name="id_producto" value="{{$value->id}}">
                <button id="boton" class="btn btn-danger" type="button">Eliminar</button>
              </form>
            </div>
            <div class="datos">
              <p>Publicado el: {{$value->created_at}}</p>
              <p>Modificado por ultima vez: {{$value->updated_at}}</p>
            </div>
          </div>
        </div>
        <hr>
      @endforeach
      <script type="text/javascript">
      console.log(document.querySelectorAll('#boton'))
      document.querySelectorAll('#boton').forEach(function(e){
        e.addEventListener('click',function(){
          seguro.style.display = "grid"
          si.addEventListener('click',function(event){
            e.parentNode.submit();
          })

        })
      })
      var boton = document.querySelector('#boton');
      var seguro = document.querySelector('.seguro');
      var si = document.querySelector('#si');
      var no = document.querySelector('#no');
      var eliminar = document.querySelector('#eliminar');
      boton.addEventListener('click',function(e){
        seguro.style.display= "grid";
      })
      no.addEventListener('click',function(e){
        seguro.style.display= "none";
      })
      </script>
    </div>
  </div>
@endsection
