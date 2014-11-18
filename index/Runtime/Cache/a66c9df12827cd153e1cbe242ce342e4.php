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
$(function() {
});
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>新闻通知</span> — <span>分类管理</span>
    </div>
	<div class="">
        <table class="tb1 tb2" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">分类名称</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center"><input class="" type="text" id="name" name="name" value="" /></td>
					<td align="center" class="operate">
						<a href="javascript:addNewsType('<?php echo ($url); ?>/addType')" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr>
						<td align="center" class="">
						    <input id="type_name_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["name"]); ?>" />
						</td>  
						<td align="center" class="operate">
							<a href="javascript:editNewsType(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/editType')" class="" >编辑</a>
							<a href="javascript:deleteNewsType(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/deleteType')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
        </table>
	</div>
</div>
</body>
</html>