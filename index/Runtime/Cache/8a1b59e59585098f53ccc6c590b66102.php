<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>系统设置</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/createadmin" target="main" >创建管理用户</A></LI>
      <LI ><A href="<?php echo ($url); ?>/managerlist" target="main" >管理员列表</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/submitupdateadmin" method="post" id="myform">
      <TABLE class="form" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="">
            <th>用户名</th>
            <td><input type="text" name="username" value="<?php echo ($list["admin_name"]); ?>" ></td>
          </tr>
          <tr class="">
            <th>密码</th>
            <td><input type="password" name="password" value="<?php echo ($list["admin_pw"]); ?>"></td>
          </tr>
          <tr class="">
            <th>管理级别</th>
            <td>
            	<select name="manager_level">
            		<option value="0">超级管理员</option>
            		<option value="2">学院领导</option>
            		<option value="1">学生辅导员</option>
            	</select>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="submit" class="add">提交</button>
              <!--<button type="submit" class="edit">�༭</button>-->
            </td>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" value="<?php echo ($list["admin_id"]); ?>" name="admin_id">
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>