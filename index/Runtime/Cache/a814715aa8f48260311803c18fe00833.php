<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/news.js"></script>
<script type="text/javascript">
</script>
</head>
<body>
<div id="right">
    <div class="title">
		<a href="javascript:history.go(-1);">返回</a>
    	<a href="<?php echo ($url); ?>/index"><span>新闻通知</span></a> — 
		<span>查看</span>
    </div>
	<div class="content3">
		<h3><?php echo ($data["title"]); ?></h3>
		<h4>
			<span><?php echo ($data["time"]); ?></span>
			<span>分类:<?php echo ($data["type_name"]); ?></span>
			<?php if($manager_level != -1): ?><span><a href="javascript:topNews(<?php echo ($data["id"]); ?>, 1, '<?php echo ($url); ?>/top')" class="" >置顶</a></span>
			<span><a href="javascript:topNews(<?php echo ($data["id"]); ?>, 0, '<?php echo ($url); ?>/top')" class="" >取消置顶</a></span>
			<span><a href="<?php echo ($url); ?>/editInput?id=<?php echo ($data["id"]); ?>" class="" >编辑</a></span>
			<span><a href="javascript:deleteNews(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/delete')" class="" >删除</a></span>
			<?php else: ?><?php endif; ?>
		</h4>
		<p class="new_content"><?php echo ($data["content"]); ?></p>
	</div>
</div>
</body>
</html>