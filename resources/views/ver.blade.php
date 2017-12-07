@extends('layouts.app1')
@section('content')
  <h1 style="margin-left: 20px;">Tus articulos</h1>
  @foreach ($articulos as $key => $value)
    <div class="" style="margin-left: 100px; border-bottom: 1px solid black; width:800px; ">
      <h1>{{$value->title}}</h1>
      <img src="/storage/products/{{$value->img1}}" style='width:20%'  alt="">

      <p>{{$value->description}} <span style="color:green;">${{$value->price}}</span></p>
    </div>
  @endforeach
@endsection
