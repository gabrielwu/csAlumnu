<?php
class InformationAction extends Action{
public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("username")==null)
		{
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
public function index(){
	header("Content-Type:text/html; charset=utf-8");
	$this->checklogin();
	$manager_level = Session::get("manager_level");
	if($manager_level!=1)
	{
		echo "<script>alert('对不起您不是辅导员老师，没有权利上传采集信息！！！');</script>";
		$this->redirect("Information/outputstream", "");
	}else{
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	}
public function creategrade(){
	Session::start();
	header("Content-Type:text/html; charset=utf-8");
	$this->checklogin();
	$manager_level = Session::get("manager_level");
	$assistant = Session::get("user_id");
	if($manager_level!=1)
	{
		echo "<script>alert('对不起您不是辅导员老师，没有权利上传采集信息！！！');</script>";
		$this->redirect("Information/index", "");
	}else{
		$grade = M("grade");
		$stu_grade = $_POST["stu_grade"];
		$stu_class = $_POST["stu_class"];
		$data = array();
		$data["grade_year"] = $stu_grade;
		$data["grade_classnum"] = $stu_class;
		$data["assistant"] = $assistant;
		if($grade->add($data))
		{
			echo "<script>alert('添加班级成功,请导入相应班级、年级的学生数据！！！');</script>";
			$this->redirect("Information/inputstream", "");
		}else{
			echo "<script>alert('添加班级失败,年级已存在！！！');</script>";
			$this->redirect("Information/index", "");
		}
	}
}
	public function inputstream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$manager_level = Session::get("manager_level");
		if($manager_level!=1)
		{
			echo "<script>alert('对不起您不是辅导员老师，没有权利上传学生的综合信息！！！');</script>";
			$this->redirect("Information/outputstream", "");
		}else{
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();
		}
	}
	public function uploadfile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.UploadFile");
			$upload = new UploadFile();
			$upload->maxSize = 3145728;
			$upload->allowExts = array("xls");
			if(!$upload->upload("upload/student/")){
				$this->error($upload->getErrorMsg());
			}else{
				$info = $upload->getUploadFileInfo();
			}
			ini_set('memory_limit', '200M'); 
			require_once './ThinkPHP/Vendor/PHPExcel.php';
			require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
			require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
			$filename=$info[0]["savename"];//获取上传后的文件名
			$uploadfile="upload/student/$filename";
			$objReader  = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load($uploadfile); 
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); // 取得总行数 
			$highestColumn = $sheet->getHighestColumn(); // 取得总列数
			$data = array();
			$grant = M("student");
			$count = 0;
			for($i=2;$i<=$highestRow;$i++)
			{
				$data["stu_num"] = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
				$data["stu_tnum"] = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				$data["stu_status"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				$data["stu_idnum"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				$data["stu_name"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				$data["stu_pinyin"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				$data["stu_exname"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				$data["stu_indate"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
				$data["stu_type"] = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
				$data["stu_schooling"] = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
				$data["stu_gradyear"] = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
				$data["stu_grade"] = $objPHPExcel->getActiveSheet()->getCell("L$i")->getValue();
				$data["stu_class"] = $objPHPExcel->getActiveSheet()->getCell("M$i")->getValue();
				$data["stu_gender"] = $objPHPExcel->getActiveSheet()->getCell("N$i")->getValue();
				$data["stu_nation"] = $objPHPExcel->getActiveSheet()->getCell("O$i")->getValue();
				$data["stu_political"] = $objPHPExcel->getActiveSheet()->getCell("P$i")->getValue();
				$data["stu_birthday"] = $objPHPExcel->getActiveSheet()->getCell("Q$i")->getValue();
				$data["stu_hometown"] = $objPHPExcel->getActiveSheet()->getCell("R$i")->getValue();
				$data["stu_birthplace"] = $objPHPExcel->getActiveSheet()->getCell("S$i")->getValue();
				$data["stu_residence"] = $objPHPExcel->getActiveSheet()->getCell("T$i")->getValue();
				$data["stu_faith"] = $objPHPExcel->getActiveSheet()->getCell("U$i")->getValue();
				$data["stu_trainarea"] = $objPHPExcel->getActiveSheet()->getCell("V$i")->getValue();
				$data["stu_abroad"] = $objPHPExcel->getActiveSheet()->getCell("W$i")->getValue();
				$data["stu_homeaddr"] = $objPHPExcel->getActiveSheet()->getCell("X$i")->getValue();
				$data["stu_homeadcode"] = $objPHPExcel->getActiveSheet()->getCell("Y$i")->getValue();
				$data["stu_homeaddr2"] = $objPHPExcel->getActiveSheet()->getCell("Z$i")->getValue();
				$data["stu_contacaddr"] = $objPHPExcel->getActiveSheet()->getCell("AA$i")->getValue();
				$data["stu_contadcode"] = $objPHPExcel->getActiveSheet()->getCell("AB$i")->getValue();
				$data["stu_contaddr2"] = $objPHPExcel->getActiveSheet()->getCell("AC$i")->getValue();
				$data["stu_zipcode"] = $objPHPExcel->getActiveSheet()->getCell("AD$i")->getValue();
				$data["stu_campus"] = "中心校区";
				$data["stu_college"] = "软件学院";
				$data["stu_major"] = "软件工程";
				$data["stu_photo"] = "1.jpg";
				if($grant->add($data))
				{
					$count++;
						
				}else{
					echo $grant->getLastSql()."词条信息插入失败！！！";
				}
			}
		
			$count++;
			if($count==$highestRow)
			{
				$count--;
				echo "<script>alert('所有数据全部导入成功，此次导入数据量为".$count."条！！！')</script>";
				unlink($uploadfile);
			}
			//print_r($data);
			$this->redirect("Information/index", "");
	}
	public function outputstream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public  function downdatafile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		ini_set('memory_limit', '200M'); 
		require_once "./ThinkPHP/Vendor/PHPExcel.php"; 
		require "./ThinkPHP/Vendor/PHPExcel/Writer/Excel5.php";
		$time = time();
		$outputFileName = "$time.xls";
		$objExcel = new PHPExcel(); 
		$objExcel->setActiveSheetIndex(0);   //建立一个sheet表
		$objActSheet = $objExcel->getActiveSheet();  //获取当前的sheet表
		$objActSheet->setCellValue('A1',"学号");
		$objStyleN6 = $objActSheet->getStyle('A1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('B1',"教学号");
		$objStyleN6 = $objActSheet->getStyle('B1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('C1',"学籍状态");
		$objStyleN6 = $objActSheet->getStyle('C1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('D1',"学生身份证号码");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"姓名");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"姓名拼音");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"曾用名");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"入学时间");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"学生类别");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('J1',"学制");
		$objStyleN6 = $objActSheet->getStyle('J1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('K1',"预计毕业时间");
		$objStyleN6 = $objActSheet->getStyle('K1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('L1',"所在年级");
		$objStyleN6 = $objActSheet->getStyle('L1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('M1',"所在班级");
		$objStyleN6 = $objActSheet->getStyle('M1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('N1',"性别");
		$objStyleN6 = $objActSheet->getStyle('N1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('O1',"民族");
		$objStyleN6 = $objActSheet->getStyle('O1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('P1',"政治面貌");
		$objStyleN6 = $objActSheet->getStyle('P1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('Q1',"出生日期");
		$objStyleN6 = $objActSheet->getStyle('Q1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('R1',"籍贯");
		$objStyleN6 = $objActSheet->getStyle('R1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('S1',"出生地");
		$objStyleN6 = $objActSheet->getStyle('S1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('T1',"户口所在地");
		$objStyleN6 = $objActSheet->getStyle('T1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('U1',"宗教信仰");
		$objStyleN6 = $objActSheet->getStyle('U1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('V1',"乘车区间");
		$objStyleN6 = $objActSheet->getStyle('V1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('W1',"港澳台侨");
		$objStyleN6 = $objActSheet->getStyle('W1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('X1',"家庭地址(县)");
		$objStyleN6 = $objActSheet->getStyle('X1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('Y1',"家庭地址邮编");
		$objStyleN6 = $objActSheet->getStyle('Y1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('Z1',"家庭住址(村)");
		$objStyleN6 = $objActSheet->getStyle('Z1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('AA1',"通讯地址(县)");
		$objStyleN6 = $objActSheet->getStyle('AA1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('AB1',"通讯地址邮编");
		$objStyleN6 = $objActSheet->getStyle('AB1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('AC1',"街道号(村)");
		$objStyleN6 = $objActSheet->getStyle('AC1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('AD1',"邮政编码");
		$objStyleN6 = $objActSheet->getStyle('AD1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$stu_grade = $_POST["stu_grade"];
		$where = "";
		$result = array(array());
		if($stu_grade!="")
		{
			$where = $where." stu_grade=$stu_grade";
		}
		$grant = M("student");
		if($where!="")
		{
			$result = $grant->where($where)->order("stu_grade desc ,stu_class asc")->select();
		}else{
			$result = $grant->order("stu_grade desc ,stu_class asc")->select();
		}
		$count = 2;
		for($i=0;$i<count($result);$i++)
		{
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_tnum"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_status"]);
			$objActSheet->setCellValue('D'.$count," ".$result[$i]["stu_idnum"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["stu_pinyin"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["stu_exname"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["stu_indate"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["stu_type"]);
			$objActSheet->setCellValue('J'.$count,$result[$i]["stu_schooling"]);
			$objActSheet->setCellValue('K'.$count,$result[$i]["stu_gradyear"]);
			$objActSheet->setCellValue('L'.$count,$result[$i]["stu_grade"]);
			$objActSheet->setCellValue('M'.$count,$result[$i]["stu_class"]);
			$objActSheet->setCellValue('N'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('O'.$count,$result[$i]["stu_nation"]);
			$objActSheet->setCellValue('P'.$count,$result[$i]["stu_political"]);
			$objActSheet->setCellValue('Q'.$count,$result[$i]["stu_birthday"]);
			$objActSheet->setCellValue('R'.$count,$result[$i]["stu_hometown"]);
			$objActSheet->setCellValue('S'.$count,$result[$i]["stu_birthplace"]);
			$objActSheet->setCellValue('T'.$count,$result[$i]["stu_residence"]);
			$objActSheet->setCellValue('U'.$count,$result[$i]["stu_faith"]);
			$objActSheet->setCellValue('V'.$count,$result[$i]["stu_trainarea"]);
			$objActSheet->setCellValue('W'.$count,$result[$i]["stu_abroad"]);
			$objActSheet->setCellValue('X'.$count,$result[$i]["stu_homeaddr"]);
			$objActSheet->setCellValue('Y'.$count,$result[$i]["stu_homeadcode"]);
			$objActSheet->setCellValue('Z'.$count,$result[$i]["stu_homeaddr2"]);
			$objActSheet->setCellValue('AA'.$count,$result[$i]["stu_contacaddr"]);
			$objActSheet->setCellValue('AB'.$count,$result[$i]["stu_contadcode"]);
			$objActSheet->setCellValue('AC'.$count,$result[$i]["stu_contaddr2"]);
			$objActSheet->setCellValue('AD'.$count,$result[$i]["stu_zipcode"]);
			$count = $count+1;
		}
		$objWriter=new PHPExcel_Writer_Excel5($objExcel);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$objWriter->save('php://output');
	}
	public function download(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.Http");
		$time = time();
		Http::download("upload/tpl/student.xls","$time.xls");
	}
	
}

?>