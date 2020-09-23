<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\SkuAttr;
use App\Model\SkuVal;
use App\Model\SkuAttrVal;

class SkuController extends Controller
{
    //属性名添加
    public function attr(request $request){
        if($request->ajax()&&$request->post()){
            $attr_name=$request->post('attr_name');
            $first=SkuAttr::where('attr_name','=',$attr_name)->first();
            if($first){
                return json_encode(['error'=>2,'msg'=>'属性名已存在']);
            }

            $where= [
                'attr_name'=>$attr_name,
                'add_time'=>time()
            ];

            $res=SkuAttr::create($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            }
            return json_encode(['error'=>1,'msg'=>'添加失败']);
       }
    	return view("admin.sku.attr");
    }
    //属性名展示
    public function index(){
        $attr=SkuAttr::where(['is_del'=>1])->get();
    	return view("admin.sku.attrIndex",['attr'=>$attr]);
    }
    //属性名删除
    public function attrDel($id){
       // dd($id);
        $where=[
            'is_del'=>2
        ];
        $del=SkuAttr::where('attr_id',$id)->update($where);
        if($del){
            return redirect('/admin/sku/attrIndex');
        }
    }
    //属性名编辑
    public function attrUp(request $request,$id){
        if(request()->ajax()&&$request->post()){
            $attr_name=$request->post('attr_name');

            $where= [
                'attr_name'=>$attr_name,
                'up_time'=>time()
            ];

            $res=SkuAttr::where('attr_id',$id)->update($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'修改成功']);
            }
            return json_encode(['error'=>1,'msg'=>'修改失败']);
        }

        $data=SkuAttr::where('attr_id',$id)->first();
        return view("admin.sku.attrUp",['data'=>$data]);
    }

    //属性值添加
    public function val(request $request){
        if($request->ajax()&&$request->post()){
            $val_name=$request->post('val_name');
            $attr_id=$request->post('attr_id');
            //dd($val_name);
            $first=SkuVal::where('val_name','=',$val_name)->first();
            if($first){
                return json_encode(['error'=>2,'msg'=>'属性值已存在']);
            }

            $data= [
                'val_name'=>$val_name,
                'attr_id'=>$attr_id,
                'add_time'=>time()
            ];

            $res=SkuVal::create($data);

            if($res){
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            }
            return json_encode(['error'=>1,'msg'=>'添加失败']);
        }
        $skuattr=SkuAttr::where(["is_del"=>1])->get();
    	return view("admin.sku.val",compact("skuattr"));
    }
    //属性值展示
     public function valindex(){
         $val=SkuVal::where(['is_del'=>1])->paginate(5);

    	 return view("admin.sku.valindex",['val'=>$val]);
    }
    //属性值删除
    public function valDel($id){
        // dd($id);
        $where=[
            'is_del'=>2
        ];
        $del=SkuVal::where('val_id',$id)->update($where);
        if($del){
            return redirect('/admin/sku/valIndex');
        }
    }
    //属性值编辑
    public function valUp(request $request,$id){
        if(request()->ajax()&&$request->post()){
            $val_name=$request->post('val_name');
            $attr_id=$request->post('attr_id');

            $where= [
                'val_name'=>$val_name,
                'attr_id'=>$attr_id,
                'up_time'=>time()
            ];

            $res=SkuVal::where('val_id',$id)->update($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'修改成功']);
            }
            return json_encode(['error'=>1,'msg'=>'修改失败']);
        }

        $data=SkuVal::where('val_id',$id)->first();
        $skuattr=SkuAttr::where(["is_del"=>1])->get();
        return view("admin.sku.valUp",['data'=>$data,'skuattr'=>$skuattr]);
    }


    public  function CartesianProduct($sets){
        // 循环遍历集合数据
        $result = array();
        for($i=0,$count=count($sets); $i<$count-1; $i++){
            // 初始化
            if($i==0){
                $result = $sets[$i];
            }
            // 保存临时数据
            $tmp = array();
            // 结果与下一个集合计算笛卡尔积
            foreach($result as $res){
                foreach($sets[$i+1] as $set){
                    $tmp[] =    $res.','.$set;
                }
            }
//            // 将笛卡尔积写入结果
            $result = $tmp;

        }
        return $result;
    }


    //属性添加
    public function sku(request $request){
        if($request->ajax()&&$request->post()){

            $goods_id=$request->post('goods_id');
//            $goods_id=[$goods_id];
            $sku=$request->except('goods_id');
            foreach ($sku as $k=>$v) {
                $sku1[]=$v;
            }
//            dd($sku1);
           $car=$this->CartesianProduct($sku1);
            foreach ($car as $k1=>$v1) {
                $arr[$k1]['sku']=$v1;
                $arr[$k1]['goods_id']=$goods_id;
                $arr[$k1]['add_time']=time();
            }
//            dd($arr);
            $attr_val=SkuAttrVal::insert($arr);
            if($attr_val){
                return json_encode(["code"=>200,'msg'=>"添加成功"]);
            }else{
                return json_encode(["code"=>100,'msg'=>"添加失败"]);
            }

        }
        $goods=GoodsModel::where(['is_show'=>1])->get();
        $attr=SkuAttr::where(['is_del'=>1])->get();
        $val=SkuVal::leftjoin("sku_attr","sku_attr.attr_id","=","sku_val.attr_id")->get();

    	return view("admin.sku.sku",['attr'=>$attr,'val'=>$val,'goods'=>$goods]);
    }
    //属性展示
    public function skuindex(Request $request){
        $val_info=SkuAttrVal::select('sku')->get()->toArray();
        foreach($val_info as &$v){
            $v['sku']=explode(',',$v['sku']);
            $arr[]=SkuVal::whereIn('val_id',$v['sku'])->get()->toArray();
        }

        $val=SkuAttrVal
            ::leftjoin("shop_goods","shop_goods.goods_id","=","sku_attr_val.goods_id")
            ->orderby('attr_val_id','desc')
            ->get()
            ->toArray();
        foreach ($val as $k=>&$v) {
            $v['sku']=explode(',',$v['sku']);
            foreach ($arr as $v1) {
                foreach ($v1 as $v2) {
                    if(in_array($v2['val_id'],$v['sku'])){
                        $v['sku2'][]=$v2['val_name'];
                    }
                }
            }
            $v['sku2']=array_unique($v['sku2']);
            $v['sku2']=implode(',',$v['sku2']);
        }
        return view("admin.sku.skuindex",compact("val"));
    }

    //属性编辑
    public function skuUp(request $request){

        $attr_val_id=$request->post("attr_val_id");
        $goods_num=$request->post("goods_num");
        $goods_price=$request->post("goods_price");

        $data=[
            "goods_num"=>$goods_num,
            "goods_price"=>$goods_price
        ];
        $res=SkuAttrVal::where(["attr_val_id"=>$attr_val_id])->update($data);
        if($res){
            return json_encode(["code"=>200,'msg'=>"修改成功"]);
        }else{
            return json_encode(["code"=>100,'msg'=>"修改失败"]);
        }
    }


}
