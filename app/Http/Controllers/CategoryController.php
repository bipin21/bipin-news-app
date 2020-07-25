<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\shared\CategoriesMasterController;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $masterController;
    public function __construct(){
        $this->masterController = new CategoriesMasterController();
    }
    // Get all
    public function index(){
        return view('categories.categories')->with([
            'categories' => $this->masterController->index()
        ]);
    }

    // get single
    public function show($id){
        
    }

    // store
    public function store(Request $request){
        
    }
}
