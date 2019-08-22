<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\tp5.1\public/../application/user\view\index\addlist.html";i:1546049260;}*/ ?>
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
            <td>学生id</td>
            <td>学生姓名</td>
            <td>学生性别</td>
            <td>学生年龄</td>
            <td>学生班级</td>
            <td>爱好</td>
            <td>操作</td>
        </tr>
        <tbody id="td">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input type="checkbox" value="<?php echo $v['s_id']; ?>" name="id"><?php echo $v['s_id']; ?></td>
            <td><?php echo $v['s_name']; ?></td>
            <td><?php echo $v['s_sex']; ?></td>
            <td><?php echo $v['s_age']; ?></td>
            <td><?php echo $v['classname']['c_name']; ?></td>
            <td><?php echo $v['s_hobby']; ?></td>
            <td>
                <a href="<?php echo url('index/delete'); ?>?s_id=<?php echo $v['s_id']; ?>">删除</a>|
                <a href="<?php echo url('index/update'); ?>?s_id=<?php echo $v['s_id']; ?>">修改</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <tr>
            <td><input type="button" onclick="check()" value="全选"></td>
            <td><input type="button" onclick="checkb()" value="全不选"></td>
            <td><input type="button" onclick="checkf()" value="反选"></td>
        </tr>
    </table>
    <script>
        function check(){
            var tds=document.getElementById('td');
            var inputs=td.getElementsByTagName('input');
            for(var i=0;i<inputs.length;i++){
                inputs[i].checked=true;
            }
        }
        function checkb(){
            var tds=document.getElementById('td');
            var inputs=td.getElementsByTagName('input'); 
            for(var i=0;i<inputs.length;i++){
                inputs[i].checked=false;
            }
        }
        function checkf(){
            var tds=document.getElementById('td');
            var inputs=td.getElementsByTagName('input'); 
            for(var i=0;i<inputs.length;i++){
                inputs[i].checked=!inputs[i].checked;
            }
        }
    </script>
 </body>
</html>