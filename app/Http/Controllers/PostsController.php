<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

       return view('posts.index', compact('posts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {


    //file storing/file moving

     $input = $request->all();

     if($file = $request->file('file')){
         $name = $file->getClientOriginalName();
         $file->move('images',$name);
         $input['file'] = $name;
     }

   //Post::create($request->all());

   Post::create($input);

  return redirect('posts');



    }





    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
       // return view('post')->with('id',$id);
       //with the "with" method we have to pass the key and the variable
       //but with the compact we don't need can only name the variable.

        $post = Post::findOrFail($id);

        return view('posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);


        return view('posts.edit',compact('post'));

    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);

       $post->update($request->all());

       return redirect('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('posts');



    }

    public function contact()
    {
        $country = ['Pakistan','Kiel','Germany'];

        return view('contact',compact('country'));


    }


}
