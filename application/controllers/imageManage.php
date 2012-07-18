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
		$arrimg=explode('/',$imgurl);
		$imgname=$arrimg[2];
		$config['new_image'] = 'uploads/thumbnails/'.$imgname;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $imgurl;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = '170';
        $config['height'] = '100';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
		$imgthumb=$config['new_image'];

		$this->image_lib->clear();
		$config['new_image'] = 'uploads/middels/'.$imgname;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $imgurl;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = '300';
        $config['height'] = '180';
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$imgmiddel=$config['new_image'];
		$data=array(
			'path'=>$imgurl,
			'middle'=>$imgmiddel,
			'small'=>$imgthumb
		);
		$info=$img->upload($data);
		echo json_encode($info);
		
	}
}
?>