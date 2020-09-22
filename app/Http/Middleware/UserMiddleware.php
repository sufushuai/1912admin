<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\RbacRole;
use App\Model\RbacBased;
use App\Model\RbacRoleBased;
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
            return redirect('/admin/login');
        }
        $user1 = RbacUser::where(['is_del'=>1,'admin_id'=>$user])->first();
        $user2=AdminroleModel::orderBy('add_time','desc')->where('user_id',$user)->first();
    }
}
