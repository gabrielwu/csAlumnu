<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
$(function () {
	$(".inputEdit[name='roll']").val("<?php echo ($condition["roll"]); ?>");
	$("#search").click(function () {
		$("#form").attr("action","<?php echo ($url); ?>/rollEditInput");
		$("#form").submit();
	});
	$("#rollEdit").click(function () {
		$("#form").attr("action", "<?php echo ($url); ?>/rollEdit");
		$("#form").submit();
	});
});
</script>
</head>
<body>
<div id="right">
<iframe name="ifrm" style="display:none" id="ifrm"></iframe>
    <div class="title">
    	<span>学生信息</span> — <span>学籍变更</span>
    </div>
	<div class="search">
	    <form action="" method="get" id="form">
    	    <table id="tb_s">
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		    <input class="inputEdit" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">年级</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_grade" value="<?php echo ($condition["stu_grade"]); ?>" />
    	    		</td>
    	    		<td><span class="">班级</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_class" value="<?php echo ($condition["stu_class"]); ?>" />
    	    		</td>
    	    		<td><span class="">专业</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="major" value="<?php echo ($condition["major"]); ?>" />
    	    		</td>
    	    		<td><span class="">学籍状态</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="roll" value="" >
							<option value="">全部</option>
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
							<option value="退学">退学</option>
						</select>
    	    		</td>
    	    	</tr>
					<td colspan="19" style="text-align: center;">
						<input id="search"   type="button" class="btn" value="查询"  />
						<input id="rollEdit" type="button" class="btn" value="学籍变更"  />
    	    			<select class="inputEdit" name="rollEdit" value="" >
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
							<option value="退学">退学</option>
						</select>
					</td>
    	    	</tr>
    	    </table>
	    </form>
	</div>
    <div class="">
        <table class="tb1" id="tb_r" width="100%" cellpadding="0" cellspacing="0">
            <thead>
				<tr class="">
					<th>学号</th>
				    <th>姓名</th>
					<th>年级</th>
					<th>班级</th>
					<th>专业</th>
					<th>学籍状态</th>
					<?php if($manager_level != -1): ?><th width="150px">操作</th>
					<?php else: ?><?php endif; ?>
				</tr>
			</thead>
            <tbody>
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><tr class="">
						<td><?php echo ($item["stu_num"]); ?></td>
						<td><?php echo ($item["stu_name"]); ?></td>
						<td><?php echo ($item["stu_grade"]); ?></td>
						<td><?php echo ($item["stu_class"]); ?></td>    
						<td><?php echo ($item["major"]); ?></td>       
						<td><?php echo ($item["roll"]); ?></td>  
						<?php if($manager_level != -1): ?><td align="center">
								<a href="<?php echo ($url); ?>/stuDetail?stu_id=<?php echo ($item["stu_id"]); ?>">查看信息</a>
							</td>
						<?php else: ?><?php endif; ?>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<TD colSpan="8" align="center"><?php echo ($page); ?></TD>
				</tr>
			</tfoot>
        </table>
	</div>
</div>
</body>
</html>