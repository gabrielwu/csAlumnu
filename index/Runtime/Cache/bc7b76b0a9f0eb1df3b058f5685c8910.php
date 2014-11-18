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
<script type="text/javascript">
function uploadfile(){
	var upfile = $("#upfile").val();
	if(upfile==""||upfile==null)
	{
		alert("导入文件不能为空！！！");
	}else{
		$("#form").submit();
	}
}
</script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>学生信息</span> — <span>信息采集</span>
    	<a id="a_file" class="tab" href="#">文件导入</a>
    	<a id="a_hand" class="tab current" href="#">手动添加</a>
    </div>
    <div class="">   
	</div>
<div>
</body>
</html>
     
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/index" target="main" >学生信息采集首页</A></LI>
      <LI class=current><A href="#" target="main" >数据导入</A></LI>
      <LI ><A href="<?php echo ($url); ?>/outputstream" target="main" >数据导出</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/uploadfile" method="post" id="form" enctype="multipart/form-data">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">学生信息采集导入&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" color="red">导入文件格式仅为*.xls格式</font></th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>当如文件附件：</th>
            <td><a href="<?php echo ($url); ?>/download">学生信息采集填写表格.xls(<font size="2" color="red">点击可下载</font>)</a>
              <div id=""></div></td>
          </tr>
          <tr class="">
            <th>导入文件 <span class="star">*</span></th>
            <td><input name="upfile" id="upfile" value="" type="file">
              <div class="onShow" id="newpass_tip"> </div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="uploadfile()" class="add">提交</button>
              <!--<button type="submit" class="edit">�༭</button>-->
              <button type="reset" class="reset">重置</button></td>
          </tr>
        </tfoot>
      </table>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>