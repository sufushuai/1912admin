<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RbacUser;

class UserController extends Controller
{
    /**
     * 管理员添加
     */
    public function add(){
        return view('admin/users/users');
    }

    /**
     * @return array
     * 执行添加
     */
    public function score(){
        $admin_name = request()->input("admin_name");
        $password = request()->input("password");
        $where =[
            "admin_name"=>$admin_name,
            "password"=>$password
        ];
        $res=RbacUser::insert($where);
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示页面
     */
    public function index(){
        $data=RbacUser::get();
        return view('admin/users/index',compact('data'));
    }

    /**
     * @return array
     * 执行删除
     */
    public function del(){
        $admin_id=request()->post('admin_id');
        $where=[
            ['admin_id','=',$admin_id]
        ];
        $res=RbacUser::where($where)->delete();
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }
    }

    /**
     * @param $errno
     * @param $msg
     * @param array $data
     * @return array
     * 封装的ajax返回的方法
     */
    protected function response($errno,$msg,$data=[]){
        $arr=[
            'errno'=>$errno,
            'msg'=>$msg,
            'data'=>$data,
        ];
        return $arr;
    }

    /**
     * @param $admin_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示修改页面
     */
    public function edit($admin_id){
        $data=RbacUser::where('admin_id',$admin_id)->first();
        return view('admin/users/edit',compact('data'));
    }

    /**
     * @return array
     * 执行修改
     */
    public function update(){
        $admin_id=request()->post('admin_id');
        $admin_name=request()->post('admin_name');
//       echo $admin_id,$name,$status;die;
        $res=RbacUser::where('admin_id',$admin_id)->update(['admin_name'=>$admin_name]);
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }
    }
}
