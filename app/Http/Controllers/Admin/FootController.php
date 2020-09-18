<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FootController extends Controller
{
    public function foot(){
    	return view("admin.foot.foot");
    }
    public function index(){
    	return view("admin.foot.index");
    }
}
