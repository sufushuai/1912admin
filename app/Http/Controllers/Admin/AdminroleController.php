<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\RbacUser;
use App\Model\RbacRole;
use App\Model\RbacAdminRole;

class AdminroleController extends CommonController
{
    //用户角色添加页面
    public function adminrole($id){
        $admin = RbacUser::find($id);
        $role = RbacRole::get();
        return view('admin.adminrole.adminrole',['admin'=>$admin,"role"=>$role]);
    }
    //用户角色添加实现
    public function add(){
        $admin_id = request()->post("admin_id");
        $role_id = request()->post("role_id");
        foreach ($role_id as $k=>$v){
            $data = [
                "admin_id" => $admin_id,
                "role_id" => $v,
                "c_time" => time()
            ];
            if(!empty($data)){
                $first=RbacAdminRole::where($data)->first();
                if($first){
                    return $this->error("角色已存在");
                }
                $res = RbacAdminRole::insert($data);
            }
        }
        if($res){
            return $this->success();
        }else{
            return $this->error("添加失败");
        }
    }
    //用户角色展示
    public function index(){
//        foreach($data as $k=>$v) {
//            $arr[] = $v['role_id'];
//            $arr1[] = $v['admin_id'];
//        }
//        $adminrole = RbacAdminRole::leftjoin('rbac_role','rbac_admin_role.role_id','=','rbac_role.role_id')
//            ->leftjoin('rbac_admin','rbac_admin_role.admin_id','=','rbac_admin.admin_id')
//            ->wherein('rbac_admin.admin_id',$arr1)
//            ->wherein('rbac_role.role_id',$arr)->get();
//        $str='';
//        $arr=[];
//        foreach($adminrole as $k=>$v){
//            $str.=$v['role_name'].',';
//            $arr[$k][]=$v['admin_name'];
//            $arr[$k][]=$str;
//            dd($arr);
//            foreach ($arr as $key=>$val){
//                $arr1=$val;
//            }
//        }

//        return view('admin.adminrole.index',['adminrole'=>$adminrole]);
        $data = RbacUser::get();
        foreach($data as $k=>$v){
            $admin_id = RbacAdminRole::where('admin_id',$v->admin_id)->get();
           // dd($admin_id);
            foreach($admin_id as $kk=>$vv){
                $role = RbacRole::where("role_id",$vv->role_id)->first();
                $data[$k]["res"].= $role->role_name.",";
            }
        }
        return view('admin.adminrole.index',['data'=>$data]);
    }
}
