<?php
class NewsAction extends Action{
    public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("username")==null){
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
    public function isManageLevel(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("manager_level") >= 0){
		    return true;
		} 
		return false;
	}
	public function index(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$condition['title'] = $_GET['title'];
		$condition['content'] = $_GET['content'];
		$condition['time1'] = $_GET['time1'];
		$condition['time2'] = $_GET['time2'];
		$condition['type'] = $_GET['type'];
		import("ORG.Util.Page");
		$model = M();
		$sqlSelect = "select n.*, t.name from news n, news_type t ";
		$sqlWhere = "where t.id=n.type ";
		$sqlOrder = "order by top_time desc, time desc ";
		if ($condition['title'] != '') {
			$sqlWhere .= "and n.title like '%$condition[title]%' ";
		}
		if ($condition['content'] != '') {
			$sqlWhere .= "and n.content like '%$condition[content]%' ";
		}
		if ($condition['time1'] != '') {
			$sqlWhere .= "and n.time>='$condition[time1]' ";
		}
		if ($condition['time2'] != '') {
			$sqlWhere .= "and n.time<='$condition[time2]' ";
		}
		if ($condition['type'] != '') {
			$sqlWhere .= "and n.type=$condition[type] ";
		}
		$sql = $sqlSelect. $sqlWhere. $sqlOrder;

		$count = count(M()->query($sql));
		$page = new Page($count, 15);
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
		$show = $page->show();
		$sqlLimit = "limit $page->firstRow, $page->listRows";
		$news_list = $model->query($sql. $sqlLimit);
		foreach ($news_list as &$data) {
			if ($data['top_time'] == NULL) {
				$data['top_html'] = "";
			} else {
				$data['top_html'] = "[顶置]";
			}
		}
		$model = M("news_type");
		$type_list = $model->where("del='0'")->select();
		$this->assign("manager_level", Session::get("manager_level"));
		$this->assign("condition", $condition);
		$this->assign("type_list", $type_list);
		$this->assign("page", $show);
		$this->assign("news_list", $news_list);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->assign("url", __URL__);
		$this->display();
	}
	public function top() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$id = $_POST['id'];
		$isTop = $_POST['isTop'];
		$sql = "";
		if ($isTop == '1') {
			$sql = "update news set top_time=NOW() where id=$id";
		} else {
		    $sql = "update news set top_time=NULL where id=$id";
		}
		$flag = M()->execute($sql);
		echo $flag;
	}
	public function add() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    $this->redirect("News/index", "", 2, "没有权限！");
		}
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['type'] = $_POST['type'];
		
		$model = M("news");
		if ($model->add($data)) {
			$this->redirect("News/index", "", 2, "数据添加成功！！！");
		} else {
			$this->redirect("News/addInput", "", 2, "数据添加失败！！！");
		}
	}
	public function view() {
		Session::start();
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_GET['id'];
		$data = M("news")->where("id=$id")->find();
		$type = $data['type'];
		$type_name = M("news_type")->where("id=$type")->getField("name");
		$data['type_name'] = $type_name;
		$this->assign("manager_level", Session::get("manager_level"));
		$this->assign("data", $data);
		$this->assign("root", __ROOT__);
		$this->assign("url", __URL__);
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function edit() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    $this->redirect("News/index", "", 2, "没有权限！");
		}
		$id = $_POST['id'];
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['type'] = $_POST['type'];
		
		$model = M("news");
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("News/index", "", 2, "编辑成功！！！");
		} else {
			$this->redirect("News/index", "", 2, "编辑失败！！！");
		}
	}
	public function addInput() {
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    $this->redirect("News/index", "", 2, "没有权限！");
		}
		$model = M("news_type");
		$type_list = $model->where("del='0'")->select();
		$this->assign("type_list", $type_list);
		$this->assign("url", __URL__);
        $this->assign("media", __ROOT__. "/index/Tpl/media");
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function editInput() {
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    $this->redirect("News/index", "", 2, "没有权限！");
		}
		$id = $_GET['id'];
		$data = M("news")->where("id=$id")->find();
		$type = $data['type'];
		$type_name = M("news_type")->where("id=$type")->getField("name");
		$type_list = M("news_type")->where("del='0'")->select();
		$this->assign("type_list", $type_list);
		$this->assign("type_name", $type_name);
		$this->assign("title", $data['title']);
		$this->assign("data", $data);
		$this->assign("url", __URL__);
        $this->assign("media", __ROOT__. "/index/Tpl/media");
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function delete(){
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$id = $_POST['id'];
		$flag = M("news")->where("id=$id")->delete();
		echo $flag;
	}
	public function adminType() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$type_list = M("news_type")->where("del='0'")->select();
		$this->assign("type_list", $type_list);
		$this->assign("url", __URL__);
        $this->assign("media", __ROOT__. "/index/Tpl/media");
        $this->assign("css", __ROOT__. "/index/Tpl/media/css");
        $this->assign("js", __ROOT__. "/index/Tpl/media/js");
		$this->display();
	}
	public function addType() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$data['name'] = $_POST['name'];
		echo M("news_type")->add($data);
	}
	public function editType() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$id = $_POST['id'];
		$data['name'] = $_POST['name'];
		echo M("news_type")->where("id=$id")->save($data);
	}
	public function deleteType(){
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if (!$this->isManageLevel()) {
		    echo -1;
			return;
		}
		$id = $_POST['id'];
		$data['del'] = 1;
		echo M("news_type")->where("id=$id")->save($data);
	}
}
?>