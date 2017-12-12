@extends('layouts.app1')

@section('content')
  @php
    $title = "Hugo Sajama";
  @endphp

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

<style media="screen">

.container{
  margin-top: 100px;
  margin-bottom: 130px;
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
.contenedor{
  background-color: #f2f2f2;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
<div class="contenedor">



<div class="container col-xs-12 col-md-6 col-lg-6 col-xl-5">
    <div class="row">

            <div class="panel panel-default">
                <div class="panel-heading text-center">Resetear contraseña  </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-xs-12 control-label">Direccion de Email</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar cambio de contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
</div>
@endsection
