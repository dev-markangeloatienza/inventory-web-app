<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        // $users = User::orderBy('created_at', 'desc')->get();

        return view('pages.users');
    }

    public function show($id){
        $users = User::orderBy('created_at', 'desc')->findOrFail($id);

        return view('pages.users',['users'=>$users]);
    }

}
