<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    
     // Get all posts
     public function index(){
        $posts = Post::with(['user','images','videos','category'])->orderBy('id', 'desc')->paginate();
        return PostResource::collection($posts);
    }
}
