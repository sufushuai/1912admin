<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告添加</title>
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
<div class="btn-toolbar list-toolbar">
    <a class="btn btn-primary"  href="/admin/ad/Index"><i class="fa fa-save"></i>属性名展示</a>
</div>
<div class="box-header with-border">
    <h1 class="box-title">广告添加</h1>

</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">广告名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="广告名称" name="ad_name">
                        </div>

                        <div class="col-md-2 title">广告内容</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="广告内容" name="ad_desc">
                        </div>

                        <div class="col-md-2 title">广告链接</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="广告链接" name="ad_url">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="but"><i class="fa fa-save"></i>提交</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $("#but").bind('click',function(){
        var ad_name=$("input[name='ad_name']").val()
        var ad_desc=$("input[name='ad_desc']").val()
        var ad_url=$("input[name='ad_url']").val()


        if(ad_name==''){
            alert('必填');
            return false;
        }
        if(ad_desc==''){
            alert('必填');
            return false;
        }
        if(ad_url==''){
            alert('必填');
            return false;
        }
//        alert(attr_name)
//        return false;
        $.ajax({
            url:"/admin/ad",
            type:'post',
            data:{'ad_name':ad_name,'ad_desc':ad_desc,'ad_url':ad_url},
            dataType:'json',
            success:function(res){
                if(res.error==0){
                    alert(res.msg);
                }else{
                    alert(res.msg);
                }

            }
        })
    })
</script>