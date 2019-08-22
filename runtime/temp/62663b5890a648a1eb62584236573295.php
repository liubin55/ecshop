<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpStudy\WWW\1\ecshoptp5\public/../application/index\view\text\textlist.html";i:1547881946;}*/ ?>
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
