<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理员添加</title>
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
    <h1 class="box-title">管理员添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">管理员名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="管理员名称" name="admin_name" id="admin_name" value="">
                        </div>
                        <div class="col-md-2 title">管理员密码</div>
                        <div class="col-md-10 data">
                            <input type="password" class="form-control"  placeholder="管理员密码" name="password" id="password" value="">
                        </div>
                        <div class="col-md-2 title">确认密码</div>
                        <div class="col-md-10 data">
                            <input type="password" class="form-control"  placeholder="确认密码" name="password1" id="password1" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="add"><i class="fa fa-save"></i>添加</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script src="/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#add').click(function () {
            var admin_name = $("#admin_name").val();
            var password = $("#password").val();
            var password1 = $("#password1").val();
            if(admin_name==""){
                alert("管理员名称不能为空");
                return false;
            }
            if(password==""){
                alert("管理员密码不能为空");
                return false;
            }
            if(password!=password1){
                alert("密码不一致");
                return false;
            }
            $.ajax({
                type: "post",
                url: "/users/score",
                data: {admin_name: admin_name,password:password},
                dataType: "json",
                success: function (res) {
                    if (res.errno == 200) {
                        alert('添加成功');
                        location.href = "/users/index";
                    } else {
                        alert('添加失败');
                    }
                }
            })

        })
    })

</script>