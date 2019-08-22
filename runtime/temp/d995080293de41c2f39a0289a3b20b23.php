<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\goods\brandDiv.html";i:1550663502;}*/ ?>
<div id="brandDiv">  
        <div class="list_t">
            <span class="fl list_or">
                <a href="javascript:;" class="defalut now">默认</a>
                <a href="javascript:;" class="defalut">
                    <span class="fl">库存</span>                        
                    <span class="i_up">库存从低到高显示</span>
                    <span class="i_down">库存从高到低显示</span>                                                     
                </a>
                <a href="javascript:;" class="defalut">
                    <span class="fl">价格</span>                        
                    <span class="i_up">价格从低到高显示</span>
                    <span class="i_down">价格从高到低显示</span>     
                </a>
                <a href="javascript:;" class="defalut">新品</a>
            </span>
     
            <span class="fr">共发现<?php echo $count; ?>件</span>
        </div>
        <div class="list_c">
            <ul class="cate_list">
                <?php if(is_array($goodsInfo) || $goodsInfo instanceof \think\Collection || $goodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="img"><a href="#"><img src="/uploads/goodsLogo/<?php echo $v['goods_img']; ?>" width="210" height="185" /></a></div>
                    <div class="price">
                        <font>￥<span><?php echo $v['self_price']; ?></span></font> &nbsp; <?php echo $v['goods_score']; ?>R
                    </div>
                    <div class="name"><a href="#"><?php echo $v['goods_name']; ?></a></div>
                    <div class="carbg">
                        <a href="#" class="ss">收藏</a>
                        <a href="#" class="j_car">加入购物车</a>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
           
            <div class="pages">
                <?php echo $str; ?>
            </div>
        </div>