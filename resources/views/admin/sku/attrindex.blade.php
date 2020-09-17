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
<!-- 正文区域 -->
<div class="box-header with-border">
    <h1 class="box-title">属性名展示</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">属性名ID</div>
                        <div class="col-md-2 title">属性名名称</div>
                        <div class="col-md-2 title">添加时间</div>
                        <div class="col-md-2 title">操作</div>
                    </div>
                @foreach($attr as $v)
                    <div class="row data-type">
                        <div class="col-md-2 title">{{$v->attr_id}}</div>
                        <div class="col-md-2 title">{{$v->attr_name}}</div>
                        <div class="col-md-2 title">{{ date( "Y-m-d h-i", $v->add_time)}}</div>
                        <div class="col-md-2 title">
                            <a href="{{url('/admin/sku/attrDel/'.$v->attr_id)}}">删除</a>|
                            <a href="{{url('/admin/sku/attrUp/'.$v->attr_id)}}">编辑</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
<!-- 正文区域 /-->
</body>
</html>
