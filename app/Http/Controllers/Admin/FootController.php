<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FootModel;

class FootController extends Controller
{
    public function foot(){
    	return view("admin.foot.foot");
    }

    public function adddo(){
    	$footModel = new FootModel;
    	$footModel->f_name=request()->f_name;
    	$footModel->f_url=request()->f_url;
    	$res = $footModel->save();
    	if($res){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }
    }
    public function index(){
    	$data = FootModel::get();
    	// dd($data);
    	return view("admin.foot.index",['data'=>$data]);
    }

    public function  del(){
    	$foot_id = request()->foot_id;
    	// dd($foot_id);
    	$res = FootModel::destroy($foot_id);
    	if($res){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }
    }

    public function update($id){
    	$data = FootModel::where('foot_id',$id)->first();
    	return view('admin.foot.update',['data'=>$data]);
    }

    public function updatedo(){
    	$foot_id=request()->post('foot_id');
    	$f_name=request()->post('f_name');
    	$f_url=request()->post('f_url');
    	 $data = [
            'foot_id'=>$foot_id,
            'f_name'=>$f_name,
            'f_url'=>$f_url,
        ];
        $res = FootModel::where('foot_id',$foot_id)->update($data);
        // dd($res);
        if($res){
                return['code'=>'0','mag'=>"修改成功"];
            }else{
                return['code'=>'1','mag'=>"修改失败"];
        }
    }
}
