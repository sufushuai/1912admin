
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