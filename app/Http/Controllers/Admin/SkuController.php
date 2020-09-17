<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SkuAttr;
use App\Model\SkuVal;

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
            //dd($val_name);
            $first=SkuVal::where('val_name','=',$val_name)->first();
            if($first){
                return json_encode(['error'=>2,'msg'=>'属性值已存在']);
            }

            $where= [
                'val_name'=>$val_name,
                'add_time'=>time()
            ];

            $res=SkuVal::create($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'添加成功']);
            }
            return json_encode(['error'=>1,'msg'=>'添加失败']);
        }
    	return view("admin.sku.val");
    }
    //属性值展示
     public function valindex(){
         $val=SkuVal::where(['is_del'=>1])->get();

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

            $where= [
                'val_name'=>$val_name,
                'up_time'=>time()
            ];

            $res=SkuVal::where('val_id',$id)->update($where);

            if($res){
                return json_encode(['error'=>0,'msg'=>'修改成功']);
            }
            return json_encode(['error'=>1,'msg'=>'修改失败']);
        }

        $data=SkuVal::where('val_id',$id)->first();
        return view("admin.sku.valUp",['data'=>$data]);
    }


    //属性添加
    public function sku(){
    	return view("admin.sku.sku");
    }
    //属性展示
    public function skuindex(){
    	return view("admin.sku.skuindex");
    }

}
