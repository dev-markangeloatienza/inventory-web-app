<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            "name"=> 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('pages.products.view')->with('success','Added category successfully');
    }
}
