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
            'categories' => Category::all()
        ]);
    }

    // get single
    public function show($id){
        return view('categories.category')->with([
            'category' => Category::findOrFail($id)
        ]);
    }

    // store
    public function store(Request $request){
        $request->validate([
            'category_title' => 'required',
            'category_color' => 'required',
        ]);
        $category = Category::create([
            'title' => $request->category_title,
            'color' => $request->category_color,
        ]);
        return redirect()->back()->with('message','Category added successfully!');
    }
}
