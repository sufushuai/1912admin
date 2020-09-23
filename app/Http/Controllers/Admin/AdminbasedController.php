<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\RbacRole;
use App\Model\RbacBased;
use App\Model\RbacRoleBased;

class AdminbasedController extends CommonController
{
    //角色权限添加页面
    public function adminbased($id){
        $role = RbacRole::get();
        $based = RbacBased::get();
        return view('admin.adminbased.adminbased',['role'=>$role,"based"=>$based]);
    }
    //角色权限添加实现
    public function add(){
        $role_id = request()->post("role_id");
        $based_id = request()->post("based_id");
        foreach ($based_id as $k=>$v){
            $data = [
                "role_id" => $role_id,
                "based_id" => $v,
                "c_time" => time()
            ];
            $res = RbacRoleBased::insert($data);
        }
        if($res){
            return $this->success();
        }else{
            return $this->error("添加失败");
        }
    }
    //角色权限展示
    public function index(){
        $data = RbacRole::get();
        foreach($data as $k=>$v){
            $role_id = RbacRoleBased::where('role_id',$v->role_id)->get();
            // dd($admin_id);
            foreach($role_id as $kk=>$vv){
                $based = RbacBased::where("based_id",$vv->based_id)->first();
                $data[$k]["res"].= $based->based_name.",";
            }
        }
        return view('admin.adminbased.index',['data'=>$data]);
    }
}
