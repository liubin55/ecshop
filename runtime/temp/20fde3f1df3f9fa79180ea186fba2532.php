<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\tp5.1\public/../application/user\view\index\update.html";i:1546047356;}*/ ?>
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
  <form action="<?php echo url('Index/addUpdateDo'); ?>" method="POST">
    <input type="hidden" name="s_id" value="<?php echo $row['s_id']; ?>">
      <table border="1">
          <tr>
              <td>学生姓名</td>
              <td><input type="text" name="s_name" value="<?php echo $row['s_name']; ?>"></td>
          </tr>
          <tr>
              <td>学生性别</td>
              <td>
                  <input type="radio" name="s_sex" value="男" 
                  <?php if($row['s_sex']=='男'): ?>
                  checked="checked"
                  <?php endif; ?>
                  >男
                  <input type="radio" name="s_sex" value="女"
                  <?php if($row['s_sex']=='女'): ?>
                  checked="checked"
                  <?php endif; ?>
                  >女
            </td>
          </tr>
          <tr>
              <td>学生年龄</td>
              <td><input type="text" name="s_age" value="<?php echo $row['s_age']; ?>"></td>
          </tr>
          <tr>
              <td>班级</td>
              <td>
                  <select name="c_id">
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo $v['c_id']; ?>"
                      <?php if($row['c_id']==$v['c_id']): ?>
                      selected='selected'
                      <?php endif; ?>
                      ><?php echo $v['c_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
              </td>
          </tr>
          <tr>
              <td>爱好</td>
              <td>
                  <input type="checkbox" name="s_hobby[]" value="html"
                  <?php if(in_array('html',explode(',',$row['s_hobby']))): ?>
                  checked="checked" 
                  <?php endif; ?>
                  >html
                  <input type="checkbox" name="s_hobby[]" value="php"
                  <?php if(in_array('php',explode(',',$row['s_hobby']))): ?>
                  checked="checked" 
                  <?php endif; ?>
                  >php
                  <input type="checkbox" name="s_hobby[]" value="JavaScript"
                  <?php if(in_array('JavaScript',explode(',',$row['s_hobby']))): ?>
                  checked="checked" 
                  <?php endif; ?>
                  >JavaScript
                </td>
          </tr>
          <tr>
              <td><input type="submit" value="修改"></td>
              <td></td>
          </tr>
      </table>
  </form>
 </body>
</html>