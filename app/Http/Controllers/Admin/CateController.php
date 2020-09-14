<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function category(){
    	return view("admin.category");
    }
    public function index(){
    	return view("admin.cateindex");
    }
}
