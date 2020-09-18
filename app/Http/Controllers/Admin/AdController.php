<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function ad(){
    	return view("admin.ab.ab");
    }

    public function index(){
    	return view("admin.ab.index");
    }
}
