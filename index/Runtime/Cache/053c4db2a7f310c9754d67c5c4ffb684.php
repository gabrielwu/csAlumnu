<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBliC "-//W3C//DTD html 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html 
xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
function creategrade(){
		var grade = $("#grade").val();
		var classes = $("#class").val();
		if (grade == "") {
				alert("年级不能为空！！！");
		} else {
				if (classes == "") {
						alert("班级不能为空！！！");
				} else {
						$("#form").submit();
				}
		}
}
</script>
</head>
<body>
<div id="wrap">
    <div id="title" class="tab">
        <h2>学生事务</h2>
        <ul id="tab">
            <li class="current"><a href="#" target="main" >学生信息采集首页</a></li>
            <li ><a href="<?php echo ($url); ?>/inputstream" target="main" >数据导入</a></li>
            <li ><a href="<?php echo ($url); ?>/outputstream" target="main" >数据导出</a></li>
        </ul>
    </div>
 <div id="content">
        <form action="<?php echo ($url); ?>/creategrade" method="post" id="form">
            <table class="form" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr class="">
                        <th colspan="2">创建新的年级信息&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" color="red">在导入学生信息之前必须为导入的学生新建班级、年级</font></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <th>年级<span class="star">*</span></th>
                        <td><input name="stu_grade" id="grade" value="" type="text">
                            <font size="2" color="red">注：如果新生是08级学生 ，则填入2008</font></td>
                    </tr>
                    <tr class="">
                        <th>班级数 <span class="star">*</span></th>
                        <td><input name="stu_class" id="class" value="" type="text">
                         <font size="2" color="red"> 注：如果新生有八个班 ，则填入数字8</font></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="">
                        <td></td>
                        <td><button type="button" onclick="creategrade()" class="add">提交</button>
                            <!--<button type="submit" class="edit">�༭</button>-->
                            <button type="reset" class="reset">重置</button></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
</body>
</html>