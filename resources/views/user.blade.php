@extends('layouts.app1')
@section('content')
  <style media="screen">

    #favoritos{
      margin: 10px 10px;
    }
    .container{


    }



  </style>


  <div class="container">
    @if ($asd==1)

      <div class="jumbotron">
        <div class="mostrar">
          <h1>{{$user->alias}}</h1><br>
          <p>Nombre: {{$user->first_name}}</p>
          <p>Apellido: {{$user->last_name}}</p>
          <p>Correo: {{$user->email}}</p>
          @guest

          @else
          @if($user->id == Auth::user()->id)
          <div class="">
            <form class="" action="/users/{{$user->id}}" method="post">
              {{ csrf_field() }}
              <input class="btn btn-success"type="submit" name="" value="Editar">
            </form>
          </div>
          @endif
        </div>
        @endguest
      @endif

      @if ($asd==2)
        <div class="form" style="padding: 0 50px;">
          <h1>{{$user->alias}}</h1><br>
          <form class="" action="/users/{{$user->id}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>Nombre: <input type="text" name="first_name" value="{{$user->first_name}}"></p>
            <p>Apellido: <input type="text" name="last_name" value="{{$user->last_name}}"></p>
            <p>Correo: <input type="email" name="email" value="{{$user->email}}"></p>
            <p>Su constraseña: <input type="password" name="password" value=""></p>
            <input type="submit" name="" value="Guardar">
          </form>
        </div>

      @endif
      </div>

      <hr style="border: 0.3px solid black!important;">

        <h1 class="mt-3 mb-5">Mis favoritos</h1>

        <div class="row" id="favoritos">
          @foreach ($posts as $key => $value)

            <div class="card col-xs-12 col-md-4 com-xl-3 text-center ">
              <img class="card-img-top" src="/storage/products/{{ $value->img1}}" alt="Card image cap">
              <div class="card-block">
                <h4 class="card-title">{{$value->title }}</h4>
                <p class="card-text">{{$value->description}}</p>
                <p>Precio: <span style="color:green;">{{$value->price}}</span></p>
              </div>
            </div>
          @endforeach
        </div>


  </div>


@endsection
