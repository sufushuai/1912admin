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

    <script src="/admin/uploadify/jquery.js"></script>
    <link rel="stylesheet" href="/admin/uploadify/uploadify.css">
    <script src="/admin/uploadify/jquery.uploadify.js"></script>
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
                            <input type="text" class="form-control"  placeholder="会员名称" name="vip_name" >
                        </div>
                        <div class="showimg"></div>
                        <div class="col-md-2 title">会员图标</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" id="vip_logo"  placeholder="会员logo" name="vip_logo" value="">
                            <input type="hidden" id="vip_logo">
                            <span class="showimg"></span>
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
        var vip_name = $("input[name='vip_name']").val();
        var vip_logo = $("#vip_logo").val();
        // console.log(vip_name)
        // console.log(vip_img)
        $.ajax({
            url:"/admin/vip/adddo",
            data:{vip_name:vip_name,vip_logo:vip_logo},
            dataType:"json",
            type:"post",
            success:function(res){
                if(res.code==0){
                    alert(res.mag)
                    location.href="/admin/vip/index"
                }
            }
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#vip_logo").uploadify({
            uploader:"/admin/vip/uploads",
            swf:"/admin/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"' controls='controls' style='width:80px;height:60px;'>";
                $("#vip_logo").val(imgPath);
                $(".showimg").append(imgstr);
                
            }
        })
    })
</script>
