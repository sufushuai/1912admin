<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品添加</title>
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
    <h1 class="box-title">商品添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品名称" name="goods_name" value="">
                        </div>
                        <div class="col-md-2 title">商品分类</div>
                        <div class="col-md-10 data">
                            <select class="form-control" name="cate_id" id="cate_id">
                                @foreach($info as $k=>$v)
                                    <option value="{{$v->cate_id}}"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 title">品牌分类</div>
                        <div class="col-md-10 data">
                            <select class="form-control" name="brand_id" id="brand_id">
                                @foreach($brand as $k=>$v)
                                <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="showimg"></div>
                        <div class="col-md-2 title">商品图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" id="uploadify" placeholder="商品图片"  value="">
                            <input type="hidden" name="goods_img">
                        </div>
                        <div class="col-md-2 title">商品相册</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control"  placeholder="商品相册" name="goods_images" value="">
                        </div>
                        <div class="col-md-2 title">商品简介</div>
                        <div class="col-md-10 data">
                            <textarea name="goods_desc" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-2 title">商品返还积分</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品返还积分" name="goods_score" value="">
                        </div>
                        <div class="col-md-2 title">是否展示</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_show" value="1" checked>是
                            <input type="radio" name="is_show" value="2" >否
                        </div>
                        <div class="col-md-2 title">是否热门</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_hot" value="1" checked>是
                            <input type="radio" name="is_hot"  value="2">否
                        </div>
                        <div class="col-md-2 title">是否上架</div>
                        <div class="col-md-10 data" id="is_on">
                            <input type="radio" name="is_on" value="1" checked>是
                            <input type="radio" name="is_on" value="2">否
                        </div>
                        <div class="col-md-2 title">是否新品</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_new" value="1" checked>是
                            <input type="radio" name="is_new" value="2">否
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="button" type="button">提交</button>
    </div>
</section>
<script>
    $(document).ready(function(){
        $("#uploadify").uploadify({
            uploader: "/goods/goodsimg",
            swf: "/admin/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath = data;
                var imgstr = "<img src='"+imgPath+"'  controls='controls' style='width:80px;height:60px;'>";
                $("input[name='goods_img']").val(imgPath);
                $(".showimg").append(imgstr);
            }
        })
    });
    $(document).on('click','#button',function(){
        var goods_name = $('input[name="goods_name"]').val();
        var cate_id = $('#cate_id').val();
        var brand_id = $('#brand_id').val();
        var goods_img = $('input[name="goods_img"]').val();
        var goods_images = $('input[name="goods_images"]').val();
        var goods_desc = $('textarea[name="goods_desc"]').val();
        var goods_score = $('input[name="goods_score"]').val();
        var is_show = $('input[name="is_show"]:checked').val();
        var is_hot = $('input[name="is_hot"]:checked').val();
        var is_on = $('input[name="is_on"]:checked').val();
        var is_new = $('input[name="is_new"]:checked').val();
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/goods/add",
            data:{goods_name:goods_name,cate_id:cate_id,
                brand_id:brand_id, goods_img:goods_img,
                goods_images:goods_images,goods_desc:goods_desc,
                goods_score:goods_score,is_show:is_show,
                is_hot:is_hot,is_on:is_on,is_new:is_new},
            success:function(res){
                if(res.code==200){
                    alert("添加成功")
                    location.href='/goods/index'
                }
                if(res.code==1){
                    alert(res.msg)
                }
            }
        })
    })
</script>
</body>
</html>
