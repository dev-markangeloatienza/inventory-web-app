<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PurchaseItems;
use App\Models\Purchases;
use App\Models\Products;

class PurchaseItemController extends Controller
{
    //

    public function store(Request $request){
      DB::transaction(function() use($request){
        $purchase = Purchases::create([
          'supplier_id' => $request->supplier_id,
          'total_cost' => $request->cost_price * $request->quantity,
          'purchase_date' => now()
        ]);

        $purchase_items = PurchaseItems::create([
          'purchase_id' => $purchase->id,
          'product_id' => $request->product_id,
          'quantity' => $request->quantity,
          'cost_price' => $request->cost_price
        ]);

        $products = Products::where('id',$request->product_id)->update([
          'stock' => $purchase_items->quantity + $request->current_stock
        ]);

      });

              
      return redirect()->route('pages.product.view',[
        'id' => $request->product_id
      ])->with('success','Purchase added successfully');

    }
}
