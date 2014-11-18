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
	if (upfile == "" || upfile == null) {
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
    	<span>学生信息</span> — <span>信息采集</span>
    	<a id="a_hand" class="tab" href="#">手动添加</a>
    	<a id="a_file" class="tab" href="#">文件导入</a>
    </div>
    <div class="content"> 
		<div id="file">   
			<form action="<?php echo ($url); ?>/uploadCollect" method="post" id="form" enctype="multipart/form-data">
				<table class="tb1 tb2" style="width:400px";>
					<tbody>
						<tr align="center" class="">
							<td>导入文件<a href="<?php echo ($url); ?>/downloadCollect">模板下载</a></td>
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
    	    			<input class="inputEdit" name="stu_name" value="<?php echo ($data["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		    <input class="inputEdit" name="stu_num" value="<?php echo ($data["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">年级</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_grade" value="<?php echo ($data["stu_grade"]); ?>" />
    	    		</td>
    	    		<td><span class="">班级</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="stu_class" value="<?php echo ($data["stu_class"]); ?>" />
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
    	    		<td><span class="">考试方式</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="exam_mode">
							<option value="全国统考">全国统考</option>
							<option value="推荐免试">推荐免试</option>
							<option value="强军计划">强军计划</option>
						</select>
    	    		</td>
    	    		<td><span class="">学制</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="edu_time" value="<?php echo ($data["edu_time"]); ?>" />
    	    		</td>
    	    		<td><span class="">定向培养</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="directed" value="<?php echo ($data["directed"]); ?>" />
    	    		</td>
    	    		<td><span class="">学籍状态</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="roll">
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
						</select>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">毕业学校</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="last_school" value="<?php echo ($data["last_school"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业专业</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="last_major" value="<?php echo ($data["last_major"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputEdit" name="last_date" value="<?php echo ($data["last_date"]); ?>" />
    	    		</td>
    	    		<td><span class="">入学时间</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="stu_indate" value="<?php echo ($data["stu_indate"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">政治面貌</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="politics" value="<?php echo ($data["politics"]); ?>" />
    	    		</td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
    	    			<select class="inputEdit" name="stu_gender">
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
    	    		</td>
    	    		<td><span class="">民族</span></td>
    	    		<td>
    	    		    <input class="inputEdit"  name="stu_nation" value="<?php echo ($data["stu_nation"]); ?>" />
    	    		</td>
    	    		<td><span class="">籍贯</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="hometown" value="<?php echo ($data["hometown"]); ?>" />
    	    		</td>
    	    		<td><span class="">出生日期</span></td>
    	    		<td>
						<input class="inputEdit"  name="birthday" value="<?php echo ($data["birthday"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    	    <td><span class="">身份证号</span></td>
    	    		<td colspan="">
    	    			<input class="inputEdit"  name="stu_idnum" value="<?php echo ($data["stu_idnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">手机</span></td>
    	    		<td>
    	    			<input class="inputEdit"  name="stu_mobile" value="<?php echo ($data["stu_mobile"]); ?>"  />
    	    		</td>
    	    		<td><span class="">qq号码</span></td>
    	    		<td>
    	    		    <input class="inputEdit"  name="stu_qqnum" value="<?php echo ($data["stu_qqnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">邮箱</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="stu_email" value="<?php echo ($data["stu_email"]); ?>"  />
    	    		</td>
    	    		<td><span class="">个人主页</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="homepage" value="<?php echo ($data["homepage"]); ?>"  />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">家庭地址</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="home_addr" value="<?php echo ($data["home_addr"]); ?>" /></td>
    	    		</td>
    	    		<td><span class="">乘车区间</span></td>
    	    		<td>
						<input class="inputEdit"  name="train" value="<?php echo ($data["train"]); ?>" />
					</td>
    	    		<td><span class="">父亲</span></td>
    	    		<td>
						<input class="inputEdit"  name="dad_name" value="<?php echo ($data["dad_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲</span></td>
    	    		<td>
						<input class="inputEdit"  name="mom_name" value="<?php echo ($data["mom_name"]); ?>" />
					</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">父亲电话</span></td>
    	    		<td>
						<input class="inputEdit"  name="dad_phone" value="<?php echo ($data["dad_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲电话</span></td>
    	    		<td>
						<input class="inputEdit"  name="mom_phone" value="<?php echo ($data["mom_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">父亲单位</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="dad_unit" value="<?php echo ($data["dad_unit"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲单位</span></td>
    	    		<td colspan="">
						<input class="inputEdit"  name="mom_unit" value="<?php echo ($data["mom_unit"]); ?>" />
    	    		</td>
    	    	</tr>
    	    </table>
    	    <div class="edit">
    	        <input id="submit" type="submit" class="btn"  value="提 交"  />
    	    </div>
		</div>
	</div>
<div>
</body>
</html>