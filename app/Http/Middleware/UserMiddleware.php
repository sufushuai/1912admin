<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\RbacRole;
use App\Model\RbacBased;
use App\Model\RbacRoleBased;
use App\Model\RbacAdminRole;
use App\Model\RbacUser;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=session('user');
        if(empty($user)){
//            return redirect('/admin/login');
            echo "<script>alert('抱歉，您没有权限访问,请找管理员添加权限');window.history.go(-1);</script>";exit;
        }
//        $user1 = RbacUser::where(['is_del'=>1,'admin_id'=>$user])->first();
//        $user2=RbacAdminRole::orderBy('c_time','desc')->where('admin_id',$user)->first();
//        if(empty($user1)) {
//            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
//            exit;
//        }
//        if($user1->admin_name== '苏富帅'){
//            return $next($request);
//        }
//        if(empty($user2)){
//            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
//            exit;
//        }
//        $role_arr=RbacRoleBased::where('is_del',1)->whereIn('role_id',$user2)->get()->toArray();
//        if(empty($role_arr)){
//            echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.back(-1);</script>";
//            exit;
//        }
//        $url=$request->path();
//        foreach ($role_arr as $k=>$v) {
//            $arr=RbacBased::where('is_del',1)->whereIN('based_id',$v['based_id'])->get('url')->toArray();
//            foreach ($arr as $k1=>$v1) {
//                if($url==$v1['url'] || $url=='admin/index'){
//                    return $next($request);
//                }else{
//                    echo "<script>alert('你没有权限访问~请联系管理员添加权限');history.go(-1);</script>";
//                    exit;
//                }
//            }
//        }
    }
}
