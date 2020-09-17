<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasedController extends Controller
{
    public function add(){
    	return view("admin.based.based");
    }
    public function index(){
    	return view("admin.based.index");
    }
}
