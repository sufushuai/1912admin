<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>友情链接管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">友情链接管理
    </h3>
</div>

<div class="box-body">


    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                   

                </div>
            </div>
        </div>
       <form>
        <input type="text" name="f_name">
        <button type="button" id="submit">搜索</button>
    </form>
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">id</th>
                <th class="sorting">名称</th>
                <th class="sorting">跳转地址</th>
               
                <th class="text-center">操作</th>
            </tr>
            </thead>

            <tbody>
                @foreach($data as $k=>$v)
            <tr >
                <td></td>
                <td>{{$v->foot_id}}</td>
                <td>{{$v->f_name}}</td>
                <td>
                    {{$v->f_url}}
                </td>
                
               
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs del" foot_id="{{$v->foot_id}}" >删除</button>
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"><a href="{{url('/foot/update/'.$v->foot_id)}}">编辑</a></button>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>{{$data->appends(['f_name'=>$f_name])->links()}}</td>
            </tr>
            
     
            </tbody>
        </table>
        <!--数据列表/-->

    </div>
    <!-- 数据表格 /-->




</div>
<!-- /.box-body -->


<!-- 编辑窗口 -->

</body>
</html>
<script>
    $(document).on('click','.del',function(){
        // alert(11);
        var foot_id = $(this).attr('foot_id');
        // console.log(dis_id);
        $.ajax({
            url:'/admin/foot/del',
            data:{foot_id:foot_id},
            type:'post',
            dataType:'json',
            success:function(res){
                if(res.code==0){
                    alert(res.mag)
                    location.href="/admin/foot/index"
                }
            }

        })

    })
    //ajax搜索
    $(document).on('click','#submit',function(){
        // alert(11);
        var f_name = $("input[name='f_name']").val();
        // console.log(f_name);
        $.ajax({
            url:"/admin/foot/index",
            type:'post',
            data:{f_name:f_name},
            success:function(res){
               $("tbody").html(res);
            }
        })

    })
     //ajax 分页
     $(document).on("click",'.page-item a',function(){
     //alert('1234');

      var url = $(this).attr('href');

        $.get(url,function(res){
    
         $('tbody').html(res);

       });
       return false;
     });

</script>
