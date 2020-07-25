<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    //
    public function index(){
        return view('posts.posts')->with([
            'posts' => Post::all()
        ]);
    }

    // get single
    public function show($id){
        $tag = Post::find($id);
        return view('posts.post')->withPost($tag);
    }

    // store
    public function store(Request $request){
        $request->validate([
            'post_title' => 'required',
        ]);
        $item = Post::create([
            'title' => $request->tag_title,
        ]);
       
        return redirect()->back()->with('message','Post added successfully!');
    }
}
