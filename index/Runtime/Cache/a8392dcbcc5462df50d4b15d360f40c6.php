<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/left.js"></script>
<script type="text/javascript" language="javascript">
function editConfirmView(){
	window.showModalDialog('<?php echo ($root); ?>/index.php/Student/editConfirmView', window, 'dialogWidth:900px;dialogHeight:600px');      
}
</script>
<div id="left">
<?php if($level == 1): ?><div>
	    <h3>学生信息</h3>
	    <p class="">
	        <a href="<?php echo ($root); ?>/index.php/Student/stuDetail" target="main">个人信息</a>
			<a href="javascript:editConfirmView()" target="main">修改申请</a>
		    <a href="<?php echo ($root); ?>/index.php/Student/queryAll" target="main">全部学生生信息</a>
		    <a href="<?php echo ($root); ?>/index.php/Student/queryGraduate" target="main">毕业生信息</a>
	    </p>
    </div>
    <div>
	    <h3>新闻通知</h3>
	    <p class="">
		    <a href="<?php echo ($root); ?>/index.php/News/index" target="main">全部</a>
		    <?php if(is_array($news_type_list)): $i = 0; $__LIST__ = $news_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news_type): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($root); ?>/index.php/News/index?type=<?php echo ($news_type["id"]); ?>" target="main"><?php echo ($news_type["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
	    </p>
    </div>
    <div>
	    <h3>帐号管理</h3>
	    <p class="">
	        <a href="<?php echo ($root); ?>/index.php/Account/changePassword" target="main">修改密码</a>
	    </p>
    </div>
<?php else: ?>
    <div>
	    <h3>学生信息</h3>
	    <p class="">
		    <a href="<?php echo ($root); ?>/index.php/Student/queryAll" target="main">全部学生信息</a>
		    <a href="<?php echo ($root); ?>/index.php/Student/queryGraduate" target="main">毕业生信息</a>
	        <a href="<?php echo ($root); ?>/index.php/Student/collect" target="main">信息采集</a>
	        <a href="<?php echo ($root); ?>/index.php/Student/collectGraduate" target="main">毕业生信息采集</a>
	        <a href="<?php echo ($root); ?>/index.php/Student/rollEditInput" target="main">学籍变更</a>
			<a href="<?php echo ($root); ?>/index.php/Student/editConfirmList" target="main">信息审核</a>
	    </p>
    </div>
    <div>
	    <h3>新闻通知</h3>
	    <p class="">
			<a href="<?php echo ($root); ?>/index.php/News/addInput" target="main">发布</a>
			<a href="<?php echo ($root); ?>/index.php/News/index" target="main">新闻列表</a>
			<a href="<?php echo ($root); ?>/index.php/News/adminType" target="main">分类管理</a>
	    </p>
    </div>
    <div>
	    <h3>帐号管理</h3>
	    <p class="">
	        <a href="<?php echo ($root); ?>/index.php/Account/changePassword" target="main">修改密码</a>
			<?php if($manager_level == 0): ?><a href="<?php echo ($root); ?>/index.php/Admin/index" target="main">管理员列表</a>
			<?php else: ?><?php endif; ?>
	    </p>
    </div><?php endif; ?>
</div>