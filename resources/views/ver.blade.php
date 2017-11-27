@extends('layouts.app')
@section('content')
  <h1 style="margin-left: 20px;">Tus articulos</h1>
  @foreach ($articulos as $key => $value)
    <div class="" style="margin-left: 100px;">
      <h1>{{$value->title}}</h1>
      <p>{{$value->description}} <span style="color:green;">${{$value->price}}</span></p>
    </div>
  @endforeach
@endsection
