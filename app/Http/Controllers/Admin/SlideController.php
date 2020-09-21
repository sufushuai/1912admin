<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SlideModel;

class SlideController extends Controller
{
    /**
     * 轮播图添加
     */
    public function add(){
        return view("admin.slide.add");
    }
    /**
     * 轮播图执行添加
     */
    public function do_add(Request $request){
        $slide_url = request()->post("slide_url");
        $slide_weight = request()->post("slide_weight");
        $is_show = request()->post("is_show");
        $slide_log = request()->post("slide_log");
        //dd($is_show);die;

        $data = [
            "slide_url"=>$slide_url,
            "slide_weight"=>$slide_weight,
            "is_show"=>$is_show,
            "slide_log"=>$slide_log,
        ];

        $res = SlideModel::insert($data);
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }
    }
    //文件上传
    public function slideimg(Request $request){
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext = explode(".",$arr['name'])[1];
        $newFileName = md5(time()).".".$ext;
        $newFilePath = "./uploads/".$newFileName;
        move_uploaded_file($tmpName,$newFilePath);
        $newFilePath = trim($newFilePath,".");
        echo $newFilePath;
    }
    /**
     * 轮播图展示
     */
    public function index(){
        $data = SlideModel::get();
        return view("admin.slide.index",['data'=>$data]);
    }
    protected function response($errno,$msg,$data=[]){
        $arr=[
            'errno'=>$errno,
            'msg'=>$msg,
            'data'=>$data,
        ];
        return $arr;
    }
}
