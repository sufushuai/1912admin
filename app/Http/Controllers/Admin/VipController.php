<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VipModel;
class VipController extends Controller
{
     public function vip(){
    	return view("admin.vip.vip");
    }
    
    public function uploads(){
    	$fileinfo=$_FILES['Filedata'];
	    // dd($fileinfo);
	    $tmpname=$fileinfo['tmp_name'];
	    $ext=explode(".", $fileinfo['name'])[1];
	    // dd($ext);
	    $newFile=md5(uniqid()).".".$ext;
	    $newFilePath="./uploads/".Date("Y/m/d",time());
	    if(!is_dir($newFilePath)){
	      mkdir($newFilePath,777,true);
	    }
	    // dd($newFilePath);
	    $newFilePath=$newFilePath.$newFile;
	    // dd($newFilePath);

	    move_uploaded_file($tmpname,$newFilePath);
	    $newFilePath=Ltrim($newFilePath,".");
	        // dd($newFilePath);

	    echo $newFilePath;

    }
    public function adddo(){
    	$vipmodel=new VipModel;
    	$vipmodel->vip_name=request()->vip_name;
    	$vipmodel->vip_logo=request()->vip_logo;
    	$vipmodel->add_time=time();
    	$result=$vipmodel->save();
    	if($result){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }
    	// dd($result);
    }


     public function index(){
        $vip_name = request()->vip_name;
        $where=[];
        if($vip_name){
            $where[]=['vip_name','like',"%$vip_name%"];
        }

     	$vipModel=new vipModel;
     	$data=$vipModel->where($where)->paginate(2);
         $query=request()->all();
     	// dd($data);
    	return view("admin.vip.index",['data'=>$data,'query'=>$query]);
    }

    public function del(){
        $vip_id = request()->vip_id;
        // dd($vip_id);
        $res = VipModel::destroy($vip_id);
        // dd($res);
        if($res){
            return['code'=>'0','msg'=>"成功"];
        }else{
            return['code'=>'1','msg'=>"失败"];
        }
    }

     public function bdel(){
        $id=request()->id;
        // dd($id);
        $id=explode(",",$id);
        // dd($id);
        foreach($id as $k=>$v){
            $res = VipModel::destroy($v);      
        }
      
        // dd($res);
        if($res){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }

    }


    public function update($id){
        $data = VipModel::where('vip_id',$id)->first();
        return view('admin.vip.update',['data'=>$data]);
    }
    public function updatedo(){
        $vip_id = request()->post('vip_id');
        $vip_name = request()->post('vip_name');
        $vip_logo=request()->post('vip_logo');
        $data = [
            'vip_id'=>$vip_id,
            'vip_name'=>$vip_name,
            'vip_logo'=>$vip_logo,
            'add_time'=>time(),
        ];
        $res = vipModel::where('vip_id',$vip_id)->update($data);
        // dd($res);
        if($res){
                return['code'=>'0','mag'=>"修改成功"];
            }else{
                return['code'=>'1','mag'=>"修改失败"];
        }
    }
}
