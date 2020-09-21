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
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form>
                    角色名称：<input type="text" name="role_name" placeholder="请输入角色名称" value="{{$query['role_name']??''}}">
                    <button class="btn btn-default" type="submit">查询</button>
                </form>
            </div>
        </div>


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="allbox" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">角色ID</th>
                <th class="sorting">角色名称</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr role_id="{{$v->role_id}}">
                    <td class="center">
                        <label>
                            <input type="checkbox" name="check" class="ace" value="{{$v->role_id}}"/>
                            <span class="lbl"></span>
                        </label>
                    </td>
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
        <input type="button" class="btn bg-olive btn-xs" value="批量删除" id="dels">
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
    $(function(){
        // 全选
        // 给老大得复选框一个点击事件
        $("#allbox").click(function(){
            var _this = $(this);
            // 循环下面所有得复选框
            $("input[name='check']").each(function(){
                // 判断老大是否时选中状态
                if (_this.prop("checked") == true) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
        });

        // 批量删除
        $("#dels").click(function(){
            // 是否删除
            if (window.confirm('是否删除')) {
                // 获取所有被选中得值
                var str = ''; // 定义一个字符串用来装选中得id
                $("input[name='check']").each(function(){
                    // 判断是否被选中
                    if ($(this).prop('checked') == true) {
                        // 拼接字符串，用，作为分隔符
                        str = str + $(this).val() +',';
                        //console.log(str);
                    }
                });
                var strIds = str.substr(0, str.length-1);
                // alert(strIds);
                // 如果字符串中没有任何的ID就不走后台ajax
                if (strIds == '') return false;
                $.ajax({
                    url:'/role/roledel',
                    data: {'strIds': strIds},
                    dataType: 'json',
                    type: "post",
                    success: function(res){
                        if(res.errno==200){
                            alert('删除成功');
                            location.href="/role/index";
                        }else{
                            alert('操作失败');
                        }
                    }
                });
            }
        });

    });
</script>
