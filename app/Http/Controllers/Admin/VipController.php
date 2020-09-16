<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VipController extends Controller
{
     public function vip(){
    	return view("admin.vip.vip");
    }
     public function index(){
    	return view("admin.vip.index");
    }
}
