<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\PurchaseItems;

class ProductController extends Controller
{
    //

    public function index(){
      $products = Products::with('category','supplier')->orderBy('created_at','desc')->paginate('20');

      return view('pages.products',['products'=>$products]);
    }

    public function show($id){
      $purchase_items = PurchaseItems::with('purchase')->where('product_id',$id)->orderBy('created_at','desc')->get();
      $product = Products::with('category','supplier')->find($id);

      // dd($purchase_items);
      return view('pages.product',['data'=>[
        'product'=>$product,
        'purchase_items'=>$purchase_items
      ]]);
    }

    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'supplier_id' => 'required',
        'sku' => 'required',
        'stock' => 'required',
        'price' => 'required'
      ]);

      Products::create($request->all());

      return redirect()->route('pages.products.view')->with('success','Product added successfully');
    }
}
