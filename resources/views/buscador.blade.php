@extends('layouts.app1')
@section('content')
  <style media="screen">
    body {
    background: #f2f2f2;
    }
  </style>
  @if (!count($post)== 0)
    <h1 style="margin-top: 89px; text-align:center;">Resultado de la busqueda: "{{$buscador}}"</h1>
    <div class="container" style="margin-top: 44px; display:flex;flex-wrap:wrap;text-align:center; justify-content:center">
      @foreach ($post as $product)
        <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista" style="margin-bottom: 20px;">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/{{$product->img1}}" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title">{{$product->title }}</h4>
                <a href="/articles/{{$product->id}}" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>
      @endforeach
    </div>
    @else
      <div class="" style="min-height:101vh;display:flex;align-items:center;justify-content:center;">
        <h1 style="text-align:center;">No se encontraron resultados de la busqueda :"{{$buscador}}"</h1>

      </div>
  @endif
@endsection
