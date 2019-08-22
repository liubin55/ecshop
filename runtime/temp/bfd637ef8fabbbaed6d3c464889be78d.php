<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\admin\adminadd.html";i:1547197303;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547273082;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
  <script src="__STATIC__/layui/layui.js"></script>
  <script src="__STATIC__/jquery-3.2.1.min.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
<div class="layui-header">
    <div class="layui-logo">layui 后台布局&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('index/index'); ?>">首页</a></div>
    
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          <?php echo \think\Session::get('adminInfo.admin_name'); ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo url('Login/quit'); ?>">退了</a></li>
    </ul>
  </div>
<div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
          <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
          <ul class="layui-nav layui-nav-tree"  lay-filter="test">
              <!-- layui-nav-itemed下拉展示样式 -->
            <li class="layui-nav-item layui-nav-itemed">
              <a class="" href="javascript:;">管理员管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Admin/adminAdd'); ?>">管理员添加</a></dd>
                <dd><a href="<?php echo url('Admin/adminList'); ?>">管理员列表</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a class="" href="javascript:;">分类管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Category/cateAdd'); ?>">分类添加</a></dd>
                <dd><a href="<?php echo url('Category/cateList'); ?>">分类列表</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a class="" href="javascript:;">品牌管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Brand/brandAdd'); ?>">品牌添加</a></dd>
                <dd><a href="<?php echo url('Brand/brandList'); ?>">品牌列表</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a class="" href="javascript:;">商品管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Goods/goodsAdd'); ?>">商品添加</a></dd>
                <dd><a href="<?php echo url('Goods/goodsList'); ?>">商品列表</a></dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>
  
  
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
        <div style="padding: 15px ;width:600px">
<form class="layui-form">
        <div class="layui-form-item" >
                <label class="layui-form-label">管理员名称</label>
                <div class="layui-input-block">
                        <!-- lay-verify="required|checkName" -->
                <input type="text" name="admin_name" required lay-verify="required|checkName"  autocomplete="off" class="layui-input">
                </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">管理员密码</label>
                <div class="layui-input-block">
                        <!-- lay-verify="required|checkPwd" -->
                <input type="password" name="admin_pwd" required  lay-verify="required|checkPwd" autocomplete="off" class="layui-input">
                </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">管理员电话</label>
                <div class="layui-input-block">
                        <!-- lay-verify="required|phone" -->
                <input type="text" name="admin_tel" required  lay-verify="required|phone" autocomplete="off" class="layui-input">
                </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">管理员邮箱</label>
                <div class="layui-input-block">
                        <!-- lay-verify="required|email" -->
                <input type="text" name="admin_email" required  lay-verify="required|email" autocomplete="off" class="layui-input">
                </div>
        </div>
        
        <div class="layui-form-item">
                <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
        </div>
 </form>
       
 </div>
<script>
    //页面加载
    $(function(){
    layui.use(['form','layer'], function(){
    var form = layui.form;
    var layer=layui.layer;
    //验证名字
    var name_falg;
    form.verify({
        checkName:function(value, item){ //value：表单的值、item：表单的DOM对象
        var reg=/^[a-z_]\w{3,11}$/;
            if(!reg.test(value)){
                return "名称4-12位数字、字母和下划线组成，非数字开头";
            }else{
                $.ajax({        //唯一性验证
                        type:'post',
                        url:"<?php echo url('admin/adminUnique'); ?>",
                        data:{admin_name:value,type:1},
                        async:false,
                }).done(function(res){
                        if(res=="no"){
                                name_falg="管理员已存在";
                        }else{
                                name_falg='';
                        }
                });
                //返回错误信息，只能返回
                if(name_falg!=''){
                        return name_falg; 
                }
            }
        },
            //验证密码
            checkPwd:function(value, item){ //value：表单的值、item：表单的DOM对象
            var reg=/.{6,12}$/;
                    if(!reg.test(value)){
                            return "密码6-12位组成";
                    }
            }
  
    });  

    //获取表单数据  监听表单提交
    form.on('submit(formDemo)', function(data){
        $.post(
            "<?php echo url('admin/adminAdd'); ?>",
            data.field,
            function(res){
                if(res.code==1){
                        //跳转按钮
                     layer.open({
                        content: '添加成功'
                        ,btn: ['再次添加', '跳转至列表页']
                        ,yes: function(index, layero){
                        location.href="<?php echo url('admin/adminAdd'); ?>";
                        }
                        ,btn2: function(index, layero){
                        location.href="<?php echo url('admin/adminList'); ?>";
                        }
                        });    
                }else{
                //错误提示
                   layer.msg(res.font, {icon: res.code});
                }
            },'json'
        );
        return false;//阻止提交
    });                  
     });
 });
 </script>
 

  </div>
  

</div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>