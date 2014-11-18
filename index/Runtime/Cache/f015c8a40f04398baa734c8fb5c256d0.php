<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/left.js"></script>
<div id="left">
    <div>
	    <h3>个人事务</h3>
	    <p class="">
	        <a href="<?php echo ($root); ?>/index.php/Information/stuDetail" target="main">个人信息</a>
	        <a href="<?php echo ($root); ?>/index.php/Information/changePassword" target="main">修改密码</a>
	    </p>
    </div>
    <div>
	    <h3>查询事务</h3>
	    <p class="">
		    <a href="<?php echo ($root); ?>/index.php/Function/queryAll" target="main">在读生信息</a>
		    <a href="<?php echo ($root); ?>/index.php/Function/queryGraduate" target="main">毕业生信息</a>
	    </p>
    </div>
    <div>
	    <h3>新闻通知</h3>
	    <p class="">
		    <a href="<?php echo ($root); ?>/index.php/News/index" target="main">全部</a>
		    <?php if(is_array($news_type_list)): $i = 0; $__LIST__ = $news_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news_type): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($root); ?>/index.php/News/index?type=<?php echo ($news_type["id"]); ?>" target="main"><?php echo ($news_type["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
	    </p>
    </div>
</div>