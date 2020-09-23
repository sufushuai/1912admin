<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>属性展示</title>
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
    <h3 class="box-title">商品属性管理
    </h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <tr class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>

            <tr>
                <th>属性ID</th>
                <th>商品名称</th>
                <th>属性</th>
                <th>库存</th>
                <th>价格</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($val as $k=>$v)
                <tr attr_val_id="{{$v['attr_val_id']}}">
                    <td>{{$v['attr_val_id']}}</td>
                    <td>{{$v['goods_name']}}</td>
                    <td>{{$v['sku2']}}</td>
                    <td><input type="text" class="form-control goods_num" value="{{$v['goods_num']}}"  placeholder="库存" id="goods_num_{{$v['attr_val_id']}}" name="goods_num"></td>
                    <td><input type="text" class="form-control goods_price" value="{{$v['goods_price']}}"  placeholder="价格" id="goods_price_{{$v['attr_val_id']}}" name="goods_price"></td>
                    <td>
                        <a type="button" class="btn bg-olive btn-xs edit" >修改商品内容</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
</div>
<!-- /.box-body -->

<script>

    $(document).on('click','.edit',function(){
        var attr_val_id=$(this).parents('tr').attr('attr_val_id');
        var goods_num=$('#goods_num_'+attr_val_id).val();
        var goods_price=$('#goods_price_'+attr_val_id).val();


        $.ajax({
            url:"/admin/sku/skuUp",
            type:'post',
            data:{attr_val_id:attr_val_id,goods_num:goods_num,goods_price:goods_price},
            dataType:'json',
            success:function(res){
                if(res.code){
                    alert(res.msg);
                }
            }
        })

    })
</script>


</body>
</html>

