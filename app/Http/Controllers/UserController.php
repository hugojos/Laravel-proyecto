<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find($id);
        $post = \App\Post::where('user_id','=',$id)->get();
        return view('user',['user'=>$user,'posts'=>$post,'asd'=>'1', 'title'=>'Mi perfil']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = \App\User::find($id);
      $post = \App\Post::where('user_id','=',$id)->get();
      return view('user',['user'=>$user,'posts'=>$post,'asd'=>'2','title'=>'Mi perfil']);
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
        $this->validate($request,[
          'first_name'=>'required',
          'last_name'=>'required',
          'email'=>'required|unique:users,email,'.$id
        ]);

        $user= \App\User::find($id);
        $confirmar = $request->input('password');

        $post = \App\Post::where('user_id','=',$id)->get();

        if(password_verify($confirmar,$user->password)){
          $user->first_name = $request->input('first_name');
          $user->last_name = $request->input('last_name');
          $user->email = $request->input('email');
          $user->save();
          return view('user',['user'=>$user,'posts'=>$post,'asd'=>1,'title'=>'Mi perfil']);
        } else {
          return view('user',['user'=>$user,'posts'=>$post,'asd'=>1,'title'=>'Mi perfil']);
        }

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
