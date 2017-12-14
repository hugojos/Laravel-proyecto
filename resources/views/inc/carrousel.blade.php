    <style media="screen">
    .card {
      height: 100%;
    }
    .carrousel {
overflow: hidden;
position: relative;
width: 100%;
min-height: 382px;
background: linear-gradient(black, #3D3D3D);
}
.carrousel-images {
display: flex;
transition: all .6s;
height: 60vh;
margin: 10px 0;
min-height: 382px;
}

.carrousel .articulo-vista {
  flex-shrink: 0;
  display: flex;
  height: 100%;
}

.articulo-vista {

  display: flex;
  justify-content: center;
  height: 100%;
}

.articulo {
    height: 100%;

}
.card-img-top {
    height: 70%;
}
img {
object-fit: contain ;
}
.btn-carrousel {
position: absolute;
top: 40%;

}

.carrousel button.prev {
left: 30px;
}
.carrousel button.next {
right: 30px;
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
    .card-body {
      text-align: center;;
    }
    </style>


<div class="carrousel">

  <div class="carrousel-images">



    @foreach ($post as $product)
      <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
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

       <!--  <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                   <br>
                </p>
                <a href="/articles/" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>

        <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                   <br>
                </p>
                <a href="/articles/" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>

        <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                   <br>
                </p>
                <a href="/articles/" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>

        <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                   <br>
                </p>
                <a href="/articles/" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>

        <div class="col-xs-6 col-sm-6 col-xl-4 articulo-vista">
          <article class="articuloUno articulo">
            <div class="card">
              <img class="card-img-top" src="/storage/products/" alt="Imagen producto uno" >
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                   <br>
                </p>
                <a href="/articles/" class="btn btn-primary1">Lo quiero!</a>
              </div>
            </div>
          </article>
        </div>
 -->
    </div>
     <button type="button" class="btn-carrousel prev">&lt;</button>
  <button type="button" class="btn-carrousel next">&gt;</button>
  </div>






<script type="text/javascript">
var carrousel = document.querySelector('.carrousel')
var carrito = document.querySelector('.carrousel-images')
var cantidadImagenes = 0;

var imagenActual = 0

window.addEventListener('resize', function (event) {
    console.log('resize')
    if (window.innerWidth < 575) {
        cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length;
    } else if (window.innerWidth < 1200 && window.innerWidth >= 575) {
        cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length / 2
    } else {
        cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length / 3
    }
    console.log(cantidadImagenes)
});

    if (window.innerWidth < 575) {
       cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length;
    } else if (window.innerWidth < 1200 && window.innerWidth >= 575) {
       cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length / 2
    } else {
       cantidadImagenes = document.querySelectorAll('.carrousel .articulo').length / 3
    }

//var cantidadImagenes = carrito.style.width/carrousel.offsetWidth





console.log(cantidadImagenes)

document.querySelector('button.prev').addEventListener('click', function () {
  if (imagenActual > 0) {
    imagenActual--
  } else {
    imagenActual = cantidadImagenes - 1
  }
    carrito.style.transform = 'translateX(' + (-carrousel.offsetWidth * imagenActual) + 'px)';
})

document.querySelector('button.next').addEventListener('click', function () {
  if (imagenActual < (cantidadImagenes - 1)) {
    imagenActual++
  } else {
    imagenActual = 0
  }
  carrito.style.transform = 'translateX(' + (-carrousel.offsetWidth * imagenActual) + 'px)';
})

carrito.addEventListener('transitionend', function () {
  console.log('fin de la transition')
})

</script>
