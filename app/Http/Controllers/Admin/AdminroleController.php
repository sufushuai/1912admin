<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\RbacUser;
use App\Model\RbacRole;
use App\Model\RbacBased;
use App\Model\RbacAdminRole;

class AdminroleController extends CommonController
{
    public function adminrole($id){
        $admin = RbacUser::find($id);
        $role = RbacRole::get();
        return view('admin.adminrole.adminrole',['admin'=>$admin,"role"=>$role]);
    }
    public function add(){
        $admin_id = request()->post("admin_id");
        $role_id = request()->post("role_id");
        $data = [
          "admin_id" => $admin_id,
          "role_id" => $role_id
        ];
        $res = RbacAdminRole::insert($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("添加失败");
        }
    }
    public function admin_based(){
        return view('admin.rbac.admin_based');
    }
}
