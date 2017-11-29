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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= Auth::user()->id;
        //$posts = Post::paginate(10);
        $users = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
        ->select('alias','user_id','description','title','price','posts.id')
        ->paginate(10);
        return view('home',['post'=>$users,'user'=>$user]);
    }
}
