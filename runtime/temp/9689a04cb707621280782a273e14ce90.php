<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpStudy\WWW\tp5.1\public/../application/index\view\admin\addlist.html";i:1545997126;}*/ ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <table border=1>
      <tr>
          <td>id</td>
          <td>账户</td>
          <td>邮箱</td>
          <td>电话</td>
          <td>操作</td>
      </tr>
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
      <tr>
          <td><?php echo $v['a_id']; ?></td>
          <td><?php echo $v['a_name']; ?></td>
          <td><?php echo $v['a_email']; ?></td>
          <td><?php echo $v['a_tel']; ?></td>
          <td><a href="<?php echo url('admin/addDel'); ?>?a_id=<?php echo $v['a_id']; ?>">删除</a>|<a href="<?php echo url('admin/addUpd'); ?>?a_id=<?php echo $v['a_id']; ?>">修改</a></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
 </body>
</html>