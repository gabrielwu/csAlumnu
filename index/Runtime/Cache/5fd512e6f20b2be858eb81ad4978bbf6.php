<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Pragma" content="text/html; charset=utf-8; no-cache"  />
<base target="_self"> 
<meta http-equiv="Expires" content="0" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
function uploadfile(){
    var upfile = $("#upfile").val();
    if (upfile == null || upfile == "") {
	    alert("请选择要上传的头像！！！");
    } else {
		$("#form").submit();
		window.parent.location.reload();
		window.close();
	}
}
function closeW() {
	window.parent.location.reload();
	window.close();
}
</script>
</head>
<body>

<form action="<?php echo ($url); ?>/uploadPhoto" method="post" target="photo" id="form" enctype="multipart/form-data">
	<center>
	<font size="2" color="red">*上传格式仅可为jpg,jpeg,png,JPG,JPEG</font>
	<br>
	<div><?php echo ($error); ?></div>
	<br>
	上传头像：<input type="file" id="upfile" name="upfile"/>
	<br>
	<input type="button" class="btn" onclick="uploadfile()" value="上传">
	<input type="button" class="btn" onclick="closeW()" value="关闭">
	</center>
<input type="hidden" name="stu_id" value="<?php echo ($stu_id); ?>">
</form>
</body>
<iframe name="photo" style="display:none" id="photo"></iframe>
</html>