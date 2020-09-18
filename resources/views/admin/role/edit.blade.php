<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>角色添加</title>
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
    <h1 class="box-title">角色添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">角色名称</div>
                        <div class="col-md-10 data">
                            <input type="hidden" id="role_id" value="{{$role_Info->role_id}}">
                            <input type="text" class="form-control"  placeholder=角色名称 name="role_name" id="role_name" value="{{$role_Info->role_name}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="edit"><i class="fa fa-save"></i>修改</button>
    </div>
</section>

</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#edit').click(function () {
            var role_name = $("#role_name").val();
           var role_id=$("#role_id").val();
            $.ajax({
                type: "post",
                url: "/role/update",
                data: {role_name: role_name,role_id:role_id},
                dataType: "json",
                success: function (res) {
                    if (res.errno == 200) {
                        alert('修改成功');
                        location.href = "/role/index";
                    } else {
                        alert('修改失败');
                    }
                }
            })

        })
    })

</script>
