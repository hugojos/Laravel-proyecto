<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Post;

class ShoppingController extends Controller
{
    public function cart() {

        //Cart::destroy();
        return view('cart')->with('title', 'Carrito de compras');
    }


    public function addToCart(Request $request) {

        $producto = Post::find($request->product_id);
        $cartItem = Cart::add([
            'id'=> $producto->id,
            'name' => $producto->title,
            'qty'=> 1,
            'price'=> $producto->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Post');

        /* if (Auth::check()) {
            Cart::store(Auth::user()->email);
        } */
       
        return redirect()->route('cart');
    }

    public function addToCartBack(Request $request) {

        $producto = Post::find($request->product_id);
        $cartItem = Cart::add([
            'id'=> $producto->id,
            'name' => $producto->title,
            'qty'=> 1,
            'price'=> $producto->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Post');

        /* if (Auth::check()) {
            Cart::store(Auth::user()->email);
        } */
       
        return redirect()->back();
    }


    public function deleteFromCart($id) {

        Cart::remove($id);

        /* if (Auth::check()) {
            Cart::store(Auth::user()->email);
        } */

        return redirect()->back();

    }

    public function checkout() {

        return view('cart-checkout')->with('title', 'Checkout');
    }
}
