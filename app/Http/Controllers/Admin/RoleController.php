<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RbacRole as RoleModel;
use App\Model\RbacBased as BasedModel;
use App\Model\RbacRoleBased as RodeNodeModel;

class RoleController extends Controller
{
    /**
     * 角色添加页面
     */
    public function create()
    {
        return view('admin.role.role');
    }
//    private function getAllPowerNode( )
//    {
//        $power_node_model = new BasedModel();
//
//        $where = [
//            [ 'status' , '=' , 1 ]
//        ];
//        $obj = $power_node_model -> where( $where ) -> get();
//
//        $power_node_list = collect( $obj ) -> toArray();
//
//        $all_node = [];
//        foreach( $power_node_list as $k => $v ){
//            if( $v['pid'] == 0 ){
//                $all_node[$v['based_id']] = $v;
//            }else{
//                $all_node[$v['pid']]['son'][] = $v;
//            }
//        }
//        return $all_node;
//    }
    /**
     * 角色添加
     */
    public function store(Request $request)
    {
        //角色表添加
        $role_name=$request->post("role_name");//接收角色名称
        $data=[
            "role_name"=>$role_name
        ];
        //角色和权限关联添加
        $based_id=$request->post("based_id");
        $res=RoleModel::insert($data);


        if($res){
//            foreach($based_id as $k=>$v){
//                $info=[
//                    "based_id"=>$v,
//                    "role_id"=>$res
//                ];
//                RodeNodeModel::insert($info);
//            }

            return $this->response(200,'ok');
        }else{
            die("添加失败");
        }
    }


    /**
     *角色展示
     */
    public function index(Request $request)
    {
        $role_name = request()->role_name;
        $where=[];
        if($role_name){
            $where[]=['role_name','like',"%$role_name%"];
        }
        $data=RoleModel::where($where)->where(["is_del"=>1])->paginate(3);
        $query = request()->all();
        return view("admin.role.index",compact("data","query"));
    }
    /**
     *       角色删除
     */
    public function del(){
        $request=request();
        $role_id=$request->post('role_id');
        $data=[
            "is_del"=>2
        ];
        $res=RoleModel::where('role_id',$role_id)->update($data);
        if($res){
//            RodeNodeModel::where('role_id',$role_id)->delete();
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
    //修改方法1
    public function edit(Request $request){
        $role_id=$request->get('role_id');
        $role_Info=RoleModel::where('role_id',$role_id)->first();
//        $power_node = $this ->getAllPowerNode();
        return view('admin/role/edit',['role_Info'=>$role_Info/**, 'all_node' => $power_node*/]);
    }
//修改方法2
    public function update(Request $request){
        $role_id=$request->post('role_id');
        $role_name=$request->post('role_name');
//        $status=$request->post('status');
        $res=RoleModel::where('role_id',$role_id)->update(['role_name'=>$role_name/**,'status'=>$status*/]);


        if($res!==false){
            return $this->response(200,'ok');
//            //把权限全部删除，重新添加
//            $based_id=$request->post("based_id");
//            RodeNodeModel::where('role_id',$role_id)->delete();
//            foreach($based_id as $k=>$v){
//                $info=[
//                    "based_id"=>$v,
//                    "role_id"=>$role_id
//                ];
//                RodeNodeModel::insert($info);
//            }
//            return redirect("role/index");
        }else{
            return $this->response(1,'fail');
        }
    }
    /**
     * @return array
     * 批量删除
     */
    public function roledel(){
        $admin_id=request()->post('strIds');
        $res=RoleModel::destroy($admin_id);
        if($res){
            return $this->response(200,'ok');
        }else{
            return $this->response(1,'fail');
        }
    }

}
