<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\shared\CategoriesMasterController;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public $masterController;
    public function __construct(){
        $this->masterController = new CategoriesMasterController();
    }
    // Get all
    public function index(){
        return $this->masterController->index();
    }

    // get single
    public function show($id){
        
    }

    // store
    public function store(Request $request){
        
    }
}
