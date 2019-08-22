<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\phpStudy\WWW\tp5.1\public/../application/index\view\stu\add.html";i:1546073376;}*/ ?>
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
  <form action="<?php echo url('stu/add'); ?>" method="POST">
      <table border=1>
          <tr>
              <td>姓名</td>
              <td><input type="text" name="username"></td>
          </tr>
          <tr>
              <td>年龄</td>
              <td><input type="text" name="age"></td>
          </tr>
          <tr>
              <td>性别</td>
              <td>
                  <input type="radio" name="sex" value="男">男
                  <input type="radio" name="sex" value="女">女
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