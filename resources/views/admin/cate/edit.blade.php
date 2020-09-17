<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>分类添加</title>
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
    <h1 class="box-title">分类添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">分类名称</div>
                        <div class="col-md-10 data">
                            <input type="hidden" class="cate_id" value="{{$edit_info->cate_id}}">
                            <input type="text" class="form-control"  placeholder="分类名称" name="cate_name" value="{{$edit_info->cate_name}}">
                        </div>
                        <div class="col-md-2 title">分类菜单</div>
                        <div class="col-md-10 data">
                            <select class="form-control" id="p_id" name="p_id">
                                <option value="0">--顶级分类--</option>
                                @foreach($info as $k=>$v)
                                    <option value="{{$v->cate_id}}"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']) ?>{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="edit">修改</button>
    </div>
</section>
<!-- 正文区域 /-->
</body>
</html>
<script>
    $(document).on('click','#edit',function(){
        var cate_id=$(".cate_id").val();
        var cate_name=$("input[name='cate_name']").val();
        var p_id=$("#p_id").val();
        $.ajax({
            "url":"update",
            "type":"post",
            "data":{cate_name:cate_name,p_id:p_id,cate_id:cate_id},
            "dataType":"json",
            "async":"true",
            success:function(res){
                if(res.code==200){
                    alert("修改成功");
                    location.href="/cate/index";
                }
                if(res.code==1){
                    alert(res.msg);
                }
            }
        })
    })
</script>
