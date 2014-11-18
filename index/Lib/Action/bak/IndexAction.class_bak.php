<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
    public function index(){
        header("Content-Type:text/html; charset=utf-8");
        $this->assign("path",APP_PUBLIC_PATH);
        $this->assign("current",__CURRENT__);
        $this->assign("url",__URL__);
        $this->display("login");
    }
    
    public function checkuser() {
    	Session::start();
    	header("Content-Type:text/html; charset=utf-8");
    	$level = $_POST["level"];
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	if($level == 1) {
    		$student = M("student");
    		$stu_pw = $student->where("stu_num=$username")->getField("stu_pw");
    		$stu_id = $student->where("stu_num=$username")->getField("stu_id");
    		if($stu_pw!=null||$stu_pw!=""){
    			if($stu_pw == sha1($password)){
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("username",$username);
    				Session::set("user_id",$stu_id);
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
    				$this->display("index_s");
    			} else {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}
    		} else {
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
    	} else if($level == 2) {
    		$admin = M("admin");
    		$adminlist = $admin->where("admin_name='$username'")->select();
    		$admin_pw = $adminlist[0]["admin_pw"];
    		if($admin_pw!=null||$admin_pw!="") {
    			if($admin_pw == sha1($password)){
    				$admin_id = $adminlist[0]["admin_id"];
    				$manager_level = $adminlist[0]["manager_level"];
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("user_id",$admin_id);
    				Session::set("manager_level", $manager_level);
    				Session::set("username",$username);
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
    				$this->display("index");
    			} else {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}
    		}else{
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
      	} else {
    		$work = M("work");
    		$stu_pw = $work->where("stu_num=$username")->getField("stu_pw");
    		$stu_id = $work->where("stu_num=$username")->getField("stu_id");
    		if ($stu_pw!=null||$stu_pw!="") {
    			if ($stu_pw == sha1($password)) {
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("username",$username);
    				Session::set("user_id",$stu_id);
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
    				$this->display("index_g");
    			} else  {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}
    		} else {
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
    	 }
    }
    public function logout(){
    	Session::start();
    	Session::clear();
    	Session::destroy();
    	header("Content-Type:text/html; charset=utf-8");
        $this->assign("path",APP_PUBLIC_PATH);
        $this->assign("current",__CURRENT__);
        $this->assign("url",__URL__);
        $this->display("login");
    	
    }
   }
?>