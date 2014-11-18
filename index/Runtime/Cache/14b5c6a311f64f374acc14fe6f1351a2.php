<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#checkAll").click(function () {
		$(".check").prop("checked", $("#checkAll").prop("checked"));
	});
});
function editConfirmView(id){
	window.showModalDialog('<?php echo ($url); ?>/editConfirmView/stu_id/'+id,window,'dialogWidth:900px;dialogHeight:600px');      
	window.location.reload(); 
}
function passConfirm(id){
	if(confirm("确定通过审核?")){
		$.ajax({
	        url: "<?php echo ($url); ?>/passConfirm/stu_id/" + id,
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
function nopassConfirm(id){
	if(confirm("确定不允许此次修改?")){
		$.ajax({
	        url: "<?php echo ($url); ?>/nopassConfirm/stu_id/" + id,
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
function passAllConfirm(){
	var ids = "";
	$(".check").each(function (){
		if ($(this).prop("checked")) {
		    ids += $(this).val() +'_';
		}
	});
	if (ids != "") {
		ids = ids.substr(0, ids.length - 1);
		if(confirm("确定通过审核?")){
			$.ajax({
				url: "<?php echo ($url); ?>/passAllConfirm/idstrs/" + ids,
				type: 'GET',
				success: 
					function(result){
						if (result == '-1') {
							alert("没有权限！");
						} else {
							alert(result);
							window.location.reload();
						}
					}
		    });
		}
	} else {
		alert("请先选中！");
	}	
}
function nopassAllConfirm(){
	var ids = "";
	$(".check").each(function (){
		if ($(this).prop("checked")) {
		    ids += $(this).val() +'_';
		}
	});
	if (ids != "") {
		ids = ids.substr(0, ids.length - 1);
		if(confirm("确定通过审核?")){
			$.ajax({
				url: "<?php echo ($url); ?>/nopassAllConfirm/idstrs/" + ids,
				type: 'GET',
				success: 
					function(result){
						if (result == '-1') {
							alert("没有权限！");
						} else {
							alert(result);
							window.location.reload();
						}
					}
		    });
		}
	} else {
		alert("请先选中！");
	}
}
</script>
</head>
<div id="right">
    <div class="title">
    	<span>学生信息</span> — <span>信息审核</span>
    </div>
    <div class="">
        <table class="tb1 tb2 tb3" id="tb_r" cellpadding="0" cellspacing="0">
            <thead>
				<tr align="center" class="">
					<th width="80px">选中<input type="checkbox" id="checkAll"/></th>
					<th>姓名</th>
					<th>学号</th>
					<th>学籍状态</th>
					<th width="200px">操作
						<a href="javascript:passAllConfirm()">选中通过</a>
						<a href="javascript:nopassAllConfirm()">选中不通过</a>
					</th>
				</tr>
			</thead>
            <tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr align="center" class="">
					<td><input type="checkbox" class="check" value="<?php echo ($data["stu_id"]); ?>"/></td>
					<td><?php echo ($data["stu_name"]); ?></td>
					<td><?php echo ($data["stu_num"]); ?></td>
					<td><?php echo ($data["roll"]); ?></td>
					<td>
						<a href="javascript:editConfirmView(<?php echo ($data["stu_id"]); ?>)">查看详情</a>
						<a href="javascript:passConfirm(<?php echo ($data["stu_id"]); ?>)"    >通过</a>
						<a href="javascript:passConfirm(<?php echo ($data["stu_id"]); ?>)"    >不通过</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
        </table>
	</div>
</div>
</body>
</html>