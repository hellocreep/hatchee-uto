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
		this->load->model('webpage');
		$data['webinfo']=$this->webpage->getpage('index');
		$data['term']=$this->indexdata->getterm();
		$data['theme']=$this->indexdata->gettheme();
		$data['company']=$this->indexdata->getcompany();
		$data['expand']=$this->indexdata->getexpand();
		$this->load->view('web/index',$data);
	}
}
?>