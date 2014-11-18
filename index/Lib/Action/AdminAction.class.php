<?php
class AdminAction extends Action{
	public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if (Session::get("username")==null) {
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
    public function isSuperLevel(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("manager_level") == 0){
		    return true;
		} 
		return false;
	}
	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$list = M("admin")->select();
		$this->assign("list", $list);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function add(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isSuperLevel()) {
			echo '-1';
			return;
		}
		$data["username"] = $_POST["username"];
		$data["password"] = sha1($_POST["password"]);
		$data["manager_level"] = $_POST["manager_level"];
		echo M("admin")->add($data);
	}
	public function edit(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isSuperLevel()) {
			echo '-1';
			return;
		}
		$id = $_POST["id"];
		$data["username"] = $_POST["username"];
		$data["manager_level"] = $_POST["manager_level"];
		echo M("admin")->where("id=$id")->save($data);
	}
	public function delete(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isSuperLevel()) {
			echo '-1';
			return;
		}
		$id = $_POST["id"];
		echo M("admin")->where("id=$id")->delete();
	}
	public function resetPassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isSuperLevel()) {
			echo '-1';
			return;
		}
		$id = $_POST["id"];
		$data["password"] = sha1($_POST["password"]);
		echo M("admin")->where("id=$id")->save($data);
	}
}

?>