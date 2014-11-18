<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<title>学生详细信息</title>
<script type="text/javascript" language="javascript" >
$(function () {
    $(".inputEdit").css("display", "none");
});
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>学生信息</span> — <span>个人信息</span>
    	<a id="a_graduate" class="tab" href="#">毕业信息</a>
    	<a id="a_basic" class="tab current" href="#">基本信息</a>
    </div>
    <div class="content">
    	<div id="basic">
    	    <table>
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_name" value="<?php echo ($data["stu_name"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_name" value="<?php echo ($data["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		    <input class="inputlock" name="stu_num" value="<?php echo ($data["stu_num"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit" name="stu_num" value="<?php echo ($data["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">年级</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_grade" value="<?php echo ($data["stu_grade"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_grade" value="<?php echo ($data["stu_grade"]); ?>" />
    	    		</td>
    	    		<td><span class="">班级</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_class" value="<?php echo ($data["stu_class"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_class" value="<?php echo ($data["stu_class"]); ?>" />
    	    		</td>
    	    		<td rowspan="4" colspan="3">
    	    			<div class="studentPhoto">
							<img src="<?php echo ($root); ?>/upload/ID_photo/<?php echo ($data["stu_photo"]); ?>" height="160"/><br>
							<input id="photoHidden" type="hidden" value="<?php echo ($data["stu_photo"]); ?>" />
							<a href="javascript:changePhoto()" id="changephoto">更换头像</a>
						</div>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">专业</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_major" value="<?php echo ($data["stu_major"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_major" value="<?php echo ($data["stu_major"]); ?>" />
    	    		</td>
    	    		<td><span class="">学位类别</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="degree">
							<option value="硕士">硕士</option>
							<option value="博士">博士</option>
						</select>
    	    			<select class="inputEdit" name="degree">
							<option value="硕士">硕士</option>
							<option value="博士">博士</option>
						</select>
    	    		</td>
    	    		<td><span class="">导师</span></td>
    	    		<td>
    	    			<input class="inputlock" name="tutor" value="<?php echo ($data["tutor"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="tutor" value="<?php echo ($data["tutor"]); ?>" />
    	    		</td>
    	    		<td><span class="">研究方向</span></td>
    	    		<td colspan="">
    	    			<input class=" inputlock" name="research" value="<?php echo ($data["research"]); ?>" readonly="readonly" />
    	    			<input class=" inputEdit" name="research" value="<?php echo ($data["research"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">考试方式</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="exam_mode">
							<option value="全国统考">全国统考</option>
							<option value="推荐免试">推荐免试</option>
							<option value="强军计划">强军计划</option>
						</select>
    	    			<select class="inputEdit" name="exam_mode">
							<option value="全国统考">全国统考</option>
							<option value="推荐免试">推荐免试</option>
							<option value="强军计划">强军计划</option>
						</select>
    	    		</td>
    	    		<td><span class="">学制</span></td>
    	    		<td>
    	    			<input class="inputlock" name="edu_time" value="<?php echo ($data["edu_time"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="edu_time" value="<?php echo ($data["edu_time"]); ?>" />
    	    		</td>
    	    		<td><span class="">定向培养</span></td>
    	    		<td>
    	    			<input class="inputlock" name="directed" value="<?php echo ($data["directed"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="directed" value="<?php echo ($data["directed"]); ?>" />
    	    		</td>
    	    		<td><span class="">学籍状态</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="roll">
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
							<option value="退学">退学</option>
						</select>
    	    			<select class="inputEdit" name="roll">
							<option value="在籍">在籍</option>
							<option value="毕业">毕业</option>
							<option value="休学">休学</option>
							<option value="退学">退学</option>
						</select>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">毕业学校</span></td>
    	    		<td>
    	    			<input class="inputlock" name="last_major" value="<?php echo ($data["last_school"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="last_school" value="<?php echo ($data["last_school"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业专业</span></td>
    	    		<td>
    	    			<input class="inputlock" name="last_major" value="<?php echo ($data["last_major"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="last_major" value="<?php echo ($data["last_major"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputlock" name="last_date" value="<?php echo ($data["last_date"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="last_date" value="<?php echo ($data["last_date"]); ?>" />
    	    		</td>
    	    		<td><span class="">入学时间</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_indate" value="<?php echo ($data["stu_indate"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_indate" value="<?php echo ($data["stu_indate"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">政治面貌</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="politics" value="<?php echo ($data["politics"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="politics" value="<?php echo ($data["politics"]); ?>" />
    	    		</td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="stu_gender">
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
    	    			<select class="inputEdit" name="stu_gender">
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
    	    		</td>
    	    		<td><span class="">民族</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="stu_nation" value="<?php echo ($data["stu_nation"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit"  name="stu_nation" value="<?php echo ($data["stu_nation"]); ?>" />
    	    		</td>
    	    		<td><span class="">籍贯</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="hometown" value="<?php echo ($data["hometown"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="hometown" value="<?php echo ($data["hometown"]); ?>" />
    	    		</td>
    	    		<td><span class="">出生日期</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="birthday" value="<?php echo ($data["birthday"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="birthday" value="<?php echo ($data["birthday"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    	    <td><span class="">身份证号</span></td>
    	    		<td colspan="">
    	    			<input class="inputlock"  name="stu_idnum" value="<?php echo ($data["stu_idnum"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_idnum" value="<?php echo ($data["stu_idnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">手机</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_mobile" value="<?php echo ($data["stu_mobile"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_mobile" value="<?php echo ($data["stu_mobile"]); ?>"  />
    	    		</td>
    	    		<td><span class="">qq号码</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="stu_qqnum" value="<?php echo ($data["stu_qqnum"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit"  name="stu_qqnum" value="<?php echo ($data["stu_qqnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">邮箱</span></td>
    	    		<td colspan="">
    	    			<input class="inputlock"  name="stu_email" value="<?php echo ($data["stu_email"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="stu_email" value="<?php echo ($data["stu_email"]); ?>"  />
    	    		</td>
    	    		<td><span class="">个人主页</span></td>
    	    		<td colspan="">
    	    			<input class="inputlock"  name="homepage" value="<?php echo ($data["homepage"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="homepage" value="<?php echo ($data["homepage"]); ?>"  />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">家庭地址</span></td>
    	    		<td colspan="">
    	    		    <input class="inputlock"  name="home_addr" value="<?php echo ($data["home_addr"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="home_addr" value="<?php echo ($data["home_addr"]); ?>" /></td>
    	    		</td>
    	    		<td><span class="">乘车区间</span></td>
    	    		<td>
						<input class="inputlock"  name="train" value="<?php echo ($data["train"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="train" value="<?php echo ($data["train"]); ?>" />
					</td>
    	    		<td><span class="">父亲</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="dad_name" value="<?php echo ($data["dad_name"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="dad_name" value="<?php echo ($data["dad_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="mom_name" value="<?php echo ($data["mom_name"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="mom_name" value="<?php echo ($data["mom_name"]); ?>" />
					</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">父亲电话</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="dad_phone" value="<?php echo ($data["dad_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="dad_phone" value="<?php echo ($data["dad_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲电话</span></td>
    	    		<td>
						<input class="inputlock"  name="mom_phone" value="<?php echo ($data["mom_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="mom_phone" value="<?php echo ($data["mom_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">父亲单位</span></td>
    	    		<td colspan="">
    	    		    <input class="inputlock"  name="dad_unit" value="<?php echo ($data["dad_unit"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="dad_unit" value="<?php echo ($data["dad_unit"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲单位</span></td>
    	    		<td colspan="">
    	    		    <input class="inputlock"  name="mom_unit" value="<?php echo ($data["mom_unit"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="mom_unit" value="<?php echo ($data["mom_unit"]); ?>" />
    	    		</td>
    	    	</tr>
    	    </table>
    	    <div class="edit">
    	        <input id="edit_basic" type="button" class="btn" value="打开编辑"  />
    	        <input id="submit_basic" type="submit" class="btn btnLock" disabled="disabled" value="提交修改"  />
    	    </div>
    	</div>
    	<div id="graduate">
    		<table>
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_name" value="<?php echo ($data["stu_name"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_name" value="<?php echo ($data["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputlock" name="graduate_date" value="<?php echo ($data["graduate_date"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="graduate_date" value="<?php echo ($data["graduate_date"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业去向</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="graduate_type" id="graduate_type">
							<option value="工作">工作</option>
							<option value="读博">读博</option>
							<option value="出国">出国</option>
							<option value="公务员">公务员</option>
						</select>
						<select class="inputEdit"  name="graduate_type" id="graduate_type">
							<option value="工作">工作</option>
							<option value="读博">读博</option>
							<option value="出国">出国</option>
							<option value="公务员">公务员</option>
						</select>
    	    		</td>
    	    		<td><span class="">档案邮寄</span></td>
    	    		<td colspan="">
						<input class="inputlock"  name="post_info" value="<?php echo ($data["post_info"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="post_info" value="<?php echo ($data["post_info"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">单位</span></td>
    	    		<td colspan="">
						<input class="inputlock"  name="work_unit" value="<?php echo ($data["work_unit"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="work_unit" value="<?php echo ($data["work_unit"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位电话</span></td>
    	    		<td>
						<input class="inputlock"  name="wu_phone" value="<?php echo ($data["wu_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="wu_phone" value="<?php echo ($data["wu_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位邮箱</span></td>
    	    		<td>
						<input class="inputlock"  name="wu_email" value="<?php echo ($data["wu_email"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="wu_email" value="<?php echo ($data["wu_email"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位地址</span></td>
    	    		<td colspan="">
						<input class="inputlock"  name="wu_address" value="<?php echo ($data["wu_address"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="wu_address" value="<?php echo ($data["wu_address"]); ?>" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">现居城市</span></td>
    	    		<td>
						<input class="inputlock"  name="present_city" value="<?php echo ($data["present_city"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="present_city" value="<?php echo ($data["present_city"]); ?>" />
    	    		</td>
    	    		<td><span class="">现居地址</span></td>
    	    		<td>
						<input class="inputlock"  name="present_addr" value="<?php echo ($data["present_addr"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="present_addr" value="<?php echo ($data["present_addr"]); ?>" />
    	    		</td>
    	    	</tr>
    	    </table>
    	    <div class="edit">
    	        <input type="button" class="btn" id="edit_graduate" value="打开编辑"  />
    	        <input type="submit" class="btn btnLock" id="submit_graduate" disabled="disabled" value="提交修改"  />
    	    </div>
    	</div>
    </div>
</div>
<input type="hidden" name="stu_id" id="stu_id" value="<?php echo ($data["stu_id"]); ?>"/>
<div id="pictureDialog" title="照片">
	<p><img id="picture" src=""></p>
</div>

</body>
<script type="text/javascript">
$(function(){
	$("#graduate").css("display", "none");
	$("#a_graduate").click(function(){
		$(this).addClass("current");
		$("#a_basic").removeClass("current");
		$("#basic").css("display", "none");
		$("#graduate").css("display", "block");
	});
	$("#a_basic").click(function(){
		$(this).addClass("current");
		$("#a_graduate").removeClass("current");
		$("#basic").css("display", "block");
		$("#graduate").css("display", "none");
	});	
	
	$("#edit_basic").bind("click",function(){ 
	    edit("basic", "<?php echo ($data["stu_id"]); ?>"); 
	});
	$("#submit_basic").bind("click",function(){ 
	    submitEdit("basic", "<?php echo ($data["stu_id"]); ?>"); 
	});	
	$("#edit_graduate").bind("click",function(){ 
	    edit("graduate", "<?php echo ($data["stu_id"]); ?>"); 
	});
	$("#submit_graduate").bind("click",function(){ 
	    submitEdit("graduate", "<?php echo ($data["stu_id"]); ?>"); 
	});

	$("select[name='roll']").val("<?php echo ($data["roll"]); ?>");
	$("select[name='exam_mode']").val("<?php echo ($data["exam_mode"]); ?>");
	$("select[name='degree']").val("<?php echo ($data["degree"]); ?>");
	$("select[name='graduate_type']").val("<?php echo ($data["graduate_type"]); ?>");
	$("select[name='stu_gender']").val("<?php echo ($data["stu_gender"]); ?>");
});
function student() {
    var stu_id;
	var stu_name;
	var stu_num;
	var stu_grade;
	var stu_class;
			
	var stu_major;
	var degree;
	var tutor;
	var research;
			
	var exam_mode;
	var edu_time;
	var directed;
	var roll;
			
	var last_school;
	var last_major;
	var last_date;
	var stu_indate;
			
	var politics;
	var stu_gender;
	var stu_nation;
	var hometown;
	var birthday;
			
	var stu_idnum;
	var stu_mobile;
	var stu_qqnum;
	var stu_email;
	var homepage;
			
	var train;
	var home_addr;
	var dad_name;
	var mom_name;
	var dad_phone;
	var mom_phone;
	var dad_unit;
	var mom_unit;
	var stu_photo;
	
	var stu_name;
	var graduate_date;
	var graduate_type;
	var post_info;
			
	var work_unit;
	var wu_phone;
	var wu_email;
	var wu_address;
			
	var present_city;
	var present_addr;
}
function edit(module, id){
	$("#" + module + " .inputlock").css("display","none");
	$("#" + module + " .inputEdit").css("display","inline");
	$("#" + module + " span").attr("class","span2");
	$("#edit_"+ module).attr("value","取消编辑");
	$("#edit_"+ module).unbind("click");
	$("#edit_"+ module).bind("click",function(){ 
		cancelEdit(module, id); 
	});
	$("#submit_"+ module).removeClass("btnLock");
	$("#submit_"+ module).removeAttr("disabled");
}
function cancelEdit(module, id){
	$("#" + module + " .inputlock").css("display","inline");
	$("#" + module + " .inputEdit").css("display","none");
	$("#" + module + " span").attr("class","");
	$("#edit_"+ module).attr("value","打开编辑");
	$("#edit_"+ module).unbind("click");
	$("#edit_"+ module).bind("click",function(){ 
		edit(module, id); 
	});
	$("#submit_"+ module).addClass("btnLock");
	$("#submit_"+ module).attr("disabled", "disabled");
}
function submitEdit(module, id) {
	var model = new student();
	model.stu_num     = $("#basic .inputEdit[name='stu_num']").val();
	model.stu_grade   = $("#basic .inputEdit[name='stu_grade']").val();
	model.stu_class   = $("#basic .inputEdit[name='stu_class']").val();
	
	model.stu_major   = $("#basic .inputEdit[name='stu_major']").val();
	model.degree      = $("#basic .inputEdit[name='degree']").val();
	model.tutor       = $("#basic .inputEdit[name='tutor']").val();
	model.research    = $("#basic .inputEdit[name='research']").val();
	
	model.exam_mode   = $("#basic .inputEdit[name='exam_mode']").val();
	model.edu_time    = $("#basic .inputEdit[name='edu_time']").val();
	model.directed    = $("#basic .inputEdit[name='directed']").val();
	model.roll        = $("#basic .inputEdit[name='roll']").val();
	
	model.last_school = $("#basic .inputEdit[name='last_school']").val();
	model.last_major  = $("#basic .inputEdit[name='last_major']").val();
	model.last_date   = $("#basic .inputEdit[name='last_date']").val();
	model.stu_indate  = $("#basic .inputEdit[name='stu_indate']").val();
	
	model.politics    = $("#basic .inputEdit[name='politics']").val();
	model.stu_gender  = $("#basic .inputEdit[name='stu_gender']").val();
	model.stu_nation  = $("#basic .inputEdit[name='stu_nation']").val();
	model.hometown    = $("#basic .inputEdit[name='hometown']").val();
	model.birthday    = $("#basic .inputEdit[name='birthday']").val();
	
	model.stu_idnum   = $("#basic .inputEdit[name='stu_idnum']").val();
	model.stu_mobile  = $("#basic .inputEdit[name='stu_mobile']").val();
	model.stu_qqnum   = $("#basic .inputEdit[name='stu_qqnum']").val();
	model.stu_email   = $("#basic .inputEdit[name='stu_email']").val();
	model.homepage    = $("#basic .inputEdit[name='homepage']").val();
	
	model.train       = $("#basic .inputEdit[name='train']").val();
	model.home_addr   = $("#basic .inputEdit[name='home_addr']").val();
	model.dad_name    = $("#basic .inputEdit[name='dad_name']").val();
	model.mom_name    = $("#basic .inputEdit[name='mom_name']").val();
	model.dad_phone   = $("#basic .inputEdit[name='dad_phone']").val();
	model.mom_phone   = $("#basic .inputEdit[name='mom_phone']").val();
	model.dad_unit    = $("#basic .inputEdit[name='dad_unit']").val();
	model.mom_unit    = $("#basic .inputEdit[name='mom_unit']").val();
	model.stu_photo   = $("#photoHidden").val();
	
	model.graduate_date = $("#graduate .inputEdit[name='graduate_date']").val();
	model.graduate_type = $("#graduate .inputEdit[name='graduate_type']").val();
	model.post_info     = $("#graduate .inputEdit[name='post_info']").val();
	
	model.work_unit     = $("#graduate .inputEdit[name='work_unit']").val();
	model.wu_phone      = $("#graduate .inputEdit[name='wu_phone']").val();
	model.wu_email      = $("#graduate .inputEdit[name='wu_email']").val();
	model.wu_address    = $("#graduate .inputEdit[name='wu_address']").val();
	
	model.present_city  = $("#graduate .inputEdit[name='present_city']").val();
	model.present_addr  = $("#graduate .inputEdit[name='present_addr']").val();
    switch (module) {
	    case 'basic':
			model.stu_name    = $("#basic .inputEdit[name='stu_name']").val();
			break;
		case 'graduate':
			model.stu_name      = $("#graduate .inputEdit[name='stu_name']").val();
			break;
		}
		model.stu_id = <?php echo ($data["stu_id"]); ?>;
		$.ajax({
            url: "<?php echo ($url); ?>/edit",
			type: 'POST',
			data: model,
            success: 
				function(result){
                    switch (result) { 
						case '0':
                            alert("申请提交失败！");	
							cancelEdit(module, id);
                            break;	
				        case '1':
						    alert("申请提交成功！");
							cancelEdit(module, id);
							break;
						case '2':
							alert("修改成功！");
							window.location.reload();
							break;
						case '3':
                            alert("修改失败！");	
							cancelEdit(module, id);
                            break;									
					}
                }
        });
}
var a = 0;
function changePhoto(){
       	var stu_id = $("#stu_id").val();
   		window.showModalDialog('<?php echo ($url); ?>/changePhoto/stu_id/'+stu_id,window,'dialogWidth:400px;dialogHeight:150px');

}
function changePicture(module, id){
    var obj = new Object();
	window.showModalDialog('<?php echo ($url); ?>/changePicture/module/'+module+"/id/"+id,obj,'dialogWidth:400px;dialogHeight:150px');
}
function viewPicture(url) {
    $("#picture").attr("src", url);
	$("#picture").css("display", "block");
	$( "#pictureDialog" ).dialog({
		height: 450,
		width: 540,
		modal: true
	});
}
</script>
</html>