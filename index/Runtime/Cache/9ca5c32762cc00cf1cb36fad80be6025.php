<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/left.js"></script>

<div id="left">
    <div>
	    <h3>查询事务</h3>
	    <p class="">
		    <a href="<?php echo ($root); ?>/index.php/Information/queryAll" target="main">在读生信息</a>
		    <a href="<?php echo ($root); ?>/index.php/Information/queryGraduate" target="main">毕业生信息</a>
	        <!--<a href="<?php echo ($root); ?>/index.php/Loan/index" target="main">学生贷款</a>
	        <a href="<?php echo ($root); ?>/index.php/Grant/index" target="main">国家助学金</a>
		    <a href="<?php echo ($root); ?>/index.php/Scholar/index" target="main">奖学金</a>
		    <a href="<?php echo ($root); ?>/index.php/SocialScholar/index" target="main">社会奖学金</a>
		    <a href="<?php echo ($root); ?>/index.php/Competition/index" target="main">大赛获奖</a>
		    <a href="<?php echo ($root); ?>/index.php/Innovation/index" target="main">创新项目</a>
	        <a href="<?php echo ($root); ?>/index.php/Insurance/index" target="main">医疗保险</a>
		    <a href="<?php echo ($root); ?>/index.php/Party/index" target="main">党员积极分子</a>
		    <a href="<?php echo ($root); ?>/index.php/StuStatusAlter/index" target="main">学籍变动</a>
		    <a href="<?php echo ($root); ?>/index.php/Punish/index" target="main">处分</a>-->
	    </p>
    </div>
    <div>
	    <h3>管理事务</h3>
	    <p class="">
	        <a href="<?php echo ($root); ?>/index.php/Information/collect" target="main">信息采集</a>
			<a href="<?php echo ($root); ?>/index.php/Function/confirmstuinfo" target="main">审核修改</a>
			<a href="<?php echo ($root); ?>/index.php/Function/createadmin" target="main">创建管理用户</a>
			<a href="<?php echo ($root); ?>/index.php/Information/changepassword" target="main">修改密码</a>
	    </p>
    </div>
    <div>
	    <h3>新闻通知</h3>
	    <p class="">
			<a href="<?php echo ($root); ?>/index.php/News/addInput" target="main">发布通知</a>
			<a href="<?php echo ($root); ?>/index.php/News/index" target="main">新闻列表</a>
			<a href="<?php echo ($root); ?>/index.php/News/adminType" target="main">分类管理</a>
	    </p>
    </div>
</div>