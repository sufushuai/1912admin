<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\Brand;

class BrandController extends CommonController
{
    //品牌添加页面
    public function brand(){
    	return view("admin.brand.brand");
    }
    //品牌添加
    public function add(Request $request){
        $brand_name = request()->post("brand_name");
        $brand_logo = request()->post("brand_logo");
        $data= [
            "brand_name"=>$brand_name,
            "brand_logo"=>$brand_logo,
            "create_time"=>time()
        ];
        $res = Brand::insert($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("添加失败");
        }
    }
    //文件上传
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
    //品牌展示
     public function index(){
         $name = request()->name;
         $where=[];
         if($name){
             $where[] = ['brand_name','like',"%$name%"];
         }
        $data = Brand::where($where)->where(["status"=>1])->paginate(5);
         $query = request()->all();
    	return view("admin.brand.index",['data'=>$data,"query"=>$query]);
    }
    //品牌修改页面
    public function edit(Request $request){
        $brand_id = request()->post('brand_id');
        $brand = Brand::where('brand_id',$brand_id)->first();
        return view('admin.brand.edit',['brand'=>$brand]);
    }
    //品牌修改
    public function update(){
        $brand_name = request()->post("brand_name");
        $brand_logo = request()->post("brand_logo");
        $brand_id = request()->post('brand_id');
        $data= [
            "brand_name"=>$brand_name,
            "brand_logo"=>$brand_logo,
            "brand_id"=>$brand_id,
        ];
        $res = Brand::where('brand_id',$brand_id)->update($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("修改失败");
        }
    }
    //品牌删除
    public function destroy(){
        $brand_id = request()->post('brand_id');
        $res = Brand::where('brand_id',$brand_id)->update(["status"=>2]);
        if($res){
            return $this->success();
        }else{
            return $this->error("删除失败");
        }
    }
}
