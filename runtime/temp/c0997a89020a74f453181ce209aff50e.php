<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:91:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/address/addressupdate.html";i:1551499306;s:76:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/layout.html";i:1550892652;s:83:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/public/header.html";i:1551411944;s:84:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/public/usertop.html";i:1551412614;s:85:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/public/userleft.html";i:1552011594;s:83:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/public/footer.html";i:1548036844;}*/ ?>
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
    <div class="m_top_bg">
    <div class="top">
        <div class="m_logo"><a href="Index.html"><img src="__STATIC__/index/images/logo1.png" /></a></div>
        <div class="m_search">
            <form>
                <input type="text" value="" class="m_ipt" />
                <input type="submit" value="搜索" class="m_btn" />
            </form>                      
            <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
        </div>
        <div class="i_car">
            <div class="car_t">购物车 [ <span>3</span> ]</div>
            <div class="car_bg">
                <!--Begin 购物车未登录 Begin-->
                <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
                <!--End 购物车未登录 End-->
                <!--Begin 购物车已登录 Begin-->
                <ul class="cars">
                    <li>
                        <div class="img"><a href="#"><img src="__STATIC__/index/images/car1.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="__STATIC__/index/images/car2.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                    <li>
                        <div class="img"><a href="#"><img src="__STATIC__/index/images/car2.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                        <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                    </li>
                </ul>
                <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
                <div class="price_a"><a href="<?php echo url('Cart/cartList'); ?>">去购物车结算</a></div>
                <!--End 购物车已登录 End-->
            </div>
        </div>
    </div>
</div>
<!--End Header End--> 
<div class="i_bg bg_color">
<!--Begin 用户中心 Begin -->
<div class="m_content">
<div class="m_left">
    <div class="left_n">管理中心</div>
    <div class="left_m">
        <div class="left_m_t t_bg1">订单中心</div>
        <ul>
            <li><a href="Member_Order.html">我的订单</a></li>
            <li><a href="<?php echo url('Address/addressAdd'); ?>">收货地址</a></li>
            <li><a href="#">缺货登记</a></li>
            <li><a href="#">跟踪订单</a></li>
        </ul>
    </div>
    <div class="left_m">
        <div class="left_m_t t_bg2">会员中心</div>
        <ul>
            <li><a href="Member_User.html">用户信息</a></li>
            <li><a href="<?php echo url('Hide/hideList'); ?>">我的收藏</a></li>
            <li><a href="Member_Msg.html">我的留言</a></li>
            <li><a href="Member_Links.html">推广链接</a></li>
            <li><a href="#">我的评论</a></li>
        </ul>
    </div>
    <div class="left_m">
        <div class="left_m_t t_bg3">账户中心</div>
        <ul>
            <li><a href="Member_Safe.html">账户安全</a></li>
            <li><a href="Member_Packet.html">我的红包</a></li>
            <li><a href="Member_Money.html">资金管理</a></li>
        </ul>
    </div>
    <div class="left_m">
        <div class="left_m_t t_bg4">分销中心</div>
        <ul>
            <li><a href="Member_Member.html">我的会员</a></li>
            <li><a href="Member_Results.html">我的业绩</a></li>
            <li><a href="Member_Commission.html">我的佣金</a></li>
            <li><a href="Member_Cash.html">申请提现</a></li>
        </ul>
    </div>
</div>
    <div class="m_right">
        <p></p>
        <div class="mem_tit">
            <a href="#"><img src="__STATIC__/index/images/add_ad.gif" /></a>
        </div>
        <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
            <tr>
            <td width="135" align="right">配送地区</td>
            <td colspan="3" style="font-family:'宋体';">
                <select class="province" id="province">
                    <option value="" selected="selected">请选择...</option>
                    <?php if(is_array($provinceInfo) || $provinceInfo instanceof \think\Collection || $provinceInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $provinceInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($data['province'] == $v['id']): ?>
                    <option value="<?php echo $v['id']; ?>" selected><?php echo $v['name']; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <select class="province" id="city">
                    <option value="" selected="selected">请选择...</option>
                    <?php if(is_array($cityInfo) || $cityInfo instanceof \think\Collection || $cityInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cityInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($data['city'] == $v['id']): ?>
                    <option value="<?php echo $v['id']; ?>" selected><?php echo $v['name']; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <select class="province" id="area">
                    <option value="" selected="selected">请选择...</option>
                    <?php if(is_array($areaInfo) || $areaInfo instanceof \think\Collection || $areaInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $areaInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($data['area'] == $v['id']): ?>
                    <option value="<?php echo $v['id']; ?>" selected><?php echo $v['name']; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                （必填）
            </td>
            </tr>
            <tr>
            <td align="right">收货人姓名</td>
            <td style="font-family:'宋体';"><input type="text"  value="<?php echo $data['address_name']; ?>" id="address_name" />（必填）</td>
            <td align="right">联系方式</td>
            <td style="font-family:'宋体';"><input type="text"  value="<?php echo $data['address_tel']; ?>"  id="address_tel" />（必填）</td>
            </tr>
            <tr>
            <td align="right">详细地址</td>
            <td style="font-family:'宋体';"><input type="text"  value="<?php echo $data['address_desc']; ?>"  id="address_desc" />（必填）</td>
            <td align="right">邮政编码</td>
            <td style="font-family:'宋体';"><input type="text"  value="<?php echo $data['address_mail']; ?>"  id="address_mail" /></td>
            </tr>
            <tr>
                <?php if($data['address_default'] == 1): ?>
                <td colspan="4">是否设置为默认<input type="checkbox" checked></td>
                <?php else: ?>
                <td colspan="4">是否设置为默认<input type="checkbox"></td>
                <?php endif; ?>
            </tr>
            <input type="hidden" value="<?php echo $data['address_id']; ?>" id="address_id">
        </table>
        <p align="right">
            <a href="javascript:;" class="add_b">修改</a>
        </p> 
        

        
    </div>
</div>
<!--End 用户中心 End--> 
<script>
    $(function(){
        layui.use('layer',function(){
            var layer=layui.layer;
            //三级联动
            $(document).on('change','.province',function(){
                var _this=$(this);
                var id= _this.val();
                var _option="<option value=''>--请选择--</option>";
                _this.nextAll('select').html(_option);
                $.post(
                    "<?php echo url('Address/addressAjax'); ?>",
                    {id:id},
                    function(res){
                        if(res.code==1){
                            for(var i in res['areaInfo']){
                                _option+="<option value="+res['areaInfo'][i]['id']+">"+res['areaInfo'][i]['name']+"</option>"
                            }
                            _this.next('select').html(_option);
                            _this.nextAll('select');
                        }else{
                            layer.msg(res.font,{icon:res.code});
                        }
                    },'json'
                )
            })
            //添加
            $(document).on('click','.add_b',function(){
                var obj={};
                obj.province=$("#province").val();
                obj.city=$("#city").val();
                obj.area=$("#area").val();
                obj.address_name=$("#address_name").val();
                obj.address_tel=$("#address_tel").val();
                obj.address_desc=$("#address_desc").val();
                obj.address_mail=$("#address_mail").val();
                obj.address_id=$("#address_id").val();
                var address_default=$(":checkbox").prop('checked');
                if(address_default==true){
                    address_default=1;
                }else{
                    address_default=2;
                }
                obj.address_default=address_default;
                if(obj.province==''){
                    layer.msg("请选择地址");
                    return false;
                }
                $.post(
                    "<?php echo url('Address/addressUpdate'); ?>",
                    obj,
                    function(res){
                        layer.msg(res.font,{icon:res.code,time:2000},function(){
                            location.href="<?php echo url('Address/addressAdd'); ?>"
                        });
                    },'json'
                )
            })
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