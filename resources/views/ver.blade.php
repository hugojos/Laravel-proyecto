@extends('layouts.app')
@section('content')
  @foreach ($articulos as $key => $value)
    <div class="">
      <h1>{{$value->title}}</h1>
      <p>{{$value->description}} <span style="color:green;">${{$value->price}}</span></p>
    </div>
  @endforeach
@endsection
