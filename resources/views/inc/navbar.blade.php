

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-inverse bg-inverse">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="images/hs-logo.png" alt="Logo" width="100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/productos') }}">PRODUCTOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
      </li>
      @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="text-transform: uppercase">Login</a></li>
          <li class="nav-item"><a  class="nav-link" href="{{ route('register') }}" style="text-transform: uppercase;">Register</a></li>
      @elseif (Auth::user())
          <li class="dropdown">
              <a href="#" class="dropdown-toggle nav-link" style="text-transform: uppercase" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->alias}} <span class="caret"></span></a>
              <ul class="dropdown-menu nav-item">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/users/{{$user}}">Mi perfil</a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link" href="{{ route('add')}}">Añadir nuevo articulo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('mostrar')}}">Mis publicaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar sesion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
          </li>
      @endguest
    </ul>
    <!-- Aca podria ir el nombre del usuario logueado-->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar Articulos..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
