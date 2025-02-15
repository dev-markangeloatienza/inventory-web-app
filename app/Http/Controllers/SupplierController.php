<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    //

    public function index(){
        $suppliers = Supplier::orderBy('name','asc')->paginate('10');

        return view('pages.suppliers',['suppliers'=>$suppliers]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);

        Supplier::create($request->all());

        return redirect()->route('pages.suppliers')->with('success','Supplier added successfully');
    }
}
