<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\text\textadd.html";i:1547868208;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547705485;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px; width: 600px">
    <form class="layui-form" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">文章标题</label>
          <div class="layui-input-block">
            <input type="text" name="text_title" required  lay-verify="required|checkTitle" autocomplete="off" class="layui-input">
          </div>
        </div>
      <div class="layui-form-item">
        <label class="layui-form-label">分类</label>
        <div class="layui-input-block">
          <select name="c_id">
            <option value="">--请选择--</option>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['c_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['c_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
        <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">文章内容</label>
          <div class="layui-input-block">
            <textarea name="text_content" class="layui-textarea"></textarea>
          </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">发布时间</label>
            <div class="layui-input-block">
                <div id="created" style="float: left;">
                    <input type="radio" name="create_time" value="1" checked>立即发布
                </div>
              <div id="create" style="float: left;">
                    <input type="radio" name="create_time" value="2" >延长发布
              </div>
              <input type="text" name="create" placeholder="请输入延长发布时间" style="display:none" id="create_time">
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
        layui.use(['form','layer'],function(){
            var form=layui.form;
            var layer=layui.layer;
            //验证 及唯一性验证
            form.verify({
                checkTitle: function(value, item){ //value：表单的值、item：表单的DOM对象
                    var reg=/^[\u4e00-\u9fa5]{2,10}$/i;
                    if(!reg.test(value)){
                        return "标题为2-10位中文";
                    }else{
                        var title_falg;
                        $.ajax({
                            type:'post'
                            ,url:"<?php echo url('Text/textUnique'); ?>"
                            ,data:{text_title:value}
                            ,async:false
                        }) .done(function(res){
                                if(res=='no'){
                                    title_falg="标题已存在";
                                }else{
                                    title_falg='';
                                }
                            })
                        if(title_falg!=''){
                            return title_falg;
                        }
                    }
                }
            });
            $("#create").click(function(){
                $("#create_time").show();
                $("#create_time").blur(function(){
                    var create_time=$("#create_time").val();
                    $.post(
                    "<?php echo url('Text/textTime'); ?>"
                    ,{create_time:create_time}
                    ,function(res){
                        if(res.code==2){
                            layer.msg(res.font,{icon:res.code})
                        }else{
                            $(":radio").val(create_time);
                        }  
                    },'json'
                )
                })
            })
            $("#created").click(function(){
                $("#create_time").hide();
            })
            //监听表单提交，ajax方式提交
            form.on('submit(formDemo)', function(data){
                $.post(
                    "<?php echo url('Text/textAdd'); ?>"
                    ,data.field
                    ,function(res){
                        console.log(res);
                        if(res.code==1){
                             layer.open({
                                 content: res.font
                                 ,btn: ['再次发布', '跳转至列表页']
                                 ,yes: function(index, layero){
                                     //按钮【按钮一】的回调
                                     location.href="<?php echo url('Text/textAdd'); ?>";
                                }
                                ,btn2: function(index, layero){
                                     //按钮【按钮二】的回调
                                    location.href="http://www.ecshoptp5.com/index.php/text/textList.html";
                                    //return false 开启该代码可禁止点击该按钮关闭
                              }
                            });
                         }else{
                             layer.msg(res.font,{icon:res.code});
                         }
                    },'json'
                )
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
        })
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