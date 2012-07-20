<?php
class Webindex extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->model('indexdata');
		$this->load->model('webpage');
		$data['webinfo']=$this->webpage->getpage('index');
		$data['term']=$this->indexdata->getterm();
		$data['theme']=$this->indexdata->gettheme();
		$data['company']=$this->indexdata->getcompany();
		$data['expand']=$this->indexdata->getexpand();
		$data['travel']=$this->indexdata->gettravel();
		$arrimg=array(
			'0' => 'assets/images/theme/daocheng.jpg', 
			'1' => 'assets/images/theme/jiuzai.jpg', 
			'2' => 'assets/images/theme/danba.jpg', 
			'3' => 'assets/images/theme/emei.jpg', 
			'4' => 'assets/images/theme/gonggashan.jpg', 
			'5' => 'assets/images/theme/luguhu.jpg', 
			'6' => 'assets/images/theme/siguniangshan.jpg', 
			'7' => 'assets/images/theme/lianhuahu.jpg', 
			'8' => 'assets/images/theme/qingchengshan.jpg' 
		);
		for($i=0;$i<count($data['theme']);$i++)
		{
			$data['theme'][$i]['thumbnail']=$arrimg[$i];
		}
		$this->load->view('web/index',$data);
	}
}
?>