<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\tp5.1\public/../application/jquery\view\cate\index.html";i:1546602683;}*/ ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <script src="__STATIC__/jquery-3.2.1.min.js"></script>
  <title>Document</title>
 </head>
    <body>
        <form action="<?php echo url('cate/indexDo'); ?>" method="POST" id="sub">
            <table border="1">
                <tr>
                    <td>品牌</td>
                    <td><input type="text" name="c_name" id="uname"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="添加"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<script>
    $(function(){
        //阻止提交
        $("#sub").submit(function(){
            $("#uname").trigger('blur');
            return uname_falg;
        });
        //验证
        $("#uname").focus(function(){
            var _this=$(this);
            _this.next().remove();
            _this.after("<font color='gray'>用户名由中文，数字，字母组成2到8位</font>");
        });
        var uname_falg=false;
       $("#uname").blur(function(){
             var _this=$(this);
           _this.next().remove();
          var uname=_this.val();
          var reg=/^[\u4e00-\u9fa5a-z0-9]{2,8}$/;
          if(uname==''){
            _this.after("<font color='red'>用户名必填</font>");
            uname_falg=false;
          }else if(!reg.test(uname)){
            _this.after("<font color='red'>用户名由中文，数字，字母组成2到8位</font>");
            uname_falg=false; 
          }else{
            $.post("<?php echo url('cate/indexhandle'); ?>",{c_name:uname},function(res){
                if(res==1){    
                    _this.after("<font color='red'>用户名已存在</font>");
                    uname_falg=false;
                }else{
                    _this.after("<font color='green'>√</font>");
                    uname_falg=true;
                }
            });
          }
       });

    });
</script>