@extends('layouts.app1')

@section('content')

<style>

    .cart-title {
        text-align: center;
    }

    .prod-img {
        width: 50%;
    }
    .img-row {
        width: 20%;
    }
    .container{
      ∫
      justify-content: center;
      align-items: center;
      min-height: 88vh;
      margin-top: 120px;
    }
    #centrar{
      display: flex;
      justify-content: center;
      margin: 30px 0px;
      
    }
</style>

<div class="container">
  <section class="cart-container">
    <div class="row">
      <div class="col-xs-12 -col-md-6 col-xl-6">
        <h2 id="centrar" class="cart-title">Productos en tu carrito: {{Cart::content()->count()}}</h2>
      </div>
    </div>

    <div class="row">

    <table  class="table col-xs-12 col-md-12 col-xl-8">
      <thead class="thead-light">
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">Código</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
        </tr>
      </thead>
      <tbody>

        @foreach (Cart::content() as $item)
          <tr>

            <td> <a class="btn btn-danger" href="{{route('deleteFromCart', ['id'=>$item->rowId]) }}">x</a> </td>
            <td class="img-row"><img class="prod-img" src="storage/products/{{$item->model->img2}} " alt="" srcset=""></td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}} </td>
            <td>$ {{$item->price}}.00 </td>
          </tr>
        @endforeach

        <tr>
          <td></td>
          <th scope="row"></th>
          <td></td>
          <td>TOTAL:</td>
          <td>{{Cart::total()}} </td>
        </tr>
      </tbody>
    </table>

  </section>

    <div class="row">
      <div class="col-xs-8 col-md-3 col-xl-3">
        <a id="centrar" class="btn btn-success" href="{{ url('/categorias')}}">Seguir comprando</a>
      </div>
      <div class="col-xs-8 col-md-3 col-xl-3">
        <a  id="centrar"class="btn btn-danger" href="{{route('checkout')}}">Finalizar la compra</a>
      </div>
    </div>

  </div>

</div>



@endsection
