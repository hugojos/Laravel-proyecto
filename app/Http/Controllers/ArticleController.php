<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Comment;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      $this->middleware('auth',['except'=>['index','search']]);
    }


    /*Funcion buscador, le falta vista */
    public function search(Request $request){
      $post = Post::where('title','LIKE','%'.$request->input('buscador').'%')->get();
      return $post;
    }

    public function index($id)
    {
      /*Logre hacerlo de una forma mas prolija usando relaciones en los modelos*/
      /*$comments = Comment::leftJoin('users','users.id','=','user_id')
      ->leftJoin('posts','posts.id','=','post_id')
      ->select('content','alias','comments.created_at','post_id','comments.user_id')
      ->where('post_id','=',$id)
      ->orderBy('created_at','desc')
      ->get();*/
      $post = Post::find($id);
      $category = $post->category;
      $comments = $post->comments;
      if (Auth::user()) {
        $user= Auth::user()->id;
        return view('article',['user'=>$user,'post'=>$post,'comments'=>$comments,'title'=>$post->title,'category'=>$category,'asd'=>0]);
      } else {
        return view('article',['post'=>$post,'comments'=>$comments,'title'=>$post->title,'category'=>$category,'asd'=>0]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category = Category::all();
      $user = Auth::user();
      return view('articleForm')->with('user', $user)
                                ->with('title', 'Agregar producto')
                                ->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

      $this->validate($request, [
          'price'=>'required|integer',
          'title'=> 'required|string|max:100',
          'description'=>'required|string|max:2000',
          'img1' => 'image|max:1999|required',
          'img2' => 'image|max:1999|required',
          'offer' => 'nullable'
        ]);
          $fileNameWithExt = $request->file('img1')->getClientOriginalName();
          $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('img1')->getClientOriginalExtension();
          $fileNameToStore = $filename.'_'.time().'1.'.$extension;
          $path1 = $request->file('img1')->storeAs('public/products', $fileNameToStore);

          $fileNameWithExt2 = $request->file('img2')->getClientOriginalName();
          $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
          $extension2 = $request->file('img2')->getClientOriginalExtension();
          $fileNameToStore2 = $filename2.'_'.time().'2.'.$extension2;
          $path2 = $request->file('img2')->storeAs('public/products', $fileNameToStore2);
        if ($request->oferta == null) {
          $request->oferta = 0;
        }

      Post::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'price'=>$request->price,
        'user_id'=>Auth::user()->id,
        'category_id'=>$request->category,
        'img1' =>$fileNameToStore,
        'img2' =>$fileNameToStore2,
        'offer' =>$request->oferta
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
        return view('ver',['articulos'=>$posts,'user'=>$user, 'title'=>'Tus artículos publicados']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user= Auth::user()->id;
      $post = Post::find($id);
      $category = $post->category;
      $comments = $post->comments;
      return view('article',['user'=>$user,'post'=>$post,'comments'=>$comments,'title'=>$post->title,'category'=>$category,'asd'=>1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request,[
        'title'=>'string|max:20',
        'description'=>'string',
        'price'=>'integer'
      ]);
      $post= Post::find($request->id);
      if ($post->user_id == Auth::user()->id) {
        $post->title=$request->title;
        $post->description=$request->descriptio;
        $post->price=$request->price;
        $post->save();
      }
      return redirect()->route('mostrar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $post= Post::find($request->input('id_producto'));
        if (Auth::user()->id== $post->user_id) {
          $post->delete();
          return back();
        } else {
          return back();
        }
    }
}
