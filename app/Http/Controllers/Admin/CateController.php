<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CategoryModel;

class CateController extends CommonController
{
    /**
     *  添加页面
    */
    public function create(){
        $cateinfo=CategoryModel::get();
        $info=$this->getCateInfo($cateinfo);
    	return view("admin.cate.create",compact("info"));
    }
    /**
     *  添加逻辑
     */
    public function store(Request $request){
        $cate_name=$request->post("cate_name");
        $p_id=$request->post("p_id");
        $data=[
            "cate_name"=>$cate_name,
            "p_id"=>$p_id
        ];
        $res=CategoryModel::insert($data);
        if($res){
            return $this->success();
        }else{
            return  $this->error("添加失败");
        }
    }
    /**
     *  分类展示
     */
    public function index(){
        $cateinfo=CategoryModel::where(["status"=>1])->get();
        $info=$this->getCateInfo($cateinfo);

    	return view("admin.cate.index",compact("info"));
    }
    /**
     *  分类删除
     */
    public function delete(Request $request){
        $cate_id=$request->post("cate_id");
        $res=CategoryModel::where(["cate_id"=>$cate_id])->update(["status"=>2]);
        if($res){
            return $this->success();
        }else{
            return $this->error("删除失败");
        }
    }
    /**
     *  分类修改
     */
    public function edit(Request $request){
        $cate_id=$request->post("cate_id");
        $cateinfo=CategoryModel::get();
        $info=$this->getCateInfo($cateinfo);
        $edit_info=CategoryModel::where(["cate_id"=>$cate_id])->first();
        return view("admin.cate.edit",compact("edit_info","info"));
    }
    /**
     *  修改逻辑
     */
    public function update(Request $request){
        $cate_id=$request->post("cate_id");
        $cate_name=$request->post("cate_name");
        $p_id=$request->post("p_id");
        $data=[
            "cate_name"=>$cate_name,
            "p_id"=>$p_id
        ];
        $res=CategoryModel::where(["cate_id"=>$cate_id])->update($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("修改失败");
        }
    }
}
