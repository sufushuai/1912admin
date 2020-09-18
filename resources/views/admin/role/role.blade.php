<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>角色添加</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body  >
<form action="{{url('role/store')}}" method="post">
    <br><br>
    <div class="layui-form-item">
        <div>角色名称</div>
        <div class="layui-input-inline">
            <input type="text" name="role_name" required  lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div >角色状态</div>
        <div >
            <input type="radio" name="status" value="1" title="启用" checked>
            <input type="radio" name="status" value="2" title="未启用" >
        </div>
    </div>
    <div class="layui-form-item">
        <div>权限操作</div>
        <div class="layui-input-block">
            @foreach( $all_node as $k => $v )
                <div class="parent">
                    <input type="checkbox" name="based_id[]" lay-filter="parent"  value="{{$v['based_id']}}"
                           lay-skin="primary" title="{{$v['based_name']}}"><br/>
                    <div class="son">
                        @if( isset( $v['son']) )
                            @foreach( $v['son'] as $kk => $vv )
                                <input type="checkbox" name="based_id[]" lay-filter="son" value="{{$vv['based_id']}}"
                                       lay-skin="primary" title="{{$vv['based_name']}}">
                            @endforeach
                        @endif
                    </div>
                    <hr/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</body>
</html>
<script src="/jquery.min.js"></script>
<script>

    //Demo
    var $;
    layui.use('form', function(){
        var form = layui.form;
        $ = layui.jquery;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 父选子
        form.on('checkbox(parent)', function(data){
            if(  data.elem.checked == true  ){
                data.othis.parent('.parent').find('.son input').prop('checked', true);
            }else{
                data.othis.parent('.parent').find('.son input').prop('checked', false);
            }
            form.render();

        });

        // 子选父
        form.on('checkbox(son)', function(data){
            if(  data.elem.checked == true  ){
                data.othis.parents('.parent').find('input').first().prop('checked', true);
            }else{
                // 先判断当前的子级有没有选中的，如果有选中的，不修改父级，如果全部都是不选中的，把父级也修改为不选中
                let mark = false;
                data.othis.parent('.son').find('input').each(function () {
                    console.log($(this).prop('checked'));
                    if( $(this).prop('checked') == true ){
                        mark = true;
                    }
                })
                if( mark == false )
                {
                    data.othis.parents('.parent').find('input').first().prop('checked', false);
                }
            }
            form.render();
        });

    });
</script>
