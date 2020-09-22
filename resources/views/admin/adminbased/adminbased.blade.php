<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>角色权限添加</title>
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
    <h1 class="box-title">角色权限添加</h1>
</div>
<section class="content">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">角色名称</div>
                        <div class="col-md-10 data">
                            <select class="form-control" name="role_name" id="role_id">
                                @foreach($role as $k=>$v)
                                    <option value="{{$v->role_id}}">{{$v->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 title">角色权限</div>
                        <div class="col-md-10 data2">
                            @foreach($based as $k=>$v)
                                <input type="checkbox" id="based_id" name="ckb"/>{{$v->based_name}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="button" type="button"></i>添加</button>
    </div>
</section>

</body>
</html>
<script src="/jquery.min.js"></script>
<script>
    $(document).on('click','#button',function(){
        var role_id = $('#role_id').val();
        var based_id = $('#based_id').val();
        $.ajax({
            type:"post",
            dataType:"json",
            url:"/adminbased/add",
            data:{role_id:role_id,based_id:based_id},
            success:function(res){
                if(res.code==200){
                    alert("添加成功")
                    location.href='/users/index'
                }
                if(res.code==1){
                    alert(res.msg)
                }
            }
        })
    })


    // $(document).ready(function(){
    //     $("#btn").click(function(){
    //         var str = "";
    //         $("input[name='ckb']").each(function(){
    //             if($(this).is(":checked"))
    //             {
    //                 str += "——" + $(this).val();
    //             }
    //         });
    //         $("#txt").html(str);
    //     });
    // });
</script>
