<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>友情链接添加</title>
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
    <h1 class="box-title">友情链接添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="名称" name="f_name" >
                        </div>
               
                        <div class="col-md-2 title">跳转地址</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id=""  placeholder="跳转地址" name="f_url" value="">
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button ><input type="button" class="btn" value="提交"></button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script type="text/javascript">
    $(document).on("click",".btn",function(){
        var f_name = $("input[name='f_name']").val();
        var f_url = $("input[name='f_url']").val();
        // console.log(f_name)
        // console.log(f_url)
        $.ajax({
            url:"/admin/foot/adddo",
            data:{f_name:f_name,f_url:f_url},
            dataType:"json",
            type:"post",
            success:function(res){
                if(res.code==0){
                    alert(res.mag)
                    location.href="/admin/foot/index"
                }
            }
        })
    })
</script>
