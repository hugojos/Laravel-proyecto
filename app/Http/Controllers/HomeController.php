<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $post = Post::where('offer','=','1')->orderBy('created_at','desc')->get();

      if (Auth::user()) {
        Cart::restore(Auth::user()->email);
        Cart::store(Auth::user()->email);
        $user= Auth::user()->id;
        return view('index',['post'=>$post,'user'=>$user,'title'=>'Hugo Sajama']);
      } else {
        return view('index',['post'=>$post,'title'=>'Hugo Sajama']);
      }
    }
}
