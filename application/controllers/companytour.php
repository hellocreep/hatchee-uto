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
		$this->load->model('webpage');
		$type="company_tour";
		$data['webinfo'] = $this->webpage->getpage($type);
		$data['tour']=$this->company->getcompanytour();
		$data['note']=$this->company->getcompanynote();
		$this->load->view('web/landingpage-company',$data);	
	}
	
}
?>