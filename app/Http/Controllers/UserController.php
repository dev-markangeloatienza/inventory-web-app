<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use App\Models\InventoryLogs;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::with('role')->orderBy('created_at','desc')->paginate('10');
        
        return view('pages.users-view',['users'=>$users]);
    }

    public function show($id){
        
        
        $inventoryLogs = InventoryLogs::with('product')->where('user_id',$id)->orderBy('created_at','desc')->paginate('5');

        $user = User::with('role')->orderBy('created_at', 'desc')->findOrFail($id);

        return view('pages.user-view',[
            'data'=> [
              'user' =>$user,
              'inventory_logs' => $inventoryLogs
            ]
          
        ]);

    }

    public function create(){

        return view('pages.users-create');
    }

    public function store(Request $request) {
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role_id' => 'required'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id
      ]);

      return redirect()->route('pages.users.view')->with('success', 'User created successfully');
    }

}
