<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/static/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <script src="/static/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/static/plugins/bootstrap/js/bootstrap.min.js"></script>


</head>
<body class="hold-transition skin-red sidebar-mini">

<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">管理员展示</h3>


<!-- /.box-body -->
    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    管理员名称：<input >
                    <button class="btn btn-default" >查询</button>
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
                    <th class="sorting_asc">管理员ID</th>
                    <th class="sorting">管理员名称</th>
                    <th class="sorting">管理员状态</th>
                    <th class="sorting">角色权限</th>
                    <th class="sorting">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr admin_id="{{$v->admin_id}}">
                        <td><input type="checkbox"></td>
                        <td>{{$v->admin_id}}</td>
                        <td>{{$v->admin_name}}</td>
                        <td>{{$v->is_del==1?"普通管理员":"超级管理员"}}</td>
                        <td><a href="{{url('/adminrole/adminrole/'.$v->admin_id)}}">角色</a>|
                            <a href="{{url('/adminbased/adminbased/'.$v->admin_id)}}">权限</a>
                        </td>
                        <td>
                            <button class="edit btn btn-primary" id="edit" type="button">修改</button>
                            <button data-toggle="modal" onclick="" class="del btn btn-danger del">删除</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links()}}
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
<!-- 编辑窗口 -->

</div>

</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.del').click(function(){
            var _this=$(this);
            var admin_id=_this.parents('tr').attr('admin_id');
            $.ajax({
                url:'/users/del',
                data:{admin_id:admin_id},
                type:'post',
                dataType:'json',
                success:function(res){
                    if(res.errno==200){
                        alert('删除成功');
                        location.href="/users/index";
                    }else{
                        alert('操作失败');
                    }
                }
            })
        })
        $(".edit").click(function(){
            var _this=$(this);
            var admin_id=_this.parents('tr').attr('admin_id');
            location.href="/users/edit/"+admin_id;
        })
    })
</script>

