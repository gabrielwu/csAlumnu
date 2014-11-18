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
    	<span>个人事务</span> — <span>个人信息</span>
    	<a id="a_graduate" class="tab" href="#">毕业信息</a>
    	<a id="a_basic" class="tab current" href="#">基本信息</a>
    </div>
    <div class="content">
    	<div id="basic">
    	    <table>
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		    <input class="inputlock" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">年级</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" />
    	    		</td>
    	    		<td><span class="">班级</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td rowspan="4" colspan="3">
    	    			<div class="studentPhoto">
							<img src="<?php echo ($root); ?>/upload/ID_photo/<?php echo ($result["stu_photo"]); ?>" height="160"/><br>
							<input id="photoHidden" type="hidden" value="<?php echo ($result["stu_photo"]); ?>" />
							<a href="javascript:changephoto()" id="changephoto" onclick="changephoto()">更换头像</a>
						</div>
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">专业</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">导师</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">研究方向</span></td>
    	    		<td colspan="3">
    	    			<input class="inputL inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputL inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">学位类别</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">考试方式</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">学制</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">学籍状态</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_status" value="<?php echo ($result["stu_status"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_status" value="<?php echo ($result["stu_status"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">毕业学校</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业专业</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">入学时间</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_indate" value="<?php echo ($result["stu_indate"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_indate" value="<?php echo ($result["stu_indate"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">政治面貌</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_political" value="<?php echo ($result["stu_political"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_political" value="<?php echo ($result["stu_political"]); ?>" />
    	    		</td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" />
    	    		</td>
    	    		<td><span class="">民族</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit"  name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" />
    	    		</td>
    	    		<td><span class="">籍贯</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_hometown" value="<?php echo ($result["stu_hometown"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_hometown" value="<?php echo ($result["stu_hometown"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">手机</span></td>
    	    		<td>
    	    			<input class="inputlock"  name="stu_mobile" value="<?php echo ($result["stu_mobile"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_mobile" value="<?php echo ($result["stu_mobile"]); ?>"  />
    	    		</td>
    	    		<td><span class="">qq号码</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="stu_qqnum" value="<?php echo ($result["stu_qqnum"]); ?>" readonly="readonly" />
    	    		    <input class="inputEdit"  name="stu_qqnum" value="<?php echo ($result["stu_qqnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">邮箱</span></td>
    	    		<td colspan="3">
    	    			<input class="inputL inputlock"  name="stu_email" value="<?php echo ($result["stu_email"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="stu_email" value="<?php echo ($result["stu_email"]); ?>"  />
    	    		</td>
    	    		<td><span class="">出生日期</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="stu_birthday" value="<?php echo ($result["stu_birthday"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="stu_birthday" value="<?php echo ($result["stu_birthday"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    	    <td><span class="">身份证号</span></td>
    	    		<td colspan="3">
    	    			<input class="inputL inputlock"  name="stu_idnum" value="<?php echo ($result["stu_idnum"]); ?>" readonly="readonly" />
    	    			<input class="inputL inputEdit"  name="stu_idnum" value="<?php echo ($result["stu_idnum"]); ?>" />
    	    		</td>
    	    		<td><span class="">家庭地址</span></td>
    	    		<td colspan="3">
    	    		    <input class="inputL inputlock"  name="stu_homeaddr" value="<?php echo ($result["stu_homeaddr"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="stu_homeaddr" value="<?php echo ($result["stu_homeaddr"]); ?>" /></td>
    	    		</td>
    	    		<td><span class="">乘车区间</span></td>
    	    		<td>
						<input class="inputlock"  name="stu_trainarea" value="<?php echo ($result["stu_trainarea"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="stu_trainarea" value="<?php echo ($result["stu_trainarea"]); ?>" />
					</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">父亲</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="dad_name" value="<?php echo ($result["dad_name"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="dad_name" value="<?php echo ($result["dad_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">父亲电话</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="dad_phone" value="<?php echo ($result["dad_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="dad_phone" value="<?php echo ($result["dad_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲</span></td>
    	    		<td>
    	    		    <input class="inputlock"  name="mom_name" value="<?php echo ($result["mom_name"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="mom_name" value="<?php echo ($result["mom_name"]); ?>" />
					</td>
    	    		<td><span class="">母亲电话</span></td>
    	    		<td>
						<input class="inputlock"  name="mom_phone" value="<?php echo ($result["mom_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="mom_phone" value="<?php echo ($result["mom_phone"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">父亲单位</span></td>
    	    		<td colspan="3">
    	    		    <input class="inputL inputlock"  name="dad_work_unit" value="<?php echo ($result["dad_work_unit"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="dad_work_unit" value="<?php echo ($result["dad_work_unit"]); ?>" />
    	    		</td>
    	    		<td><span class="">母亲单位</span></td>
    	    		<td colspan="3">
    	    		    <input class="inputL inputlock"  name="mom_work_unit" value="<?php echo ($result["mom_work_unit"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="mom_work_unit" value="<?php echo ($result["mom_work_unit"]); ?>" />
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
    	    			<input class="inputlock"  name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit"  name="stu_name" value="<?php echo ($result["stu_name"]); ?>" />
    	    		</td>
    	    		<td><span class="">学号</span></td>
    	    		<td>
    	    		   <input class="inputlock"  name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
    	    		   <input class="inputEdit"  name="stu_num" value="<?php echo ($result["stu_num"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业时间</span></td>
    	    		<td>
    	    			<input class="inputlock" name="stu_" value="<?php echo ($result["stu_"]); ?>" readonly="readonly" />
    	    			<input class="inputEdit" name="stu_" value="<?php echo ($result["stu_"]); ?>" />
    	    		</td>
    	    		<td><span class="">毕业去向</span></td>
    	    		<td>
    	    			<select class="inputlock" disabled="disabled"  name="type" id="graduationType">
							<option value="1">考研</option>
							<option value="2">保研</option>
							<option value="3">工作</option>
							<option value="4">出国</option>
							<option value="5">公务员</option>
						</select>
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
    	    		<td><span class="">手机</span></td>
    	    		<td>
						<input class="inputlock"  name="phone" value="<?php echo ($graduationResult["phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="phone" value="<?php echo ($graduationResult["phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">邮箱</span></td>
    	    		<td>
						<input class="inputlock"  name="email" value="<?php echo ($graduationResult["email"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="email" value="<?php echo ($graduationResult["email"]); ?>" />
    	    		</td>
    	    		<td><span class="">用人单位</span></td>
    	    		<td colspan="3">
						<input class="inputL inputlock"  name="receive_unit" value="<?php echo ($graduationResult["receive_unit"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="receive_unit" value="<?php echo ($graduationResult["receive_unit"]); ?>" />
    	    		</td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">单位电话</span></td>
    	    		<td>
						<input class="inputlock"  name="ru_phone" value="<?php echo ($graduationResult["ru_phone"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="ru_phone" value="<?php echo ($graduationResult["ru_phone"]); ?>" />
    	    		</td>
    	    		<td><span class="">档案邮寄</span></td>
    	    		<td>
						<input class="inputlock"  name="post_info" value="<?php echo ($graduationResult["post_info"]); ?>" readonly="readonly" />
						<input class="inputEdit"  name="post_info" value="<?php echo ($graduationResult["post_info"]); ?>" />
    	    		</td>
    	    		<td><span class="">单位地址</span></td>
    	    		<td colspan="3">
						<input class="inputL inputlock"  name="ru_address" value="<?php echo ($graduationResult["ru_address"]); ?>" readonly="readonly" />
						<input class="inputL inputEdit"  name="ru_address" value="<?php echo ($graduationResult["ru_address"]); ?>" />
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
<input type="hidden" name="id" id="id" />
<input type="hidden" name="stu_id" id="stu_id" value="<?php echo ($result["stu_id"]); ?>"/>
<input type="hidden" id="a" value="1"/>
<input type="hidden" id="module" value=""/>
<input type="hidden" id="moduleId" value=""/>
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

	$('viewtitle').css("background","");
	
	
	$("#edit_basic").bind("click",function(){ 
	    editUnique("basic", "<?php echo ($result["stu_id"]); ?>"); 
	});
	$("#submit_basic").bind("click",function(){ 
	    submitEditUnique("basic", "<?php echo ($result["stu_id"]); ?>"); 
	});	
	$("#edit_graduate").bind("click",function(){ 
	    editUnique("graduate", "<?php echo ($result["stu_id"]); ?>"); 
	});
	$("#submit_graduate").bind("click",function(){ 
	    submitEditUnique("graduate", "<?php echo ($result["stu_id"]); ?>"); 
	});

	var graduationTypeId;
	var graduationType = "<?php echo ($graduationResult["type"]); ?>";
	switch (graduationType) {
	    case '考研': 
		    graduationTypeId = '1';
			break;
		case '保研': 
		    graduationTypeId = '2';
			break;
		case '工作': 
		    graduationTypeId = '3';
			break;
		case '出国': 
		    graduationTypeId = '4';
			break;
		case '公务员': 
		    graduationTypeId = '5';
			break;
		default : 
		    graduationTypeId = '1';
			break;
	}
	$("#graduationType").val(graduationTypeId);
	if (<?php echo ($level); ?> != 2) {
	    $("#toolbar").remove();
		$("#hierarchy").remove();
		$(".tdDelete").remove();
	} else if (<?php echo ($gradeTeacher); ?> != 1) {
	    $(".tdDelete").remove();
		$(".tdEdit").remove();
	}
});
function deleteModule(module, id) {
    if (confirm("确定删除?")){
	    var password = "<?php echo ($password); ?>";
	    var tpassword = prompt("请输入您的登录密码：","");
		var tabId;
 	    if (password == tpassword) {
		    switch (module) {
				case 'scholar':
					tabId = 1;
					var model = new scholar();
					break;
				case 'social_scholar':
					tabId = 2;
					var model = new scholar();
					break;
				case 'competition':
					tabId = 3;
					var model = new competition();
					break;
				case 'granting':
					tabId = 6;
					var model = new granting();
					break;
				case 'loan':
					tabId = 7;
					var model = new loan();
					break;
				case 'punish':
					tabId = 9;
					var model = new punish();
					break;
			    case 'innovation':
					tabId = 10;
					var model = new innovation();
					break;
			}
			model.module = module;
	        model.id = id;
		    $.ajax({
            url: "<?php echo ($url); ?>/deleteModule",
			type: 'POST',
			data: model,
            success: function(result){
                        switch (result) { 
							case '0':
                                alert("申请提交失败！");	
                                break;	
					        case '1':
							    alert("申请提交成功！");
								break;
                            case '2':
							    alert("删除成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("删除失败！");	
                                break;									
						 }
                     }
            });
     	} else {
	    	alert("密码输入错误！！！");
	    }
	}
}
function insurance() {
    var stu_id;
    var module;
    var id;
    var insu_beginyear;
    var insu_endyear;
    var insu_amount;
    var insu_reducable;
}
function graduation() {
    var stu_id;
    var module;
    var id;
    var phone;
    var email;
    var qq;
    var politics_status;
	var receive_unit;
    var ru_address;
    var ru_phone;
    var ru_email;
	var post_info;
    var type;
	var date;
}
function party() {
    var stu_id;
    var module;
    var id;
    var apply_date;
    var active_date;
    var ready_date;
    var full_member_date;
	var alter_info;
}
function student() {
    var module;
    var stu_id;
    var stu_num;
    var stu_pw;
    var stu_tnum;
    var stu_status;
    var stu_idnum;
    var stu_name;
    var stu_pinyin;
    var stu_exname;
    var stu_indate;
    var stu_type;
    var stu_schooling;
    var stu_gradyear;
    var stu_campus;
    var stu_college;
    var stu_major;
    var stu_grade;
    var stu_class;
    var stu_gender;
    var stu_nation;
    var stu_political;
    var stu_birthday;
    var stu_hometown;
    var stu_birthplace;
    var stu_birplacode;
    var stu_residence;
    var stu_residcode;
    var stu_trainarea;
    var stu_abroad;
    var stu_homeaddr;
    var stu_homeadcode;
    var stu_homeaddr2;
    var stu_contacaddr;
    var stu_contadcode;
    var stu_contaddr2;
    var stu_zipcode;
    var stu_email;
    var stu_homepage;
    var stu_phone;
    var stu_mobile;
    var stu_qqnum;
    var stu_bloodtype;
    var stu_faith;
    var stu_residtype;
    var stu_marriage;
    var stu_speciality;
    var stu_photo;
    var dad_name;
    var mom_name;
    var dad_phone;
    var mom_phone;
    var dad_work_unit;
    var mom_work_unit;
    var stu_duty;
}
function editUnique(module, id){
		$("#" + module + " .inputlock").css("display","none");
		$("#" + module + " .inputEdit").css("display","inline");
		$("#" + module + " span").attr("class","span2");
		$("#edit_"+ module).attr("value","取消编辑");
		$("#edit_"+ module).unbind("click");
		$("#edit_"+ module).bind("click",function(){ 
		    cancelEditUnique(module, id); 
		});
		$("#submit_"+ module).removeClass("btnLock");
		$("#submit_"+ module).removeAttr("disabled");
}
function cancelEditUnique(module, id){
		$("#" + module + " .inputlock").css("display","inline");
		$("#" + module + " .inputEdit").css("display","none");
		$("#" + module + " span").attr("class","");
		$("#edit_"+ module).attr("value","打开编辑");
		$("#edit_"+ module).unbind("click");
		$("#edit_"+ module).bind("click",function(){ 
		    editUnique(module, id); 
		});
		$("#submit_"+ module).addClass("btnLock");
		$("#submit_"+ module).attr("disabled", "disabled");
}
function submitEditUnique(module, id) {
    var tabId;
    switch (module) {
		    case 'student':
			    tabId = 0;
			    var model = new student();
				model.stu_num = $("#tab_" + module + " .inputEdit[name='stu_num']").val();
				model.stu_tnum = $("#tab_" + module + " .inputEdit[name='stu_tnum']").val();
				model.stu_status = $("#tab_" + module + " .inputEdit[name='stu_status']").val();
				model.stu_idnum = $("#tab_" + module + " .inputEdit[name='stu_idnum']").val();
				model.stu_name = $("#tab_" + module + " .inputEdit[name='stu_name']").val();
				model.stu_pinyin = $("#tab_" + module + " .inputEdit[name='stu_pinyin']").val();
				model.stu_indate = $("#tab_" + module + " .inputEdit[name='stu_indate']").val();
				model.stu_gradyear = $("#tab_" + module + " .inputEdit[name='stu_gradyear']").val();
				model.stu_grade = $("#tab_" + module + " .inputEdit[name='stu_grade']").val();
				model.stu_class = $("#tab_" + module + " .inputEdit[name='stu_class']").val();
				model.stu_gender = $("#tab_" + module + " .inputEdit[name='stu_gender']").val();
				model.stu_nation = $("#tab_" + module + " .inputEdit[name='stu_nation']").val();
				model.stu_political = $("#tab_" + module + " .inputEdit[name='stu_political']").val();
				model.stu_birthday = $("#tab_" + module + " .inputEdit[name='stu_birthday']").val();
				model.stu_hometown = $("#tab_" + module + " .inputEdit[name='stu_hometown']").val();
				model.stu_birthplace = $("#tab_" + module + " .inputEdit[name='stu_birthplace']").val();
				model.stu_residence = $("#tab_" + module + " .inputEdit[name='stu_residence']").val();
				model.stu_trainarea = $("#tab_" + module + " .inputEdit[name='stu_trainarea']").val();
				model.stu_abroad = $("#tab_" + module + " .inputEdit[name='stu_abroad']").val();
				model.stu_homeaddr = $("#tab_" + module + " .inputEdit[name='stu_homeaddr']").val();
				model.stu_homeaddr2 = $("#tab_" + module + " .inputEdit[name='stu_homeaddr2']").val();
				model.stu_contacaddr = $("#tab_" + module + " .inputEdit[name='stu_contacaddr']").val();
				model.stu_contaddr2 = $("#tab_" + module + " .inputEdit[name='stu_contaddr2']").val();
				model.stu_zipcode = $("#tab_" + module + " .inputEdit[name='stu_zipcode']").val();
				model.stu_email = $("#tab_" + module + " .inputEdit[name='stu_email']").val();
				model.stu_homepage = $("#tab_" + module + " .inputEdit[name='stu_homepage']").val();
				model.stu_mobile = $("#tab_" + module + " .inputEdit[name='stu_mobile']").val();
				model.stu_qqnum = $("#tab_" + module + " .inputEdit[name='stu_qqnum']").val();
				model.stu_faith = $("#tab_" + module + " .inputEdit[name='stu_faith']").val();
				model.dad_name = $("#tab_" + module + " .inputEdit[name='dad_name']").val();
				model.mom_name = $("#tab_" + module + " .inputEdit[name='mom_name']").val();
				model.dad_phone = $("#tab_" + module + " .inputEdit[name='dad_phone']").val();
				model.mom_phone = $("#tab_" + module + " .inputEdit[name='mom_phone']").val();
				model.dad_work_unit = $("#tab_" + module + " .inputEdit[name='dad_work_unit']").val();
				model.mom_work_unit = $("#tab_" + module + " .inputEdit[name='mom_work_unit']").val();
				model.stu_duty = $("#tab_" + module + " .inputEdit[name='stu_duty']").val();
				model.stu_homeadcode = $("#tab_" + module + " .inputEdit[name='stu_homeadcode']").val();
				model.stu_residcode = $("#tab_" + module + " .inputEdit[name='stu_residcode']").val();
				model.stu_phone = $("#tab_" + module + " .inputEdit[name='stu_phone']").val();
				model.stu_photo = $("#photoHidden").val();
			//	model.stu_exname = $("#tab_" + module + " .inputEdit[name='stu_exname']").val();
			//	model.stu_residtype = $("#tab_" + module + " .inputEdit[name='stu_residtype']").val();
			//	model.stu_marriage = $("#tab_" + module + " .inputEdit[name='stu_marriage']").val();
			//	model.stu_speciality = $("#tab_" + module + " .inputEdit[name='stu_speciality']").val();
			//	model.stu_photo = $("#tab_" + module + " .inputEdit[name='stu_photo']").val();
			//	model.stu_bloodtype = $("#tab_" + module + " .inputEdit[name='stu_bloodtype']").val();
			//	model.stu_phone = $("#tab_" + module + " .inputEdit[name='stu_phone']").val();
			//	model.stu_contadcode = $("#tab_" + module + " .inputEdit[name='stu_contadcode']").val();
			//	model.stu_birplacode = $("#tab_" + module + " .inputEdit[name='stu_birplacode']").val();
			//	model.stu_residcode = $("#tab_" + module + " .inputEdit[name='stu_residcode']").val();
			//	model.stu_campus = $("#tab_" + module + " .inputEdit[name='stu_campus']").val();
			//	model.stu_college = $("#tab_" + module + " .inputEdit[name='stu_college']").val();
			//	model.stu_major = $("#tab_" + module + " .inputEdit[name='stu_major']").val();
			//	model.stu_type = $("#tab_" + module + " .inputEdit[name='stu_type']").val();
			//	model.stu_schooling = $("#tab_" + module + " .inputEdit[name='stu_schooling']").val();
			//	model.stu_pw = $("#tab_" + module + " .inputEdit[name='stu_pw']").val();
			    break;
			case 'party':
			    tabId = 4;
			    var model = new party();
				model.id = id;
				model.apply_date = $("#tab_" + module + " .inputEdit[name='apply_date']").val();
				model.active_date = $("#tab_" + module + " .inputEdit[name='active_date']").val();
				model.ready_date = $("#tab_" + module + " .inputEdit[name='ready_date']").val();
				model.full_member_date = $("#tab_" + module + " .inputEdit[name='full_member_date']").val();
				model.alter_info = $("#tab_" + module + " .inputEdit[name='alter_info']").val();
			    break;
			case 'graduation':
			    tabId = 8;
			    var model = new graduation();
				model.id = id;
				model.phone = $("#tab_" + module + " .inputEdit[name='phone']").val();
				model.email = $("#tab_" + module + " .inputEdit[name='email']").val();
				model.qq = $("#tab_" + module + " .inputEdit[name='qq']").val();
				model.politics_status = $("#tab_" + module + " .inputEdit[name='politics_status']").val();
				model.receive_unit = $("#tab_" + module + " .inputEdit[name='receive_unit']").val();
				model.ru_phone = $("#tab_" + module + " .inputEdit[name='ru_phone']").val();
				model.ru_email = $("#tab_" + module + " .inputEdit[name='ru_email']").val();
				model.post_info = $("#tab_" + module + " .inputEdit[name='post_info']").val();
				model.type = $("#tab_" + module + " .inputEdit[name='type']").val();
				model.ru_address = $("#tab_" + module + " .inputEdit[name='ru_address']").val();
				model.date = $("#tab_" + module + " .inputEdit[name='date']").val();
			    break;
			case 'insurance':
			    tabId = 5;
			    var model = new insurance();
				model.id = id;
				model.insu_beginyear = $("#tab_" + module + " .inputEdit[name='insu_beginyear']").val();
				model.insu_endyear = $("#tab_" + module + " .inputEdit[name='insu_endyear']").val();
				model.insu_amount = $("#tab_" + module + " .inputEdit[name='insu_amount']").val();
				model.insu_reducable = $("#tab_" + module + " .inputEdit[name='insu_reducable']").val();
			    break;
		}
		model.stu_id = <?php echo ($result["stu_id"]); ?>;
		model.module = module;
		$.ajax({
            url: "<?php echo ($url); ?>/updateModule",
			type: 'POST',
			data: model,
            success: function(result){
                        switch (result) { 
							case '0':
                                alert("申请提交失败！");	
								cancelEditUnique(module, id);
                                break;	
					        case '1':
							    alert("申请提交成功！");
								cancelEditUnique(module, id);
								break;
                            case '2':
							    alert("修改成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("修改失败！");	
								cancelEditUnique(module, id);
                                break;									
						 }
                     }
        });
}
var a = 0;
function changephoto(){
    if (a == 0) {
	    a = 1;
		//return false;
    } else {
       	var stu_id = $("#stu_id").val();
        var obj = new Object();
   		window.showModalDialog('<?php echo ($url); ?>/changephoto/stu_id/'+stu_id,obj,'dialogWidth:400px;dialogHeight:150px');
		a = 0;
    }
}
function changePicture(module, id){
    var obj = new Object();
	window.showModalDialog('<?php echo ($url); ?>/changePicture/module/'+module+"/id/"+id,obj,'dialogWidth:400px;dialogHeight:150px');
}
function stuchangepassword(){
	$("#form").attr("action","<?php echo ($url); ?>/stuchangepassword");
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
function scholar() {
    var module;
    var stu_id;
	var id;
	var scholar_name;
	var level;
	var date;
	var amount;
}
function innovation() {
    var module;
    var stu_id;
	var id;
	var project_name;
	var level;
	var award;
	var apply_date;
	var win_date;
	var tutor;
	var members;
	var leader;
	var college;
}
function granting() {
    var module;
    var stu_id;
	var id;
	var granting_name;
	var level;
	var date;
	var amount;
}
function loan() {
    var module;
    var stu_id;
	var id;
	var total;
	var tuition;
	var accommodation;
	var apply_date;
	var pay_off;
}
function punish() {
    var module;
    var stu_id;
	var id;
	var type;
	var cause;
	var date;
	var can_cancel;
}
function competition() {
    var module;
    var stu_id;
	var id;
	var competition_name;
	var level;
	var date;
	var award;
}
function submitEdit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
	var tabId;
    switch (module) {
	    case 'scholar':
		    tabId = 1;
		    editTd = 6;
		    var model = new scholar();
		    model.scholar_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'socialScholar':
		    tabId = 2;
		    editTd = 6;
		    var model = new scholar();
		    model.scholar_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'competition':
		    tabId = 3;
		    editTd = 6;
		    var model = new competition();
		    model.competition_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.award = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		
		case 'granting':
		    tabId = 6;
		    editTd = 5;
		    var model = new granting();
		    model.granting_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'loan':
		    tabId = 7;
		    editTd = 6;
		    var model = new loan();
		    model.total = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.tuition = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.accommodation = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.apply_date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			model.pay_off = $("#" + itemId + " td::nth-child(5) input[type='text']").val();
			break;
		case 'punish':
		    tabId = 9;
		    editTd = 5;
		    var model = new punish();
		    model.type = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.cause = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.can_cancel = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
	    case 'innovation':
		    tabId = 10;
		    editTd = 11;
		    var model = new innovation();
		    model.project_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.award = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.apply_date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			model.win_date = $("#" + itemId + " td::nth-child(5) input[type='text']").val();
			model.tutor = $("#" + itemId + " td::nth-child(6) input[type='text']").val();
			model.leader = $("#" + itemId + " td::nth-child(7) input[type='text']").val();
			model.members = $("#" + itemId + " td::nth-child(8) input[type='text']").val();
			model.college = $("#" + itemId + " td::nth-child(9) input[type='text']").val();
			break;
	}
	model.module = module;
	model.id = id;
	model.stu_id = <?php echo ($result["stu_id"]); ?>;
	$.ajax({
            url: "<?php echo ($url); ?>/updateModule",
			type: 'POST',
			data: model,
            success: function(result){
			            switch (result) { 
							case '0':
                                alert("申请提交失败！");						
                                break;	
					        case '1':
							    alert("申请提交成功！");
								break;
                            case '2':
							    alert("修改成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("修改失败！");	
                                break;						
						 }
						 $("#" + itemId + " td.text").each(function () {
							 html = $(this).find("input[type='hidden']").val();
						    $(this).html(html);
						});
						$("#" + itemId + " td::nth-child(" + editTd + ") #submitEdit").remove();
						$("#" + itemId + " td::nth-child(" + editTd + ") #cancelEdit").remove();
						$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "");	
                     }
    });
}
function item() {
    var module;
	var id;
}
function edit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
    switch (module) {
	    case 'scholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'socialScholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'competition':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'punish':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'loan':
		    tdNum = 5;
			editTd = 6;
			break;
		case 'innovation':
		    tdNum = 9;
			editTd = 11;
			break;
	}	
	
	for (var i = 1; i <= tdNum; i++) {
	    var value = $("#" + itemId + " td::nth-child(" + i + ")").text();
		var editElement = "<input class='td_input' type='text' value='" + value + "' />";
		editElement += "<input class='td_input' type='hidden' value='" + value + "' />";
		$("#" + itemId + " td::nth-child(" + i + ")").html(editElement);
	}
	submitButton = "<button id='submitEdit' type='button' class='add' onclick=submitEdit('"+module+"',"+id+")>提交</button>";
	cancelButton = "<button id='cancelEdit' type='button' class='add' onclick=cancelEdit('"+module+"',"+id+")>取消</button>";
	$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "none");
    $("#" + itemId + " td::nth-child(" + editTd + ")").append(submitButton + cancelButton );
	
}	
function cancelEdit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
    switch (module) {
	    case 'scholar':
	    	tdNum = 4;
			editTd = 6;
			break;
		case 'socialScholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'competition':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'punish':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'loan':
		    tdNum = 5;
			editTd = 6;
			break;
		case 'innovation':
		    tdNum = 9;
			editTd = 11;
			break;
	}
	for (var i = 1; i <= tdNum; i++) {
	    var value = $("#" + itemId + " td::nth-child(" + i + ") input[type='hidden']").val();
		$("#" + itemId + " td::nth-child(" + i + ")").text(value);
	}
    $("#" + itemId + " td::nth-child(" + editTd + ") #submitEdit").remove();
	$("#" + itemId + " td::nth-child(" + editTd + ") #cancelEdit").remove();
	$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "");	
}
</script>
</html>