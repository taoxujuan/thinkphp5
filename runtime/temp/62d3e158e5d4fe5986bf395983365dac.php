<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\qampp\htdocs\thinkphp_5\public/../application/index\view\login\login.html";i:1522829866;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/thinkphp_5/public/static/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/animate.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">
        body{
            background-position: center;
            background-repeat:no-repeat; 
            background-size:100% 100%;
        }
        .gohome{
            display: none;
        }
    </style>
</head>
<body class="white-bg">
    <div class="container">
        <div class="middle-box text-center loginscreen" style="margin-top: 15%;">
            <h2>包裹信息管理平台</h2>
            <!-- 登录 -->   
            <form class="m-t" > 
　　　　　　　　<div class="form-group">
                    <input type="text" name="name" id="username" class="form-control" placeholder="请输入用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="请输入密码" required="">
                </div>
                <!-- 验证码 -->
                <!-- <input type="text" class="input" name="captcha" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码"  style="width: 200px;"/>  -->
                <input type="text" class="form-control" name="captcha" placeholder="验证码" style="color:black;width:120px;float:left;margin:0px 0px;" data-validate="required:请填写右侧的验证码" name="code" id="code"/>
                <img src='<?php echo url("show_captcha"); ?>' alt="" width="121" height="32" class="passcode" onclick="this.src=this.src+'?'"/> 
                <!-- <img style="width: 150px;height:32px;" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>'"> -->
                <button type="button" class="btn btn-info block full-width m-b" id="login" style="margin-top: 20px;">登 录</button>
            </form>
        </div>
    </div>
    <!-- 全局js -->
    <script src="/thinkphp_5/public/static/index/js/jquery.min.js?v=2.1.4"></script>
    <script src="/thinkphp_5/public/static/index/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/thinkphp_5/public/static/index/js/content.js?v=1.0.0"></script>
    <script type="text/javascript" src="/thinkphp_5/public/static/index/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript">
        $("#login").click(function(){
            var username = $("#username").val();
            var password = $('#password').val();
            var code = $('#code').val();
            if (username && password && code) {
                $.post("logincheck", {
                    name: username,
                    password: password,
                    code: code
                }, function (data) {
                    if (!data.success) {
                        layer.alert(data.msg);
                    }else{
                        window.location.href = '<?php echo url("index/index"); ?>'
                    }
                })
            } else {
                layer.alert('请填写完整！')
            }
        });
    </script>
</body>

</html>
