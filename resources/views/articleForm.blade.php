@extends('layouts.app1')

@section('content')
  <style media="screen">
  body{
    background-color: #f2f2f2;
  }
  .container{
    margin: 0 auto;
    max-width: 70vw;
    background-color: white;
    box-shadow: 2px 2px 5px #999;
    margin-bottom: 20px;
  }
  form {
    margin-top: 100px;
  }
  label {
    margin-top: 10px;
  }

  .textarea{
    width: 100%;
  }
  h3 {
    margin-bottom: 20px;
  }
  #categorias{
    display: flex;
    justify-content: center;
  }
  @media (max-width: 460px) {
    .container{
      margin: 0 auto;
      max-width: 100vw;
    }
  }

  }
  </style>


<div class="container">
  <form class="form" action="{{ route('add')}}" method="post" enctype="multipart/form-data" style="text-align:center;">
    {{ csrf_field() }}
    {{-- <label class="custom-file">
      <input type="file" id="file" class="custom-file-input">
      <span class="custom-file-control"></span>
    </label> --}}
    <div class="row">
      <div class="col-xs-12 col-md-6 col-xl-12">
        <h3 class="mt-5 text-center">Nuevo Artículo</h3>
      </div>
    </div>


    <div class="row">

        <div class="col-xs-12 col-md-6 col-xl-6">
            <span class="">Precio</span>
            <input type="text" name="price" value="" placeholder="Precio" class="col-xs-12 form-control"><br>
        </div>

        <div class="col-xs-12 col-md-6 col-xl-6">
          <span class="">Titulo</span>
          <input class="form-control col-xs-12" type="text" name="title" value="" placeholder="Titulo">
        </div>

    </div>



    <div class="row" id="categorias">
      <div class="categorias">
        <label for="category" class="">Categoria: </label>
        <select class="form-control col-xs-12 col-md-6 col-xl-12 custom-select" name="category">
          <option value="">Seleccionar...</option>
          @foreach ($category as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
          @endforeach
        </select>
      </div>
    </div>


    <label for="oferta">Es una oferta</label>
    <input id="oferta" type="checkbox" name="oferta" value="1">
    <br>
    <textarea class="textarea"name="description" rows="8" cols="80" placeholder="Descripcion"></textarea><br>


    <div class="row">
      <div class="col-xs-12 col-md-6 col-xl-6 form-group">
        <label for="file">Subir imagen 1</label>
        <input class="form-control-file" type="file" id="file" name="img1">
      </div>
      <div class="col-xs-12 col-md-6 col-xl-6 form-group">
        <label for="file1">Subir imagen 2</label>
        <input class="form-control-file" type="file" id="file1" name="img2">
      </div>
    </div>

    <input class="btn btn-success mt-5 mb-4" type="submit" name="" value="Añadir">

  </form>
</div>

@endsection
