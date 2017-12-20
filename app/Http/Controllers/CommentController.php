<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      if (Auth::user()) {
        $this->validate($request,[
          'comment'=>'required|string|max:2000'
        ]);
        $user_id = Auth::user()->id;
        Comment::create([
          'content'=>$request->input('comment'),
          'user_id'=>$user_id,
          'post_id'=>$id,
        ]);
        return redirect()->route('mostrarArticulo',['id'=>$id]);
      } else {
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request)
    {
        $this->validate($request,[
          'id'=>'required|integer',
          'comment'=>'required|string|max:2000'
        ]);
        $comment = Comment::find($request->input('id'));
        $comment->content = $request->input('comment');
        $comment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $this->validate($request,[
        'id'=>'required|integer',
      ]);
      $comment = Comment::find($request->input('id'));
      if ($comment == null || count($comment) == 0) {
        $comment = Comment::find($request->input('id'));
        $comment->delete();
      } else {
        $comment->delete();
      }
    }
}
