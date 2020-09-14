<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function users(){
       return view('admin/users/users');
   }

    public function index(){
        return view('admin/users/index');
    }
}
