<?php
class Systemmanage extends CI_Controller
{
	var $attribute;
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('attribute');
		$this->attribute=new Attribute();
	}
/*****************************线路主题******************************************/
	public function themelist()
	{
		$data=$this->attribute->listtheme();
		echo json_encode($data);
	}
	//添加线路主题
	public function addtheme()
	{
		$theme=$_POST['name'];
		$data=array('name'=>$theme);
		echo $this->attribute->addTheme($data);
	}
	public function deltheme()
	{
		$id=$_POST['id'];
		if($_SESSION['power']==0 || $_SESSION['power']==1)
		{
			if($this->attribute->delTheme($id)==1)
			{
				$resinfo['msg']='线路主题删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='线路主题删除失败，请稍后再试 ！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你没有权限进行该操作！';
			$resinfo['status']=true;
		}
		echo json_encode($resinfo);
	}
	public function edittheme(){
		$id = $_GET['id'];
		$data['theme']=$this->attribute->gettheme($id);
		$this->load->view('admin/update_theme',$data);
	}
	public function updatetheme(){
		$des = json_decode($_POST['data']);
		$id = $des->id;
		$synopsis = $_POST['synopsis'];
		$data = array(
			'name'=>$des->name,
			'synopsis'=>$synopsis,
			'img'=>$des->img,
			'title'=>$des->title,
			'des'=>$des->des,
			'keywords'=>$des->keywords,
			'filename'=>$des->filename,
			'isshow'=>$des->isshow,
			'term'=>$des->term
			);
		echo $this->attribute->updatetheme($id,$data);

	}
/***********************************目的地************************************/
	public function deslist()
	{
		$data=$this->attribute->listDes();
		echo json_encode($data);
	}
	//添加景点目的地
	public function adddestination()
	{
		$des=json_decode($_POST['data']);
		$data=array('name'=>$des->name,'synopsis'=>$des->synopsis,);
		echo $this->attribute->addDes($data);
		
	}

	public function editdes(){
		$id = $_GET['id'];
		$this->load->model('image');
		$data['des']=$this->attribute->getdes($id);
		$arrimg=explode(",",$data['des']['img']);
		for($i=0;$i<count($arrimg);$i++)
		{
			$data['img'][]=$this->image->getimg($arrimg[$i]);
		}
		$this->load->view('admin/update_destination',$data);
	}

	public function updatedes(){
		$des = json_decode($_POST['data']);
		$synopsis = $_POST['synopsis'];
		$id = $des->id;
		$data = array(
			'name'=>$des->name,
			'synopsis'=>$synopsis,
			'img'=>$des->img,
			'title'=>$des->title,
			'des'=>$des->des,
			'keywords'=>$des->keywords,
			'filename'=>$des->filename,
			'isshow'=>$des->isshow,
			'term'=>$des->term
			);
		echo $this->attribute->updatedes($id,$data);

	}

	public function deletedes()
	{
		$id=$_POST['id'];
		if($_SESSION['power']==0 || $_SESSION['power']==1)
		{
			if($this->attribute->delDes($id))
			{
				$resinfo['msg']='目的地删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='目的地删除失败，请稍后再试 ！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你没有权限进行该操作！';
			$resinfo['status']=true;
		}
		echo json_encode($resinfo);
	}
/*******************************出行时间****************************************/
	//添加活动时间
	public function listtraveltime()
	{
		$data=$this->attribute->listTime();
		echo json_encode($data);
	}
	public function addtraveltime()
	{
		$traveltime=$_POST['name'];
		$data=array('taveltime'=>$traveltime);
		echo $this->attribute->addTime($data);
	}
	public function deltraveltime()
	{
		$id=$_POST['id'];
		if($_SESSION['power']==0 || $_SESSION['power']==1)
		{
			if($this->attribute->delTime($id))
			{
				$resinfo['msg']='目的地删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='目的地删除失败，请稍后再试 ！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你没有权限进行该操作！';
			$resinfo['status']=true;
		}
		echo json_encode($resinfo);
	}
/******************************活动群体*****************************************/
	public function groupList()
	{
		$data=$this->attribute->listgroup();
		echo json_encode($data);
	}
	public function addgroup()
	{
		$group=$_POST['name'];
		$data=array('group'=>$group);
		echo $this->attribute->addgroup($data);
	}
	public function delgroup()
	{
		$id=$_POST['id'];
		if($_SESSION['power']==0 || $_SESSION['power']==1)
		{
			if($this->attribute->delgroup($id))
			{
				$resinfo['msg']='目的地删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='目的地删除失败，请稍后再试 ！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你没有权限进行该操作！';
			$resinfo['status']=true;
		}
		echo json_encode($resinfo);
	}
}
?>