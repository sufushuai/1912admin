
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
                    <form>
                    管理员名称：<input type="text" name="admin_name" placeholder="请输入管理员名称" value="{{$query['admin_name']??''}}">
                    <button class="btn btn-default" type="submit">查询</button>
                    </form>
                </div>
            </div>

            <!--工具栏/-->

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="" style="padding-right:0px">
                        <input id="allbox" type="checkbox" class="icheckbox_square-blue">
                    </th>
                    <th class="sorting_asc">管理员ID</th>
                    <th class="sorting">管理员名称</th>
                    <th class="sorting">管理员状态</th>
                    <th class="sorting">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr admin_id="{{$v->admin_id}}">
                        <td class="center">
                            <label>
                                <input type="checkbox" name="check" class="ace" value="{{$v->admin_id}}"/>
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td>{{$v->admin_id}}</td>
                        <td>{{$v->admin_name}}</td>
                        <td>{{$v->is_del==1?"普通管理员":"超级管理员"}}</td>
                        <td><button class="del btn bg-olive btn-xs" >删除</button>
                            <button class="edit btn bg-olive btn-xs">修改</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="button" class="btn bg-olive btn-xs" value="批量删除" id="dels">
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
                        console.log(str);
                    }
                });
                var strIds = str.substr(0, str.length-1);
               // alert(strIds);
                // 如果字符串中没有任何的ID就不走后台ajax
                if (strIds == '') return false;
                $.ajax({
                    url:'/users/usersdel',
                    data: {'strIds': strIds},
                    dataType: 'json',
                    type: "post",
                    success: function(res){
                        if(res.errno==200){
                            alert('删除成功');
                            location.href="/users/index";
                        }else{
                            alert('操作失败');
                        }
                    }
                });
            }
        });

    });
</script>

