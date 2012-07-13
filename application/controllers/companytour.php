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
		$this->load->view('web/landingpage-company');//调试静态页面	

			
	}
}
?>