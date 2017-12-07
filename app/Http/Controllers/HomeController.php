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
    /*  $users = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
      ->select('alias','user_id','description','title','price','posts.id')
      ->paginate(8);*/
      $post = Post::orderBy('created_at','desc')->get();
      if (Auth::user()) {
        $user= Auth::user()->id;
        //$posts = Post::paginate(10);
        return view('index',['post'=>$post,'user'=>$user,'title'=>'Hugo Sajama']);
        # code...
      } else {
        return view('index',['post'=>$post,'title'=>'Hugo Sajama']);
      }
    }
}
