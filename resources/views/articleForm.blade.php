@extends('layouts.app1')

@section('content')
  <style media="screen">
    form {
      margin-top: 100px;
    }

  </style>

  <form class="form" action="{{ route('add')}}" method="post" enctype="multipart/form-data" style="text-align:center;">
    {{ csrf_field() }}
    {{-- <label class="custom-file">
      <input type="file" id="file" class="custom-file-input">
      <span class="custom-file-control"></span>
    </label> --}}
    <input type="text" name="title" value="" placeholder="Titulo">
    $<input type="text" name="price" value="" placeholder="Precio"><br>
    <select class="" name="category">
      @foreach ($category as $key => $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
    <label for="oferta">Es una oferta</label>
    <input id="oferta" type="checkbox" name="oferta" value="1">
    <br>
    <textarea name="description" rows="8" cols="80" placeholder="Descripcion"></textarea><br>

      <div class="form-group">
        <label for="img1">Subir imagen 1</label><br>
        <input type="file" id="file" name="img1"><br>
        <label for="img2">Subir imagen 2</label><br>
        <input type="file" id="file1" name="img2"><br>
        <span class="custom-file-control"></span>
        <br>
      </div>


    <input type="submit" name="" value="Añadir">
  </form>
@endsection
