<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/left.js"></script>
<script type="text/javascript">
function del(id) {
	if(confirm("确定删除?")){
		$.ajax({
		    url: "<?php echo ($url); ?>/delete/stu_id/" + id,
			type: 'GET',
			success: 
			    function(result){
			        if (result == '1') {	
				        alert("操作成功！");
						window.location.reload();
			        } else if (result == '-1') {
				        alert("没有权限！");
					} else {
				        alert("操作失败！");
					}
		        }
		});
	}
}
$(function () {
	$(".inputEdit[name='roll']").val("<?php echo ($condition["roll"]); ?>");
	$(".inputEdit[name='degree']").val("<?php echo ($condition["degree"]); ?>");
	$(".inputEdit[name='stu_gender']").val("<?php echo ($condition["stu_gender"]); ?>");
	$("#btn_search").click(function () {
		$("#form").attr("target", "");
		$("#form").attr("action", "<?php echo ($url); ?>/queryAll");
		$("#form").submit();
	});
	$("#btn_export").click(function () {
		$("#form").attr("target", "ifrm");
		$("#form").attr("action", "<?php echo ($url); ?>/export");
		$("#form").submit();
	});
});
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>学生信息</span> — <span>全部学生信息</span>
    </div>
	<div class="search">
		<iframe style="display:none;" id="ifrm" name="ifrm" src=""></iframe>
	    <form action="<?php echo ($url); ?>/queryAll" method="GET" id="form">
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
    	    			<input class="inputEdit" name="stu_major" value="<?php echo ($condition["stu_major"]); ?>" />
    	    		</td>
    	    		<td><span class="">学籍状态</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="roll" value="<?php echo ($condition["roll"]); ?>" >
							<option value=""></option>
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
							<option value="退学">退学</option>
						</select>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">学位类别</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="degree" value="<?php echo ($condition["degree"]); ?>">
							<option value=""></option>
							<option value="硕士">硕士</option>
							<option value="博士">博士</option>
						</select>
    	    		</td>
    	    		<td><span class="">导师</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="tutor" value="<?php echo ($condition["tutor"]); ?>" />
    	    		</td>
    	    		<td><span class="">研究方向</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="research" value="<?php echo ($condition["research"]); ?>" />
    	    		</td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="stu_gender" value="<?php echo ($condition["stu_gender"]); ?>">
							<option value=""></option>
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
    	    		</td>
					<td colspan="4" style="text-align: right;">
						<input id="btn_search" type="button" class="btn" value="查询"  />
						<?php if($manager_level != -1): ?><input id="btn_export" type="button" class="btn" value="导出"  />
						<?php else: ?><?php endif; ?>
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
					<th>性别</th>
					<th>年级</th>
					<th>班级</th>
					<th>专业</th>
					<th>导师</th>
					<th>手机</th>
					<th>QQ</th>
					<th>邮箱</th>
					<?php if($manager_level != -1): ?><th width="150px">操作</th>
					<?php else: ?><?php endif; ?>
				</tr>
			</thead>
            <tbody>
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><tr class="">
						<td><?php echo ($item["stu_num"]); ?></td>
						<td><?php echo ($item["stu_name"]); ?></td>
						<td><?php echo ($item["stu_gender"]); ?></td>
						<td><?php echo ($item["stu_grade"]); ?></td>
						<td><?php echo ($item["stu_class"]); ?></td>    
						<td><?php echo ($item["major"]); ?></td>       
						<td><?php echo ($item["tutor"]); ?></td>  
						<td><?php echo ($item["stu_mobile"]); ?></td>  
						<td><?php echo ($item["stu_qqnum"]); ?></td>  
						<td><?php echo ($item["stu_email"]); ?></td>
						<?php if($manager_level != -1): ?><td align="center">
								<a href="<?php echo ($url); ?>/stuDetail?stu_id=<?php echo ($item["stu_id"]); ?>">查看信息</a>
								<a href="javascript:del('<?php echo ($item["stu_id"]); ?>')">删除</a>
							</td>
						<?php else: ?><?php endif; ?>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<TD colSpan="20" align="center"><?php echo ($page); ?></TD>
				</tr>
			</tfoot>
        </table>
	</div>
</div>
</body>
</html>