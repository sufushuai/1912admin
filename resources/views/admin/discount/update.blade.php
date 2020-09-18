<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>优惠券修改</title>
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
    <h1 class="box-title">优惠券修改</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <input type="hidden" name="dis_id" value="{{$data->dis_id}}">
                        <div class="col-md-2 title">商品id</div>
                        <div class="col-md-10 data">
                            <select name="goods_id" id="{{$data->goods_id}}">
                                <option value="">--请选择--</option>
                                @foreach($datas as $v)
                                <option value="{{$v->goods_id}}"  {{$v['goods_id']==$data['goods_id']?"selected":""}}>{{$v->goods_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 title">优惠金额</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  placeholder="优惠金额" name="money"  value="{{$data->money}}">
                        </div>
                         <div class="col-md-2 title">过期时间</div>
                        <div class="col-md-10 data">
                            <input type ="date" name ="time_out" value ="<？php echo date（'Y-m-d'）;？&"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <input type="button" class="btn" value="修改">
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $(document).on('click','.btn',function(){
             //alert(11);
             var dis_id = $("input[name='dis_id']").val();
             //console.log(dis_id);
             var goods_id = $("select[name='goods_id']").val();
             var money = $("input[name='money']").val();
             var time_out = $("input[name='time_out']").val();
              //console.log(goods_id);
            // console.log("money");
            $.ajax({
                url:"/discount/updatedo",
                data:{goods_id:goods_id,money:money,dis_id:dis_id,time_out:time_out},
                type:"post",
                dataType:"json",
                 success:function(res){
                     //alert(res);
                    if(res.code=='0'){
                        alert(res.mag)
                        location.href='/admin/discount/index'
                    }
                 }
            })
           
    })
</script>