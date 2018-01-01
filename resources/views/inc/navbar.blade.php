
<style>
  #cart-img {
    height: 40px;
  }
  #cart-nr {
    position:relative;
    top:-6px;
  }
  #item-cart {
    list-style: none;
  }
  .white {
    width: 100%;
    display: block;
    list-style: none;
    background-color: #f2f2f2;
  }
  .white:hover {
    background: gray;
  }
  li.white a {
    color: black!important;
    display: flex;
    padding: 10px;
  }
  li.white a:hover {
    text-decoration: none;
  }
  .navbar-toggler-icon{
    background-color: rgba(255, 255, 255, 0.6);
    border-radius: 15%;
    padding: 20px;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-inverse bg-inverse">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="/images/hs-logo.png" alt="Logo" width="100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto border-top" id="menu">
      <form id="noneid" class="none form-inline my-2 my-lg-0 " action="/search" method="POST">
        {{ csrf_field() }}
        <div class="form-div" >
          <input class="form-control mr-sm-2" type="text" placeholder="Buscar Articulos..." aria-label="Search" name="buscador">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </div>
      </form>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/categorias') }}">PRODUCTOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/faqs') }}">FAQ</a>
      </li>
      @guest
          <li class="nav-item"><a class="nav-link text-uppercase" href="{{ route('login') }}">Ingresar</a></li>
          <li class="nav-item"><a  class="nav-link text-uppercase" href="{{ route('register') }}">Registrarse</a></li>
      @elseif (Auth::user())
          <li class="dropdown">
              <a href="#" class="dropdown-toggle nav-link text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->alias}} <span class="caret"></span></a>
              <ul class="dropdown-menu nav-item background">
                  <li class="nav-item">
                    <a class="nav-link" href="/users/{{Auth::user()->id}}">Mi perfil</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/misfavoritos">Mis favoritos</a>
                  </li>
      @if (Auth::user()->role == 1)
        <li class="nav-item">
          <a  class="nav-link" href="{{ route('add')}}">Añadir nuevo articulo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mostrar')}}">Mis publicaciones</a>
        </li>
      @endif
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar sesion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
          </li>
      @endguest
    </ul>
    @if (Auth::user())
      <li class="nav-item" id='item-cart'>
        <a id='cart-nr' class="nav-link" href="{{ url('/carrito') }}">
          <img id="cart-img" src="/images/shopbag.png" alt="">{{Cart::content()->count()}}</a>
        </li>

    @endif
    <!-- Aca podria ir el nombre del usuario logueado-->
    <form class="form-inline my-2 my-lg-0 none1" action="/search" method="POST">
      {{ csrf_field() }}
      <div class="m-auto" style="position: relative">
        <input class="form-control mr-sm-2" id="buscador" type="text" placeholder="Buscar Articulos..." aria-label="Search" name="buscador" autocomplete="off">
        <ul id="resultados" class="w-100" style="position: absolute;left:0; border-radius: 4px;">
        </ul>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </div>
    </form>
  </div>
</nav>

<script type="text/javascript">
/* ESTO LO DEJO SIN JQUERY PORQUE ES MAS EFICIENTE*/
    var token = document.querySelector('meta[name="csrf-token"]').content
    var buscador = document.querySelector('#buscador'),
        ul = document.querySelector('#resultados'),
        xhr = new XMLHttpRequest();
    buscador.addEventListener('input',function(event){
      xhr.onreadystatechange = function(){
        if (this.readyState == 4) {
          ul.innerHTML = "";
          if (this.status == 200) {
            xhr.response.forEach(function (value, key){
              var li = document.createElement('li');
              var a = document.createElement('a');
              li.className= 'white';
              a.append(document.createTextNode(value.title))
              a.href = '/articles/'+value.id;
              li.append(a);
              ul.append(li)
            });
          }
        }
      };
      xhr.open("GET","/searchGet/"+buscador.value, true);
      xhr.responseType = 'json';
      xhr.setRequestHeader('X-CSRF-TOKEN', token);
      xhr.send();
    })




</script>
