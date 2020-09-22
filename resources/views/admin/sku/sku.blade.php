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
                                <option value="0">-请选择-</option>
                                @foreach($goods as $v)
                                    <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row data-type" >
                        @foreach($attr as $v)
                            <div class="col-md-2 title" >
                                <input type="hidden" name="attr_id"   value="{{$v->attr_id}}" >
                                {{$v->attr_name}}
                            </div>
                            <div class="col-md-10 data">
                                @foreach($val as $vv)
                                    @if($v->attr_id==$vv->attr_id)
                                    <input type="checkbox" value="{{$vv->val_id}}" attr_id="{{$v->attr_id}}"  class="val_id" >{{$vv->val_name}}
                                    @endif
                                @endforeach
                            </div>
                        @endforeach

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
    $(function(){
        $("#but").bind('click',function(){

        var goods_id=$("select[name='goods_id']").val()
        var attr_id=$(".val_id:checked").parents().attr('attr_id')
        var val_id=$('.val_id').val()
        var sku=[];
        var sku1=[];
        var sku2=[];
            $(".val_id:checked").each(function(i){
                if($(this).attr('attr_id')==1){
                    sku.push($(this).val());
                }
            });
            $(".val_id:checked").each(function(i){
                if($(this).attr('attr_id')==2){
                    sku1.push($(this).val());
                }
            });
            $(".val_id:checked").each(function(i){
                if($(this).attr('attr_id')==3){
                    sku2.push($(this).val());
                }
            });
//            sku='';
//            $('attr').each(function(){
//                if($(this).prop('checked')==true){
//                    sku=sku+attr_id+':'+$(this).val()+',';
//                }
//            })
//            alert(sku);
            $.ajax({
                url:"/admin/sku/sku",
                type:'post',
                data:{goods_id:goods_id,sku:sku,sku1:sku1,sku2:sku2},
                dataType:'json',
                success:function(res){
                   if(res.code){
                       alert(res.msg)
                       location.href="/admin/sku/skuIndex";
                   }
                }
            })
        })
    })

</script>
