<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\phpStudy\WWW\tp5.1\public/../application/user\view\index\add.html";i:1545999676;}*/ ?>
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
  <form action="<?php echo url('Index/addDo'); ?>" method="POST">
      <table border="1">
          <tr>
              <td>学生姓名</td>
              <td><input type="text" name="s_name"></td>
          </tr>
          <tr>
              <td>学生性别</td>
              <td>
                  <input type="radio" name="s_sex" value="男">男
                  <input type="radio" name="s_sex" value="女">女
            </td>
          </tr>
          <tr>
              <td>学生年龄</td>
              <td><input type="text" name="s_age"></td>
          </tr>
          <tr>
              <td>班级</td>
              <td>
                  <select name="c_id">
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo $v['c_id']; ?>"><?php echo $v['c_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
              </td>
          </tr>
          <tr>
              <td>爱好</td>
              <td>
                  <input type="checkbox" name="s_hobby[]" value="html">html
                  <input type="checkbox" name="s_hobby[]" value="php">php
                  <input type="checkbox" name="s_hobby[]" value="JavaScript">JavaScript
                </td>
          </tr>
          <tr>
              <td><input type="submit" value="提交"></td>
              <td></td>
          </tr>
      </table>
  </form>
 </body>
</html>