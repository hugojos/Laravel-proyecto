@extends('layouts.app1')

@section('content')
  <link href="https://fonts.googleapis.com/css?family=Arimo|Old+Standard+TT:400,700" rel="stylesheet">

  <style media="screen">

  * {
    margin: 0;
    padding: 0;
  }

  .cat-container {
    margin-top: 83px;
  }
  
  .img-container1 {
    display: inline-block;
    position: relative;
    float: left;
    width: 55%;
    margin-left: 10%;
  
  }
  .black-filter {
    display: inline-block;
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(133, 121, 93, 0.3);
    z-index: 2;
    -webkit-transition: background-color 1s;/* For Safari 3.1 to 6.0 */
    transition: background-color 1s;
  }
  .black-filter:hover {
    background-color: rgba(0,0,0,0);
  }

  .img-container2 {
    display: inline-block;
    position: relative;
    width: 55%;
    float: right;
    margin-right: 10%;
  }

  .img-container3 {
    display: inline-block;
    position: relative;
    width: 55%;
    margin-left: 5%;
  }

  .img-cat {
    width: 100%;
  }

  .cat-container h3 {
    font-family: 'Old Standard TT', serif !important;
    font-weight: bold !important;
    position: absolute;
    font-size: 4em;    
  }
  .cat-container p {
    font-family: 'Arimo', sans-serif !important;
    position: absolute;
  }
  
  .cat-title1 {
    right: -46%;    
    top: 30%;
  }
  .cat-descripcion1 {    
    right: -37%;
    top: 54%;
  }

  .cat-title2 {
    left: -52%;
    top: 30%;
  }
  .cat-descripcion2 {    
    left: -42%;
    top: 54%;
  }

  .cat-title3 {
    right: -40%;    
    top: 30%;
  }
  .cat-descripcion3 {    
    right: -37%;
    top: 54%;
  }  
 {{-- --------------- Responsive----------  --}}

 @media (max-width: 900px){
    .img-container1 {
      margin-left: 0%;
    } 
    .cat-title1 {
    right: -80%;    
    top: 30%;
  }
  .cat-descripcion1 {    
    right: -80%;
    top: 72%;
  }

  .img-container2 {
    margin-right: 0%;
  }
  .cat-title2 {
    left: -81%;
    top: 30%;
  }
  .cat-descripcion2 {    
    left: -80%;
    top: 72%;
  }

  .img-container3 {
    margin-left: 0%;
  }
  .cat-title3 {
    right: -80%;    
    top: 30%;
  }
  .cat-descripcion3 {    
    right: -80%;
    top: 72%;
  }   
 }
 @media (max-width: 575px) {
   .cat-title1, .cat-title2, .cat-title3 {
     font-size: 2.9em !important;
   }
 }
  @media (max-width: 450px) {
   .cat-title1, .cat-title2, .cat-title3 {
     font-size: 2.4em !important;
   }
 }
  </style>

  <body>
    
    <div class="cat-container">

      <div class="img-container1">
        <h3 class="cat-title1">Mujeres</h3>
        <p class="cat-descripcion1">COLECCIÓN 2018</p>
        <a class="link-mujeres" href="{{ route('women')}}"><div class="black-filter">
        </div></a>
        <img class="img-cat link-mujeres" src="images/cat3.jpeg" alt="">
      </div>

      <div class="img-container2">
        <h3 class="cat-title2">Hombres</h3>
        <p class="cat-descripcion2">COLECCIÓN 2018</p>
        <a href="{{ route('men')}}"><div class="black-filter">
        </div></a>
        <img class="img-cat" src="images/cat1.jpeg" alt="">
      </div>
      

      <div class="img-container3">
        <h3 class="cat-title3">Niños</h3>
        <p class="cat-descripcion3">COLECCIÓN 2018</p>
        <a href="{{ route('kids')}}"><div class="black-filter">
        </div></a>
        <img class="img-cat"" src="images/cat2.jpeg" alt="">
      </div>

      

    </div>


@endsection
