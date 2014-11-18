<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Pragma" content="text/html; charset=utf-8; no-cache"  />
<base target="_self"> 
<meta http-equiv="Expires" content="0" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/viewEditInfo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<title></title>
<script type="text/javascript" language="javascript" >
</script>
<body>
<?php if($data_edit["stu_id"] != '' ): ?><form action="#"  id="form" method="post" target="main">
		<table class="form tb1 tb2">
		<thead>
			<tr>
				<th colspan="3">
					<?php if($level == 2 ): ?><input type="button" class="btn"  onclick="passConfirm(<?php echo ($data["stu_id"]); ?>);"   value="通过审核"   />
					<input type="button" class="btn"  onclick="nopassConfirm(<?php echo ($data["stu_id"]); ?>);" value="不通过审核" />
					<?php else: ?>
					<input type="button" class="btn"  onclick="deleteEdit();" value="放弃修改" /><?php endif; ?>
				</th>
			</tr>
		</thead>
        <tbody>
            <tr>
			    <th><label class="label1">头像</label></th>
       			<td align=center><img id="img1" src="<?php echo ($root); ?>/upload/ID_photo/<?php echo ($data["stu_photo"]); ?>" width="90" height="110"/></td>
            	<td align=center><img id="img2" src="<?php echo ($root); ?>/upload/ID_photo_temp/<?php echo ($data_edit["stu_photo"]); ?>" width="90" height="110"/></td>
			</tr>
			<tr>
            	<th><label class="label1">学生姓名</label></th>
            	<td><label class="label1"><?php echo ($data["stu_name"]); ?></label></td>
				<?php if($data["stu_name"] != $data_edit["stu_name"] ): ?><td><label class="label2"><?php echo ($data_edit["stu_name"]); ?></label></td>
				<?php else: ?>
            	<td><label class="label1"><?php echo ($data_edit["stu_name"]); ?></label></td><?php endif; ?>
           	</tr>
            <tr>
            	<th><label class="label1">学号</label></th>
            	<td><label class="label1"><?php echo ($data["stu_num"]); ?></label></td>
				<?php if($data["stu_num"] != $data_edit["stu_num"] ): ?><td><label class="label2"><?php echo ($data_edit["stu_num"]); ?></label></td>
				<?php else: ?>
            	<td><label class="label1"><?php echo ($data_edit["stu_num"]); ?></label></td><?php endif; ?>
            </tr>
			<?php if($data["stu_grade"] != $data_edit["stu_grade"] ): ?><tr>
            	<th><label class="label1">年级</label></th>
            	<td><label class="label1"><?php echo ($data["stu_grade"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_grade"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_class"] != $data_edit["stu_class"] ): ?><tr>
            	<th><label class="label1">班级</label></th>
				<td><label class="label1"><?php echo ($data["stu_class"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_class"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["major"] != $data_edit["major"] ): ?><tr>
            	<th><label class="label1">专业</label></th>
				<td><label class="label1"><?php echo ($data["major"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["major"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["degree"] != $data_edit["degree"] ): ?><tr>
            	<th><label class="label1">学位类别</label></th>
				<td><label class="label1"><?php echo ($data["degree"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["degree"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["tutor"] != $data_edit["tutor"] ): ?><tr>
            	<th><label class="label1">导师</label></th>
				<td><label class="label1"><?php echo ($data["tutor"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["tutor"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["research"] != $data_edit["research"] ): ?><tr>
            	<th><label class="label1">研究方向</label></th>
				<td><label class="label1"><?php echo ($data["research"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["research"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["exam_mode"] != $data_edit["exam_mode"] ): ?><tr>
            	<th><label class="label1">考试方式</label></th>
				<td><label class="label1"><?php echo ($data["exam_mode"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["exam_mode"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["edu_time"] != $data_edit["edu_time"] ): ?><tr>
            	<th><label class="label1">学制</label></th>
				<td><label class="label1"><?php echo ($data["edu_time"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["edu_time"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["directed"] != $data_edit["directed"] ): ?><tr>
            	<th><label class="label1">定向培养</label></th>
				<td><label class="label1"><?php echo ($data["directed"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["directed"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["roll"] != $data_edit["roll"] ): ?><tr>
            	<th><label class="label1">学籍状态</label></th>
            	<td><label class="label1"><?php echo ($data["roll"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["roll"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["last_school"] != $data_edit["last_school"] ): ?><tr>
            	<th><label class="label1">毕业学校</label></th>
            	<td><label class="label1"><?php echo ($data["last_school"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["last_school"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["last_major"] != $data_edit["last_major"] ): ?><tr>
            	<th><label class="label1">毕业专业</label></th>
            	<td><label class="label1"><?php echo ($data["last_major"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["last_major"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["last_date"] != $data_edit["last_date"] ): ?><tr>
            	<th><label class="label1">最后毕业时间</label></th>
            	<td><label class="label1"><?php echo ($data["last_date"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["last_date"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_indate"] != $data_edit["stu_indate"] ): ?><tr>
            	<th><label class="label1">入学时间</label></th>
            	<td><label class="label1"><?php echo ($data["stu_indate"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_indate"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["politics"] != $data_edit["politics"] ): ?><tr>
            	<th><label class="label1">政治面貌</label></th>
            	<td><label class="label1"><?php echo ($data["politics"]); ?></label></td>
                <td><label class="label2"><?php echo ($data_edit["politics"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_gender"] != $data_edit["stu_gender"] ): ?><tr>
            	<th><label class="label1">性别</label></th>
            	<td><label class="label1"><?php echo ($data["stu_gender"]); ?></label></td>
            	<td><label class="label2" id=stu_gender><?php echo ($data_edit["stu_gender"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_nation"] != $data_edit["stu_nation"] ): ?><tr>
            	<th><label class="label1">民族</label></th>
            	<td><label class="label1"><?php echo ($data["stu_nation"]); ?></label></td>
            	<td><label class="label2" id=stu_nation><?php echo ($data_edit["stu_nation"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["hometown"] != $data_edit["hometown"] ): ?><tr>
            	<th><label class="label1">籍贯</label></th>
            	<td><label class="label1"><?php echo ($data["hometown"]); ?></label></td>
            	<td><label class="label2" id=stu_hometown><?php echo ($data_edit["hometown"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_birthday"] != $data_edit["stu_birthday"] ): ?><tr>
            	<th><label class="label1">出生日期</label></th>
            	<td><label class="label1"><?php echo ($data["stu_birthday"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_birthday"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_idnum"] != $data_edit["stu_idnum"] ): ?><tr>
            	<th><label class="label1">身份证号码</label></th>
            	<td><label class="label1"><?php echo ($data["stu_idnum"]); ?></label></td>
            	<td><label class="label2" id=stu_idnum><?php echo ($data_edit["stu_idnum"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_mobile"] != $data_edit["stu_mobile"] ): ?><tr>
            	<th><label class="label1">手机</label></th>
            	<td><label class="label1"><?php echo ($data["stu_mobile"]); ?></label></td>
            	<td><label class="label2" id=stu_mobile><?php echo ($data_edit["stu_mobile"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_qqnum"] != $data_edit["stu_qqnum"] ): ?><tr>
            	<th><label class="label1">QQ</label></th>
            	<td><label class="label1"><?php echo ($data["stu_qqnum"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_qqnum"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["stu_email"] != $data_edit["stu_email"] ): ?><tr>
            	<th><label class="label1">邮箱</label></th>
            	<td><label class="label1"><?php echo ($data["stu_email"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["stu_email"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["homepage"] != $data_edit["homepage"] ): ?><tr>
            	<th><label class="label1">个人主页</label></th>
            	<td><label class="label1"><?php echo ($data["homepage"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["homepage"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["home_addr"] != $data_edit["home_addr"] ): ?><tr>
                <th><label class="label1">家庭地址</label></th>
            	<td><label class="label1"><?php echo ($data["home_addr"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["home_addr"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["train"] != $data_edit["train"] ): ?><tr>
                <th><label class="label1">乘车区间</label></th>
            	<td><label class="label1"><?php echo ($data["train"]); ?></label></td>
            	<td><label class="label2"><?php echo ($data_edit["train"]); ?></label></td>
            </tr><?php endif; ?>
			<?php if($data["dad_name"] != $data_edit["dad_name"] ): ?><tr>
			    <th><label class="label1">父亲姓名</label></th>
           		<td><label class="label1"><?php echo ($data["dad_name"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["dad_name"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["mom_name"] != $data_edit["mom_name"] ): ?><tr>
			    <th><label class="label1">母亲姓名</label></th>
           		<td><label class="label1"><?php echo ($data["mom_name"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["mom_name"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["dad_phone"] != $data_edit["dad_phone"] ): ?><tr>
			    <th><label class="label1">父亲电话</label></th>
           		<td><label class="label1"><?php echo ($data["dad_phone"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["dad_phone"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["mom_phone"] != $data_edit["mom_phone"] ): ?><tr>
			    <th><label class="label1">母亲电话</label></th>
           		<td><label class="label1"><?php echo ($data["mom_phone"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["mom_phone"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["dad_unit"] != $data_edit["dad_unit"] ): ?><tr>
			    <th><label class="label1">父亲工作单位</label></th>
           		<td><label class="label1"><?php echo ($data["dad_unit"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["dad_unit"]); ?></label></td>
			</tr><?php endif; ?>
			<?php if($data["mom_unit"] != $data_edit["mom_unit"] ): ?></tr>
			    <th><label class="label1">母亲工作单位</label></th>
           		<td><label class="label1"><?php echo ($data["mom_unit"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["mom_unit"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["graduate_date"] != $data_edit["graduate_date"] ): ?></tr>
			    <th><label class="label1">毕业时间</label></th>
           		<td><label class="label1"><?php echo ($data["graduate_date"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["graduate_date"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["graduate_type"] != $data_edit["graduate_type"] ): ?></tr>
			    <th><label class="label1">毕业去向</label></th>
           		<td><label class="label1"><?php echo ($data["graduate_type"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["graduate_type"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["post_info"] != $data_edit["post_info"] ): ?></tr>
			    <th><label class="label1">档案邮寄</label></th>
           		<td><label class="label1"><?php echo ($data["post_info"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["post_info"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["work_unit"] != $data_edit["work_unit"] ): ?></tr>
			    <th><label class="label1">单位</label></th>
           		<td><label class="label1"><?php echo ($data["work_unit"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["work_unit"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["wu_phone"] != $data_edit["wu_phone"] ): ?></tr>
			    <th><label class="label1">单位电话</label></th>
           		<td><label class="label1"><?php echo ($data["wu_phone"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["wu_phone"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["wu_email"] != $data_edit["wu_email"] ): ?></tr>
			    <th><label class="label1">单位邮箱</label></th>
           		<td><label class="label1"><?php echo ($data["wu_email"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["wu_email"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["wu_unit"] != $data_edit["wu_unit"] ): ?></tr>
			    <th><label class="label1">单位地址</label></th>
           		<td><label class="label1"><?php echo ($data["wu_unit"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["wu_unit"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["present_city"] != $data_edit["present_city"] ): ?></tr>
			    <th><label class="label1">现居城市</label></th>
           		<td><label class="label1"><?php echo ($data["present_city"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["present_city"]); ?></label></td>
           	</tr><?php endif; ?>
			<?php if($data["present_addr"] != $data_edit["present_addr"] ): ?></tr>
			    <th><label class="label1">现居地址</label></th>
           		<td><label class="label1"><?php echo ($data["present_addr"]); ?></label></td>
          		<td><label class="label2"><?php echo ($data_edit["present_addr"]); ?></label></td>
           	</tr><?php endif; ?>
            </tbody>       
      </table>
    </form>
<?php else: ?>
<script type="text/javascript">
alert("没有修改！");
window.close();
</script><?php endif; ?>
</body>
<script type="text/javascript">
function passConfirm(id){
	if(confirm("确定通过审核?")){
		$.ajax({
	        url: "<?php echo ($url); ?>/passConfirm/stu_id/" + id,
			type: 'GET',
			success: 
			    function(result){
		            if (result == '1') {	
			            alert("操作成功！");
						window.parent.location.reload();
						window.close();
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
						window.parent.location.reload();
						window.close();
		            } else if (result == '-1') {
			            alert("没有权限！");
				    } else {
			            alert("操作失败！");
					}
	            }
	   });
   	}
}
function deleteEdit(){
	if(confirm("确定放弃修改申请?")){
		$.ajax({
	        url: "<?php echo ($url); ?>/deleteEdit",
			type: 'GET',
			success: 
			    function(result){
		            if (result == '1') {	
			            alert("操作成功！");
						window.parent.location.reload();
						window.close();
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
</html>