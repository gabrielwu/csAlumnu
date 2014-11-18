<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<title></title>
<script type="text/javascript" language="javascript" >
function modelAdmin() {
	var id;
    var username;
	var password;
	var manager_level;
}
function addAdmin() {
	var m = new modelAdmin();
	m.username = $("#username").val();
	m.manager_level = $("#manager_level").val();
	m.password = '123456';
	$.ajax({
	        url: '<?php echo ($url); ?>/add',
			type: 'POST',
			data: m,
			success: 
			    function(result){
		            if (result == '0') {	
			            alert("操作失败！");
		            } else if (result == '-1') {
			            alert("没有权限！");
				    } else {
			            alert("操作成功！初始密码：" + m.password);
		                window.location.reload();
					}
	            }
	   });
}
function editAdmin(id) {
    if(confirm("您确定编辑除此条记录吗？")) {
		var m = new modelAdmin();
		m.username = $("#username_" + id).val();
		m.manager_level = $("#manager_level_" + id).val();
		m.id = id;
		$.ajax({
				url: '<?php echo ($url); ?>/edit',
				type: 'POST',
				data: m,
				success: 
					function(result){
						if (result == '0') {	
							alert("操作失败！");
						} else if (result == '-1') {
							alert("没有权限！");
						} else {
							alert("操作成功！");
							window.location.reload();
						}
					}
		});
	}
}
function deleteAdmin(id) {
    if(confirm("您确定要删除此条记录吗？")) {
		var m = new modelAdmin();
		m.id = id;
		$.ajax({
				url: '<?php echo ($url); ?>/delete',
				type: 'POST',
				data: m,
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
function resetAdminPassword(id) {
    if(confirm("您确定要重置此管理员的密码为'123456'么？")) {
		var m = new modelAdmin();
		m.id = id;
		m.password = '123456';
		$.ajax({
				url: '<?php echo ($url); ?>/resetPassword',
				type: 'POST',
				data: m,
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
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>帐号管理</span> — <span>管理员</span>
    </div>
    <div class="">        
		<table class="tb1 tb2" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">用户名</th>
					<th width="">类型</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center">
						<input class="" type="text" id="username" name="username" value="" />
					</td>
					<td align="center">
						<select name="manager_level" id="manager_level">
							<option value="1">普通管理员</option>
							<option value="0">超级管理员</option>
						</select>
					</td>
					<td align="center" class="operate">
						<a href="javascript:addAdmin()" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr>
						<td align="center" class="">
						    <input id="username_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["username"]); ?>" />
						</td>  
						<td align="center">
							<select id="manager_level_<?php echo ($data["id"]); ?>">
								<?php if($data["manager_level"] == 1): ?><option value="1" selected>普通管理员</option>
								<?php else: ?><option value="1">普通管理员</option><?php endif; ?>
								<?php if($data["manager_level"] == 0): ?><option value="0" selected>超级管理员</option>
								<?php else: ?><option value="0">超级管理员</option><?php endif; ?>
							</select>
						</td>
						<td align="center" class="operate">
							<a href="javascript:editAdmin(<?php echo ($data["id"]); ?>)" class="" >编辑</a>
							<a href="javascript:deleteAdmin(<?php echo ($data["id"]); ?>)" class="" >删除</a>
							<a href="javascript:resetAdminPassword(<?php echo ($data["id"]); ?>)" class="" >重置密码</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
        </table>
	</div>
<div>
</body>
</html>