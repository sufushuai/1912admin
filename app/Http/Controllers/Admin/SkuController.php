<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function attr(){
    	return view("admin.sku.attr");
    }

    public function index(){
    	return view("admin.sku.attrIndex");
    }

    public function val(){
    	return view("admin.sku.val");
    }
     public function valindex(){
    	return view("admin.sku.valindex");
    }
    public function sku(){
    	return view("admin.sku.sku");
    }
    public function skuindex(){
    	return view("admin.sku.skuindex");
    }

}
