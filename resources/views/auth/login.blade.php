@php
  $title = 'Login';
@endphp
@extends('layouts.app1')

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

<style media="screen">

    .container{
      margin-top: 130px;
      margin-bottom: 100px;
      display: flex;
      justify-content: center;
      box-shadow: 2px 2px 5px #999;
      align-items: center;
      background: white;
    }
    .panel-heading{
      font-family: Montserrat;
      font-size: 25px;
      margin-bottom: 20px;
    }

    label, button, a{
      font-family: Montserrat;
    }
    .row {
      background-color: #f2f2f2;
    }
    .panel {
      background: white;
    }
    .height {
      min-height: 100vh;
    }

</style>
<div class="row height" style="display:flex;justify-content:center;">
  <div class="container col-xs-12 col-md-6 col-lg-6 col-xl-5" style="max-height:500px;">
    <div class="row">
            <div class="panel panel-default" >
                <div class="panel-heading text-center">INGRESAR</div>

                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="formLogin">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-xs-12 col-md-8 control-label">E-Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="&#128231;" required autofocus>

                                <span class="help-block" id="errorEmail" style="color:red">
                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                              </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder=" &#128272;">

                                <span class="help-block" id="errorPassword" style="color:red">
                                @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="button" id="button" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Ovidaste tu contraseña?
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </div>
  </div> <!-- cierro row -->
</div> <!-- fin container-->
<script type="text/javascript">
  var email = document.querySelector('#email');
  var password = document.querySelector('#password');
  var re =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var button = document.querySelector('#button');
  var error = 0;
  button.addEventListener('click', function(){
    error = 0;
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
    } else{
      document.querySelector('#errorPassword').innerText = "";
    }

    if (error == 0) {
      document.querySelector('#formLogin').submit();
    }
  });
</script>

@endsection
