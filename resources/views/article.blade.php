@extends('layouts.app')
@section('content')
  <form class="" action="{{ route('add')}}" method="post">
    {{ csrf_field() }}
    <input type="text" name="title" value="" placeholder="Titulo">
    <input type="number" name="price" value="" placeholder="Precio">
    <br>
    <textarea name="description" rows="8" cols="80" placeholder="Descipcion"></textarea><br>

    <input type="submit" name="" value="Añadir">
  </form>
@endsection
