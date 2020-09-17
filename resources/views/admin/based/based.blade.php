<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>权限添加</title>
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
    <h1 class="box-title">权限添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">权限名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="权限名称" name="based_name" id="based_name" value="">
                        </div>
                        <div class="col-md-2 title">权限url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="权限url" name="url" id="url" value="">
                        </div>
                        <div class="col-md-2 title">父级节点</div>
                        <div class="col-md-10 data">
                            <select name="pid" class="form-control" id="pid">
                                <option value="0">请选择</option>
                                @foreach( $res as $k => $v )
                                    <option value="{{$v->based_id}}">{{$v->based_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="add"><i class="fa fa-save"></i>提交</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add').click(function () {
            var based_name = $("#based_name").val();
            var url = $("#url").val();
            var pid = $("#pid").val();
            if(based_name==""){
                alert("权限名称不能为空");
                return false;
            }
            if(url==""){
                alert("路由不能为空");
                return false;
            }
            $.ajax({
                type: "post",
                url: "/based/do_add",
                data: {based_name: based_name,url:url,pid:pid},
                dataType: "json",
                success: function (res) {
                    if (res.status == 200) {
                        alert('添加成功');
                        location.href = "/based/index";
                    } else {
                        alert('添加失败');
                    }
                }
            })

        })
    })

</script>
