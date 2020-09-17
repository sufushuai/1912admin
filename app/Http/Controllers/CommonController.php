<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * 封装成功时的方法
     * @param $errno
     * @param $msg
     * @param array $data
     * @return array
     */
    protected function success($data=[],$code=200,$msg='success'){
        return [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data,
        ];
    }
    /**
     * 封装失败时的方法
     */
    protected function error($msg='',$code=1,$data=[]){
        return [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data,
        ];
    }
    /**
     * 无限极分类
     */
    function getCateInfo($cateInfo,$p_id=0,$level=1){
        static $info=[];
        foreach($cateInfo as $k=>$v){
            if($v['p_id']==$p_id){
                $v['level']=$level;
                $info[]=$v;
                $this->getCateInfo($cateInfo,$v['cate_id'],$v['level']+1);
            }
        }
        return $info;
    }
}
