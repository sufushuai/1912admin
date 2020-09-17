<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand(Request $request){
        $res = $request->all();
        //dd($res);
    	return view("admin.brand.brand");
    }
    public function brandimg(){
        echo 123;
    }
     public function index(){
    	return view("admin.brand.index");
    }
}
