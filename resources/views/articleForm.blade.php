@extends('layouts.app1')
@section('content')
<style media="screen">

  body{
    background-color: #f2f2f2;
  }
  .textarea{
    width: 100%;
    resize:none;
    overflow: hidden;
  }
</style>
<div class="container bg-white mt-5 mb-5">
  <form class="text-center col-md-9 col-xs-12 m-auto" action="{{ route('add')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-md-12 col-xl-12">
        <h3 class="mt-5 text-center mb-3">Nuevo Artículo</h3>
      </div>
    </div>

    <div class="form-group d-flex flex-wrap">
      <div class="col-xs-12 col-md-6 col-xl-6">
        <span class="">Titulo</span>
        <input class="form-control col-xs-12" type="text" name="title" value="{{old('title')}}" placeholder="Titulo">
      </div>
      <div class="col-xs-12 col-md-6 col-xl-6">
        <span class="">Precio</span>
        <input type="text" name="price" value="{{old('price')}}" placeholder="Precio" class="col-xs-12 form-control"><br>
      </div>
    </div>
    <div class="form-group d-flex align-items-center justify-content-around flex-wrap">
      <div class="col-xs-12 col-md-4">
        <label for="category" class="">Categoria: </label>
        <select class="form-control col-xs-12 col-md-6 col-xl-12 custom-select" name="category">
          <option value="">Seleccionar...</option>
          @foreach ($category as $key => $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-check col-xs-12 col-md-6 mt-2">
        <label class="form-check-label">
          <input type="checkbox" name="oferta" value="1"> Es una oferta
        </label>
      </div>
    </div>
    <div class="form-group mt-5">
      <textarea class="textarea form-control" name="description" rows="8" cols="80" placeholder="Descripcion">{{old('description')}}</textarea><br>
    </div>
    <div class="form-group d-flex flex-wrap">
      <div class="col-xs-12 col-md-12 col-xl-6 form-group">
        <label for="file">Subir imagen 1</label>
        <input class="form-control-file m-auto" type="file" id="file" name="img1">
      </div>
      <div class="col-xs-12 col-md-12 col-xl-6 form-group">
        <label for="file1">Subir imagen 2</label>
        <input class="form-control-file m-auto" type="file" id="file1" name="img2">
      </div>
    </div>
    <input class="btn btn-success mt-5 mb-4" type="submit" name="" style="font-size:18px; padding:7px 40px;" value="Añadir">
  </form>
</div>

@endsection
