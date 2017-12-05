@extends('layouts.app')
@section('content')
  <form class="" action="{{ route('add')}}" method="post" style="text-align:center;">
    {{ csrf_field() }}
    <input type="text" name="title" value="" placeholder="Titulo">
    <input type="text" name="price" value="" placeholder="Precio"><br>
    <select class="" name="category">
      <option value="1">Hombre</option>
      <option value="2">Mujer</option>
    </select>
    <br>
    <textarea name="description" rows="8" cols="80" placeholder="Descipcion"></textarea><br>

    <input type="submit" name="" value="Añadir">
  </form>
@endsection
