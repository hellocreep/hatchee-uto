<?php
class Expandtour extends CI_Controller
{
	function __controller()
	{
		parent::__controller();
		$this->load->helper('url');
		session_start();
	}
	function newexpand()
	{}
}
?>