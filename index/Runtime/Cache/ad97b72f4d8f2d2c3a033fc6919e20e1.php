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
function uploadfile(){
	var upfile = $("#upfile").val();
	if (upfile == ""|| upfile == null){
		alert("导入文件不能为空！！！");
	} else {
		$("#form").submit();
	}
}
$(function () {
	$("#hand").css("display", "none");
	$("#file").css("display", "none");
	$("#<?php echo ($tab); ?>").css("display", "block");
	$("#a_<?php echo ($tab); ?>").addClass("current");
	$("#a_file").click(function(){
		$(this).addClass("current");
		$("#a_hand").removeClass("current");
		$("#hand").css("display", "none");
		$("#file").css("display", "block");
	});
	$("#a_hand").click(function(){
		$(this).addClass("current");
		$("#a_file").removeClass("current");
		$("#hand").css("display", "block");
		$("#file").css("display", "none");
	});	
}); 
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>学生信息</span> — <span>毕业生信息采集</span>
    	<a id="a_hand" class="tab" href="#">手动添加</a>
    	<a id="a_file" class="tab" href="#">文件导入</a>
    </div>
    <div class="content"> 
		<div id="file">   
			<form action="<?php echo ($url); ?>/uploadCollectGraduate" method="post" id="form" enctype="multipart/form-data">
				<table class="tb1 tb2" style="width:400px";>
					<tbody>
						<tr align="center" class="">
							<td>导入文件<a href="<?php echo ($url); ?>/downloadCollectGraudate">模板下载</a></td>
						</tr>
						<tr align="center" class="">
							<td align="right">
								<input name="upfile" id="upfile" value="" type="file">
								<div class="onShow" id="newpass_tip"></div>
							</td>
						</tr>
						<tr align="center" class="">
							<td>
								<input type="button" value="提交" onclick="uploadfile()" class="btn" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
    	<div id="hand">
    		<table>
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="stu_name" value="<?php echo ($data["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		    <input class="inputEdit" name="stu_num" value="<?php echo ($data["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="graduate_date" value="<?php echo ($data["graduate_date"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业去向</span></td>
    	    		<td>
						<select class="inputEdit"  name="graduate_type" id="graduate_type">
							<option value="工作">工作</option>
							<option value="读博">读博</option>
							<option value="出国">出国</option>
							<option value="公务员">公务员</option>
						</select>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">专业</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_major" value="<?php echo ($data["stu_major"]); ?>" />
    	    		</td>
    	    		<td><span class="">学位类别</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="degree">
							<option value="硕士">硕士</option>
							<option value="博士">博士</option>
						</select>
    	    		</td>
    	    		<td><span class="">导师</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="tutor" value="<?php echo ($data["tutor"]); ?>" />
    	    		</td>
    	    		<td><span class="">研究方向</span></td>
    	    		<td colspan="">
    	    			<input class=" inputEdit" name="research" value="<?php echo ($data["research"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">单位</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="work_unit" value="<?php echo ($data["work_unit"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位电话</span></td>
    	    		<td>
						<input class="inputEdit"  name="wu_phone" value="<?php echo ($data["wu_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位邮箱</span></td>
    	    		<td>
						<input class="inputEdit"  name="wu_email" value="<?php echo ($data["wu_email"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位地址</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="wu_address" value="<?php echo ($data["wu_address"]); ?>" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">档案邮寄</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="post_info" value="<?php echo ($data["post_info"]); ?>" />
    	    		</td>
    	    		<td><span class="">现居城市</span></td>
    	    		<td>
						<input class="inputEdit"  name="present_city" value="<?php echo ($data["present_city"]); ?>" />
    	    		</td>
    	    		<td><span class="">现居地址</span></td>
    	    		<td>
						<input class="inputEdit"  name="present_addr" value="<?php echo ($data["present_addr"]); ?>" />
    	    		</td>
    	    	</tr>
    	    </table>
    	    <div class="edit">
    	        <input type="button" class="btn" id="submit" value="提 交"  />
    	    </div>
    	</div>
	</div>
<div>
</body>
</html>