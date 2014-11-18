<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo ($js); ?>/Clock.js"></script>
<script type="text/javascript">
$(function (){
	  var clock = new Clock();
	  clock.display(document.getElementById("clock"));
});
</script>
<div id="top">
    <div>
        <a href="<?php echo ($root); ?>/index.php/Index/logout" target="_parent">退出</a>
        <span id="clock"></span>
        <?php if(($level == 2)): ?><a href="<?php echo ($root); ?>/index.php/Student/editConfirmList" target="main">信息审核</a>&nbsp;&nbsp;<?php endif; ?>
        <span>你好，
            <?php if(($level == 1)): ?><?php echo ($username); ?> 同学
            <?php else: ?>管理员 <?php echo ($username); ?><?php endif; ?>
        </span>
    </div>
    <p>计算机科学与技术学院院友之家</p>
</div>