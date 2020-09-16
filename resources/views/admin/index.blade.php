<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>运营商后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  

    <link rel="stylesheet" href="/static/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/static/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    
    <script src="/static/plugins/jQuery/jquery-2.2.3.min.js"></script>
    {{--<script src="/static/plugins/jQueryUI/jquery-ui.min.js"></script>--}}
    <script src="/static/plugins/bootstrap/js/bootstrap.min.js"></script>
  
    <script src="/static/plugins/adminLTE/js/app.min.js"></script>
    
    <script type="text/javascript">
         function SetIFrameHeight(){
              var iframeid=document.getElementById("iframe"); //iframe id
              if (document.getElementById){
                iframeid.height =document.documentElement.clientHeight;
              }
         }

    </script>

</head>

<body class="hold-transition skin-green sidebar-mini" >

    <div class="wrapper">

        <!-- 页面头部 -->
            <!-- 页面头部 /-->
        @include("layout.head")
        <!-- 导航侧栏 -->
           <!-- 导航侧栏 /-->
        @include('layout.left')
        <!-- 内容区域 -->
        <div class="content-wrapper">
            <iframe width="100%" id="iframe" name="iframe"  onload="SetIFrameHeight()" frameborder="0"
                    src="home.html">

            </iframe>

        </div>
        <!-- 内容区域 /-->

        <!-- 底部导航 -->
        @include("layout.foot")
        <!-- 底部导航 /-->

    </div>

</body>

</html>