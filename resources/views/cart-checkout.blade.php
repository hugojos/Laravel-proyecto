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
</style>



    
<section class="cart-container">

    <h2 class="cart-title">Resumen de compra</h2>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
               
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>

            @foreach (Cart::content() as $item)
                <tr>                  
                    
                    <td>{{$item->id}}</td> 
                    <td>{{$item->name}} </td>
                    <td>$ {{$item->price}}.00 </td>
                </tr>
            @endforeach
            
            <tr>
                <th></th>        
                <td>TOTAL:</td>
                <td>{{Cart::total()}} </td>
            </tr>
            <tr>           
                <th></th>
                <td></td>
                <td> <a class="btn btn-secondary" href="{{route('checkout')}}">Realizar pago</a> </td>
            </tr>
        </tbody>
    </table>

</section>

@endsection