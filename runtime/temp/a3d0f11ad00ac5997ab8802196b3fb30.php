<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/index\view\text\textlist.html";i:1547881946;s:84:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/index\view\layout.html";i:1550892650;s:91:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/index\view\public\header.html";i:1551411942;s:91:"D:\phpStudy\PHPTutorial\WWW\1\ecshoptp5\public/../application/index\view\public\footer.html";i:1548036843;}*/ ?>
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
    <table border="1">
        <tr>
            <td>标题</td>
            <td>发布时间</td>
        </tr>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $v['text_title']; ?></td>
            <td><?php echo $v['create_time']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <?php echo $str; ?>
    <a href="http://www.ecshoptp5.com/admin.php/text/textadd.html">后台</a>

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