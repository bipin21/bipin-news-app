<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
       $comments = Comment::with(['user','post'])->paginate();
       return view('comments.comments')->withComments($comments);
    }

    // get single
    public function show($id){
        $tag = Comment::find($id);
        return view('comments.comment')->withTag($tag);
    }

    // get link
   
}
