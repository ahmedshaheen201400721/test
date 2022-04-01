<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts= Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return $post;
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
       Post::create(
           $this->validatePost()
       );
       return redirect('/posts');
    }

    public function validatePost(){
        return request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request,Post $post)
    {
        $post->update(
            $this->validatePost()
        );
    }

    public function destroy($id)
    {
        //
    }
}
