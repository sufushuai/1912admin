<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand(){
    	return view("admin.brand");
    }
     public function index(){
    	return view("admin.brandlist");
    }
}
