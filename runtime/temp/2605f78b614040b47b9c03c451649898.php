<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\WWW\1\jquerytp5\public/../application/jquery\view\cate\add.html";i:1546591951;}*/ ?>
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
  <style>

      li{
          list-style: none;
          float: left;
          width:100px;
          height:30px;
        line-height: 30px;
        border:1px solid black;
        text-align: center;
       
      }
      #box1{
          width: 100px;
          height:100px;
        border:1px solid red; 
        float: left; 
        display: none;
      }
      #box2{
          width: 100px;
          height:100px;
        border:1px solid red; 
        float: left; 
        display:none;
      }
  </style>
 </head>
 <body>
    <div id="box1">
        <span></span>
        <button>×</button>
    </div>
    <div id="box2">
            <span></span>
            <button>×</button>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <ul>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <li class="box1"><?php echo $v['c_name']; ?></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
 
    <br> 
    <ul>
            <?php if(is_array($date) || $date instanceof \think\Collection || $date instanceof \think\Paginator): $i = 0; $__LIST__ = $date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li class="box2"><?php echo $v['m_name']; ?></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </body>
</html>
<script>
    //品牌
    $(".box1").click(function(){
        $(this).css('background','red').siblings('li').css('background','');
        $("#box1").children('span').html($(this).html());
        $("#box1").css("display","block");
        
    });
    //价格
    $(".box2").click(function(){
        $(this).css('background','red').siblings('li').css('background','');
        $("#box2").children('span').html($(this).html());
        $("#box2").css("display","block");
        
    });
    //删除
    $(":button").click(function(){
        $(this).prev('span').empty();
        $(this).parent().css("display","none");
        var _name=$(this).parent().prop("id");
        $("."+_name).siblings('li').css('background','');
    });
</script>