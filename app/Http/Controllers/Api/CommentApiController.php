<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    //
     // Get all posts
     public function index(){
        $items = Comment::paginate();
        return CommentResource::collection($items);
    }
}
