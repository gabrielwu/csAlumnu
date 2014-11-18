<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link type="text/css" href="<?php echo ($jqueryUI); ?>/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php echo ($jqueryUI); ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo ($jqueryUI); ?>/js/jquery-ui-1.8.14.custom.min.js"></script>
<script language="javascript">
function SetCwinHeight(){
    var cwin=document.getElementById("cwin");
    if (document.getElementById) {
        if (cwin && !window.opera) {
            if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight)
                cwin.height = cwin.contentDocument.body.offsetHeight;
            else if(cwin.Document && cwin.Document.body.scrollHeight)
                cwin.height = cwin.Document.body.scrollHeight;
        }
    }
}
</script>
</head>
<body> 
<div id="confirm" title="审核提示信息"></div>
<div id=wrap>
    <div id="title" class="tab">
        <h2>欢迎使用院友之家管理系统</h2>
            <ul id="tab"></ul>
    </div>
    
</div>
<script language="javascript">
function autoheight(sid) {
    var gid = document.getElementById(sid);
    gid.height = document.documentElement.offsetHeight-1;
}
$(function() {
    var html;
    if ('<?php echo ($confirmStuCount); ?>' != '0') {
	    html = "<a href='<?php echo ($root); ?>/index.php/Student/editConfirmList'>当前有<?php echo ($confirmStuCount); ?>条基本信息修改申请，点击查看。</a>";
	    $("#confirm").append(html);
	}
	if ('<?php echo ($confirmStuCount); ?>' != '0' ) {
	    $( "#confirm" ).dialog({
		    height: 120,
		    width: 360,
	        modal: true
	    });
	}
});
</script>
</body>
</html>