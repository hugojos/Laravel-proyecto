@extends('layouts.app1')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .women-container {
        margin-top: 83px;
    }

    .w-banner-container {
        height: 100vh;
        background-image: url("../images/banner-women.jpeg");
        background-position: 67% 83px;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
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
    }
</style>

<div class="women-container">
    <div class="w-banner-container">
        <!-- <img src="images/banner-women.jpeg" alt=""> -->
    </div>

    <section class="products">
        @foreach ($products as $product)
            <div class="prod-container">
                <img src="/storage/products/{{$product->img1}}" alt="">
                <p>$product->id</p>
            </div>
          

        @endforeach

         {{ $products->links() }}
        
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

</div>
@endsection