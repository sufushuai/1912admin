<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\CategoryModel;
use App\Model\Brand;
use App\Model\GoodsModel;

class GoodsController extends CommonController
{
    //商品添加页面
    public function goods(){
        $brand = Brand::get();
        $cate = CategoryModel::get();
        $info=$this->getCateInfo($cate);
    	return view("admin.goods.goods",['brand'=>$brand,'info'=>$info]);
    }
    //商品添加
    public function add(Request $request){
        $goods_name = request()->post("goods_name");
        $cate_id = request()->post("cate_id");
        $brand_id = request()->post("brand_id");
        $goods_img = request()->post("goods_img");
        $goods_images = request()->post("goods_images");
        $goods_desc = request()->post("goods_desc");
        $goods_score = request()->post("goods_score");
        $is_show = request()->post("is_show");
        $is_hot = request()->post("is_hot");
        $is_on = request()->post("is_on");
        $is_new = request()->post("is_new");
        //dd($is_show);die;
        $data = [
            "goods_name"=>$goods_name,
            "cate_id"=>$cate_id,
            "brand_id"=>$brand_id,
            "goods_img"=>$goods_img,
            "goods_images"=>$goods_images,
            "goods_desc"=>$goods_desc,
            "goods_score"=>$goods_score,
            "is_show"=>$is_show,
            "is_hot"=>$is_hot,
            "is_on"=>$is_on,
            "is_new"=>$is_new,
        ];

        $res = GoodsModel::insert($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("添加失败");
        }
    }
    //文件上传
    public function goodsimg(Request $request){
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext = explode(".",$arr['name'])[1];
        $newFileName = md5(time()).".".$ext;
        $newFilePath = "./uploads/".$newFileName;
        move_uploaded_file($tmpName,$newFilePath);
        $newFilePath = trim($newFilePath,".");
        echo $newFilePath;
    }
    //商品展示
    public function index(){
        $name = request()->name;
        $where=[];
        if($name){
            $where[] = ['goods_name','like',"%$name%"];
        }
        $data = GoodsModel::where($where)->where(['is_del'=>1])->paginate(5);

        //$data = GoodsModel::where(['is_del'=>1],$where)->paginate(5);
        $query = request()->all();
    	return view("admin.goods.index",["data"=>$data,"query"=>$query]);
    }
    //商品修改页面
    public function edit(Request $request){
        $brand = Brand::get();
        $cate = CategoryModel::get();
        $info=$this->getCateInfo($cate);
        $goods_id = request()->post('goods_id');
        $goods = GoodsModel::where('goods_id',$goods_id)->first();
        return view('admin.goods.edit',['brand'=>$brand,'info'=>$info,'goods'=>$goods]);
    }
    //商品修改
    public function update(){
        $goods_name = request()->post("goods_name");
        $cate_id = request()->post("cate_id");
        $brand_id = request()->post("brand_id");
        $goods_img = request()->post("goods_img");
        $goods_images = request()->post("goods_images");
        $goods_desc = request()->post("goods_desc");
        $goods_score = request()->post("goods_score");
        $is_show = request()->post("is_show");
        $is_hot = request()->post("is_hot");
        $is_on = request()->post("is_on");
        $is_new = request()->post("is_new");
        $goods_id = request()->post("goods_id");
        //dd($is_show);die;
        $data = [
            "goods_name"=>$goods_name,
            "cate_id"=>$cate_id,
            "brand_id"=>$brand_id,
            "goods_img"=>$goods_img,
            "goods_images"=>$goods_images,
            "goods_desc"=>$goods_desc,
            "goods_score"=>$goods_score,
            "is_show"=>$is_show,
            "is_hot"=>$is_hot,
            "is_on"=>$is_on,
            "is_new"=>$is_new,
            "goods_id"=>$goods_id
        ];
        $res = GoodsModel::where('goods_id',$goods_id)->update($data);
        if($res){
            return $this->success();
        }else{
            return $this->error("修改失败");
        }
    }
    //商品删除
    public function destroy(){
        $goods_id = request()->post('goods_id');
        $res = GoodsModel::where('goods_id',$goods_id)->update(["is_del"=>2]);
        if($res){
            return $this->success();
        }else{
            return $this->error("删除失败");
        }
    }
}
