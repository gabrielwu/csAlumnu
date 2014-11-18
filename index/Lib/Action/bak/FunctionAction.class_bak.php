<?php
class FunctionAction extends Action{
	public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("username")==null)
		{
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
	public function queryAll(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		//echo __CURRENT__;
		$this->assign("current",__CURRENT__);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->display();
	}
	public function studetail(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		
		$stu_id = $_GET["stu_id"];
		$student = M("student");
		$list = $student->where("stu_id = $stu_id")->select();
		$sresult = $list[0];
		
		$model = M();
		
		$partyList = $model->query("select * from party where stu_id=$stu_id");
		$partyResult = $partyList[0];
		
		$sqlGraduation = "select *, ".
		                 "case type when '1' then '考研' when '2' then '保研' when '3' then '工作' ".
						 "when '4' then '出国' when '5' then '公务员' end as type from graduation where stu_id=$stu_id";
		$graduationList = $model->query($sqlGraduation);
		$graduationResult = $graduationList[0];
		
		$insuranceList = $model->query("select * from insurance where stu_id=$stu_id");
		$insuranceResult = $insuranceList[0];

		$socialScholarList = $model->query("select * from social_scholar where stu_id=$stu_id");
		
		$scholarList = $model->query("select * from scholar where stu_id=$stu_id");
		
		$competitionList = $model->query("select * from competition where stu_id=$stu_id");
		
		$punishList = $model->query("select * from punish where stu_id=$stu_id");
		
		$loanList = $model->query("select * from loan where stu_id=$stu_id");
		
		$grantList = $model->query("select * from granting where stu_id=$stu_id");
		
		$insuranceList = $model->query("select * from insurance where stu_id=$stu_id");		
		
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("result",$sresult);
		$this->assign("partyResult",$partyResult);
		$this->assign("graduationResult",$graduationResult);
		$this->assign("insuranceResult",$insuranceResult);
		$this->assign("grantResult",$grantList);
		$this->assign("loanResult",$loanList);
		$this->assign("socialScholarResult",$socialScholarList);
		$this->assign("scholarResult",$scholarList);
		$this->assign("competitionResult",$competitionList);
		$this->assign("punishResult",$punishList);
		$this->assign("password",Session::get("password"));
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function perdetail(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_GET["stu_id"];
		$student = M("student");
		$list = $student->where("stu_id = $stu_id")->select();
		$sresult = $list[0];
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("result",$sresult);
		$this->assign("password",Session::get("password"));
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	/*public function studupdate(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		$data = array();
		$data["stu_num"] = $_POST["stu_num"];
		$data["stu_tnum"] = $_POST["stu_tnum"];
		$data["stu_status"] = $_POST["stu_status"];
		$data["stu_idnum"] = $_POST["stu_idnum"];
		$data["stu_name"] = $_POST["stu_name"];
		$data["stu_pinyin"] = $_POST["stu_pinyin"];
		$data["stu_exname"] = $_POST["stu_exname"];
		$data["stu_indate"] = $_POST["stu_indate"];
		$data["stu_type"] = $_POST["stu_type"];
		$data["stu_schooling"] = $_POST["stu_schooling"];
		$data["stu_gradyear"] = $_POST["stu_gradyear"];
		$data["stu_campus"] = $_POST["stu_campus"];
		$data["stu_college"] = $_POST["stu_college"];
		$data["stu_major"] = $_POST["stu_major"];
		$data["stu_grade"] = $_POST["stu_grade"];
		$data["stu_class"] = $_POST["stu_class"];
		$data["stu_gender"] = $_POST["stu_gender"];
		$data["stu_political"] = $_POST["stu_political"];
		$data["stu_faith"] = $_POST["stu_faith"];
		$data["stu_birthday"] = $_POST["stu_birthday"];
		$data["stu_hometown"] = $_POST["stu_hometown"];
		$data["stu_birthplace"] = $_POST["stu_birthplace"];
		$data["stu_residence"] = $_POST["stu_residence"];
		$data["stu_trainarea"] = $_POST["stu_trainarea"];
		$data["stu_residcode"] = $_POST["stu_residcode"];
		$data["stu_abroad"] = $_POST["stu_abroad"];
		$data["stu_homeaddr"] = $_POST["stu_homeaddr"];
		$data["stu_homeadcode"] = $_POST["stu_homeadcode"];
		$data["stu_homeaddr2"] = $_POST["stu_homeaddr2"];
		$data["stu_contacaddr"] = $_POST["stu_contacaddr"];
		$data["stu_contadcode"] = $_POST["stu_contadcode"];
		$data["stu_contaddr2"] = $_POST["stu_contaddr2"];
		$data["stu_zipcode"] = $_POST["stu_zipcode"];
		$student = M("student");
		if($student->where("stu_id=$stu_id")->save($data))
		{
			$this->redirect("Function/perdetail", array("stu_id"=>$stu_id),2,"修改数据成功！！！");
		}else{
			$this->redirect("Function/perdetail", array("stu_id"=>$stu_id),2,"修改数据失败！！！");
		}
		//$this->redirect("Function/perdetail", array("stu_id"=>$stu_id),2,"修改数据成功！！！");
	} */
	public function uploadPicture() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_POST["moduleId"];
		$module = $_POST["module"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->uploadReplace=true;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $id;
		
		if (!$upload->upload("upload/$module/picture_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$newPic =  $info[0]["savename"];
		echo "$newPic";
	}
	public function updateModule() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_POST["id"];
		$module = $_POST["module"];
		switch ($module) {
		    case 'scholar':
			    $data['scholar_name'] = $_POST["scholar_name"];
				$data['level'] = $_POST["level"];
				$data['amount'] = $_POST["amount"];
				$data['date'] = $_POST["date"];
				$data['id'] = $id;
				$model = M("scholar_edit");
				break;
			case 'socialScholar':
			    $data['scholar_name'] = $_POST["scholar_name"];
				$data['level'] = $_POST["level"];
				$data['amount'] = $_POST["amount"];
				$data['date'] = $_POST["date"];
				$data['id'] = $id;
				$model = M("social_scholar_edit");
				break;
			case 'competition':
			    $data['competition_name'] = $_POST["competition_name"];
				$data['level'] = $_POST["level"];
				$data['award'] = $_POST["award"];
				$data['date'] = $_POST["date"];
				$data['id'] = $id;
				$model = M("competition_edit");
				break;
			case 'punish':
			    $data['type'] = $_POST["type"];
				$data['cause'] = $_POST["cause"];
				$data['date'] = $_POST["date"];
				$data['can_cancel'] = $_POST["can_cancel"];
				$data['id'] = $id;
				$model = M("punish_edit");
				break;
			case 'loan':
			    $data['total'] = $_POST["total"];
				$data['tuition'] = $_POST["tuition"];
				$data['accommodation'] = $_POST["accommodation"];
				$data['apply_date'] = $_POST["apply_date"];
				$data['id'] = $id;
				$model = M("loan_edit");
				break;
			case 'grant':
			    $data['grant_name'] = $_POST["grant_name"];
				$data['level'] = $_POST["level"];
				$data['amount'] = $_POST["amount"];
				$data['date'] = $_POST["date"];
				$data['id'] = $id;
				$model = M("granting_edit");
				break;
			case 'insurance':
			    while(list($name,$value)=each($_POST)){ 
                    echo   $name. '= '.$value. ' <br> '; 
				}
			    $data['insu_beginyear'] = $_POST["insu_beginyear"];
				$data['insu_endyear'] = $_POST["insu_endyear"];
				$data['insu_amount'] = $_POST["insu_amount"];
				$data['insu_reducable'] = $_POST["insu_reducable"];
				$data['id'] = $id;
				$model = M("insurance_edit");
				break;
			case 'graduation':
			    $data['phone'] = $_POST["insu_beginyear"];
				$data['email'] = $_POST["insu_endyear"];
				$data['qq'] = $_POST["insu_amount"];
				$data['politics_status'] = $_POST["insu_reducable"];
			    $data['ru_address'] = $_POST["insu_beginyear"];
				$data['ru_phone'] = $_POST["insu_endyear"];
				$data['ru_email'] = $_POST["insu_amount"];
				$data['post_info'] = $_POST["insu_reducable"];
				$data['type'] = $_POST["insu_reducable"];
				$data['date'] = $_POST["insu_amount"];
				$data['id'] = $id;
				$model = M("insurance_edit");
				break;
		}	
		if ($model->where("id=$id")->save($data)) {
		    echo "1";
		} else if ($model->add($data)) {
		    echo "1";
		} else {
		    echo "0";
		}
	}
	public function editScholar() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select sc.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation ";
		$sqlFrom = "from student s, scholar sc where sc.stu_id=s.stu_id ";
		$sqlWhere = "and sc.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	
	function studupdate(){
			$this->checkLogin();
			//Session::start();
			header("Content-Type:text/html;charset=utf-8");
			//$student = M("student");
			//$student->create();//根据POST方式传来的数据创建实例，包括ID
			$student_update=M("student_update");
			
			$data = array();
		$data["stu_num"] = $_POST["stu_num"];
		$data["stu_tnum"] = $_POST["stu_tnum"];
		$data["stu_status"] = $_POST["stu_status"];
		$data["stu_idnum"] = $_POST["stu_idnum"];
		$data["stu_name"] = $_POST["stu_name"];
		$data["stu_pinyin"] = $_POST["stu_pinyin"];
		$data["stu_exname"] = $_POST["stu_exname"];
		$data["stu_indate"] = $_POST["stu_indate"];
		$data["stu_type"] = $_POST["stu_type"];
		$data["stu_schooling"] = $_POST["stu_schooling"];
		$data["stu_gradyear"] = $_POST["stu_gradyear"];
		$data["stu_campus"] = $_POST["stu_campus"];
		$data["stu_college"] = $_POST["stu_college"];
		$data["stu_major"] = $_POST["stu_major"];
		$data["stu_grade"] = $_POST["stu_grade"];
		$data["stu_class"] = $_POST["stu_class"];
		$data["stu_gender"] = $_POST["stu_gender"];
		$data["stu_political"] = $_POST["stu_political"];
		$data["stu_faith"] = $_POST["stu_faith"];
		$data["stu_birthday"] = $_POST["stu_birthday"];
		$data["stu_hometown"] = $_POST["stu_hometown"];
		$data["stu_birthplace"] = $_POST["stu_birthplace"];
		$data["stu_residence"] = $_POST["stu_residence"];
		$data["stu_trainarea"] = $_POST["stu_trainarea"];
		$data["stu_residcode"] = $_POST["stu_residcode"];
		$data["stu_abroad"] = $_POST["stu_abroad"];
		$data["stu_homeaddr"] = $_POST["stu_homeaddr"];
		$data["stu_homeadcode"] = $_POST["stu_homeadcode"];
		$data["stu_homeaddr2"] = $_POST["stu_homeaddr2"];
		$data["stu_contacaddr"] = $_POST["stu_contacaddr"];
		$data["stu_contadcode"] = $_POST["stu_contadcode"];
		$data["stu_contaddr2"] = $_POST["stu_contaddr2"];
		$data["stu_zipcode"] = $_POST["stu_zipcode"];
		//	$student_update->create();
			
			
			$stu_id=$_POST["stu_id"];
			if($student_update->find($stu_id)){//更新表里有学生记录
				if($student_update->where("stu_id=$stu_id")->save($data)){
					
					$this->redirect("Function/perdetail",array("stu_id"=>$stu_id),3,
					"信息修改成功！等待审核中...期间你的信息不会更改！");
				}else{
					$this->redirect("Function/perdetail", array("stu_id"=>$stu_id),3,
					"信息修改失败！！！");
				}
			}else{//没有学生记录  
				$data["stu_id"]=$stu_id;//需要封装ID值
				$student=M("student");
				$re=$student->where("stu_id=$stu_id")->find();
				$data["stu_photo"]=$re["stu_photo"];
			//	uset($data)
				//echo"{$re["stu_photo"]}";
				if($student_update->add($data)){
					$this->redirect("Function/perdetail",array("stu_id"=>$stu_id),3,
					"信息修改成功！等待审核中...期间你的信息不会更改！");
				}else{
					$this->redirect("Function/perdetail", array("stu_id"=>$stu_id),3,
					"信息修改失败！！！");
				}
			}
			
						
		}
	public function changephoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_GET["stu_id"];
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->assign("stu_id",$stu_id);
		$this->display();
	}
	public function uploadphoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $stu_id;

		if (!$upload->upload("upload/ID_photo_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$data["stu_photo"] =  $info[0]["savename"];
		$new_photo =  $info[0]["savename"];
		
		$student = M("student");
		$result = $student->where("stu_id=$stu_id")->getField("stu_photo");
		
		unlink("upload/ID_photo/$result");
		$file = "upload/ID_photo_temp/$new_photo"; //旧目录
        $newfile = "upload/ID_photo/$new_photo"; //新目录
        copy($file,$newfile); //拷贝到新目录
		unlink($file);

        $flag = $student->where("stu_id=$stu_id")->save($data);
		//if ($flag) {
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"头像上传成功！！！");
		//} else {
		//	$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"头像上传失败！！！");
		//} 
	}
	// test
	public function photoUp() {
	    $model = M();
		$list = $model->query("select stu_id from student");
		foreach ($list as &$s) {
		    $model->query("update student set stu_photo = '".$s['stu_id'].".jpg' where stu_id='".$s['stu_id']."'");
		}
	}
	public function createadmin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$manager_level = Session::get("manager_level");
		if($manager_level!=0)
		{
			echo "对不起您没有创建管理员用户的权限！！！";
		}else{
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();
		}
	}
	public function submitadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$username = $_POST["username"];
		$password = $_POST["password"];
		$manager_level = $_POST["manager_level"];
		$admin = M("admin");
		$data = array();
		$data["admin_name"] = $username;
		$data["admin_pw"] = sha1($password);
		$data["manager_level"] = $manager_level;
		if($admin->add($data))
		{
			$this->redirect("Function/createadmin","",2,"创建管理员用户成功！！！");
		}else{
			$this->redirect("Function/createadmin","",2,"创建管理员用户失败！！！");
		}
	}
	public function changepassword(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$password = Session::get("password");
		$this->assign("password",$password);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updatepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$newpassword = $_POST["newpassword"];
		$oldpassword = $_POST["password"];
        $level = $_SESSION["level"];
        if($level == 2){
        $admin_id =  Session::get("user_id");
		$admin = M("admin");
		$data = array();
		$data["admin_pw"] = sha1($newpassword);
		if($admin->where("admin_id=$admin_id")->save($data))
		{
			Session::set("password", $newpassword);
			$this->assign("password",$newpassword);
			echo "<script>alert('密码修改成功！！！')</script>";
		}else{
			$this->assign("password",$oldpassword);
			echo "<script>alert('密码修改失败！！！')</script>";
		}
        }else if($level == 1){
        $stu_id =  Session::get("user_id");
        $stu = M("student");
		$data = array();
		$data["stu_pw"] = sha1($newpassword);
		if($stu->where("stu_id=$stu_id")->save($data))
		{
			Session::set("password", $newpassword);
			$this->assign("password",$newpassword);
			echo "<script>alert('密码修改成功！！！')</script>";
		}else{
			$this->assign("password",$oldpassword);
			echo "<script>alert('密码修改失败！！！')</script>";
		}
        }else{
        $stu_id =  Session::get("user_id");
        $work = M("work");
		$data = array();
		$data["stu_pw"] = sha1($newpassword);
		if($work->where("stu_id=$stu_id")->save($data))
		{
			Session::set("password", $newpassword);
			$this->assign("password",$newpassword);
			echo "<script>alert('密码修改成功！！！')</script>";
		}else{
			$this->assign("password",$oldpassword);
			echo "<script>alert('密码修改失败！！！')</script>";
		}
        }
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display("changepassword");
	}
	public function managerlist(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Util.Page");
		$admin = M("admin");
		$count = $admin->count("admin_id");
		$page = new Page($count, 5);
		$show = $page->show();
		$list = $admin->limit($page->firstRow.",".$page->listRows)->select();
		$this->assign("list",$list);
		$this->assign("page",$show);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$admin = M("admin");
		$admin_id = $_POST["admin_id"];
		$list = $admin->where("admin_id=$admin_id")->select();
		$this->assign("list",$list[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function submitupdateadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$admin = M("admin");
		$admin_id = $_POST["admin_id"];
		$admin_name = $_POST["username"];
		$admin_pw = sha1($_POST["password"]);
		$manager_level = $_POST["manager_level"];
		$data = array();
		$data["admin_name"] = $admin_name;
		$data["admin_pw"] = $admin_pw;
		$data["manager_level"] = $manager_level;
		$admin->where("admin_id=$admin_id")->save($data);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->redirect("Function/managerlist", "",2,"数据修改成功！！！");
	}
	public function stuchangepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		$this->assign("stu_id",$stu_id);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function stupdatepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		$newpassword = $_POST["newpassword"];
		$student = M("student");
		$data = array();
		$data["stu_pw"] = sha1($newpassword);
		if($student->where("stu_id=$stu_id")->save($data))
		{
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"学生密码更新成功！！！");
		}else{
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"学生密码更新失败！！！");
		}
		
	}
	
    public function confirmStuInfo(){//待审核学生信息   权限问题？
		Session::start();
	
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		
		$student_update=M("student_update");//创建更新表实例

		import("ORG.Util.Page");//用于分页，好强大
	
		$where = "";
		$result = array(array());//二维数组
		
		
			//$date =  date("Y");
			//$where = "stu_grade=$date";
			$count = $student_update->count();//统计记录数
			//echo"$count";
			$page = new Page($count, 10);
			$show = $page->show();
			if($show==null){
				$show="<br/><center>没有要审核的项目！！</center>";
			}
			$result = $student_update->limit($page->firstRow.",".$page->listRows)->order("stu_grade desc ,stu_class asc")->select();
			$this->assign("result",$result);
			$this->assign("length",count($result));
			$this->assign("admin",$_SESSION["username"]);
			$this->assign("page",$show);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();

	}
	
	function updateInfo(){//查看学生修改的详细信息
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		
		 
		 $stu_id=$_GET["stu_id"];
		 $student_update=M("student_update");
		 $student=M("student");
		
		 $list_update=$student_update->where("stu_id=$stu_id")->find();//用select()不行？
		 $list=$student->where("stu_id=$stu_id")->find();
		 
		 foreach($list as $key=>$value){
		 	if($value==null){
		 		$list[$key]="<font color=green ><i>未填</i></font>";//斜体
		 	}
		 }
	 	foreach($list_update as $key=>$value){
		 	if($value==null){
		 		$list_update[$key]="<font color=green ><i>未填</i></font>";
		 	}
		 }
		 
		 //echo"{$list_update['stu_name']}";
		 $this->assign("list_update",$list_update);
		 $this->assign("result",$list);
		 
		//echo"{$list_update['stu_num']}";
		// echo"{$stu_id}";
		 $this->assign("admin",$_SESSION["username"]);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display(); 
	}
	
	
	function passConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$stu_id=$_GET["stu_id"];
		$student_update=M("student_update");
		$student=M("student");
		
		$list_update=$student_update->where("stu_id=$stu_id")->find();
	//	echo "$stu_id";
		$list = $student->where("stu_id=$stu_id")->find();
		//echo"{$list_update['stu_num']}";
		if($student->where("stu_id=$stu_id")->save($list_update)){
			$student_update->where("stu_id=$stu_id")->delete();
			
		   $msg=M("msg_to_stu");//建系统消息表
		  
			$msgdata=array();
		   //$date=time();
		  // $date=$date->format("Y-m-d H:i:s");
			 $time=date('Y-m-d H:i:s');
		   $msgdata["time"]=$time;
			$msgdata["stu_id"]=$stu_id;
			
			$msgdata["content"]="修改操作已通过审核,你的个人信息已更新！";
			
			$msg->where("stu_id=$stu_id")->add($msgdata);
	
			$this->redirect("confirmStuInfo","");
		}else{
			//echo"操作失败！！！";
			//echo "{$stu_id}";
			//$this->redirect("confirmStuInfo","",2,"操作失败");
		}
	}
	
	
	function nopassConfirm(){//不通过审核，删除更新表记录
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$stu_id=$_GET["stu_id"];
		$student_update=M("student_update");
		
		$student_update->where("stu_id=$stu_id")->delete();
		
	 	    $msg=M("msg_to_stu");//建系统消息表
			$msgdata=array();
			
		   /* $date=new DateTime();
		   $date=$date->format("Y-m-d H:i:s");*/
		   $date=date('Y-m-d H:i:s');
		   $msgdata["time"]=$date;
		   
			$msgdata["stu_id"]=$stu_id;

			$msgdata["stu_id"]=$stu_id;
			$msgdata["content"]="修改操作未通过审核，你的个人信息更新失败！";
			$msg->add($msgdata);
		
		$this->redirect("confirmStuInfo","");
	}
	
	
	function passAllConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id_strs=$_GET["idstrs"];
		$id_strs=$id_strs.trim();
		
		//echo"$id_strs";//用于测试
		$list_id=explode(" ",$id_strs);
		//print_r ($list_id) ;
		//echo"{$list_id[2]}";
		//$len=count($list_id);
		//echo"$len";
		$student_update=M("student_update");
		$student=M("student");
		
		$msg=M("msg_to_stu");//建系统消息表
		$msgdata=array();
		
		foreach($list_id as $stu_id){
			echo"$stu_id";
			$list_update = $student_update->where("stu_id=$stu_id")->find();
			
			$student->where("stu_id=$stu_id")->save($list_update);
			$student_update->where("stu_id=$stu_id")->delete();
			/*
			$date=new DateTime();
		   $date=$date->format("Y-m-d H:i:s");*/
			 $date=date('Y-m-d H:i:s');
		   $msgdata["time"]=$date;
			$msgdata["stu_id"]=$stu_id;
			$msgdata["content"]="修改操作已通过审核,你的个人信息已更新！";
			$msg->where("stu_id=$stu_id")->add($msgdata);
		}
		
		$this->redirect("confirmStuInfo","");
	}
	
	
	function nopassAllConfirm(){//批量不通过审核
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id_strs=$_GET["idstrs"];
		$id_strs=$id_strs.trim();
		
	
		$list_id=explode(" ",$id_strs);//分割字符串

		$student_update=M("student_update");
		$student=M("student");
		
		$msg=M("msg_to_stu");//建系统消息表
		$msgdata=array();
		
		foreach($list_id as $stu_id){
			echo"$stu_id";
			//$list_update = $student_update->where("stu_id=$stu_id")->find();
			//$student->where("stu_id=$stu_id")->save($list_update);
			$student_update->where("stu_id=$stu_id")->delete();
			
			/*$date=new DateTime();
		   $date=$date->format("Y-m-d H:i:s");*/
			 $date=date('Y-m-d H:i:s');
		
		   $msgdata["time"]=$date;
			$msgdata["stu_id"]=$stu_id;
			$msgdata["content"]="修改操作未通过审核，你的个人信息更新失败！";
			$msg->where("stu_id=$stu_id")->add($msgdata);
			
		}
		
		$this->redirect("confirmStuInfo","");
	}
}

?>