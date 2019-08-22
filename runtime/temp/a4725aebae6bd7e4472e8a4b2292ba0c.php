<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\tp5.1\public/../application/index\view\index\index.html";i:1545997161;}*/ ?>
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
    <form action="<?php echo url('Admin/addDo'); ?>" method="POST">
        <table border="1">
            <tr>
                <td>账户</td>
                <td><input type="text" name="a_name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="a_pwd"></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><input type="text" name="a_email"></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name="a_tel"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                </td>
                <td>

                </td>
            </tr>
        </table>
    </form>
 </body>
</html>