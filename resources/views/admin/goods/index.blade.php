<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理</title>
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
    <h3 class="box-title">商品展示</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                商品名称：<input >
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
                <th class="sorting_asc">商品ID</th>
                <th class="sorting">商品名称</th>
                <th class="sorting">商品分类</th>
                <th class="sorting">品牌分类</th>
                <th class="sorting">商品图片</th>
                <th class="sorting">商品相册</th>
                <th class="sorting">商品简介</th>
                <th class="sorting">商品返还积分</th>
                <th class="sorting">是否展示</th>
                <th class="sorting">是否热卖</th>
                <th class="sorting">是否上架</th>
                <th class="sorting">是否新品</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr goods_id = {{$v->goods_id}}>
                <td><input type="checkbox"></td>
                <td>{{$v->goods_id}}</td>
                <td>{{$v->goods_name}}</td>
                <td>{{$v->cate_id}}</td>
                <td>{{$v->brand_id}}</td>
                <td>@if($v->goods_img)<img src="{{env('APP_UPL')}}{{$v->goods_img}}" width="50" height="50">@endif</td>
                <td>{{$v->goods_images}}</td>
                <td>{{$v->goods_desc}}</td>
                <td>{{$v->goods_score}}</td>
                <td>{{$v->is_show==1?"是":"否"}}</td>
                <td>{{$v->is_hot==1?"是":"否"}}</td>
                <td>{{$v->is_on==1?"是":"否"}}</td>
                <td>{{$v->is_new==1?"是":"否"}}</td>
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
        var goods_id = $(this).parents('tr').attr('goods_id');
        location.href="/goods/edit?goods_id="+goods_id;
    })

    //ajax删除
    $(document).on('click','.del',function(){
        var goods_id = $(this).parents('tr').attr('goods_id');
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/goods/destroy",
            data:{goods_id:goods_id},
            success:function(res){
                if(confirm("确定是否删除？")){
                    if(res.code==200){
                        alert("删除成功")
                        location.href='/goods/index'
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
