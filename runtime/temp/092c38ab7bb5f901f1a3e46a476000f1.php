<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\tp5.1\public/../application/jquery\view\cate\table.html";i:1546673128;}*/ ?>
<table border="1">
        <thead>
       <tr>
            <td>id</td>
            <td>品牌</td>
            <td>操作</td>
        </tr>  
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
         <tr>
            <td><?php echo $v['c_id']; ?></td>
            <td><?php echo $v['c_name']; ?></td>
            <td><a href="">删除</a></td>
         </tr> 
         <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>        
    </table>
    <?php echo $str; ?> 