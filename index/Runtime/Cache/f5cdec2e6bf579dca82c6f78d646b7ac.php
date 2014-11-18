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
	$("#title").val(<?php echo ($condition["title"]); ?>);
	$("#content").val(<?php echo ($condition["content"]); ?>);
	$("#time1").val(<?php echo ($condition["time1"]); ?>);
	$("#time2").val(<?php echo ($condition["time2"]); ?>);
	$("#type option").each(function () {
	    if ($(this).val() == <?php echo ($condition["type"]); ?>) {
			$(this).attr("selected", "selected");
		}
	});
    $("#reset").click(function () {
		$("#form input[type='text']").each(function () {
		    $(this).val("");
		});
	});
});
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>新闻通知</span> — <span>新闻列表</span>
    </div>
		<div class="search">
	    <form action="<?php echo ($url); ?>/adminIndex" method="post" id="form">
    	    <table id="tb_s">
    	    	<tr>
    	    		<td>
						<span class="">标题</span>
    	    			<input class="inputlock" type="text" id="title" name="title" value="" />
    	    		</td>
    	    		<td>
						<span class="">内容</span>
    	    			<input class="inputlock" type="text" id="content" name="content" value="" />
    	    		</td>
    	    		<td>
						<span class="">时间</span>
    	    			<input class="inputlock" type="text" id="time1" name="time1" value="" />-
    	    			<input class="inputlock" type="text" id="time2" name="time2" value="" />
    	    		</td>
    	    		<td>
						<span class="">分类</span>
						<select class="input" name="type" id="type">
							<option value="" >全部</option>
							<?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($type["id"]); ?>" ><?php echo ($type["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
    	    		</td>
					<td colspan="" style="text-align: right;">
						<input id="" type="submit" class="btn btn-90" value="查询"  />
						<input id="reset" type="reset" class="btn btn-90" value="清空"  />
					</td>
    	    	</tr>
    	    </table>
	    </form>
	</div>
	<div class="">
        <table class="tb1" id="tb_r" width="100%" cellpadding="0" cellspacing="0">
            <thead>
			    <tr class="">
					<th width="56%">标题</th>
					<th width="14%">时间</th>
					<th width="14%">分类</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr>
						<td class=""><span style="color: #f00;"><?php echo ($data["top_html"]); ?></span><a href="<?php echo ($url); ?>/view?id=<?php echo ($data["id"]); ?>"><?php echo ($data["title"]); ?></a></td>  
						<td align="center" class=""><?php echo ($data["time"]); ?></td>  
						<td align="center" class=""><?php echo ($data["name"]); ?></td>  
						<td align="center" class="operate">
							<a href="javascript:topNews(<?php echo ($data["id"]); ?>, 1, '<?php echo ($url); ?>/top')" class="" >置顶</a>
							<a href="javascript:topNews(<?php echo ($data["id"]); ?>, 0, '<?php echo ($url); ?>/top')" class="" >取消置顶</a>
							<a href="<?php echo ($url); ?>/editInput?id=<?php echo ($data["id"]); ?>" class="" >编辑</a>
							<a href="javascript:deleteNews(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/delete')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<td colSpan="3" align="center"><?php echo ($page); ?></td>
				</tr>
			</tfoot>
        </table>
	</div>
</div>
</body>
</html>