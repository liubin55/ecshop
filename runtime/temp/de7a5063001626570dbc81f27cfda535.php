<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\brand\brandedit.html";i:1547535525;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547705485;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
          <img src="__STATIC__/$_YJL9O93GG0IPY([4A])CV.gif" class="layui-nav-img">
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
        <div style="padding: 15px;width: 600px">
        <form class="layui-form" action="">
            <input type="hidden" name="brand_id" value="<?php echo $arr['brand_id']; ?>" id="brand_id">
          <input type="hidden" name="brand_logo" value="<?php echo $arr['brand_logo']; ?>" id="logo">
          <div class="layui-form-item">
            <label class="layui-form-label">品牌名称</label>
            <div class="layui-input-block">
              <input type="text" name="brand_name" value="<?php echo $arr['brand_name']; ?>" required  lay-verify="required|brandName"  autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">品牌网址</label>
            <div class="layui-input-block">
              <input type="text" name="brand_url" value="<?php echo $arr['brand_url']; ?>" required lay-verify="required|url"  autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">品牌logo</label>
            <div class="layui-input-block">
              <button type="button" class="layui-btn" id="brand_logo">
                <i class="layui-icon">&#xe67c;</i>上传图片
              </button>
              <img src="/uploads/brandLogo/<?php echo $arr['brand_logo']; ?>" width="100px" height="100px" id="img">
            </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
              <textarea name="brand_desc" placeholder="请输入内容" class="layui-textarea"><?php echo $arr['brand_desc']; ?></textarea>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">是否展示</label>
            <div class="layui-input-block">
            <?php if($arr['brand_show']=='是'): ?>
              <input type="radio" name="brand_show" value="1" title="是"  checked>
              <input type="radio" name="brand_show" value="0" title="否">
            <?php else: ?>
            <input type="radio" name="brand_show" value="1" title="是" >
            <input type="radio" name="brand_show" value="0" title="否"  checked>
            <?php endif; ?>
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
          $(function(){
            layui.use(['form','upload','layer'], function(){
              var form = layui.form;
              var upload = layui.upload;
              //执行上传文件
              var uploadInst = upload.render({
                elem: '#brand_logo' //需要上传文件按钮的id
                ,url: "<?php echo url('Brand/brandLogo'); ?>" //上传接口
                ,done: function(res){ //上传完毕回调
                  $("#logo").val(res.src);
                  layer.msg(res.font,{icon:res.code});
                  $("#img").prop('src','/uploads/brandLogo/'+res.src)
                }
                ,error: function(){    //请求异常回调
                  layer.msg(res.font,{icon:res.code})
                }
              });
              //验证
              form.verify({
                brandName: function(value, item){ //value：表单的值、item：表单的DOM对象
                  var reg=/^[\u4e00-\u9fa5a-z_0-9]{2,}$/;
                  if(!reg.test(value)){
                    return "品牌名称由中文字母数字下划线组成，最少2位";
                  }else{
                    var brand_falg;
                    var brand_id=$("#brand_id").val();
                    $.ajax({
                      type:'post'
                      ,url:"<?php echo url('Brand/brandUnique'); ?>"
                      ,data:{brand_name:value,type:3,brand_id:brand_id}
                      ,async:false
                    }).done(function(res){
                        if(res=='ok'){
                          brand_falg='';
                        }else{
                          brand_falg="品牌名称已存在";
                        }
                    })
                    if(brand_falg!=''){
                      return brand_falg;
                    }
                  }
                }
                ,url:function(value,item){
                    var brand_falg;
                    var brand_id=$("#brand_id").val();
                    $.ajax({
                      type:'post'
                      ,url:"<?php echo url('Brand/brandUnique'); ?>"
                      ,data:{brand_url:value,type:4,brand_id:brand_id}
                      ,async:false
                    }).done(function(res){
                        if(res=='ok'){
                          brand_falg='';
                        }else{
                          brand_falg="品牌网址已存在";
                        }
                    })
                    if(brand_falg!=''){
                      return brand_falg;
                    }
                  }
              }); 
              //监听阻止提交 实行ajax表单提交
              form.on('submit(formDemo)', function(data){
                //console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
                $.post(
                  "<?php echo url('Brand/brandEditDo'); ?>"
                  ,data.field
                  ,function(res){
                      if(res.code==1){
                          layer.msg(res.font,{icon:res.code,time:2000},function(){
                              location.href="<?php echo url('Brand/brandList'); ?>"
                          })
                      }else{
                        layer.msg(res.font,{icon:res.code,time:2000},function(){
                              location.href="<?php echo url('Brand/brandList'); ?>"
                          })
                      }
                  },'json'
                )
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
              });
            });
          })
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