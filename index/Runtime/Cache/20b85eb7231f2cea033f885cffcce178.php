<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script charset="utf-8" src="<?php echo ($media); ?>/kindeditor/kindeditor.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		items : ['source',  'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link']
	});
	K('input[name=clear]').click(function(e) {
		editor.html('');
	});
});
</script>
</head>
<div id="right">
    <div class="title">
    	<span>新闻通知</span> — <span>发布</span>
	</div>
	<div class="content2">
	    <form action="<?php echo ($url); ?>/add" method="post" id="form" target="main">
			<div class="common">
				<table>
					<tr>
						<td><span>标题</span></td>
						<td><span>类型</span></td>
					</tr>
					<tr>
						<td><input class="inputL" name="title" id="title" value=""/></td>
						<td>
							<select class="input"  name="type" id="type">
								<?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($type["id"]); ?>"><?php echo ($type["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
					</tr>
				</table>
				
			</div>
			<div class="common">
				<span>内容</span></br>
				<textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
			</div>
			<div class="common">
				<input type="submit" class='btn' name="submit" value="提交" />
				<input type="button" class='btn' name="clear" value="清空" />
			</div>
		</form>
    </div>
</div>	
</body>
</html>