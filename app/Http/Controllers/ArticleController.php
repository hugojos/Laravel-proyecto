<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      $this->middleware('auth',['except'=>['index']]);
    }

    public function index($id)
    {
      $comments = Comment::leftJoin('users','users.id','=','user_id')
      ->leftJoin('posts','posts.id','=','post_id')
      ->select('content','alias','comments.created_at','post_id','comments.user_id')
      ->where('post_id','=',$id)
      ->orderBy('created_at','desc')
      ->get();
      $post = Post::find($id);
      if (Auth::user()) {
        $user= Auth::user()->id;
        return view('article',['user'=>$user,'post'=>$post,'comments'=>$comments]);
      } else {
        return view('article',['post'=>$post,'comments'=>$comments]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user()->id;
      return view('articleForm',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      Post::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'price'=>$request->price,
        'user_id'=>Auth::user()->id
      ]);
      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $posts = $user->posts()->get();
        return view('ver',['articulos'=>$posts,'user'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
