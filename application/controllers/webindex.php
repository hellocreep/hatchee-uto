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
			'0' => 'assets/images/theme/short01.jpg', 
			'1' => 'assets/images/theme/long02.jpg', 
			'2' => 'assets/images/theme/short03.jpg', 
			'3' => 'assets/images/theme/long04.jpg', 
			'4' => 'assets/images/theme/short05.jpg', 
			'5' => 'assets/images/theme/short06.jpg', 
			'6' => 'assets/images/theme/long07.jpg', 
			'7' => 'assets/images/theme/long08.jpg'
		);
		for($i=0;$i<count($data['theme']);$i++)
		{
			$data['theme'][$i]['thumbnail']=$arrimg[$i];
		}
		$this->load->view('web/index',$data);
	}
}
?>