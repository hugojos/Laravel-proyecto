@php
  $title = 'Registro';
@endphp
@extends('layouts.app1')

@section('content')



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

  <style media="screen">
  .container{
    margin-bottom: 100px;
    display: flex;
    justify-content: center;
    box-shadow: 2px 2px 5px #999;
    background: white;
  }
  .panel-heading{
    font-family: Montserrat;
    font-size: 25px;
    margin-bottom: 20px;
    margin-top: 20px;
  }

  label, button, a{
    font-family: Montserrat;
  }
  #registro-facebook{
    background-color: #3b5998;
    color: white;
    font-size: 16px;
    display: flex;
    justify-content: center;
  }
  #registro-facebook i{
    margin-right: 10px;
  }
  #background-form{
    background-color: white;

  }
  body{
    background-image: url("/images/parallax.jpg");
    background-repeat: no-repeat;
    background-size:100% 59%;
  }
  nav {
    display:none!important;
  }
  </style>

<div class="row mt-5">
  <div class="container col-xs-12 col-md-6 col-lg-6 col-xl-5" id="background-form">
    <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading text-center">REGISTRATE</div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formRegister">
                          {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                              <label for="alias" class="col-md-12 control-label">Alias</label>

                              <div class="col-md-12">
                                  <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}" required>

                                  <span class="help-block" style="color:red" id="errorAlias">
                                  @if ($errors->has('alias'))
                                          <strong style="color:red">{{ $errors->first('alias') }}</strong>
                                  @endif
                                </span>
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                              <label for="nombre" class="col-md-12 control-label">Nombre</label>

                              <div class="col-md-12">
                                  <input id="nombre" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>

                                  <span class="help-block" style="color:red" id="errorNombre">
                                  @if ($errors->has('first_name'))
                                          <strong style="color:red">{{ $errors->first('first_name') }}</strong>
                                  @endif
                                </span>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="apellido" class="col-md-12 control-label">Apellido</label>

                              <div class="col-md-12">
                                  <input id="apellido" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                  <span class="help-block" style="color:red" id="errorApellido">
                                  @if ($errors->has('last_name'))
                                          <strong style="color:red">{{ $errors->first('last_name') }}</strong>
                                  @endif
                                </span>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-12 control-label">E-Mail</label>

                              <div class="col-md-12">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  <span class="help-block" style="color:red" id="errorEmail">
                                  @if ($errors->has('email'))
                                          <strong style="color:red">{{ $errors->first('email') }}</strong>
                                  @endif
                                </span>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Contraseña</label>

                              <div class="col-md-12">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  <span class="help-block" style="color:red" id="errorPassword">
                                  @if ($errors->has('password'))
                                          <strong style="color:red">{{ $errors->first('password') }}</strong>
                                  @endif
                                </span>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-12 control-label">Confirmar contraseña</label>

                              <div class="col-md-12">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-12">
                                  <button type="button" id="button" class="btn btn-success justify-content-center">
                                      Registrarse
                                  </button>

                                  <a class="btn btn-link" href="{{ route('login') }}">
                                      Ya tienes cuenta? INICIA SESION.
                                  </a>
                              </div>
                          </div>

                      </form>

                    <div class="row d-flex justify-content-center">
                      <div class="form-group">
                        <div class="col-xs-12">
                        <a href=" {{ url('/login/facebook')}}">
                          <button id="registro-facebook" type="submit" name="" class="btn">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                             Inicia sesión con facebook
                          </button>
                        </a>
                        </div>
                      </div>
                    </div>

                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var alias = document.querySelector('#alias');
    var nombre = document.querySelector('#nombre');
    var apellido = document.querySelector('#apellido');
    var email = document.querySelector('#email');
    var password = document.querySelector('#password');
    var password_confirm = document.querySelector('#password-confirm');
    var button = document.querySelector('#button');
    var re =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var error = 0;
    button.addEventListener('click',function() {
      error = 0;
      if (alias.value=="") {
        document.querySelector('#errorAlias').innerText="El alias no puede estar vacio.";
        error++
      }else if(alias.value.length > 20) {
        document.querySelector('#errorAlias').innerText='El alias no puede tener mas de 10 caracteres.';
        error++
      } else {
        document.querySelector('#errorAlias').innerText= "";
      }

      if (nombre.value=="") {
        error++
        document.querySelector('#errorNombre').innerText="El nombre no puede estar vacio.";
      }else if(nombre.value.length > 20) {
        error++
        document.querySelector('#errorNombre').innerText='El nombre no puede tener mas de 20 caracteres.';
      } else {
        document.querySelector('#errorNombre').innerText= "";
      }

      if (apellido.value=="") {
        error++
        document.querySelector('#errorApellido').innerText="El apellido no puede estar vacio.";
      }else if(apellido.value.length > 20) {
        error++
        document.querySelector('#errorApellido').innerText='El apellido no puede tener mas de 20 caracteres.';
      }else {
        document.querySelector('#errorApellido').innerText= "";
      }

      if (email.value=="") {
        error++
        document.querySelector('#errorEmail').innerText="El email no puede estar vacio.";
      }else if(email.value.length > 100) {
        error++
        document.querySelector('#errorEmail').innerText='El email no puede tener mas de 100 caracteres.';
      } else if (!re.test(email.value)) {
        error++
        document.querySelector('#errorEmail').innerText= "El email no es valido.";
      } else {
        document.querySelector('#errorEmail').innerText= "";
      }

      if (password.value == "") {
        error++
        document.querySelector('#errorPassword').innerText = "La contraseña no puede estar vacia."
      } else if (password.value.length < 6) {
        error++
        document.querySelector('#errorPassword').innerText = "La contraseña debe ser mayor a 6 caracteres";
      } else if(password.value!==password_confirm.value){
        error++
        document.querySelector('#errorPassword').innerText = "Las contraseñas no coinciden";
      } else{
        document.querySelector('#errorPassword').innerText = "";
      }

      if (error == 0) {
        document.querySelector('#formRegister').submit();
      }
    })
  </script>
@endsection
