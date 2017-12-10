@extends('layouts.app1')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        background-color: #F3F3F3;
    }
    .men-container {
        margin-top: 83px;
        margin-left: 5%;
        margin-right: 5%;
    }
    .men-container a {
        color: black;
    }

    .m-banner-container {
        height: 100vh;
        background-image: url("../images/cat-banner-men.jpg");
        background-position: 67% 83px;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .cat-heading {
        display: inline-block;
        position: relative;
        background-color: rgba(224, 218, 218, 0.233);
        top: 30%;
        left: 5%;
    }

    .cat-title {
        font-size: 3.75em;
        font-family: 'Playfair Display', serif;
    }
    .cat-description {
        margin-left: 4%;
        font-size: 1.2em;
    }

    section.products {
        width: 100%;
        overflow: hidden;
    }

    .prod-container {
        width: 30%;
        margin: 1.5%;
        position: relative;
        float: left;
        overflow: hidden;
    }
    .img-prod {
        width: 100%;
    }

    .img-prod2 {
        position: absolute;
        width: 100%;
        top: 0;
        z-index: 2;
        opacity: 0;
        transition: opacity 0.4s;
    }
    .ver-mas {
        position: absolute;
        width: 32%;
        top: 37%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 3;
        
    }

    .prod-container:hover .img-prod2{
        opacity: 1;
    }
    .prod-container:hover .ver-mas {
        opacity: 100;
    }

    .prod-title {
        margin-bottom: 0;
        margin-left: 4%;
    }
    .prod-price {
        margin-bottom: 0;
        margin-left: 4%;
        font-weight: bold;
    }
    .paginator  ul{
        overflow: hidden;
        text-align: center;
        height: 30px;
    }
</style>

<div class="men-container">
    <div class="m-banner-container">
        <div class="cat-heading">
            <h3 class="cat-title">Hombres</h3>
            <p class="cat-description">COLECCIÓN 2018</p>
        </div>
        
    </div>

    <section class="products">
        
        @foreach ($products as $product)
            <a href="">
                <div class="prod-container">
                    <img class="img-prod" src="/storage/products/{{$product->img1}}" alt="">
                    <img class="img-prod2" src="/storage/products/{{$product->img2}}" alt="">
                    <img class="ver-mas" src="../images/vermas.png" alt="">
                    <p class="prod-title">{{$product->title}}</p>
                    <p class="prod-price">$ {{$product->price}}</p>
                </div>
            </a>
            
          

        @endforeach

        

        
        
         <!-- @foreach ($products as $product)
        <div class="col-xs-6 col-sm-6 col-xl-3">
            <article class="articuloUno">
                <div class="card">
                    <img class="card-img-top" src="/storage/products/{{$product->img1}}" alt="Imagen producto uno">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->title }}</h4>
                        <p class="card-text">
                            {{str_limit($product->description,50)}}
                            <br>
                            <p class="text-muted">Vendedor: {{$product->user->alias}}</p>
                        </p>
                        <a href="/articles/{{$product->id}}" class="btn btn-primary1">Lo quiero!</a>
                    </div>
                </div>
            </article>
        </div> -->
       <!--  @endforeach -->

    </section>
    <div class="paginator">
        {{ $products->links() }}
    
    </div>
    
</div>
@endsection