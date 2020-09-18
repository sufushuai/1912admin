<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>角色列表</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">角色列表
    </h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                    <button type="button" class="btn btn-default" title="刷新" ><i class="fa fa-check"></i> 刷新</button>

                </div>
            </div>
        </div>


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">角色ID</th>
                <th class="sorting">角色名称</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr role_id="{{$v->role_id}}">
                    <td>{{$v->role_id}}</td>
                    <td>
                        {{$v->role_name}}
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn bg-olive btn-xs del"  >删除</button>
                        <button type="button" class="btn bg-olive btn-xs edit" >修改</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $data->links()}}
    </div>

</div>
<!-- /.box-body -->


</body>
</html>
<script>
    $(document).on('click','.del',function(){
        var role_id=$(this).parents('tr').attr('role_id');
        $.ajax({
            "url":"/role/del",
            "type":"post",
            "data":{role_id:role_id},
            "async":"true",
            "dataType":"json",
            success:function(res){
                if(confirm("确定删除吗")){
                    if(res.errno==200){
                        alert("删除成功")
                        location.href="/role/index";
                    }
                }
            }
        })
    })
    $(document).on('click','.edit',function(){
        var role_id=$(this).parents('tr').attr('role_id');
        location.href="/role/edit?role_id="+role_id;
    })
</script>
