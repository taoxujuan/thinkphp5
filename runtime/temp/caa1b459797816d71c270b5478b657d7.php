<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\qampp\htdocs\thinkphp_5\public/../application/index\view\index\index.html";i:1522830788;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title> 商品管理平台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/thinkphp_5/public/static/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/animate.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <strong class="font-bold">商品管理平台</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">商品管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo url('commodity/commodity'); ?>">商品列表</a>
                            </li> 
                            <li>
                                <a class="J_menuItem" href="<?php echo url('same/same'); ?>">条码重复</a>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-sign-out"></i>
                            <span class="nav-label">包裹管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo url('package/package'); ?>">包裹信息</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#">
                            <i class="fa fa fa-sign-out"></i>
                            <span class="nav-label">账号管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo url('account/account'); ?>">账号信息</a>
                            </li>
                        </ul>
                    </li>
                    <li class="line dk"></li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-info" href="#"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right" style="margin-right: 10px;line-height: 50px;font-size: 20px;">
                        <a href="<?php echo url('login/loginout'); ?>" class="roll-nav roll-right J_tabExit" style="color: #999"><i class="fa fa fa-sign-out"></i> 退出登录</a>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="<?php echo url('commodity/commodity'); ?>" frameborder="0" data-id="page/table_pd_page.html.html" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="/thinkphp_5/public/static/index/js/jquery.min.js?v=2.1.4"></script>
    <script src="/thinkphp_5/public/static/index/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/thinkphp_5/public/static/index/js/hAdmin.js?v=4.1.0"></script>
    <script type="text/javascript" src="/thinkphp_5/public/static/index/js/index.js"></script>

    <!-- 第三方插件 -->
    <script src="/thinkphp_5/public/static/index/js/plugins/pace/pace.min.js"></script>
    <div style="text-align:center;">
    </div>
</body>

</html>
