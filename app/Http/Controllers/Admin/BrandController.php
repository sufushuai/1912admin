<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;

class BrandController extends Controller
{
    public function brand(){
    	return view("admin.brand.brand");
    }
    public function add(Request $request){
        $brand_name = request()->post("brand_name");
        $brand_logo = request()->post("brand_logo");
        $data= [
            $brand_name,$brand_logo
        ];
        $res = Brand::create($data);
        if($res){

        }
    }
    public function brandimg(Request $request){
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext = explode(".",$arr['name'])[1];
        $newFileName = md5(time()).".".$ext;
        $newFilePath = "./uploads/".$newFileName;
        move_uploaded_file($tmpName,$newFilePath);
        $newFilePath = trim($newFilePath,".");
        echo $newFilePath;
    }
     public function index(){
    	return view("admin.brand.index");
    }
}
