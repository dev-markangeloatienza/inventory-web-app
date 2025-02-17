<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;
use App\Models\Products;
use App\Models\SaleItems;
use App\Models\InventoryLogs;

class SalesController extends Controller
{
    //
    public function index(){
      $salesItems = SaleItems::with('product','sale','sale.user')->orderBy('created_at','desc')->paginate('10');

      return view('pages.sales-view',['sales' =>$salesItems ]);
    }

    public function store(Request $request){
      DB::transaction(function() use($request){
        $products = Products::where([
          'id' => $request->product_id
        ])->update([
          'stock' => $request->current_stock - $request->quantity,
        ]);

        $sales = Sales::create([
          'user_id' => Auth::user()->id,
          'total_price' => $request->cost_price * $request->quantity,
          'sale_date' => now(),
        ]);

        $sales_items = SaleItems::create([
          'sale_id' => $sales->id,
          'product_id' => $request->product_id,
          'quantity' => $request->quantity,
          'price' => $request->cost_price
        ]);

        $inventory_logs = InventoryLogs::create([
          'product_id' => $request->product_id,
          'user_id' => Auth::user()->id,
          'change_type' => 'sold',
          'quantity' => $request->quantity
        ]);

      });


      return redirect()->route('pages.sales.view')->with('success','Product sold successfully');
    }
}
