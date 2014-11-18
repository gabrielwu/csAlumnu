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
$(function () {
    /*$('#tb_r').dataTable({	  
		"sPaginationType": "full_numbers",
		"iDisplayLength": 15
	});*/
});

</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>查询事务</span> — <span>毕业生</span>
    </div>
	<div class="search">
	    <form action="<?php echo ($url); ?>/queryGraduate" method="post" id="form">
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
    	    		<td><span class="">专业</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($condition["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业去向</span></td>
    	    		<td>
						<select class="inputEdit"  name="type" id="graduationType">
							<option value="1">考研</option>
							<option value="2">保研</option>
							<option value="3">工作</option>
							<option value="4">出国</option>
							<option value="5">公务员</option>
						</select>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">导师</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($condition["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">研究方向</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($condition["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="stu_gender" value="<?php echo ($condition["stu_gender"]); ?>" />
    	    		</td>
					<td colspan="2" style="text-align: right;">
						<input id="edit_basic" type="submit" class="btn" value="查询"  />
					</td>
					<?php if($manager_level != -1): ?><td colspan="2" style="text-align: right;">
					    <input id="submit_basic" type="button" class="btn" value="导出"  />
					</td>
					<?php else: ?><?php endif; ?>
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
					<th>去向</th>
					<th>单位</th>
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
						<td><?php echo ($item["type"]); ?></td>      
						<td><?php echo ($item["receive_unit"]); ?></td> 
						<td><?php echo ($item["stu_mobile"]); ?></td>  
						<td><?php echo ($item["stu_qq"]); ?></td>  
						<td><?php echo ($item["stu_email"]); ?></td> 
						<?php if($manager_level != -1): ?><td align="center"><a href="<?php echo ($url); ?>/studetail/stu_id/<?php echo ($item["stu_id"]); ?>">查看信息</a></td>
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