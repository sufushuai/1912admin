<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告展示</title>
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
    <h3 class="box-title">广告管理
    </h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <tr class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>

            <tr>
                <th class="center">
                    <input type="checkbox" class="allbox"/>
                </th>
                <th>广告ID</th>
                <th>广告标题</th>
                <th>广告内容</th>
                <th>广告链接</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr >
                    <td class="center">
                        <label>
                            <input type="checkbox" name="check" class="ace" value="{{$v->ad_id}}"/>
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td>{{$v->ad_id}}</td>
                    <td>{{$v->ad_name}}</td>
                    <td>{{$v->ad_desc}}</td>
                    <td>{{$v->ad_url}}</td>
                    <td>{{ date( "Y-m-d h-i", $v->add_time)}}</td>
                    <td>
                        <a type="button" class="btn bg-olive btn-xs del" href="{{url('/admin/ad/adDel/'.$v->ad_id)}}">删除</a>|
                        <a type="button" class="btn bg-olive btn-xs edit"  href="{{url('/admin/ad/adUp/'.$v->ad_id)}}">编辑</a>
                    </td>
                </tr>
            @endforeach
            <input type="button" class="btn btn-danger" value="批量删除" id="dels">
            </tbody>

        </table>
    {{$data->links()}}
</div>

</div>
<!-- /.box-body -->

</body>
</html>

<script>
    $(function(){
        // 全选
        // 给老大得复选框一个点击事件
        $(".allbox").click(function(){
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
                    }
                });
                var strIds = str.substr(0, str.length-1);
                // 如果字符串中没有任何的ID就不走后台ajax
                if (strIds == '') return false;
                // ajax
                $.ajax({
                    url : "/admin/ad/allDel",
                    data: {'strIds': strIds},
                    dataType: 'json',
                    type: "post",
                    success: function(res){
                        if (res.error== 0) {
                            location.href = "/admin/ad/index";
                        } else{
                            alert(res.msg);
                        }
                    }
                });
            }
        });

    });
</script>

