<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierCollection;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //

    public function index(){

        return new SupplierCollection( Supplier::orderBy("id","asc")->paginate(10));
    }
}
