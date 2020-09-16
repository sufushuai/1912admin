<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function goods(){
    	return view("admin.goods.goods");
    }
    public function index(){
    	return view("admin.goods.index");
    }
}
