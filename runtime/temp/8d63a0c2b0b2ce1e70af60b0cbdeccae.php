<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\category\catelist.html";i:1547704985;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\layout.html";i:1547012609;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\top.html";i:1547705485;s:77:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/admin\view\public\left.html";i:1547546209;}*/ ?>
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
        <div style="padding: 15px; width: 700px">
    <style>
        .tdShow{
           cursor: pointer 
        }
    </style>
    <table class="layui-table">
        <thead>
          <tr>
            <th>分类ID</th>
            <th>分类名称</th>
            <th>是否展示</th>
            <th>是否在导航栏展示</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody id="show">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
          <tr style="display:none" pid="<?php echo $v['pid']; ?>" cate_id="<?php echo $v['cate_id']; ?>">
            <td>
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?>
                <a href="javascript:;" class="javes">+</a>
                <?php echo $v['cate_id']; ?>
            </td>
            <td>
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?>
                <span class="showInput"><?php echo $v['cate_name']; ?></span>
                <input class="change" type="text" style="display:none" column="cate_name" cate_id="<?php echo $v['cate_id']; ?>" value="<?php echo $v['cate_name']; ?>">
            </td>
            <td class="tdShow" column="cate_show" ><?php echo $v['cate_show']; ?></td>
            <td class="tdShow" column="cate_navshow"><?php echo $v['cate_navshow']; ?></td>
            <td>
                <a href="<?php echo url('Category/cateDel'); ?>?cate_id=<?php echo $v['cate_id']; ?>">删除</a>
                <a href="<?php echo url('Category/cateUpdate'); ?>?cate_id=<?php echo $v['cate_id']; ?>">修改</a>
            </td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<script>
    //页面加载
    $(function(){
        layui.use(['layer'], function(){
            var layer=layui.layer;
            //页面加载显示主分类
            $("#show").children("tr[pid=0]").show();
            //给＋号点击事件，做伸缩
            $(document).on('click','.javes',function(){
                var _this=$(this);
                //获取当前点击的值，用于判断
                var content=_this.text();
                //获取当前点击的祖父tr的cate_id
                var cate_id=_this.parents('tr').attr('cate_id');
                //判断+号
                if(content=="+"){
                    //定义父类id于id相同的tr
                    var _children=$("#show").children("tr[pid="+cate_id+"]");
                    //判断长度，如果下面有就继续展示子级
                    if(_children.length>0){
                        _children.show();
                        _this.text("-");
                    }else{
                       layer.msg('没有下一级的分类了',{icon:2})
                    }
                }else{
                    //-号的时候调用trHide函数，把点击获取到的cate_id传过去
                    trHide(cate_id);
                    _this.text("+");
                }
            })
            //递归隐藏伸缩
            function trHide(cate_id){
                //获取所有与点击的祖父级的cate_id相等的父类pid的tr
                var _tr=$("#show").children("tr[pid="+cate_id+"]");
                //each循环 来获取自身的cate_id，并通过递归传值继续查询，直到没有为止
                _tr.each(function(index){
                    var c_id=$(this).attr('cate_id');
                    trHide(c_id);
                })
                //隐藏所有子级
                _tr.hide();
                //把隐藏的子级中的-号改为+号
                _tr.find("a[class='javes']").text('+');
            }
            //即点即改
            //获取点击事件，点击后文本框，隐藏自身
            $(document).on('click','.showInput',function(){
                $(this).hide();
                $(this).next('input').show();
            })
            //文本框失去焦点，获得字段，值，id，ajax传值
            $(document).on('blur','.change',function(){
                var _this=$(this);
                //隐藏自己，把span显示并值发生改变
                _this.hide();
                _this.prev('span').show();
                var column=_this.attr('column');//获取字段
                var cate_id=_this.parents('tr').attr('cate_id');//获取id
                var value=_this.val();//获取修改的值
                $.post(
                    "<?php echo url('Category/cateUpdateFile'); ?>"
                    ,{column:column,cate_id:cate_id,value:value,type:1}
                    ,function(res){
                        layer.msg(res.font,{icon:res.code})
                        if(res.code==1){
                            _this.prev('span').text(value);
                        }
                    },'json'
                );
            })
            //展示即点即改
            $(document).on('click','.tdShow',function(){
                var _this=$(this);
                var value=_this.text();
                var column=_this.attr('column');
                var cate_id=_this.parent().attr('cate_id');
                if(value=="是"){
                    value=0
                }else{
                    value=1
                }
                $.post(
                    "<?php echo url('Category/cateUpdateFile'); ?>"
                    ,{column:column,cate_id:cate_id,value:value}
                    ,function(res){
                       layer.msg(res.font,{icon:res.code})
                       if(res.code==1){
                          if(value==0){
                              _this.text("否");
                          }else{
                              _this.text('是');
                          }
                        }
                    },'json'
                );
            }) 
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