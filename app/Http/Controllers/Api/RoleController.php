<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleCollection;
use Illuminate\Http\Request;
use App\Models\Roles;

class RoleController extends Controller
{
    //

    public function index(){

      return new RoleCollection(Roles::orderBy('name','asc')->paginate('10'));
    }
}
