<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理员修改</title>
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
    <h1 class="box-title">管理员修改</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">管理员名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="管理员名称" name="admin_name" id="admin_name" value="{{$data['admin_name']}}">
                            <input type="hidden" name="admin_id" value="{{$data['admin_id']}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="exit"><i class="fa fa-save"></i>修改</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','#exit',function(){
            _this=$(this);
            var admin_id=$("input[name='admin_id']").val();
            var admin_name=$("input[name='admin_name']").val();
            $.ajax({
                url:'/users/update',
                data:{admin_id:admin_id,admin_name:admin_name},
                type:'post',
                dataType:'json',
                success:function(res){
                    if(res.errno==200){
                        alert('修改成功');
                        location.href='/users/index';
                    }else{
                        alert('修改失败')
                    }
                }
            })
        })
    })
</script>
