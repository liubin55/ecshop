<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\goods\goodslist.html";i:1547806074;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1548073577;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px;">
<form class="layui-form">
        <div class="layui-input-inline">
            <input type="text" id="goods_name"  placeholder="请输入搜索内容" autocomplete="off" class="layui-input">
        </div>
    <div class="layui-input-inline">
        <select id="cate_id">
            <option value="">--请选择--</option>
        <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['cate_name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="layui-input-inline">
        <select id="brand_name" >
            <option value="">--请选择--</option>
        <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['brand_name']; ?>"><?php echo $v['brand_name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="layui-input-inline">
        <select id="is_up" >
            <option value="">--请选择--</option>
            <option value="1">上架</option>
            <option value="2">下架</option>
        </select>
    </div>
    <button type="button" class="layui-btn" id="search">
        搜索
    </button>
</form>
<table id="demo" lay-filter="test"></table>
<script id="barDemo" type="text/html">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> 
</script>
</div>
<script>
    $(function(){
    layui.use(['table','form','layer'], function(){
        var table = layui.table;
        var layer=layui.layer;
        var form=layui.form;
        //列表展示
        table.render({
        elem: '#demo'
        ,url: "<?php echo url('Goods/goodsInfo'); ?>" //数据接口
        ,limit:3 //每页显示的条数
        ,limits:[5,6,7,8,9,10]//选择每页显示的条数
        ,page: true //开启分页
        ,cols: [[ //表头
            {field: 'goods_id', title: '商品ID', sort: true, fixed: 'left'}
            ,{field: 'goods_name', title: '商品名称',edit: 'text'}
            ,{field: 'self_price', title: '本店售价', sort: true,edit: 'text'}
            ,{field: 'goods_num', title: '库存',sort: true,edit:'text'}
            ,{field: 'goods_score', title: '赠送积分', sort: true,edit:'text'}
            ,{field: 'is_up', title: '是否上架', }
            ,{field: 'is_new', title: '新品', }
            ,{field: 'is_best', title: '精品', }
            ,{field: 'is_hot', title: '热卖', }
            ,{field: 'cate_name', title: '分类', }
            ,{field: 'brand_name', title: '品牌', }
            ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}
        ]]
        });
        //删除编辑
        table.on('tool(test)', function(obj){
            var goods_id = obj.data.goods_id;
            //console.log(obj)
            if(obj.event === 'del'){
            layer.confirm('真的删除行么', function(index){
                $.post(
                    "<?php echo url('Goods/goodsDel'); ?>"
                    ,{goods_id:goods_id}
                    ,function(res){
                        console.log(res);
                        if(res.code==1){
                            layer.msg(res.font,{icon:res.code});
                            table.reload('demo');
                        }else{
                            layer.msg(res.font,{icon:res.code})
                       }
                    },'json'
                );
                layer.close(index);
            });//修改
            } else if(obj.event === 'edit'){
                location.href="<?php echo url('Goods/goodsEdit'); ?>?goods_id="+goods_id;
            }
        });
        //搜索
        $("#search").click(function(){
            var goods_name=$("#goods_name").val();//传值
            var cate_id=$("#cate_id").val();//传值
            var brand_name=$("#brand_name").val();//传值
            var is_up=$("#is_up").val();//传值
            table.reload('demo', {
                where: { //设定异步数据接口的额外参数，任意设
                    goods_name:goods_name,
                    cate_id:cate_id,
                    brand_name:brand_name,
                    is_up:is_up
                }
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
        })
        //即点即改
        table.on('edit(test)', function(obj){
            var value = obj.value //得到修改后的值
            ,goods_id = obj.data.goods_id //得到所在行所有键值
            ,field = obj.field; //得到字段
            $.post(
                "<?php echo url('Goods/goodsUpdateFile'); ?>"
                ,{value:value,goods_id:goods_id,field:field}
                ,function(res){
                    table.reload('demo',{  
                    });
                    layer.msg(res.font,{icon:res.code});
                },'json'
            )
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