<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\admin\adminlist.html";i:1547205242;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547705485;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px;width: 1000px">
  <input type="text" id="contents" placeholder="请输入管理员名称的相关文字" style="width: 200px;height: 35px;">
  <input type="button" id="search" value="搜索" class="layui-btn layui-btn-normal">
    <table id="demo" lay-filter="test"></table>
    <script id="barDemo" type="text/html">
      <a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
      <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>              
</div>
<script>
  $(function(){
    layui.use(['table','layer'], function(){
      //实例化table对象展示列表
      var table = layui.table;
      var layer = layui.layer;
      table.render({
        elem: '#demo'//id为demo的table容器
        ,url: "<?php echo url('admin/adminInfo'); ?>" //数据接口
        ,limit:8 //每页显示的条数
        ,limits:[5,6,7,8,9,10]//选择每页显示的条数
        ,page: true //开启分页
        ,cols: [[ //表头
          {field: 'admin_id', title: 'ID', width:60,  fixed: 'left'}
          ,{field: 'admin_name', title: '用户名', width:100, edit: 'text'}
          ,{field: 'admin_email', title: '邮箱', width:120,  edit: 'text'}
          ,{field: 'admin_tel', title: '电话', width:120, edit: 'text'} 
          ,{field: 'create_time', title: '添加时间', width: 200}
          ,{field: 'update_time', title: '更新时间', width:200, }
          ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:200}
        ]]
      });
      //搜索 
      $("#search").click(function(){
        var contents=$("#contents").val();
        if(contents==''){
          return layer.msg('请输入搜索内容',{icon:2});
        }
      //重新加载
        table.reload('demo',{
          where: { //设定异步数据接口的额外参数，传给原方法需要查询的参数
            admin_name: contents
          }
          ,page: {
            curr: 1 //查询的数据从第 1 页开始
          }
        });
      }); 
      //即点即改
      table.on('edit(test)', function(obj){
        var value = obj.value //得到修改后的值
        ,admin_id = obj.data.admin_id //得到所在行所有键值，只获得id
        ,field = obj.field; //得到字段
        //ajax传值
        $.post(
          "<?php echo url('Admin/adminUpdateFile'); ?>"
          ,{value:value,admin_id:admin_id,field:field}
          ,function(res){
            table.reload('demo',{  
            });
            layer.msg(res.font,{icon:res.code});
          }
          ,'json'
        )
      });
      //监听工具条
      table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var admin_id = obj.data.admin_id; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        if(layEvent === 'detail'){ //查看
          location.href="<?php echo url('Admin/adminDetail'); ?>?admin_id="+admin_id;
        } else if(layEvent === 'del'){ //删除
          layer.confirm('确认删除么?', {icon: 3, title:'提示'}, function(index){
            $.post(
              "<?php echo url('Admin/adminDel'); ?>"
              ,{admin_id:admin_id}
              ,function(res){
                layer.msg(res.font,{icon:res.code});
                table.reload('demo');
              },'json'
            )
            layer.close(index);
          });
        }else if(layEvent === 'edit'){ //编辑
          location.href="<?php echo url('Admin/adminUpdate'); ?>?admin_id="+admin_id;
        }
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