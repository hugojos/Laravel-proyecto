@extends('layouts.app1')

@section('content')

  <div id='flecha' class="flecha-bajar text-center fixed-bottom">
      <a href="">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
  </div>

  <div class="cabecera">
    <div class="container text-center">
      <h1 class="text-white display-4">Hugo Sajama</h1>
      <h3 class="text-white display-7">Tienda Oficial</h3>
    </div>

    <div id="div-video" class="">
      <video autoplay muted loop>
          <source src="videos/secuencia.mp4" type="video/mp4">
      </video>
    </div>
  </div>

  <div id="seccion-1" class="seccionUno">
    <div class="container text-center text-light">
      <h2 class="display-4">Ofertas Imperdibles</h2>
      <p class="">Esta navidad no te quedes sin tus regalos!</p>
      <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.<p>
    </div>
  </div>

  <div class="parallaxUno">
    <div class="container" id="parallaxUno">
      <div class="row text-center text-light">
        <div class="col-xs-12 col-sm-6 secciones">
          <h3>Kids</h3>
          <h3>Otoño-Invierno</h3>
          <h3>Primavera-Verano</h3>

        </div>
        <div class="col-xs-12 col-sm-6 text-light secciones">
          <h3>Hombre</h3>
          <h3>Mujer</h3>
          <h3>Accesorios</h3>
        </div>
      </div>
    </div>
  </div>

  @include('inc.carrousel')

  {{--  <div class="ofertas text-center" >
    <h2>Ofertas Imperdibles!</h2>
    <div class="row">
    @foreach ($post as $product)
        <div class="col-xs-6 col-sm-6 col-xl-3">
          <article class="articuloUno">
            <div class="card">
              <img class="card-img-top" src="/storage/products/{{$product->img1}}" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title">{{$product->title }}</h4>
                <p class="card-text">
                  {{str_limit($product->description,50)}} <br>
                </p>
                <a href="/articles/{{$product->id}}" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>
  @endforeach
  </div>
</div>
  --}}
<!-- CARROUSEL (ubicar todo en INCLUDES)-->

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="images/bannerProd.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/bannerUno.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/bannerDos.png" alt="Third slide">
    </div>
  </div>
</div>


@endsection
