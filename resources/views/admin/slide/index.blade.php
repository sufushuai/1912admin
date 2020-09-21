<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>轮播图展示</title>
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
    <h3 class="box-title">轮播图展示</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form >
                    轮播图名称：<input type="text" name="name" placeholder="请输入关键字" value="{{$query['name']??''}}">
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
                <th class="sorting_asc">轮播图ID</th>
                <th class="sorting">轮播图地址</th>
                <th class="sorting">轮播图权重</th>
                <th class="sorting">是否展示</th>
                <th class="sorting">商品图片</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr slide_id = {{$v->slide_id}}>
                    <td><input type="checkbox"></td>
                    <td>{{$v->slide_id}}</td>
                    <td>{{$v->slide_url}}</td>
                    <td>{{$v->slide_weight}}</td>
                    <td>{{$v->is_show==1?"是":"否"}}</td>
                    <td><img src="{{env('APP_UPL')}}{{$v->slide_log}}" width="50" height="50"></td>
                    <td class="text-center">
                        <button class="btn btn-primary" id="edit" type="button">修改</button>
                        <button data-toggle="modal" onclick="" class="btn btn-danger del">删除</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->
<script>
    $(document).on('click','#edit',function(){
        var slide_id = $(this).parents('tr').attr('slide_id');
        location.href="/slide/edit?slide_id="+slide_id;
    })

    //ajax删除
    $(document).on('click','.del',function(){
        var slide_id = $(this).parents('tr').attr('slide_id');
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/slide/update",
            data:{slide_id:slide_id},
            success:function(res){
                if(confirm("确定是否删除？")){
                    if(res.code==200){
                        alert("删除成功")
                        location.href='/slide/index'
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
