<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户角色管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>


</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">角色权限管理</h3>
</div>
<div class="box-body">
    <!-- 数据表格 -->
    <div class="table-box">
        <!--工具栏-->
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form >
                    角色权限名称：<input type="text" name="name" placeholder="请输入角色权限名称关键字" value="{{$query['name']??''}}">
                    <button class="btn btn-default" type="submit">查询</button>
                </form >
            </div>
        </div>
        <!--工具栏/-->
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting">角色名称</th>
                <th class="sorting">权限名称</th>
                <th class="sorting">时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td><input  type="checkbox" ></td>
                    <td>{{$v->role_name}}</td>
                    <td>{{rtrim($v->res,",")}}</td>
                    <td>{{ date( "Y-m-d h-i-s", $v->c_time)}}</td>
                    <td class="text-center">
                        <button class="btn btn-primary" id="edit" type="button">修改</button>
                        <button data-toggle="modal" onclick="" class="btn btn-danger del">删除</button>
                    </td>
                </tr>
            @endforeach
            {{--            <tr><td colspan="5">{{$data->appends($query)->links()}}</td></tr>--}}
            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<script>
    $(document).on('click','#edit',function(){
        var brand_id = $(this).parents('tr').attr('brand_id');
        location.href="/brand/edit?brand_id="+brand_id;
    })

    //ajax删除
    $(document).on('click','.del',function(){
        var brand_id = $(this).parents('tr').attr('brand_id');
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/brand/destroy",
            data:{brand_id:brand_id},
            success:function(res){
                if(confirm("确定是否删除？")){
                    if(res.code==200){
                        alert("删除成功")
                        location.href='/brand/index'
                    }
                }
                if(res.code==1){
                    alert(res.msg)
                }
            }
        })
    })
</script>
</body>
</html>
