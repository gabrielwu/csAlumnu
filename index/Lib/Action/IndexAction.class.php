<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
    public function login(){
        header("Content-Type:text/html; charset=utf-8");
        $this->assign("url", __URL__);
        $this->assign("root", __ROOT__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
        $this->display("login");
    }
    public function checkuser() {
    	Session::start();
    	header("Content-Type:text/html; charset=utf-8");
    	$level = $_POST["level"];
    	$username = $_POST["username"];
    	$password = $_POST["password"];
        $loginerror = false;
    	if($level == 1) {
    		$student = M("student");
    		$stu_pw = $student->where("stu_num='$username'")->getField("stu_pw");
    		$stu_id = $student->where("stu_num='$username'")->getField("stu_id");
			$stu_name = $student->where("stu_num='$username'")->getField("stu_name");
			$stu_num = $student->where("stu_num='$username'")->getField("stu_num");
    		if ($stu_pw != null || $stu_pw != "") {
    			if($stu_pw == sha1($password)){
    				Session::set("level",$level);
    				Session::set("manager_level", -1);
    				Session::set("password", $password);
    				Session::set("username", $username);
					Session::set("stu_name", $stu_name);
					Session::set("stu_num", $stu_num);
                    Session::set("user_id", $stu_id);
                    Session::set("stu_id", $stu_id);
    			} else {
                    $loginerror = true;
    			}
    		} else {
                $loginerror = true;
    		}
    	} else if ($level == 2) {
    		$admin = M("admin");
    		$admin_pw = $admin->where("username='$username'")->getField("password");
    		if($admin_pw != null || $admin_pw != "") {
    			if($admin_pw == sha1($password)){
                    $id = $admin->where("username='$username'")->getField("id");
                    $manager_level = $admin->where("username='$username'")->getField("manager_level");
    				Session::set("level", $level);
    				Session::set("manager_level", $manager_level);
    				Session::set("password", $password);
    				Session::set("user_id", $id);
    				Session::set("username", $username);
    			} else {
                    $loginerror = true;
    			}
    		}else{
                $loginerror = true;
    		}
      	} 
        $this->assign("url", __URL__);
        if ($loginerror) {
            $this->assign("loginerror","用户名或密码错误！");
            $this->login();
        } else {
            $this->display("index");
        }
    }
    public function top() {
        Session::start();
        $this->assign("root", __ROOT__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
        $this->assign("username", $_SESSION['username']. $_SESSION['stu_name']);
        $this->assign("level", $_SESSION['level']);
        $this->display();
    }
    public function left() {
        Session::start();
		$model = M("news_type");
		$news_type_list = $model->where("del='0'")->select();
		$this->assign("level", $_SESSION['level']);
		$this->assign("news_type_list", $news_type_list);
		$this->assign("manager_level", $_SESSION['manager_level']);
        $this->assign("root", __ROOT__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
        $this->display();
    }
    public function right(){
        header("Content-Type:text/html; charset=utf-8");
        $confirmStuCount = 0;
        $confirmCount = 0;
		if (Session::get("level") == "1") {
			$this->redirect("News/index", "", 0, "");
		} else {           
			$confirmStuCount += M("student_edit")->count();  
			$jqueryUI = __ROOT__. "/index/Tpl/media/jquery-ui";              
			$this->assign("confirmStuCount", $confirmStuCount);
			$this->assign("jqueryUI", $jqueryUI);
			$this->assign("root", __ROOT__);
			$this->assign("url", __URL__);
			$this->display();
		}
    }
    public function bottom() {
        $this->assign("root", __ROOT__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
        $this->display();
    }
    public function logout(){
    	Session::start();
    	Session::clear();
    	Session::destroy();
        $this->login();
    }
}
?>