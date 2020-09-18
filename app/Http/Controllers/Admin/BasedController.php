<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RbacBased;

class BasedController extends Controller
{
    /**
     * 权限节点的添加方法
     */
    public function add(Request $request)
    {
        $based_model = new RbacBased();
        $where = [['pid', '=', 0]];
        $res = $based_model->where($where)->get();
        return view('admin.based.based', ['res' => $res]);
    }

    /**
     * 权限节点执行添加
     */
    public function do_add(Request $request)
    {

        $based_model = new RbacBased();

        $based_model->based_name = $request->post('based_name');
        $based_model->pid = $request->post('pid')??'';
        $based_model->url = $request->post('url');
        $based_model->status = $request->post('status');
        if ($based_model->save()) {
            return [
                'status' => 200,
                'msg' => 'success'
            ];
        } else {
            return [
                'status' => 1,
                'msg' => 'fail'
            ];
        }
    }

    /**
     * 权限节点的列表
     */
    public function index(){
        $based_name = request()->based_name;
        $where=[];
        if($based_name){
            $where[]=['based_name','like',"%$based_name%"];
        }
        $data=RbacBased::where($where)->paginate(3);
        $query = request()->all();
        if($data){
            return view('admin.based.index',['data'=>$data,'query'=>$query]);
        }
    }

    /**
     * 权限节点列表删除
     */
    public function del(){
        $request=request();
        $based_id=$request->post('based_id');
        $res=RbacBased::where('based_id',$based_id)->delete();
        if($res){
            return [
                'status' => 200,
                'msg' => 'success'
            ];
        } else {
            return [
                'status' => 1,
                'msg' => 'fail'
            ];
        }
    }

    /**
     * 权限节点列表修改
     */
    public function edit($based_id){
        $request=request();
        $based_model = new RbacBased();
        $where = [
            'pid'=> 0
        ];
        $res = $based_model->where($where)->get();
        $based_Info=$based_model->where(["based_id"=>$based_id])->first();
        return view('admin.based.edit',['based_Info'=>$based_Info,'res'=>$res]);
    }
    /**
     * 权限节点列表执行修改
     */
    public function update(Request $request){
        $based_id=$request->post('based_id');
        $based_name=$request->post('based_name');
        $pid=$request->post('pid');
        $url=$request->post('url');
        $data=[
            'based_name'=>$based_name,
            'pid'=>$pid,
            'url'=>$url
        ];
        $res=RbacBased::where(["based_id"=>$based_id])->update($data);

        if($res!==false){
            return $this->response(200,'success');
        }else{
            return $this->response(1,'fail');
        }
    }
    /**
     * @return array
     * 批量删除
     */
    public function bdel(){
        $based_id=request()->post('strIds');
        $res=RbacBased::destroy($based_id);
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }
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
