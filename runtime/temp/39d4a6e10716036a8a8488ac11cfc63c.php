<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\category\cateupdate.html";i:1547704449;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547273082;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px;width: 400px;">
    <form class="layui-form" action="">
        <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $cateInfo['cate_id']; ?>">
            <div class="layui-form-item">
                    <label class="layui-form-label">分类名称</label>
                    <div class="layui-input-block">
                    <input type="text" name="cate_name" value="<?php echo $cateInfo['cate_name']; ?>" required lay-verify="required|checkName" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
                    </div>
            </div>
            <div class="layui-form-item">
                    <label class="layui-form-label">是否展示</label>
                    <div class="layui-input-block">
                    <?php if($cateInfo['cate_show'] == '是'): ?>
                    <input type="radio" name="cate_show" value="1" title="是" checked>
                    <input type="radio" name="cate_show" value="0" title="否" >
                    <?php else: ?>
                    <input type="radio" name="cate_show" value="1" title="是" >
                    <input type="radio" name="cate_show" value="0" title="否" checked>
                    <?php endif; ?>
                    </div>
            </div>
            <div class="layui-form-item">
                    <label class="layui-form-label">是否在导航栏展示</label>
                    <div class="layui-input-block">
                    <?php if($cateInfo['cate_navshow'] == '是'): ?>
                    <input type="radio" name="cate_navshow" value="1" title="是" checked>
                    <input type="radio" name="cate_navshow" value="0" title="否" >
                    <?php else: ?>
                    <input type="radio" name="cate_navshow" value="1" title="是" >
                    <input type="radio" name="cate_navshow" value="0" title="否" checked>
                    <?php endif; ?>
                    </div>
            </div>
            <div class="layui-form-item">
                    <label class="layui-form-label">父分类</label>
                    <div class="layui-input-block">
                    <select name="pid">
                            <option value="0">--请选择--</option>
                            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($cateInfo['pid'] == $v['cate_id']): ?>
                            <option value="<?php echo $v['cate_id']; ?>" selected><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['cate_name']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['cate_name']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
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
                var cate_id=$("#cate_id").val();
                $.ajax({        //唯一性验证
                        type:'post',
                        url:"<?php echo url('Category/cateUnique'); ?>",
                        data:{cate_name:value,type:2,cate_id:cate_id},
                        async:false,
                }).done(function(res){
                        if(res=="no"){
                                name_falg="分类已存在";
                        }else{
                                name_falg='';
                        }
                });
                //返回错误信息，只能返回
                if(name_falg!=''){
                        return name_falg; 
                }
            }
        });  
    
        //获取表单数据  监听表单提交
        form.on('submit(formDemo)', function(data){
            $.post(
                "<?php echo url('Category/cateUpdateEdit'); ?>",
                data.field,
                function(res){
                    layer.msg(res.font, {icon: res.code,time:2000},function(){
                        location.href="<?php echo url('Category/cateList'); ?>"
                    });
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