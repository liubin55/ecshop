<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/data/wwwroot/default/ecshoptp5/public/../application/index/view/goods/div.html";i:1552102944;}*/ ?>
<div id="info">
    <div class="list_c">
        <ul class="cate_list">
            <?php if(is_array($goodsInfo) || $goodsInfo instanceof \think\Collection || $goodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li goods_id="<?php echo $v['goods_id']; ?>">
                <div class="img"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><img src="__STATIC__/../uploads/goodsLogo/<?php echo $v['goods_img']; ?>" width="210" height="185" /></a></div>
                <div class="price">
                    <font>￥<span><?php echo $v['self_price']; ?></span></font> &nbsp; <?php echo $v['goods_score']; ?>R
                </div>
                <div class="name"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><?php echo $v['goods_name']; ?></a></div>
                <div class="carbg">
                    <a href="#" class="ss hide">收藏</a>
                    <a href="#" class="j_car">加入购物车</a>、。。
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
       
        <div class="pages">
            <?php echo $str; ?>
        </div>
    </div>