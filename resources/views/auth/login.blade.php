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

    }
    .panel-heading{
      font-family: Montserrat;
      font-size: 25px;
      margin-bottom: 20px;
    }

    label, button, a{
      font-family: Montserrat;
    }

</style>
<div class="row">

<div class="container col-xs-12 col-md-6 col-lg-6 col-xl-5">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading text-center">INGRESAR</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-xs-12 col-md-8 control-label">E-Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="&#128231;">

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
                                <input id="password" type="password" class="form-control" name="password" required placeholder=" &#128272;">

                                @if ($errors->has('password'))
                                    <span class="help-block">
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
                                <button type="submit" class="btn btn-primary">
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
    </div>
  </div> <!-- cierro row -->
</div> <!-- fin container-->


@endsection
