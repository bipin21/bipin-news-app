<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Tag;
use Illuminate\Http\Request;

class TagApiController extends Controller
{
    //
     // Get all posts
     public function index(){
        $items = Tag::paginate();
        return TagResource::collection($items);
    }

    public function posts($id){
        $item = Tag::find($id);
        $posts = $item->posts;
        return PostResource::collection($posts);
    }
}
