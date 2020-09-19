<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ADModel;

class AdController extends Controller
{
    public function ad(){
        if(request()->ajax()&&request()->post()){
            //dd(request()->post());
            $ad_name=request()->post('ad_name');
            $ad_desc=request()->post('ad_desc');
            $ad_url=request()->post('ad_url');
            $first=ADModel::where('ad_name',$ad_name)->first();
            //dd($first);
            if($first){
                return json_encode(['error'=>2,'msg'=>'广告名已存在']);
            }
            $where=[
                'ad_name'=>$ad_name,
                'ad_desc'=>$ad_desc,
                'ad_url'=>$ad_url,
                'add_time'=>time()
            ];
            //dd($where);
            $res=ADModel::insert($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            }
            return json_encode(['error'=>1,'msg'=>'添加失败']);
        }
    	return view("admin.ad.ad");
    }

    public function index(){
        $data=ADModel::where(['is_del'=>1])->paginate(5);
    	return view("admin.ad.index",['data'=>$data]);
    }
    //删除
    public function adDel($id){

        $del=ADModel::destroy($id);
        if($del){
            return redirect('/admin/ad/index');
        }
    }
    //修改
    public function adUp(){
        if(request()->ajax()&&request()->post()){
            //dd(request()->post());
            $ad_name=request()->post('ad_name');
            $ad_desc=request()->post('ad_desc');
            $ad_url=request()->post('ad_url');
//            $first=ADModel::where('ad_name',$ad_name)->first();
//            //dd($first);
//            if($first){
//                return json_encode(['error'=>2,'msg'=>'广告名已存在']);
//            }
            $where=[
                'ad_name'=>$ad_name,
                'ad_desc'=>$ad_desc,
                'ad_url'=>$ad_url,
                'add_time'=>time()
            ];
            //dd($where);
            $res=ADModel::where($where)->update();

            if($res){
                return json_encode(['error'=>0,'msg'=>'修改成功']);
            }
            return json_encode(['error'=>1,'msg'=>'修改失败']);
        }
        return view("admin.ad.adUp");
    }
    //批量删除
    public function allDel(){

    }
}
