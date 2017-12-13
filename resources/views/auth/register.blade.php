@php
  $title = 'Registro';
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
    background-size:100% auto;
    background-position-y: 60px;
    background-attachment: fixed;
  }
  </style>

<div class="row">
  <div class="container col-xs-12 col-md-6 col-lg-6 col-xl-5" id="background-form">
    <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading text-center">REGISTRATE</div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                          {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                              <label for="alias" class="col-md-12 control-label">Alias</label>

                              <div class="col-md-12">
                                  <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}" required>

                                  @if ($errors->has('alias'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('alias') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                              <label for="nombre" class="col-md-12 control-label">Nombre</label>

                              <div class="col-md-12">
                                  <input id="nombre" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>

                                  @if ($errors->has('first_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('first_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="apellido" class="col-md-12 control-label">Apellido</label>

                              <div class="col-md-12">
                                  <input id="apellido" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                  @if ($errors->has('last_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('last_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-12 control-label">E-Mail</label>

                              <div class="col-md-12">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Contraseña</label>

                              <div class="col-md-12">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
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
                                  <button type="submit" class="btn btn-success justify-content-center">
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
@endsection
