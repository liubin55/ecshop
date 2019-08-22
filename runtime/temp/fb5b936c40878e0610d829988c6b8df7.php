<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:79:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\cart\cartlist.html";i:1551678542;s:72:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\layout.html";i:1550892650;s:79:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\public\header.html";i:1551411942;s:76:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\public\top.html";i:1551160776;s:79:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\public\footer.html";i:1548036843;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="__STATIC__/index/css/style.css" />
    <!--[if IE 6]>
    <script src="__STATIC__/index/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/menu.js"></script>    
        
	<script type="text/javascript" src="__STATIC__/index/js/select.js"></script>
    
	<script type="text/javascript" src="__STATIC__/index/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="__STATIC__/index/js/iban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/fban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/f_ban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/mban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/bban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/hban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/tban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/lrscroll_1.js"></script>
    <script src="__STATIC__/layui/layui.js"></script>
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
        <div class="sou">
            <!--Begin 所在收货地区 Begin-->
            <span class="s_city_b">
                <span class="fl">送货至：</span>
                <span class="s_city">
                    <span>四川</span>
                    <div class="s_city_bg">
                        <div class="s_city_t"></div>
                        <div class="s_city_c">
                            <h2>请选择所在的收货地区</h2>
                            <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                              <tr>
                                <th>A</th>
                                <td class="c_h"><span>安徽</span><span>澳门</span></td>
                              </tr>
                              <tr>
                                <th>B</th>
                                <td class="c_h"><span>北京</span></td>
                              </tr>
                              <tr>
                                <th>C</th>
                                <td class="c_h"><span>重庆</span></td>
                              </tr>
                              <tr>
                                <th>F</th>
                                <td class="c_h"><span>福建</span></td>
                              </tr>
                              <tr>
                                <th>G</th>
                                <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                              </tr>
                              <tr>
                                <th>H</th>
                                <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                              </tr>
                              <tr>
                                <th>J</th>
                                <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                              </tr>
                              <tr>
                                <th>L</th>
                                <td class="c_h"><span>辽宁</span></td>
                              </tr>
                              <tr>
                                <th>N</th>
                                <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                              </tr>
                              <tr>
                                <th>Q</th>
                                <td class="c_h"><span>青海</span></td>
                              </tr>
                              <tr>
                                <th>S</th>
                                <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                              </tr>
                              <tr>
                                <th>T</th>
                                <td class="c_h"><span>台湾</span><span>天津</span></td>
                              </tr>
                              <tr>
                                <th>X</th>
                                <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                              </tr>
                              <tr>
                                <th>Y</th>
                                <td class="c_h"><span>云南</span></td>
                              </tr>
                              <tr>
                                <th>Z</th>
                                <td class="c_h"><span>浙江</span></td>
                              </tr>
                            </table>
                        </div>
                    </div>
                </span>
            </span>
            <!--End 所在收货地区 End-->
            <span class="fr">
                <?php if(\think\Session::get('userInfo.user_id')==''): ?>
                    <span class="fl">你好，请<a href="<?php echo url('Login/login'); ?>">登录</a>&nbsp; <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
                <?php else: ?>
                    <span class="fl">欢迎<font color="red"><?php echo \think\Session::get('userInfo.user_name'); ?></font>登录&nbsp; &nbsp; <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
                <?php endif; ?>
                <span class="ss">
                    <div class="ss_list">
                        <a href="<?php echo url('User/index'); ?>">个人中心</a>
                        <div class="ss_list_bg">
                            <div class="s_city_t"></div>
                            <div class="ss_list_c">
                                <ul>
                                    <li><a href="<?php echo url('Login/quit'); ?>">退出</a></li>
                                </ul>
                            </div>
                        </div>     
                    </div>
                </span>
                <span class="fl">|&nbsp;关注我们：</span>
                <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
                <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__STATIC__/index/images/s_tel.png" align="absmiddle" /></a></span>
            </span>
        </div>
</div>
    <!--End 猜你喜欢 End-->
    <div class="top">
<div class="logo"><a href="<?php echo url('Index/index'); ?>"><img src="__STATIC__/index/images/logo.png" /></a></div>
<div class="search">
    <form>
        <input type="text" value="" class="s_ipt" />
        <input type="submit" value="搜索" class="s_btn" />
    </form>                      
    <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
</div>
<div class="i_car">
    <a href="<?php echo url('Cart/cartList'); ?>"><div class="car_t">购物车 [ <span><?php echo $cartCount; ?></span> ]</div></a>
    <div class="car_bg">
        <?php if(\think\Session::get('userInfo')==''): ?>
            <!--Begin 购物车未登录 Begin-->
        <div class="un_login">还未登录！<a href="<?php echo url('Login/login'); ?>" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
        <!--End 购物车未登录 End-->
        <?php else: ?>
        <!--Begin 购物车已登录 Begin-->
        <ul class="cars">
            <?php if(is_array($cartInfo) || $cartInfo instanceof \think\Collection || $cartInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cartInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li>
                <div class="img"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><img src="/uploads/goodsLogo/<?php echo $v['goods_img']; ?>" width="58" height="58" /></a></div>
                <div class="name"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><?php echo $v['goods_name']; ?></a></div>
                <div class="price"><font color="#ff4e00">￥<?php echo $v['self_price']; ?></font> X<?php echo $v['buy_number']; ?></div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span><?php echo $priceNum; ?></span></div>
        <div class="price_a"><a href="<?php echo url('Cart/cartList'); ?>">去购物车结算</a></div>
        <!--End 购物车已登录 End-->
        <?php endif; ?>
    </div>
</div>
</div>
<div class="menu_bg">
<div class="menu">
    <!--Begin 商品分类详情 Begin-->  
    <?php if($controllerName == 'Index'): $c = 'leftNav'; else: $c = 'leftNav none'; endif; ?>
    <div class="nav">
        <div class="nav_t">全部商品分类</div>
        <div class="<?php echo $c; ?>">
            <ul>  
                <?php if(is_array($getCateInfo) || $getCateInfo instanceof \think\Collection || $getCateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $getCateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>    
                <li>
                    <div class="fj">
                        <span class="n_img"><span></span><img src="__STATIC__/index/images/nav1.png" /></span>
                        <span class="fl"><?php echo $v['cate_name']; ?></span>
                    </div>
                    <div class="zj" style="top:-<?php echo $key*40; ?>px;">
                        <div class="zj_l">
                            <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <div class="zj_l_c">
                                <h2><?php echo $vv['cate_name']; ?></h2>
                                <?php if(is_array($vv['son']) || $vv['son'] instanceof \think\Collection || $vv['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                                <a href="#"><?php echo $vvv['cate_name']; ?></a>|
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="zj_r">
                            <a href="#"><img src="__STATIC__/index/images/n_img1.jpg" width="236" height="200" /></a>
                            <a href="#"><img src="__STATIC__/index/images/n_img2.jpg" width="236" height="200" /></a>
                        </div>
                    </div>

                </li> 
                <?php endforeach; endif; else: echo "" ;endif; ?>                	
            </ul>            
        </div>
    </div>  
    <!--End 商品分类详情 End-->                                                     
    <ul class="menu_r">
        <li><a href="<?php echo url('Goods/goodsList'); ?>">全部分类</a></li>
        <?php if(is_array($Info) || $Info instanceof \think\Collection || $Info instanceof \think\Paginator): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <li><a  class="cate_name" href="<?php echo url('Goods/goodsList'); ?>?cate_id=<?php echo $v['cate_id']; ?>"><?php echo $v['cate_name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="m_ad">中秋送好礼！</div>
</div>
</div>

<script type="text/javascript" src="__STATIC__/index/js/n_nav.js"></script>
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="__STATIC__/index/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th"><input type="checkbox" id="checkAll"></td>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="140">单价</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          <tbody id="box">
          <?php if(is_array($cartInfo) || $cartInfo instanceof \think\Collection || $cartInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cartInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key%2==0): $car_tr = ''; else: $car_tr = 'car_tr'; endif; ?>
          <tr class="<?php echo $car_tr; ?>" goods_num="<?php echo $v['goods_num']; ?>" goods_id="<?php echo $v['goods_id']; ?>">
            <td ><input type="checkbox" class="checkAdd"></td>
            <td>
            	<div class="c_s_img">
                    <img src="/uploads/goodsLogo/<?php echo $v['goods_img']; ?>" width="73" height="73" />
                </div>
                <?php echo $v['goods_name']; ?>
            </td>
            <td align="center">
                ￥<span style="text-decoration-line: line-through"><?php echo $v['market_price']; ?></span><br>
                ￥<span><?php echo $v['self_price']; ?></span>
            </td>
            <td align="center" >
            	<div class="c_num">
                    <input type="button"  class="car_btn_1" />
                	<input type="text" value="<?php echo $v['buy_number']; ?>" class="car_ipt buy_number" />  
                    <input type="button"  class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;" class="tolato">
                ￥<span><?php echo $v['self_price']*$v['buy_number']; ?></span>
            </td>
            <td align="center">
                <a href="javascript:;" class="del">删除</a>&nbsp;
                <?php if(\think\Session::get('userInfo') == ''): ?>&nbsp;
                <a href="javascript:;" class="praise">加入收藏</a>
                <?php else: if(in_array($v['goods_id'],$goods_id)): ?>
                <a href="javascript:;" class="praise">已收藏</a>
                <?php else: ?>
                <a href="javascript:;" class="praise">加入收藏</a>
                <?php endif; endif; ?>
            </td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad">
                    <input type="button" id="clear" value="清空购物车" />
                </label>
                <label class="r_rad">
                    <input type="button" value="加入收藏">
                </label>
                <span class="fr">
                    商品总价：<b style="font-size:22px; color:#ff4e00;">
                        ￥<span id="priceNum">0</span>
                    </b>
                </span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
                <a href="<?php echo url('Index/index'); ?>"><img src="__STATIC__/index/images/buy1.gif" /></a>&nbsp; &nbsp; 
                <a href="javascript:;" id="cartCount"><img src="__STATIC__/index/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
    <script>
        $(function(){
            layui.use(['form','layer'],function(){
                var layer=layui.layer;
                var form=layui.form;
                //点击+
                $(document).on('click','.car_btn_2',function(){
                    var _this=$(this);
                    var goods_num=_this.parents('tr').attr('goods_num');
                    var goods_id=_this.parents('tr').attr('goods_id');
                    var buy_number=parseInt(_this.prev('input').val());
                    if(buy_number>=goods_num){
                        _this.prop("diabled",true);
                    }else{
                        buy_number+=1;
                        _this.prev('input').val(buy_number)   
                    }
                    //传值修改商品数量
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('Cart/changePrice'); ?>",
                        data: {goods_id:goods_id,buy_number:buy_number},
                        async:false,
                        dataType:'json'
                        }).done(function(res){
                           
                        });
                    //修改小计
                    selfPrice(_this,buy_number);
                    //修改总价
                    priceNum();

                })
                //修改小计
                function selfPrice(_this,buy_number){
                    var self_price=parseInt(_this.parents('td').prev('td').find('span').last().text());
                    var price=self_price*buy_number;
                    _this.parents('td').next('td').find('span').text(price);
                }
                //点击－
                $(document).on('click','.car_btn_1',function(){
                    var _this=$(this);
                    var buy_number=parseInt(_this.next('input').val());
                    var goods_id=_this.parents('tr').attr('goods_id');
                    if(buy_number<=1){
                        _this.prop("diabled",true);
                    }else{
                        buy_number-=1;
                        _this.next('input').val(buy_number);
                    }
                    //传值修改商品数量
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('Cart/changePrice'); ?>",
                        data: {goods_id:goods_id,buy_number:buy_number},
                        async:false,
                        dataType:'json'
                        }).done(function(res){
                           
                        });
                    //修改小计
                    selfPrice(_this,buy_number);
                    //修改总价
                    priceNum();
                })
                //失去焦点
                $(document).on('blur','.buy_number',function(){
                    var _this=$(this);
                    var goods_id=_this.parents('tr').attr('goods_id');
                    var goods_num=_this.parents('tr').attr('goods_num');
                    var buy_number=parseInt(_this.val());
                    var reg=/^[1-9]\d*$/;
                    if(!reg.test(buy_number)){
                        _this.val(1);
                    }else if(buy_number>=goods_num){
                        _this.val(goods_num)
                    }else if(buy_number<=1){
                        _this.val(1)
                    }else{
                        _this.val(buy_number)
                    }
                    //传值修改商品数量
                    buy_number=parseInt(_this.val());
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('Cart/changePrice'); ?>",
                        data: {goods_id:goods_id,buy_number:buy_number},
                        async:false,
                        dataType:'json'
                        }).done(function(res){

                        });
                    //修改小计
                    selfPrice(_this,buy_number);
                    //修改总价
                    priceNum();
                })
                //点击删除
                $(document).on('click','.del',function(){
                    var _this=$(this);
                    var goods_id=$(this).parents('tr').attr('goods_id');
                    layer.confirm('你确定要删除吗',{icon:3,title:'提示'},function(index){
                        $.post(
                            "<?php echo url('Cart/cartDel'); ?>",
                            {goods_id:goods_id},
                            function(res){
                                layer.msg(res.font,{icon:res.code}) 
                                if(res.code==1){
                                    _this.parents('tr').remove();
                                    priceNum()
                                    layer.close(index);
                                }
                            },'json'
                        )
                    })
                })
                //点击收藏
                $(document).on('click','.praise',function(){
                    var  _this=$(this);
                    var goods_id=_this.parents('tr').attr('goods_id');
                    $.post(
                        "<?php echo url('Cart/cartHide'); ?>",
                        {goods_id:goods_id},
                        function(res){
                            layer.msg(res.font,{icon:res.code})
                            if(res.code==1){
                                _this.text("已收藏");
                                _this.prop("diabled",true);
                            }
                        },'json'
                    )
                })
                //点击全选
                $(document).on('click','#checkAll',function(){
                    var check=$("#checkAll").prop('checked');
                    $(".checkAdd").prop('checked',check);
                    //总价
                    priceNum();
                })
                //点击单选
                $(document).on('click','.checkAdd',function(){
                    //商品总价
                    priceNum();
                })
                //清空购物车
                $(document).on('click','#clear',function(){
                    layer.confirm('你确定要清空吗',{icon:3,title:'提示'},function(index){
                        $.post(
                            "<?php echo url('Cart/cartDelAll'); ?>",
                            function(res){
                                layer.msg(res.font,{icon:res.code});
                                if(res.code==1){
                                    $("#box").empty();
                                    //商品总价
                                    priceNum();
                                }
                            },'json'
                        )
                        layer.close(index);
                    })
                })
                //修改总价
                function priceNum(){
                    //获取所有复选框
                    var _check=$(".checkAdd");
                    var goods_id='';
                    //判断复选框是否选择中  拿选中的id
                    _check.each(function(index){
                        if($(this).prop('checked')==true){
                            goods_id+=$(this).parents('tr').attr('goods_id')+',';
                        }
                    })
                    goods_id=goods_id.substr(0,goods_id.length-1);
                    $.post(
                        "<?php echo url('Cart/getPriceNum'); ?>",
                        {goods_id:goods_id},
                        function(res){
                            console.log(res);
                            $("#priceNum").text(res);
                        }
                    )
                }
                //确认结算
                $(document).on('click','#cartCount',function(){
                    var res=checkLogin();
                    if(res==false){
                        layer.msg("请登录后结算",{icon:2},function(){
                            location.href="<?php echo url('Login/login'); ?>"
                        })
                    }else{
                        //获取所有复选框
                        var _check=$(".checkAdd");
                        var goods_id='';
                        //判断复选框是否选择中  拿选中的id
                        _check.each(function(index){
                            if($(this).prop('checked')==true){
                                goods_id+=$(this).parents('tr').attr('goods_id')+',';
                            }
                        })
                        goods_id=goods_id.substr(0,goods_id.length-1);
                        if(goods_id==''){
                            layer.msg("请选择需要结算的商品");
                            return false;
                        }
                        location.href="<?php echo url('Order/cartCount'); ?>?goods_id="+goods_id;
                    }
                })

                //检测登录
                function checkLogin(){
                    var status;
                    $.ajax({
                        type:'post',
                        url:"<?php echo url('Order/checkLogin'); ?>",
                        async:false,
                        dataType:'json'
                    }).done(function(res){
                        status=res;
                    })
                    return status;
                }
            })
        })
    </script>
    
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
            <div class="b_btm">
                <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="72"><img src="__STATIC__/index/images/b1.png" width="62" height="62" /></td>
                    <td><h2>正品保障</h2>正品行货  放心购买</td>
                  </tr>
                </table>
                <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="72"><img src="__STATIC__/index/images/b2.png" width="62" height="62" /></td>
                    <td><h2>满38包邮</h2>满38包邮 免运费</td>
                  </tr>
                </table>
                <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="72"><img src="__STATIC__/index/images/b3.png" width="62" height="62" /></td>
                    <td><h2>天天低价</h2>天天低价 畅选无忧</td>
                  </tr>
                </table>
                <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="72"><img src="__STATIC__/index/images/b4.png" width="62" height="62" /></td>
                    <td><h2>准时送达</h2>收货时间由你做主</td>
                  </tr>
                </table>
            </div>
        </div>
        <div class="b_nav">
            <dl>                                                                                            
                <dt><a href="#">新手上路</a></dt>
                <dd><a href="#">售后流程</a></dd>
                <dd><a href="#">购物流程</a></dd>
                <dd><a href="#">订购方式</a></dd>
                <dd><a href="#">隐私声明</a></dd>
                <dd><a href="#">推荐分享说明</a></dd>
            </dl>
            <dl>
                <dt><a href="#">配送与支付</a></dt>
                <dd><a href="#">货到付款区域</a></dd>
                <dd><a href="#">配送支付查询</a></dd>
                <dd><a href="#">支付方式说明</a></dd>
            </dl>
            <dl>
                <dt><a href="#">会员中心</a></dt>
                <dd><a href="#">资金管理</a></dd>
                <dd><a href="#">我的收藏</a></dd>
                <dd><a href="#">我的订单</a></dd>
            </dl>
            <dl>
                <dt><a href="#">服务保证</a></dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">售后服务保证</a></dd>
                <dd><a href="#">产品质量保证</a></dd>
            </dl>
            <dl>
                <dt><a href="#">联系我们</a></dt>
                <dd><a href="#">网站故障报告</a></dd>
                <dd><a href="#">购物咨询</a></dd>
                <dd><a href="#">投诉与建议</a></dd>
            </dl>
            <div class="b_tel_bg">
                <a href="#" class="b_sh1">新浪微博</a>            
                <a href="#" class="b_sh2">腾讯微博</a>
                <p>
                服务热线：<br />
                <span>400-123-4567</span>
                </p>
            </div>
            <div class="b_er">
                <div class="b_er_c"><img src="__STATIC__/index/images/er.gif" width="118" height="118" /></div>
                <img src="__STATIC__/index/images/ss.png" />
            </div>
        </div>    
        <div class="btmbg">
            <div class="btm">
                备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
                <img src="__STATIC__/index/images/b_1.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_2.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_3.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_4.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_5.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_6.gif" width="98" height="33" />
            </div>    	
        </div>
        <!--End Footer End -->    
    </div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>