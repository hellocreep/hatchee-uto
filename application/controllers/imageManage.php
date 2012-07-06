<?php
class Imagemanage extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function addimginfo()
	{
		$this->load->model('image');
		$img=new Image();
		$imginfo=json_decode($_POST['data']);
		for($i=0;$i<count($imginfo);$i++)
		{
		$data=array(
				'alt'=>$imginfo[$i]->alt,
				'tags'=>$imginfo[$i]->tags,
				'des'=>$imginfo[$i]->des
		);
		$res=$img->addimginfo($imginfo[$i]->id,$data);
		}
		echo $res;
	}
	public function getimginfo()
	{
		$id=$_POST['id'];
		$this->load->model('image');
		$img=new Image();
		$imginfo=$img->getimgInfo($id);
		echo json_encode($imginfo);
	}
	public function delimg()
	{
		$id=$_POST['id'];
		$this->load->model('image');
		$img=new Image();
		echo $img->delimg($id);
	}
	public function updateimg()
	{
		$info=json_decode($_POST['data']);
		$id=$info->id;
		$data=array('alt'=>$info->alt,'tags'=>$info->tags,'des'=>$info->des);
		$this->load->model('image');
		$img=new Image();
		echo $img->updateimg($id,$data);
	}
	public function imgupload()
	{
		$imgurl='uploads/'.eregi_replace(".*uploads/","",$_POST['userfile']);

		$this->load->model('image');
		$img=new Image();
		$info=$img->upload($imgurl);
		echo json_encode($info);
		
	}
}
?>