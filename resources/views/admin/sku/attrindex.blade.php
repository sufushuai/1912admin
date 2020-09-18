<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>属性名展示</title>
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
    <h3 class="box-title">属性名管理
    </h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <tr class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th>属性名ID</th>
                <th>属性名</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attr as $v)
                <tr >
                    <td>{{$v->attr_id}}</td>
                    <td>{{$v->attr_name}}</td>
                    <td>{{ date( "Y-m-d h-i", $v->add_time)}}</td>
                    <td>
                        <a type="button" class="btn bg-olive btn-xs del" href="{{url('/admin/sku/attrDel/'.$v->attr_id)}}">删除</a>|
                        <a type="button" class="btn bg-olive btn-xs edit"  href="{{url('/admin/sku/attrUp/'.$v->attr_id)}}">编辑</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
</div>

</div>
<!-- /.box-body -->


</body>
</html>

