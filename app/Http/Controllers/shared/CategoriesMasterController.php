<?php
namespace App\Http\Controllers\shared;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoriesMasterController extends Controller
{
    // Get all
    public function index(){
        return new CategoriesResource(Category::paginate());
    }

    // get single
    public function show($id){
        
    }

    // store
    public function store(Request $request){
        
    }
}
