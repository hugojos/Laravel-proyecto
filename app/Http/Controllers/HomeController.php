<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::paginate(10);
        $users = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('alias','user_id','description','title','price')
        ->paginate(10);
        return view('home',['post'=>$users]);
    }
}
