<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\index\div.html";i:1550734998;}*/ ?>
<!--Begin 楼层 Begin-->
<div cate_id="<?php echo $foolInfo['topCate']['cate_id']; ?>">
    <div class="i_t mar_10">
        <span class="floor_num"><span class="floorNum"><?php echo $floorNum; ?></span>F</span>
        <span class="fl"><?php echo $foolInfo['topCate']['cate_name']; ?></span> 
        <?php if(is_array($foolInfo['sonCate']) || $foolInfo['sonCate'] instanceof \think\Collection || $foolInfo['sonCate'] instanceof \think\Paginator): $i = 0; $__LIST__ = $foolInfo['sonCate'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>               
        <span class="i_mores fr"><a href="#"><?php echo $v['cate_name']; ?></a>&nbsp; &nbsp; &nbsp; </span>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="content">

        <div class="fresh_mid">
            <ul>
                <?php if(is_array($foolInfo['goodsInfo']) || $foolInfo['goodsInfo'] instanceof \think\Collection || $foolInfo['goodsInfo'] instanceof \think\Paginator): $i = 0; $__LIST__ = $foolInfo['goodsInfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="name"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><?php echo $v['goods_name']; ?></a></div>
                    <div class="price">
                        <font>￥<span><?php echo $v['self_price']; ?></span></font> &nbsp; <?php echo $v['goods_score']; ?>
                    </div>
                    <div class="img"><a href="<?php echo url('Goods/goodsEdital'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><img src="/uploads/goodsLogo/<?php echo $v['goods_img']; ?>" width="185" height="155" /></a></div>
                </li> 
                <?php endforeach; endif; else: echo "" ;endif; ?>                                                          
            </ul>
        </div>

    </div>  
</div>