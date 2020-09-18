<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\DiscountModel;

class DiscountController extends Controller
{
    public function discount(){
    	$data = GoodsModel::get();
    	// dd($data);
    	return view("admin.discount.discount",['data'=>$data]);
    }

    public function adddo(){

    	$goods_id = request()->post('goods_id');
    	$money = request()->post('money');
        $time_out = request()->post('time_out');
        // dd($time_out);
    	
    	$data = [
    		'goods_id'=>$goods_id,
    		'money'=>$money,
            'time_out'=>strtotime($time_out),
    	];
    	// dd($data);
    	$DisModel = new DiscountModel;
    	$DisModel->goods_id=$data['goods_id'];
    	$DisModel->money=$data['money'];
    	$DisModel->add_time=time();
    	$DisModel->time_out=$data['time_out'];
    	$res = $DisModel->save();
    	
    	// dd($res);
    	if($res){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }
    
    	
    }
    public function index(){
    	$data=DiscountModel::leftjoin('shop_goods','shop_discount.goods_id','=','shop_goods.goods_id')->orderBy("dis_id","asc")->get();
    	// dd($data);
    	return view("admin.discount.index",['data'=>$data]);
    }

    public function del(){
    	$dis_id=request()->dis_id;
    	// dd($dis_id);
    	$res = DiscountModel::destroy($dis_id);
    	// dd($res);
    	if($res){
            return['code'=>'0','mag'=>"成功"];
        }else{
            return['code'=>'1','mag'=>"失败"];
        }

    }

    public function update($id){
    	$data = DiscountModel::where('dis_id',$id)->first();
    	// dd($data);
    	$datas = GoodsModel::get();
    	return view('admin.discount.update',['data'=>$data,'datas'=>$datas]);
    }

    public function updatedo(){
        $goods_id=request()->post('goods_id');
        $dis_id = request()->post('dis_id');
        $time_out = request()->post('time_out');
        //dd($dis_id);
        $money = request()->post('money');
        
        $data = [
            'goods_id'=>$goods_id,
            'money'=>$money,
            'add_time'=>time(),
            'time_out'=>strtotime($time_out),
        ];
        $where=[
            ['dis_id','=',$dis_id]
        ];
        $DisModel = new DiscountModel;
        $res = DiscountModel::where($where)->update($data);
        //dd($res);
           if($res){
                return['code'=>'0','mag'=>"修改成功"];
            }else{
                return['code'=>'1','mag'=>"修改失败"];
            }
         }
}
