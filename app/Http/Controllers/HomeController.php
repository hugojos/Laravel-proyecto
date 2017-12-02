<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;
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
      $users = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
      ->select('alias','user_id','description','title','price','posts.id')
      ->paginate(8);
      if (Auth::user()) {
        $user= Auth::user()->id;
        //$posts = Post::paginate(10);
        return view('index',['post'=>$users,'user'=>$user,'title'=>'HugoSajama']);
        # code...
      } else {
        return view('index',['post'=>$users,'title'=>'HugoSajama']);
      }
    }
}
