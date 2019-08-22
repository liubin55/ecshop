<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/admin\view\goods\goodsadd.html";i:1547806182;s:84:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:88:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1548073577;s:89:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px;width: 700px" >
<form class="layui-form" onsubmit="return false">
  <div class="layui-form-item">
    <label class="layui-form-label">商品名称</label>
    <div class="layui-input-block">
      <input type="text" name="goods_name" required  lay-verify="required|checkName" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">本店售价</label>
    <div class="layui-input-block">
      <input type="text" name="self_price" required lay-verify="required|number" placeholder="￥" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
        <label class="layui-form-label">市场售价</label>
        <div class="layui-input-block">
                <input type="text" name="market_price" required lay-verify="required|number" placeholder="￥" autocomplete="off" class="layui-input">
        </div>
</div>
<div class="layui-form-item">
        <label class="layui-form-label">是否上架</label>
        <div class="layui-input-block">
                <input type="radio" name="is_up" value="1" title="是" checked>
                <input type="radio" name="is_up" value="0" title="否" >
        </div>
</div>
<div class="layui-form-item">
        <label class="layui-form-label">请选择</label>
        <div class="layui-input-block">
                <input type="checkbox"  value="1" name="is_new" title="新品">
                <input type="checkbox"  value="1" name="is_best" title="精品">
                <input type="checkbox" value="1" name="is_hot" title="热卖">
        </div>
 </div>
 <div class="layui-form-item">
        <label class="layui-form-label">库存</label>
        <div class="layui-input-block">
                <input type="text" name="goods_num" required lay-verify="required|number" placeholder="剩余库存" autocomplete="off" class="layui-input">
        </div>
 </div>
<div class="layui-form-item">
        <label class="layui-form-label">赠送积分</label>
        <div class="layui-input-block">
                <input type="text" name="goods_score" required lay-verify="required|number" placeholder="积分数" autocomplete="off" class="layui-input">
        </div>
 </div>
  <div class="layui-form-item">
        <label class="layui-form-label">商品图片</label>
        <div class="layui-input-inline">
                <button type="button" class="layui-btn" id="uploadImg">
                         <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="goods_img" id="img">
        </div>
  </div>
  <div class="layui-form-item">
        <label class="layui-form-label">商品轮播图</label>
        <div class="layui-input-inline">
                <button type="button" class="layui-btn" id="uploadImgs">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="goods_imgs" id="imgs">
        </div>
  </div>
  <div class="layui-form-item">
        <label class="layui-form-label">分类</label>
        <div class="layui-input-inline">
                <select name="cate_id">
                        <option value="">--请选择--</option>
                <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['cate_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
        </div>
  </div>
  <div class="layui-form-item">
        <label class="layui-form-label">品牌</label>
        <div class="layui-input-inline">
                <select name="brand_id" >
                        <option value="">--请选择--</option>
                <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $v['brand_id']; ?>"><?php echo $v['brand_name']; ?></option>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
        </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">商品详情</label>
    <div class="layui-input-block">
        <textarea name="goods_desc" id="demo" style="display: none;"></textarea>
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
        layui.use(['form','layer','layedit','upload'], function(){
        var form = layui.form;
        var layer=layui.layer;
        var layedit=layui.layedit;
        var upload=layui.upload;
        //验证
        form.verify({
                checkName: function(value, item){ //value：表单的值、item：表单的DOM对象
                        var reg=/^[\u4e00-\u9fa5\w]{2,10}$/;
                        if(!reg.test(value)){
                                return "商品名称由中文数字字母组成2-10位";
                        }else{
                               var name_falg; 
                                $.ajax({        //唯一性验证
                                        type:'post',
                                        url:"<?php echo url('Goods/goodsUnique'); ?>",
                                        data:{goods_name:value,type:1},
                                        async:false,
                                }).done(function(res){
                                        if(res=="no"){
                                                name_falg="商品名称已存在";
                                        }else{
                                                name_falg='';
                                        }
                                });
                                //返回错误信息，只能返回
                                if(name_falg!=''){
                                        return name_falg; 
                                }
                        }
                } 
        });
        //编辑器上传文件
          layedit.set({
             uploadImage: {
             url: "<?php echo url('Goods/goodsUploadImg'); ?>" //接口url
          }});
        var index=layedit.build('demo'); //建立编辑器
        //单文件上传
        var uploadInst = upload.render({
        elem: '#uploadImg' //绑定元素
        ,url: "<?php echo url('Goods/goodsUploadImgs'); ?>" //上传接口
        ,done: function(res){
          $("#img").val(res.src);//把值赋给隐藏域
          layer.msg(res.font,{icon:res.code})
        }
        ,error: function(){
        layer.msg(res.font,{icon:res.code})
        }
        });
        //多文件上传
        upload.render({
        elem: '#uploadImgs' //绑定元素
        ,url: "<?php echo url('Goods/goodsUploadImgs'); ?>" //上传接口
        ,multiple:true
        ,number:3
        ,done: function(res){
         var imgs=$("#imgs").val();
         var src=imgs+res.src+"|";//拼接图片把值返回给隐藏域
         $("#imgs").val(src);
          layer.msg(res.font,{icon:res.code})
        }
        ,error: function(){
        layer.msg(res.font,{icon:res.code})
        }
        });
        //获取表单数据  监听表单提交
        form.on('submit(formDemo)', function(data){
                data.field.goods_desc=layedit.getContent(index);//把富文本编辑器的值赋给goods_desc
                $.post(
                        "<?php echo url('Goods/goodsAdd'); ?>",
                        data.field,
                        function(res){
                                if(res.code==1){
                                        layer.open({
                                                content: res.font
                                                ,btn: ['再次添加', '跳转至列表']
                                                ,yes: function(index, layero){
                                                //按钮【按钮一】的回调
                                                location.href="<?php echo url('Goods/goodsAdd'); ?>";
                                                }
                                                ,btn2: function(index, layero){
                                                //按钮【按钮二】的回调
                                                location.href="<?php echo url('Goods/goodsList'); ?>";
                                                //return false 开启该代码可禁止点击该按钮关闭
                                                }
                                        });
                                }else{
                                        layer.msg(res.font,{icon:res.code});
                                }
                        },'json'
                )
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