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
                            <select class="form-control" name="cate_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-md-2 title">品牌分类</div>
                        <div class="col-md-10 data">
                            <select class="form-control" name="brand_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-md-2 title">商品价格</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品价格" name="goods_price" value="">
                        </div>
                        <div class="col-md-2 title">商品图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control"  placeholder="商品图片" name="goods_img" value="">
                        </div>
                        <div class="col-md-2 title">商品相册</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control"  placeholder="商品相册" name="goods_images" value="">
                        </div>
                        <div class="col-md-2 title">商品库存</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品库存" name="goods_num" value="">
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
                            <input type="radio" name="is_show" value="1"     >否
                        </div>
                        <div class="col-md-2 title">是否热门</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_hot" value="1" checked>是
                            <input type="radio" name="is_hot"  value="2"        >否
                        </div>
                        <div class="col-md-2 title">是否上架</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_on" value="1" checked>是
                            <input type="radio" name="is_on" value="2"         >否
                        </div>
                        <div class="col-md-2 title">是否新品</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_new" value="1" checked>是
                            <input type="radio" name="is_new" value="2"         >否
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="button">提交</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
