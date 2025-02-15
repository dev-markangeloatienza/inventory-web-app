<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RoleController extends Controller
{
    //

    public function index(){
        $roles = Roles::all();

        return view('pages.roles',['roles'=>$roles]);
    }
}
