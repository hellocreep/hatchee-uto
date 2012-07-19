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
		$data['term']=$this->indexdata->getterm();
		$data['theme']=$this->indexdata->gettheme();
		$data['company']=$this->indexdata->getcompany();
		$data['expand']=$this->indexdata->getexpand();
		echo "<pre>";
		for($i=0;$i<count($data['theme']);$i++)
		{
			echo $data['theme'][$i]['Id']."<br>";
			echo $data['theme'][$i]['title']."<br>";
			echo $data['theme'][$i]['days']."<hr>";
		}
		echo "</pre>";
		///$this->load->view('web/index',$data);
	}
}
?>