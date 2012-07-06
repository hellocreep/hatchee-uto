<?php 
class Webtravelnote extends CI_controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->model('travel');
		$data['note']=$this->travel->gettravel();
		echo "<pre>";
			print_r($data['note']);
		echo "</pre>";
	}
}
?>