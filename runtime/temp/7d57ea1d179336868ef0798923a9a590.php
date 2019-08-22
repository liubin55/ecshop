<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/data/wwwroot/default/ecshoptp5/public/../application/admin/view/login/login.html";i:1547276592;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/login/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/login/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/login/css/component.css" />
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="__STATIC__/layui/layui.js"></script>
    <!--[if IE]>
    <script src="__STATIC__/admin/login/js/html5.js"></script>
    <![endif]-->
    <style>
        input::-webkit-input-placeholder{
            color:rgba(0, 0, 0, 0.726);
        }
        input::-moz-placeholder{   /* Mozilla Firefox 19+ */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-ms-input-placeholder{  /* Internet Explorer 10-11 */
            color:rgba(0, 0, 0, 0.726);
        }
    </style>
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>登录</h3>
                <form  method="post"  class="layui-form">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input  name="admin_name" class="text" lay-verify="required" style="color: #000000 !important" type="text" placeholder="请输入账户">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input  name="admin_pwd" class="text" lay-verify="required" style="color: #000000 !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div>
                        <input type="text" name="code" lay-verify="required" style="width: 120px;height: 50px;border-radius: 25px;border: 1px solid #ccc;">
                        <img src="<?php echo captcha_src(); ?>" id="changeCode">
                    </div>
                    <div id="login" class="mb2">
                        <a class="act-but submit" lay-submit lay-filter="sub" href="javascript:;"  style="color: #FFFFFF">登录</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="__STATIC__/admin/login/js/TweenLite.min.js"></script>
<script src="__STATIC__/admin/login/js/EasePack.min.js"></script>
<script src="__STATIC__/jquery-3.2.1.min.js"></script>
<script src="__STATIC__/admin/login/js/rAF.js"></script>
<script src="__STATIC__/admin/login/js/demo-1.js"></script>
<script src="__STATIC__/admin/login/js/Longin.js"></script>
<div style="text-align:center;">
</div>
</body>
</html>

<script>
    $(function(){
        layui.use(['form','layer'],function(){
            var form=layui.form;
            //验证码重置
            $('#changeCode').click(function(){
                $(this).prop('src',"<?php echo captcha_src(); ?>");
            });
            //监听表单提交
            form.on('submit(sub)', function(data){

                $.post(
                    "<?php echo url('Login/login'); ?>",
                    data.field,
                    function(msg){
                       if(msg.code==1){
                           layer.msg(msg.font,{icon:msg.code,time:2000},function(){
                               location.href="<?php echo url('Index/index'); ?>";
                           })
                       }else{
                           layer.msg(msg.font,{icon:msg});
                           $('#changeCode').prop('src',"<?php echo captcha_src(); ?>");
                       }
                    },
                    'json'
                );
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
        })
    });


</script>
