<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    //
    public function index(){

        return new CategoryCollection(Category::orderBy('name','asc')->paginate('10'));

    }

    public function show($id){
        return  new CategoryCollection(Category::findOrFail($id));
    }
}
