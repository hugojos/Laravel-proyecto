@extends('layouts.app1')

@section('content')


  

  <div class="cabecera">
    <div class="container text-center">
      <h1 class="text-white display-4">HUGO SAJAMA</h1>
      <h3 class="text-white display-7">Tienda Oficial</h3>
    </div>

    <div id="div-video" class="">
      <video autoplay muted loop>
          <source src="videos/secuencia.mp4" type="video/mp4">
      </video>
    </div>
    <div id='flecha1' class="flecha-bajar">
      <a href="">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="christmas">

  </div>

  <div id="seccion-1" class="seccionUno">
    <img class="img-sec1" src="/images/sec1.jpg" alt="">
    <h3 class="title-sec1">Regalos perfectos</h3>
    <a class="link-sec1" id="link1-sec1" href="/categorias/mujeres">PARA ELLAS</a>
    <a class="link-sec1" id="link2-sec1" href="/categorias/hombres">PARA ELLOS</a>
    <div id='flecha2' class="flecha-bajar">
      <a href="">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
    </div>
  </div>

    <div id="seccion-2" class="seccionesflecha seccionDos">
      <img class="img-sec2" src="/images/sec2.jpg" alt="">
      <div class="parte-sec2">
        <h3 class="title-sec2">PARA LOS PEQUES</h3>
        <hr>
        <a class="link-sec2" href="">ENTRAR</a>
      </div>
      <div id='flecha3' class="flecha-bajar">
        <a href="">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
      </div>
      
  
    </div>


  <div class="parallaxUno">
    <div class="container" id="parallaxUno">
      <div class="row text-center text-light">
        <div class="col-xs-12 col-sm-6 secciones">
          <h3>Lanzamiento</h3>
          <h3>NUEVA TEMPORADA</h3>
          <h3>2018</h3>

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

<!-- <script>
  
    $(function () {
      $('#flecha').on('click', function (e) {
        e.preventDefault();
        console.log('la flecha')
        $('html, body').animate({ scrollTop: $('#seccion-1').offset().top }, 500, 'linear');
      });
    });
 
</script>
 -->

<script>
  $(function () {
    $('#flecha1').click(function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: $('.seccionUno').offset().top }, 3000);
      return false;
    });
  });

   $(function () {
      $('#flecha2').click(function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $('.seccionDos').offset().top }, 2700);
        return false;
      });
    });
    $(function () {
        $('#flecha3').click(function (e) {
          e.preventDefault();
          $('html, body').animate({ scrollTop: $('.parallaxUno').offset().top }, 2700);
          return false;
        });
      });
</script>

@endsection
