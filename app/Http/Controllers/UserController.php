<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
