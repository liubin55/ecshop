<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\tp5.1\public/../application/index\view\admin\addupd.html";i:1545997214;}*/ ?>
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
    <form action="<?php echo url('Admin/addUpdate'); ?>" method="POST">
        <input type="hidden" name="a_id" value="<?php echo $row['a_id']; ?>">
        <table border="1">
            <tr>
                <td>账户</td>
                <td><input type="text" name="a_name" value="<?php echo $row['a_name']; ?>"></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><input type="text" name="a_email" value="<?php echo $row['a_email']; ?>"></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name="a_tel" value="<?php echo $row['a_tel']; ?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="修改">
                </td>
                <td>

                </td>
            </tr>
        </table>
    </form>
 </body>
</html>