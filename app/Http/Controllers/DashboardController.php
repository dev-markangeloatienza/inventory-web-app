<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\InventoryLogs;
use App\Models\Products;
use App\Models\SaleItems;

class DashboardController extends Controller
{
    //
    public function index(){
        $products = Products::orderBy('created_at','desc')->paginate('6');
        $inventoryLogs = InventoryLogs::with('user')->orderBy('created_at','desc')->paginate('20');
        $saleItems = SaleItems::with('product','sale','sale.user')->orderBy('created_at','desc')->paginate('6');

        return view('pages.dashboard',[
            'data'=> [
              'products' =>$products,
              'inventory_logs' => $inventoryLogs,
              'sale_items' => $saleItems
            ]
        ]);
    }
}
