<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RbacUser;

class LoginController extends Controller
{
    public function login(){
        return view('users/login');
    }

    public function logindo(Request $request){

        $admin_name=$request->post('admin_name');
        $password=$request->post('password');
        if(empty($admin_name)|empty($password)){
            return response(['error'=>1,'msg'=>'不能为空']);
        }
        $user=RbacUser::where('admin_name','=',"$admin_name")->first();
        if($user){
            if($password!=$user['password']){
                return response(['error'=>2,'msg'=>'密码错误']);
            }
                session(['user'=>$user]);
                return redirect('admin/index');
        }
        return response(['error'=>3,'msg'=>'用户不存在']);
    }
}
