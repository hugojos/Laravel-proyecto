@extends('layouts.app1')

@section('content')

<style>

    .cart-title {
        text-align: center;
    }
    .cart-container {
        margin-top: 83px;
        margin: 10%;
    }
    .prod-img {
        width: 50%;
    }
    .img-row {
        width: 20%;
    }
</style>

<section class="cart-container">

    <h2 class="cart-title">Productos en tu carrito: {{Cart::content()->count()}}</h2>
    <table class="table">
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
            <tr>
                <td></td>
                <th scope="row"></th>
                <td></td>
                <td> <a class="btn btn-success" href="{{route('checkout')}}">Seguir comprando</a> </td>
                <td> <a class="btn btn-danger" href="{{route('checkout')}}">Finalizar la compra</a> </td>
            </tr>
        </tbody>
    </table>

</section>



@endsection
