<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>属性添加</title>
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
    <a class="btn btn-primary"  href="/admin/sku/skuIndex"><i class="fa fa-save"></i>属性展示</a>
</div>
<div class="box-header with-border">
    <h1 class="box-title">属性添加</h1>

</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <select name="goods_id">
                                <option>-请选择-</option>
                                @foreach($goods as $v)
                                    <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 title">属性名</div>
                        <div class="col-md-10 data">
                                @foreach($attr as $v)
                                    <input type="checkbox" value="{{$v->attr_id}}" id="attr_id">
                                {{$v->attr_name}}
                                    @endforeach
                        </div>

                        <div class="col-md-2 title">属性值</div>
                        <div class="col-md-10 data">
                                @foreach($val as $v)
                                    <input type="checkbox" value="{{$v->val_id}}" id="var_id">{{$v->val_name}}
                                @endforeach
                        </div>

                        <div class="col-md-2 title">商品库存</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品库存" name="goods_num">
                        </div>

                        <div class="col-md-2 title">商品价格</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="商品价格" name="goods_price">
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
        var goods_id=$("select[name='goods_id']").val()
        var attr_id=$("#attr_id").val()
        var val_id=$("#val_id").val()
        var goods_num=$("input[name='goods_num']").val()
        var goods_price=$("input[name='goods_price']").val()
        console.log(attr_id);


        if(goods_id==''){
            alert('商品名不能为空');
            return false;
        }
        if(attr_id==''){
            alert('属性名不能为空');
            return false;
        }
        if(val_id==''){
            alert('属性值不能为空');
            return false;
        }
        if(goods_num==''){
            alert('库存不能为空');
            return false;
        }
        if(goods_price==''){
            alert('价格不能为空');
            return false;
        }
//        alert(goods_price)
//        return false;
        $.ajax({
            url:"/admin/sku/sku",
            type:'post',
            data:{'attr_id':attr_id,'val_id':val_id,'goods_id':goods_id,'goods_num':goods_num,'goods_price':goods_price},
            dataType:'json',
            success:function(res){
                console.log(res)
                if(res.error==0){
                    alert(res.msg);
                }else{
                    alert(res.msg);
                }

            }
        })
    })
</script>