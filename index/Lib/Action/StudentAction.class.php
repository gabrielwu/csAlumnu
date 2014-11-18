<?php
class StudentAction extends Action{
    public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if (Session::get("username")==null) {
			$this->redirect("Index/login", "", 2, "还没有登录系统，无权访问！");
		}
	}
    public function isAdminLevel(){
		Session::start();
		if(Session::get("manager_level") >= 0){
		    return true;
		} 
		return false;
	}
	public function stuDetail(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] == 1) {
			$stu_id = $_SESSION['stu_id'];
		} else {
			$stu_id = $_GET["stu_id"];
		}
		$data = M("student")->where("stu_id = $stu_id")->find();		
		$this->assign("data", $data);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}   	
	public function edit() {
	    Session::start();
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		foreach ($_POST as $key => $value) { 
		    $data["$key"] = $value;
		} 
		$stu_id = $data['stu_id'];
		if ($_SESSION["level"] != 2) {
			$model = M("student_edit");
			if ($model->where("stu_id=$stu_id")->save($data)) {
				echo "1";
			} else if ($model->add($data)) {
				echo "1";
			} else {
				echo "0";
			}
		} else {
		    $model = M("student");
			if ($model->where("stu_id=$stu_id")->save($data)) {
				echo "2";
			} else if ($model->add($data)) {
				echo "2";
			} else {
				echo "3";
			}		
		}
	}
	public function changePhoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] == 1) {
			$stu_id = $_SESSION['stu_id'];
		} else {
			$stu_id = $_GET["stu_id"];
		}
		$this->assign("stu_id", $stu_id);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}	
	public function uploadPhoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 1024 * 1024 * 4;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $stu_id;
		$upload->uploadReplace = true;
		if (!$upload->upload("upload/ID_photo_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$data["stu_photo"] =  $info[0]["savename"];
		$new_photo =  $info[0]["savename"];
		$model = M();
		$student = M("student");
		$student_edit = M("student_edit");
		$student_edit_result = $student_edit->where("stu_id=$stu_id")->find();
		$student_result = $student->where("stu_id=$stu_id")->find();
		$isEdited = $student_edit->where("stu_id=$stu_id")->count();$isEditedResult[0]['count'];
		if ($isEdited != 0){
			if ($student_edit->where("stu_id=$stu_id")->save($data)) {
				$msg = "上传照片申请提交成功！";
			} else if ($data["stu_photo"] == $student_edit_result["stu_photo"]) {
				$msg = "上传照片申请提交成功！！";
			} else {
		        $msg = "上传照片申请提交失败！";
		    }
		} else {
		    $data = $student_result;
			$data["stu_photo"] =  $new_photo;
		    if ($student_edit->add($data)) {
			    $msg = "上传照片申请提交成功！！！";
	        } else {
		        $msg = "上传照片申请提交失败！";
		    }
		}
		echo "<script language= 'javascript'>";
		echo "alert('$msg');";
		echo "</script> ";
    }
	
	public function editConfirmList(){ //待审核学生信息
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] != 2) {
			echo "<script>alert('没有权限！')</script>";
			return;
		}		
		$student_edit = M("student_edit");
		$list = M("student_edit")->select();
		$this->assign("list", $list);
		$this->assign("count", $count);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	function editConfirmView(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] == 1) {
			$stu_id = $_SESSION['stu_id'];
		} else {
			$stu_id = $_GET["stu_id"];
		}
		$data_edit = M("student_edit")->where("stu_id=$stu_id")->find();
		$data      = M("student")->where("stu_id=$stu_id")->find();
		$this->assign("data_edit", $data_edit);
		$this->assign("data", $data);		
		$this->assign("level", $_SESSION["level"]);		
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display(); 
	}
	function passConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		if ($_SESSION['level'] != 2) {
			echo "-1";
			return ;
		}
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");
		$student = M("student");
		
		$list_edit = $student_edit->where("stu_id=$stu_id")->find();
		$list = $student->where("stu_id=$stu_id")->find();
		$photo = $list['stu_photo'];
		$photo_edit = $list_edit['stu_photo'];
		$diff['stu_id'] = $stu_id;
		foreach ($list_edit as $key=>$value) {
		 	if($value != $list[$key] &&  $key != "stu_pw" ||  $key == "stu_photo"){
		 		$diff[$key] = $value;
		 	}
		}
		if($student->where("stu_id=$stu_id")->save($diff) || $photo == $photo_edit){
		    if (file_exists("upload/ID_photo_temp/$photo_edit")) {
			    if (file_exists("upload/ID_photo/$photo")) {
				    unlink("upload/ID_photo/$photo");
				}
		        $file = "upload/ID_photo_temp/$photo_edit"; //旧目录
                $newfile = "upload/ID_photo/$photo_edit"; //新目录
                copy($file,$newfile); //拷贝到新目录
		        unlink($file);
			}
			echo $student_edit->where("stu_id=$stu_id")->delete();;
		} else {
		    echo "0";
		}
	}
	function nopassConfirm() { //不通过审核，删除更新表记录
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		if ($_SESSION['level'] != 2) {
			echo "-1";
			return ;
		}
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");		
		echo $student_edit->where("stu_id=$stu_id")->delete();
	}
	function deleteEdit() { //删除修改申请
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		$stu_id = $_SESSION["stu_id"];
		$student_edit = M("student_edit");		
		echo $student_edit->where("stu_id=$stu_id")->delete();
	}
	function passAllConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		if ($_SESSION['level'] != 2) {
			echo "-1";
			return ;
		}
		$id_strs = $_GET["idstrs"];
		$id_strs = $id_strs.trim();
		$list_id = explode("_", $id_strs);

		$student_edit = M("student_edit");
		$student = M("student");
		$count = count($list_id);
		$count_s = 0;
		$count_f = 0;
		foreach($list_id as $stu_id){
			$list_edit = $student_edit->where("stu_id=$stu_id")->find();
		    $list = $student->where("stu_id=$stu_id")->find();
		    $photo = $list['stu_photo'];
		    $photo_edit = $list_edit['stu_photo'];
			$diff = array();
		    $diff['stu_id'] = $stu_id;
		    foreach ($list_edit as $key=>$value) {
		 	    if($value != $list[$key] &&  $key != "stu_pw" ||  $key == "stu_photo"){
		 		    $diff[$key] = $value;
		 	    }
		    }
		    if($student->where("stu_id=$stu_id")->save($diff) || $photo == $photo_edit){
		        if (file_exists("upload/ID_photo_temp/$photo_edit")) {
			        if (file_exists("upload/ID_photo/$photo")) {
				        unlink("upload/ID_photo/$photo");
				    }
		            $file = "upload/ID_photo_temp/$photo_edit"; //旧目录
                    $newfile = "upload/ID_photo/$photo_edit"; //新目录
                    copy($file, $newfile); //拷贝到新目录
		            unlink($file);
			    }
			    $count_s += $student_edit->where("stu_id=$stu_id")->delete();
		    } 
		}
		$count_f = $count - $count_s;
		echo "操作成功：$count_s 条；操作失败：$count_f 条。";
	}
	function nopassAllConfirm(){ //批量不通过审核
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		if ($_SESSION['level'] != 2) {
			echo "-1";
			return ;
		}
		$id_strs = $_GET["idstrs"];
		$id_strs = $id_strs.trim();
		$list_id = explode("_", $id_strs);//分割字符串
		$student_edit = M("student_edit");
		$student = M("student");
		$count = count($list_id);
		$count_s = 0;
		$count_f = 0;
		
		foreach($list_id as $stu_id){
			$count_s += $student_edit->where("stu_id=$stu_id")->delete();
		}
		$count_f = $count - $count_s;
		echo "操作成功：$count_s 条；操作失败：$count_f 条。";	
	}
	function delete() {
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		if ($_SESSION['level'] != 2) {
			echo "-1";
			return ;
		}
		$stu_id = $_GET["stu_id"];		
		echo M("student")->where("stu_id=$stu_id")->delete();
	}
	public function rollEdit(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] == 1) {
			echo "<script>alert('没有权限！')</script>";
			return;
		}
		$data['roll'] = $_GET['rollEdit'];
		$sqlWhere = "1=1 ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "rollEdit") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
		$count = M("student")->where($sqlWhere)->save($data);
		$this->redirect("Student/rollEditInput", "", 2, "更新 $count 条记录！");
	}
	public function rollEditInput(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_SESSION["level"] == 1) {
			echo "<script>alert('没有权限！')</script>";
			return;
		}
		import("ORG.Util.Page");
		$user_id = $_SESSION["user_id"];
		$manager_level = $_SESSION["manager_level"];
		$sqlColumn = "select * ";
		$sqlFrom = "from student where ";
		$sqlWhere = "1=1 ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "rollEdit" && $key != "p") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
		$count = M("student")->where($sqlWhere)->count("stu_id");
		$page = new Page($count, 15);
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$show = $page->show();
		$sqlLimit = "limit $page->firstRow, $page->listRows";
		$sql = $sqlColumn. $sqlFrom. $sqlWhere. $sqlLimit;
		$result = M()->query($sql);
		$this->assign("manager_level", Session::get("manager_level"));
		$this->assign("page", $show);
		$this->assign("result", $result);
		$this->assign("condition", $condition);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display("rollEditInput");
	}
	public function queryAll(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		Session::start();
		import("ORG.Util.Page");
		$user_id = $_SESSION["user_id"];
		$manager_level = $_SESSION["manager_level"];
		$sqlColumn = "select * ";
		$sqlFrom = "from student where ";
		$sqlWhere = "1=1 ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "p") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
		$count = M("student")->where($sqlWhere)->count("stu_id");
		$page = new Page($count, 15);
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$show = $page->show();
		$sqlLimit = "limit $page->firstRow, $page->listRows";
		$sql = $sqlColumn. $sqlFrom. $sqlWhere. $sqlLimit;
		$result = M()->query($sql);
		$this->assign("manager_level", Session::get("manager_level"));
		$this->assign("page", $show);
		$this->assign("result", $result);
		$this->assign("condition", $condition);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function export() {
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限！');</script>";
			return;
		}
		$sqlColumn = "select * ";
		$sqlFrom = "from student where ";
		$sqlWhere = "1=1 ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "p") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$sql = $sqlColumn. $sqlFrom. $sqlWhere;
		//echo $sql;
		$result = M()->query($sql);

		ini_set('memory_limit', '200M'); 
		require_once "./ThinkPHP/Vendor/PHPExcel.php"; 
		require "./ThinkPHP/Vendor/PHPExcel/Writer/Excel5.php";
		$time = time();
		$outputFileName = "$time.xls";
		$objExcel = new PHPExcel(); 
		$objExcel->setActiveSheetIndex(0);   //建立一个sheet表
		$objActSheet = $objExcel->getActiveSheet();  //获取当前的sheet表

		$objActSheet->setCellValue('A1',  "学号");
		$objActSheet->setCellValue('B1',  "姓名");
		$objActSheet->setCellValue('C1',  "年级");
		$objActSheet->setCellValue('D1',  "班级");
		$objActSheet->setCellValue('E1',  "专业");
		$objActSheet->setCellValue('F1',  "学位类别");
		$objActSheet->setCellValue('G1',  "导师");
		$objActSheet->setCellValue('H1',  "研究方向");
		$objActSheet->setCellValue('I1',  "考试方式");
		$objActSheet->setCellValue('J1',  "学制");
		$objActSheet->setCellValue('K1',  "定向培养");
		$objActSheet->setCellValue('L1',  "学籍状态");
		$objActSheet->setCellValue('M1',  "毕业学校");
		$objActSheet->setCellValue('N1',  "毕业专业");
		$objActSheet->setCellValue('O1',  "最后毕业时间");
		$objActSheet->setCellValue('P1',  "入学时间");
		$objActSheet->setCellValue('Q1',  "政治面貌");
		$objActSheet->setCellValue('R1',  "性别");
		$objActSheet->setCellValue('S1',  "民族");
		$objActSheet->setCellValue('T1',  "籍贯");
		$objActSheet->setCellValue('U1',  "出生日期");
		$objActSheet->setCellValue('V1',  "身份证号");
		$objActSheet->setCellValue('W1',  "手机");
		$objActSheet->setCellValue('X1',  "QQ");
		$objActSheet->setCellValue('Y1',  "邮箱");
		$objActSheet->setCellValue('Z1',  "个人主页");
		$objActSheet->setCellValue('AA1', "家庭住址");
		$objActSheet->setCellValue('AB1', "乘车区间");
		$objActSheet->setCellValue('AC1', "父亲");
		$objActSheet->setCellValue('AD1', "母亲");
		$objActSheet->setCellValue('AE1', "父亲联系方式");
		$objActSheet->setCellValue('AF1', "母亲联系方式");
		$objActSheet->setCellValue('AG1', "父亲单位");
		$objActSheet->setCellValue('AH1', "母亲单位");

		for ($i = 0; $i < count($result); $i++) {
			$j = $i + 2;
			$objActSheet->setCellValue('A'.$j,  $result[$i]["stu_num"]. " ");
			$objActSheet->setCellValue('B'.$j,  $result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$j,  $result[$i]["stu_grade"]);
			$objActSheet->setCellValue('D'.$j,  $result[$i]["stu_class"]);
			$objActSheet->setCellValue('E'.$j,  $result[$i]["stu_major"]);
			$objActSheet->setCellValue('F'.$j,  $result[$i]["degree"]);
			$objActSheet->setCellValue('G'.$j,  $result[$i]["tutor"]);
			$objActSheet->setCellValue('H'.$j,  $result[$i]["research"]);
			$objActSheet->setCellValue('I'.$j,  $result[$i]["exam_mode"]);
			$objActSheet->setCellValue('J'.$j,  $result[$i]["edu_time"]);
			$objActSheet->setCellValue('K'.$j,  $result[$i]["directed"]);
			$objActSheet->setCellValue('L'.$j,  $result[$i]["roll"]);
			$objActSheet->setCellValue('M'.$j,  $result[$i]["last_school"]);
			$objActSheet->setCellValue('N'.$j,  $result[$i]["last_major"]);
			$objActSheet->setCellValue('O'.$j,  $result[$i]["last_date"]);
			$objActSheet->setCellValue('P'.$j,  $result[$i]["stu_indate"]);
			$objActSheet->setCellValue('Q'.$j,  $result[$i]["politics"]);
			$objActSheet->setCellValue('R'.$j,  $result[$i]["stu_gender"]);
			$objActSheet->setCellValue('S'.$j,  $result[$i]["stu_nation"]);
			$objActSheet->setCellValue('T'.$j,  $result[$i]["hometown"]);
			$objActSheet->setCellValue('U'.$j,  $result[$i]["birthday"]);
			$objActSheet->setCellValue('V'.$j,  $result[$i]["stu_idnum"]. " ");
			$objActSheet->setCellValue('W'.$j,  $result[$i]["stu_mobile"]. " ");
			$objActSheet->setCellValue('X'.$j,  $result[$i]["stu_qqnum"]. " ");
			$objActSheet->setCellValue('Y'.$j,  $result[$i]["stu_email"]);
			$objActSheet->setCellValue('Z'.$j,  $result[$i]["homepage"]);
			$objActSheet->setCellValue('AA'.$j, $result[$i]["home_addr"]);
			$objActSheet->setCellValue('AB'.$j, $result[$i]["train"]);
			$objActSheet->setCellValue('AC'.$j, $result[$i]["dad_name"]);
			$objActSheet->setCellValue('AD'.$j, $result[$i]["mom_name"]);
			$objActSheet->setCellValue('AE'.$j, $result[$i]["dad_phone"]. " ");
			$objActSheet->setCellValue('AF'.$j, $result[$i]["mom_phone"]. " ");
			$objActSheet->setCellValue('AG'.$j, $result[$i]["dad_unit"]);
			$objActSheet->setCellValue('AH'.$j, $result[$i]["mom_unit"]);
		}
		$objWriter = new PHPExcel_Writer_Excel5($objExcel);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition:inline;filename=$outputFileName");
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$objWriter->save('php://output');
	}

	public function queryGraduate(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		Session::start();
		$user_id = $_SESSION["user_id"];
		$manager_level = $_SESSION["manager_level"];
		import("ORG.Util.Page");
		$sqlSelect = "select s.* ";
		$sqlFrom = "from student s where s.roll='毕业' ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "p") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
        $sql = $sqlSelect. $sqlFrom. $sqlWhere;
		$count = count(M()->query($sql));
		$page = new Page($count, 15);
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$show = $page->show();
		$sqlLimit = "limit $page->firstRow, $page->listRows";
		$result = M()->query($sql. $sqlLimit);
		$this->assign("manager_level", Session::get("manager_level"));
		$this->assign("page", $show);
		$this->assign("result", $result);
		$this->assign("condition", $condition);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
        $this->assign("datatables", __ROOT__. "/index/Tpl/media/datatables");
		$this->display();
	}
	public function exportGraduate() {
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限！');</script>";
			return;
		}
		$sqlColumn = "select * ";
		$sqlFrom = "from student s ";
		$sqlWhere = "where s.roll='毕业'  ";
		if ($_GET) {
			$condition = $_GET;
			foreach ($condition as $key => $value) { 
				if ($value != "" && $key != "__hash__" && $key != "p") {
					$sqlWhere .= "and $key like '%$value%' ";
				}
			} 
		}
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$sql = $sqlColumn. $sqlFrom. $sqlWhere;
		$result = M()->query($sql);

		ini_set('memory_limit', '200M'); 
		require_once "./ThinkPHP/Vendor/PHPExcel.php"; 
		require "./ThinkPHP/Vendor/PHPExcel/Writer/Excel5.php";
		$time = time();
		$outputFileName = "$time.xls";
		$objExcel = new PHPExcel(); 
		$objExcel->setActiveSheetIndex(0);   //建立一个sheet表
		$objActSheet = $objExcel->getActiveSheet();  //获取当前的sheet表

		$objActSheet->setCellValue('A1',  "学号");
		$objActSheet->setCellValue('B1',  "姓名");
		$objActSheet->setCellValue('C1',  "毕业时间");
		$objActSheet->setCellValue('D1',  "毕业去向");
		$objActSheet->setCellValue('E1',  "学位类别");
		$objActSheet->setCellValue('F1',  "年级");
		$objActSheet->setCellValue('G1',  "专业");
		$objActSheet->setCellValue('H1',  "手机");
		$objActSheet->setCellValue('I1',  "QQ");
		$objActSheet->setCellValue('J1',  "邮箱");
		$objActSheet->setCellValue('K1',  "档案邮寄");
		$objActSheet->setCellValue('L1',  "单位");
		$objActSheet->setCellValue('M1',  "单位电话");
		$objActSheet->setCellValue('N1',  "单位邮箱");
		$objActSheet->setCellValue('O1',  "单位地址");
		$objActSheet->setCellValue('P1',  "现居城市");
		$objActSheet->setCellValue('Q1',  "现居地址");

		for ($i = 0; $i < count($result); $i++) {
			$j = $i + 2;
			$objActSheet->setCellValue('A'.$j,  $result[$i]["stu_num"]. " ");
			$objActSheet->setCellValue('B'.$j,  $result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$j,  $result[$i]["graduate_date"]);
			$objActSheet->setCellValue('D'.$j,  $result[$i]["graduate_type"]);
			$objActSheet->setCellValue('E'.$j,  $result[$i]["degree"]);
			$objActSheet->setCellValue('F'.$j,  $result[$i]["stu_grade"]);
			$objActSheet->setCellValue('G'.$j,  $result[$i]["stu_major"]);
			$objActSheet->setCellValue('H'.$j,  $result[$i]["stu_mobile"]. " ");
			$objActSheet->setCellValue('I'.$j,  $result[$i]["stu_qqnum"]. " ");
			$objActSheet->setCellValue('J'.$j,  $result[$i]["stu_email"]);
			$objActSheet->setCellValue('K'.$j,  $result[$i]["post_info"]);
			$objActSheet->setCellValue('L'.$j,  $result[$i]["work_unit"]);
			$objActSheet->setCellValue('M'.$j,  $result[$i]["wu_phone"]. " ");
			$objActSheet->setCellValue('N'.$j,  $result[$i]["wu_email"]);
			$objActSheet->setCellValue('O'.$j,  $result[$i]["wu_address"]);
			$objActSheet->setCellValue('P'.$j,  $result[$i]["present_city"]);
			$objActSheet->setCellValue('Q'.$j,  $result[$i]["present_addr"]);
		}
		$objWriter = new PHPExcel_Writer_Excel5($objExcel);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition:inline;filename=$outputFileName");
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$objWriter->save('php://output');
	}
	public function collect(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限上传采集信息！');</script>";
			return;
		}
		$tab = $_REQUEST['tab'];
		if ($tab == "") {
			$tab = "file";
		}
		$this->assign("url",__URL__);
		$this->assign("root", __ROOT__);
		$this->assign("css", __ROOT__. "/index/Tpl/media/css");
		$this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->assign("tab", $tab);
		$this->display();
	}
	public function collectGraduate(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限上传采集信息！');</script>";
			return;
		}
		$tab = $_REQUEST['tab'];
		if ($tab == "") {
			$tab = "file";
		}
		$this->assign("url",__URL__);
		$this->assign("root", __ROOT__);
		$this->assign("css", __ROOT__. "/index/Tpl/media/css");
		$this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->assign("tab", $tab);
		$this->display();
	}
	public function uploadCollect(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限！');</script>";
			return;
		}
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 1024 * 1024 * 10;
		$upload->allowExts = array("xls");
		if (!$upload->upload("upload/student/")) {
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename    = $info[0]["savename"]; //获取上传后的文件名
		$uploadfile  = "upload/student/$filename";
		$objReader   = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadfile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
		$data = array();
		$model = M("student");
		$studentExsit = M()->query("select stu_num from student");
		$count = 0;
		for ($i = 2; $i <= $highestRow; $i++) {
			$data["stu_num"] = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
			$flag = true;
			foreach ($studentExsit as &$s) {
				if ($s['stu_num'] == $data["stu_num"]) {
				    $flag = false;
					break;
				}
	        }
			if ($flag) {
				$data["stu_pw"]      = sha1($data["stu_num"]);
				$data["stu_name"]    = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				$data["stu_grade"]   = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				$data["stu_class"]   = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				$data["stu_major"]   = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				$data["degree"]      = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				$data["tutor"]       = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				$data["research"]    = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
				$data["exam_mode"]   = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
				$data["edu_time"]    = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
				$data["directed"]    = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
				$data["roll"]        = $objPHPExcel->getActiveSheet()->getCell("L$i")->getValue();
				$data["last_school"] = $objPHPExcel->getActiveSheet()->getCell("M$i")->getValue();
				$data["last_major"]  = $objPHPExcel->getActiveSheet()->getCell("N$i")->getValue();
				$data["last_date"]   = $objPHPExcel->getActiveSheet()->getCell("O$i")->getValue();
				$data["stu_indate"]  = $objPHPExcel->getActiveSheet()->getCell("P$i")->getValue();
				$data["politics"]    = $objPHPExcel->getActiveSheet()->getCell("Q$i")->getValue();
				$data["stu_gender"]  = $objPHPExcel->getActiveSheet()->getCell("R$i")->getValue();
				$data["stu_nation"]  = $objPHPExcel->getActiveSheet()->getCell("S$i")->getValue();
				$data["hometown"]    = $objPHPExcel->getActiveSheet()->getCell("T$i")->getValue();
				$data["birthday"]    = $objPHPExcel->getActiveSheet()->getCell("U$i")->getValue();
				$data["stu_idnum"]   = $objPHPExcel->getActiveSheet()->getCell("V$i")->getValue();
				$data["stu_mobile"]  = $objPHPExcel->getActiveSheet()->getCell("W$i")->getValue();
				$data["stu_qqnum"]   = $objPHPExcel->getActiveSheet()->getCell("X$i")->getValue();
				$data["stu_email"]   = $objPHPExcel->getActiveSheet()->getCell("Y$i")->getValue();
				$data["homepage"]    = $objPHPExcel->getActiveSheet()->getCell("Z$i")->getValue();
				$data["home_addr"]   = $objPHPExcel->getActiveSheet()->getCell("AA$i")->getValue();
				$data["train"]       = $objPHPExcel->getActiveSheet()->getCell("AB$i")->getValue();
				$data["dad_name"]    = $objPHPExcel->getActiveSheet()->getCell("AC$i")->getValue();
				$data["mom_name"]    = $objPHPExcel->getActiveSheet()->getCell("AD$i")->getValue();
				$data["dad_phone"]   = $objPHPExcel->getActiveSheet()->getCell("AE$i")->getValue();
				$data["mom_phone"]   = $objPHPExcel->getActiveSheet()->getCell("AF$i")->getValue();
				$data["dad_unit"]    = $objPHPExcel->getActiveSheet()->getCell("AG$i")->getValue();
				$data["mom_unit"]    = $objPHPExcel->getActiveSheet()->getCell("AH$i")->getValue();
				if ($model->add($data)) {
    				$count++;
		        }
		   	}
		}
		$total = $highestRow - 1;
		$fail = $total - $count;
		$msg = "全部数据共". $total. "条，成功导入". $count. "条，失败". $fail. "条！！！";
		echo "<script>alert('$msg')</script>";
		$this->redirect("Student/collect", "", 0.01);
	}
	public function uploadCollectGraduate(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isAdminLevel()) {
			echo "<script>alert('您没有权限！');</script>";
			return;
		}
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 1024 * 1024 * 10;
		$upload->allowExts = array("xls");
		if (!$upload->upload("upload/student/")) {
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename    = $info[0]["savename"]; //获取上传后的文件名
		$uploadfile  = "upload/student/$filename";
		$objReader   = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadfile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
		$data = array();
		$model = M("student");
		$studentExsit = M()->query("select stu_num from student");
		$count = 0;
		for ($i = 2; $i <= $highestRow; $i++) {
			$data["stu_num"]       = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
			$data["stu_name"]      = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
			$data["graduate_date"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
			$data["graduate_type"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
			$data["post_info"]     = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
			$data["work_unit"]     = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
			$data["wu_phone"]      = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
			$data["wu_email"]      = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
			$data["wu_address"]    = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
			$data["present_city"]  = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
			$data["present_addr"]  = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
			$data["roll"]          = "毕业";
			$flag = true;
			foreach ($studentExsit as &$s) {
				if ($s['stu_num'] == $data["stu_num"]) {
				    $flag = false;
					break;
				}
	        }
			if ($flag) {
				$data["stu_pw"]      = sha1($data["stu_num"]);
				if ($model->add($data)) {
    				$count++;
		        }
		   	} else {
		   		$stu_num = $data['stu_num'];
		   		if ($model->where("stu_num=$stu_num")->save($data)) {
    				$count++;
		        }
		   	}
		}
		$total = $highestRow - 1;
		$fail = $total - $count;
		$msg = "全部数据共". $total. "条，成功导入". $count. "条，失败". $fail. "条！！！";
		echo "<script>alert('$msg')</script>";
		$this->redirect("Student/collectGraduate", "", 0.01);
	}

	public function downloadCollect(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.Http");
		$time = time();
		Http::download("upload/tpl/studentCollect.xls","$time.xls");
	}
	public function downloadCollectGraudate(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.Http");
		$time = time();
		Http::download("upload/tpl/studentCollectGraduate.xls","$time.xls");
	}
	
}

?>