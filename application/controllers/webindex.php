<?php
class Webindex extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->model('indexdata');
		$this->load->model('webpage');
		$data['webinfo']=$this->webpage->getpage('index');
		$group=$data['webinfo'][0]->group;
		$data['group']=$this->indexdata->getgroup($group);
		$data['term']=$this->indexdata->getterm();
		$data['theme']=$this->indexdata->gettheme();
		$data['company']=$this->indexdata->getcompany();
		$data['expand']=$this->indexdata->getexpand();
		$data['travel']=$this->indexdata->gettravel();
		$arrimg=array(

			 'assets/images/theme/daocheng.jpg', 
			 'assets/images/theme/danba.jpg', 
			 'assets/images/theme/lianhuahu.jpg', 
			 'assets/images/theme/gonggashan.jpg', 
			 'assets/images/theme/siguniangshan.jpg', 
			 'assets/images/theme/jiuzai.jpg', 
			 'assets/images/theme/luguhu.jpg', 
			 'assets/images/theme/emei.jpg', 
			 'assets/images/theme/qingchengshan.jpg' 
		);
		for($i=0;$i<count($data['theme']);$i++)
		{
			$data['theme'][$i]['thumbnail']=$arrimg[$i];
		}
		$this->load->view('web/index',$data);
	}
}
?>