@extends('layouts.app1')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Playfair+Display:700" rel="stylesheet">


  

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
      <a id="link-flecha1" href="">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
    </div>
  </div>

  <div class="christmas">

  </div>
  <div class="seccionPrimera">
    <div id="seccion-1" class="seccionUno">
      <img class="img-sec1" src="/images/sec1.jpg" alt="">
      <h3 class="title-sec1">Regalos perfectos</h3>
      <a class="link-sec1" id="link1-sec1" href="/categorias/mujeres">PARA ELLAS</a>
      <a class="link-sec1" id="link2-sec1" href="/categorias/hombres">PARA ELLOS</a>
      <div id='flecha2' class="flecha-bajar">
        <a id="link-flecha2" href="">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    
    <div id="seccion-1-mobile">
      <div class="sec1-mujer">
        <img class="img-sec1-mobile" src="/images/sec1-mobile.jpg" alt="">
        <a class="link-sec1-mobile" id="link1-sec1-mobile" href="/categorias/mujeres">PARA ELLAS</a>
      </div>
      <div class="sec1-hombre">
        <img class="img-sec1-mobile2" src="/images/sec1-mobile2.jpg" alt="">
        <a class="link-sec1-mobile" id="link2-sec1-mobile" href="/categorias/hombres">PARA ELLOS</a>
      </div>
      <div id='flecha2-mobile' class="flecha-bajar">
        <a id="link-flecha2mobile" href="">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
      </div>
    </div>

  </div>
  

  <div class="parallaxSeparador"></div>

    <div id="seccion-2" class="seccionDos">
      <img class="img-sec2" src="/images/secdos.jpg" alt="">
      <div class="parte-sec2">
        <h3 class="title-sec2">PARA LOS PEQUES</h3>
        <hr class="linea-separadora">
        <a class="link-sec2" href="">ENTRAR</a>
      </div>
      <div id='flecha3' class="flecha-bajar">
        <a id="link-flecha3" href="">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
      </div>
      
  
    </div>


  <div class="parallaxDos">
    <div class="container parallax" id="parallaxUno">
      <h3 class="linea1-parallax">LANZAMIENTO</h3>
      <h1 class="linea2-parallax">TEMPORADA 2018</h1>
    </div>   
    
    <div id='flecha4' class="flecha-bajar">
      <a id="link-flecha4" href="">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
    </div>    
  </div>

  @include('inc.carrousel')


<!-- CARROUSEL (ubicar todo en INCLUDES)-->

<div class="parallaxUltimo">
  <div class="texto-ultimo">
    <h3>Proximamente...</h3>
    <h3>¡ACCESORIOS!</h3>
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
      $('html, body').animate({ scrollTop: $('.seccionPrimera').offset().top }, 3300);
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
          $('html, body').animate({ scrollTop: $('.parallaxDos').offset().top }, 2000);
          return false;
        });
      });
    $(function () {
        $('#flecha4').click(function (e) {
          e.preventDefault();
          $('html, body').animate({ scrollTop: $('#flecha4').offset().top }, 2000);
          return false;
        });
      });
</script>

@endsection
