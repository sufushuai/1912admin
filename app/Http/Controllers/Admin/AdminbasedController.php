<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RbacUser;
use App\Model\RbacRole;
use App\Model\RbacBased;
use App\Model\RbacRoleBased;

class AdminbasedController extends Controller
{
    public function adminbased($id){
        $role = RbacRole::get();
        $based = RbacBased::get();
        return view('admin.adminbased.adminbased',['role'=>$role,"based"=>$based]);
    }
    public function add(){
        $based_id = request()->post("based_id");
        $role_id = request()->post("role_id");
        $data = [
            "based_id" => $based_id,
            "role_id" => $role_id
        ];
        dd($data);
    }
}
