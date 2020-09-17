<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌添加</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/uploadify/jquery.js"></script>
    <link rel="stylesheet" href="/admin/uploadify/uploadify.css">
    <script src="/admin/uploadify/jquery.uploadify.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini" >
<!-- 正文区域 -->
<div class="box-header with-border">
    <h1 class="box-title">品牌添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">品牌名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="品牌名称" name="brand_name" value="">
                        </div>
                        <div class="col-md-2 title">品牌logo</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control"  id="uploadify" placeholder="品牌logo" name="brand_logo" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary"><i class="fa fa-save"></i>提交</button>
    </div>
</section>
<script>
    $(document).ready(function(){
         $("#uploadify").uploadify({
             uploader: "/uploads",
             swf: "/admin/uploadify/uploadify.swf",
             onUploadSuccess:function(res,data,msg){

             }
         })
    });

    $('button').click(function(){
        var brand_name = $('input[name="brand_name"]').val();
        var brand_n = $('input[name="brand_name"]').val();
    })
</script>
</body>
</html>
