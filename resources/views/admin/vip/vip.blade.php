<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VIP添加</title>
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
    <h1 class="box-title">VIP添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">会员名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="品牌名称" name="vip_name" value="">
                        </div>
                        <div class="col-md-2 title">会员图标</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control"  placeholder="品牌logo" name="vip_logo" value="">
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
<!-- 正文区域 /-->
</body>
</html>
=======

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VIP管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/static/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <script src="/static/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/static/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/uploadify/jquery.js"></script>
    <link rel="stylesheet" href="/admin/uploadify/uploadify.css">
    <script src="/admin/uploadify/jquery.uploadify.js"></script>


</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">VIP添加</h3>
</div>


<!-- /.box-body -->
<!-- 编辑窗口 -->

<div class="">

    <div >
        <table   width="500px">
            <tr>
                <td>VIP名称</td>
                <td><input  class="form-control" placeholder="VIP名称" >  </td>
            </tr>
            <tr>
                <td>VIP LOGO</td>
                <td>
                   <input type="file" name="uploadify" id="uploadify">
                </td>
            </tr>
        </table>
    </div>
    <div class="">
        <button class="btn btn-success">添加</button>

    </div>

</div>

</body>
</html>
<script>
    $(document).ready(function(){
        $("#uploadify").uploadify({
            uploader:"/uploads",
            swf:"/admin/uploadify/uploadify.swf",
//            onUploadSuccess:function(res,data,msg){
//
//            }
        })
    })
</script>
>>>>>>> 4c14b6179dae5cc3a6b02de0bd0dac643235d758
