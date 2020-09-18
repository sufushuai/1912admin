
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>权限管理</title>
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
    <h3 class="box-title">权限展示</h3>


    <!-- /.box-body -->
    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    权限名称：<input >
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
                    <th class="sorting_asc">权限ID</th>
                    <th class="sorting">权限名称</th>
                    <th class="sorting">权限URL</th>
                    <th class="sorting">父级节点</th>
                    <th class="sorting">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr based_id="{{$v->based_id}}">
                        <td><input type="checkbox"></td>
                        <td>{{$v->based_id}}</td>
                        <td>{{$v->based_name}}</td>
                        <td>{{$v->url}}</td>
                        <td>{{$v->pid}}</td>
                        <td><button class="del btn bg-olive btn-xs" >删除</button>
                            <button class="edit btn bg-olive btn-xs">修改</button>
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
            var based_id=_this.parents('tr').attr('based_id');
            $.ajax({
                url:'/based/del',
                data:{based_id:based_id},
                type:'post',
                dataType:'json',
                success:function(res){
                    if(res.status==200){
                        alert('删除成功');
                        location.href="/based/index";
                    }else{
                        alert('删除失败');
                    }
                }
            })
        })
        $(".edit").click(function(){
            var _this=$(this);
            var based_id=_this.parents('tr').attr('based_id');
            location.href="/based/edit/"+based_id;
        })
    })
</script>

