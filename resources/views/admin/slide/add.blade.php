<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>轮播图添加</title>
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
    <h1 class="box-title">轮播图添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">轮播图地址</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="轮播图地址" name="slide_url" value="">
                        </div>
                        <div class="col-md-2 title">轮播图权重</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="轮播图权重" name="slide_weight" value="">
                        </div>
                        <div class="col-md-2 title">是否展示</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_show" value="1" checked>是
                            <input type="radio" name="is_show" value="2">否
                        </div>
                        <div class="showimg"></div>
                        <div class="col-md-2 title">图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" id="uploadify" placeholder="图片"  value="">
                            <input type="hidden" name="slide_log">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="button" type="button">添加</button>
    </div>

</section>
<script>
    $(document).ready(function(){
        $("#uploadify").uploadify({
            uploader: "/slide/slideimg",
            swf: "/admin/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath = data;
                var imgstr = "<img src='"+imgPath+"'  controls='controls' style='width:80px;height:60px;'>";
                $("input[name='slide_log']").val(imgPath);
                $(".showimg").append(imgstr);
            }
        })
    });
    $(document).on('click','#button',function(){
        var slide_url = $('input[name="slide_url"]').val();
        var slide_weight = $('input[name="slide_weight"]').val();
        var is_show = $('input[name="is_show"]:checked').val();
        var slide_log = $('input[name="slide_log"]').val();
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/slide/do_add",
            data:{slide_url:slide_url,slide_weight:slide_weight,is_show:is_show,slide_log:slide_log},
            success:function(res){
                if (res.errno == 200) {
                    alert('添加成功');
                    location.href = "/slide/index";
                } else {
                    alert('添加失败');
                }
            }
        })
    })
</script>
</body>
</html>
