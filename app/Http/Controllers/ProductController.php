<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\PurchaseItems;
use App\Models\InventoryLogs;
use App\Models\Purchases;

class ProductController extends Controller
{
    //

    public function index(){
      $products = Products::with('category','supplier')->orderBy('created_at','desc')->paginate('10');

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

      DB::transaction(function() use($request){
        $user = Auth::user();

        $products = Products::create([
          'name' => $request->name,
          'category_id' => $request->category_id,
          'supplier_id' => $request->supplier_id,
          'sku' => $request->sku,
          'stock' => $request->stock,
          'price' => $request->price
        ]);

        $purchase = Purchases::create([
          'supplier_id' => $products->supplier_id,
          'total_cost' => $products->price * $products->stock,
          'purchase_date' => now()
        ]);

        $purchase_items = PurchaseItems::create([
          'purchase_id' => $purchase->id,
          'product_id' => $products->id,
          'quantity' => $products->stock,
          'cost_price' => $products->price
        ]);

        $inventory_logs = InventoryLogs::create([
          'product_id' => $products->id,
          'user_id' => $user->id,
          'change_type' => 'added',
          'quantity' => $products->stock
        ]);

      });

      // $request->validate([
      //   'name' => 'required',
      //   'category_id' => 'required',
      //   'supplier_id' => 'required',
      //   'sku' => 'required',
      //   'stock' => 'required',
      //   'price' => 'required'
      // ]);

      // Products::create($request->all());

      return redirect()->route('pages.products.view')->with('success','Product added successfully');
    }
}
