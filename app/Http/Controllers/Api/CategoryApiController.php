<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\shared\CategoriesMasterController;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public $masterController;
    public function __construct(){
        $this->masterController = new CategoriesMasterController();
    }
    // Get all
    public function index(){
        // return $this->masterController->index();
        $categories = Category::paginate();
        return CategoryResource::collection($categories);
    }

    public function posts($id){
        $category = Category::find($id);
        $posts = $category->posts;
        return PostResource::collection($posts);
    }

    // get single
    public function show($id){
        
    }

    // store
    public function store(Request $request){
        
    }
}
