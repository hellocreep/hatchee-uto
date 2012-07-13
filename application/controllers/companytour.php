<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companytour extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->model('company');
		$data['company']=$this->company->getcompanytour();
		$data['note']=$this->company->getextour();
		$this->load->view('web/landingpage-company',$data);	
	}
	
}
?>