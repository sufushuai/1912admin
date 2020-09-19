<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>属性值添加</title>
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
    <a class="btn btn-primary"  href="/admin/sku/valIndex"><i class="fa fa-save"></i>返回</a>
</div>
<div class="box-header with-border">
    <h1 class="box-title">属性值修改</h1>

</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">属性值名称</div>
                        <div class="col-md-10 data">
                            <input type="hidden" value="{{$data->val_id}}">
                            <input type="text" class="form-control"  placeholder="属性值名称" name="val_name" value="{{$data->val_name}}">
                        </div>
                        <div class="col-md-2 title">属性名</div>
                        <div class="col-md-10 data">
                            <select name="attr_id" class="form-control" >
                                <option value="0">--请选择--</option>
                                @foreach($skuattr as $k=>$v)
                                    <option value="{{$v->attr_id}}">{{$v->attr_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="but"><i class="fa fa-save"></i>修改</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $("#but").bind('click',function(){
        var val_name=$("input[name='val_name']").val()
        var val_id=$("input[name='val_id']").val()
        var attr_id=$("select[name='attr_id']").val()
        if(val_name==''){
            alert('必填');
            return false;
        }
//        alert(attr_name)
//        return false;
        $.ajax({
            url:"/admin/sku/valUp/".val_id,
            type:'post',
            data:{'val_name':val_name,attr_id:attr_id},
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