function modelNews() {
    var id;
	var title;
	var content;
	var time;
	var top;
	var type;
	var isTop;
}
function modelNewsType() {
    var id;
	var name;
	var del;
	var remark;
}
function topNews(id, isTop, url) {
    var data = new modelNews();
	data.id = id;
	data.isTop = isTop;
	$.ajax({
	        url: url,
			type: 'POST',
			data: data,
			success: 
			    function(result){
		            if (result == '1') {	
			            alert("操作成功！");
		                window.location.reload();
		            } else if (result == '-1') {
			            alert("没有权限！");
				    } else {
			            alert("操作失败！");
					}
	            }
	   });
} 
function deleteNews(id, url) {
    if(confirm("您确定要删除此条记录吗？")) {
		var data = new modelNews();
		data.id = id;
		$.ajax({
				url: url,
				type: 'POST',
				data: data,
				success: 
					function(result){
						if (result == '1') {	
							alert("操作成功！");
							window.location.reload();
						} else if (result == '-1') {
							alert("没有权限！");
						} else {
							alert("操作失败！");
						}
					}
	   });
    }
}
function addNewsType(url) {
    var data = new modelNewsType();
	data.name = $("#name").val();
	$.ajax({
	        url: url,
			type: 'POST',
			data: data,
			success: 
			    function(result){
		            if (result == '0') {	
			            alert("操作失败！");
		            } else if (result == '-1') {
			            alert("没有权限！");
				    } else {
			            alert("操作成功！");
		                window.location.reload();
					}
	            }
	   });
}
function editNewsType(id, url) {
		var data = new modelNewsType();
		data.id = id;
		data.name = $("#type_name_" + id).val();
		$.ajax({
				url: url,
				type: 'POST',
				data: data,
				success: 
					function(result){
						if (result == '1') {	
							alert("操作成功！");
							window.location.reload();
						} else if (result == '-1') {
							alert("没有权限！");
						} else {
							alert("操作失败！");
						}
					}
	   });
}
function deleteNewsType(id, url) {
    if(confirm("您确定要删除此条记录吗？")) {
		var data = new modelNewsType();
		data.id = id;
		$.ajax({
				url: url,
				type: 'POST',
				data: data,
				success: 
					function(result){
						if (result == '1') {	
							alert("操作成功！");
							window.location.reload();
						} else if (result == '-1') {
							alert("没有权限！");
						} else {
							alert("操作失败！");
						}
					}
	   });
    }
}