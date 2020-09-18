<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>优惠券管理</title>
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
    <h3 class="box-title">优惠券管理
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


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">id</th>
                <th class="sorting">商品</th>
                <th class="sorting">优惠金额</th>
                <th class="sorting">添加时间</th>
                <th class="sorting">过期时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>

            <tbody>
                @foreach($data as $k=>$v)
            <tr >
                <td></td>
                <td>{{$v->dis_id}}</td>
                <td>{{$v->goods_name}}</td>
                <td>
                    {{$v->money}}
                </td>
                <td>{{ date( "Y-m-d h-i", $v->add_time)}}</td>
                <td>{{ date( "Y-m-d h-i", $v->time_out)}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs del" dis_id="{{$v->dis_id}}" >删除</button>
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"><a href="{{url('/discount/update/'.$v->dis_id)}}">编辑</a></button>
                </td>
            </tr>
            @endforeach
     
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
        var dis_id = $(this).attr('dis_id');
        // console.log(dis_id);
        $.ajax({
            url:'/discount/del',
            data:{dis_id:dis_id},
            type:'post',
            dataType:'json',
            success:function(res){
                if(res.code==0){
                    alert(res.mag)
                    location.href="/admin/discount/index"
                }
            }

        })
    })
</script>
