<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpStudy\WWW\tp5.1\public/../application/jquery\view\cate\addlist.html";i:1546676732;}*/ ?>
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
        <div id="box">
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
    </div>
    </body>
</html>
<script>
    $(function(){
        $(document).on('click','.page',function(){
            var p=$(this).attr("now_page");
            $.post("<?php echo url('cate/addList'); ?>",{p:p},function(res){
                $("#box").html(res);
            });
        });
    })
</script>