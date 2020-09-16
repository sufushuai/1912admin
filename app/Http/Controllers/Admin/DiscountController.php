<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function discount(){
    	return view("admin.discount.discount");
    }
    public function index(){
    	return view("admin.discount.index");
    }
}
