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

		// $this->load->model('show');
		// $num=$this->show->totaltour('term');
		// $per_page=5;
		// $count=ceil($num/$per_page);
		// $page=$this->uri->segment(3);
		// $action=$this->uri->segment(4);
		// if(isset($page) && $page!='')
		// {
		// 	$start=($page*$per_page)-$per_page;
		// }
		// else
		// {
		// 	$start=0;
		// }

		// if(isset($action) &&$action!='')
		// {
		// 	$data['page']['first']='termtour/index/1/days';
		// 	$data['page']['end']='termtour/index/'.$count.'/days';
		// 	if($page>1)
		// 	{
		// 		$pagepre=$page-1;
		// 	}
		// 	else
		// 	{
		// 		$pagepre=1;
		// 	}
		// 	if($page<$count)
		// 	{
		// 		$pagenext=$page+1;
		// 	}
		// 	else
		// 	{
		// 		$pagenext=$count;
		// 	}
		// 	$data['page']['pre']='termtour/index/'.$pagepre.'/days';
		// 	$data['page']['next']='termtour/index/'.$pagenext.'/days';
		// }
		// else
		// {
		// 	$data['page']['first']='termtour/index/1';
		// 	$data['page']['end']='termtour/index/'.$count;
		// 	if($page>1)
		// 	{
		// 		$pagepre=$page-1;
		// 	}
		// 	else
		// 	{
		// 		$pagepre=1;
		// 	}
		// 	if($page<$count)
		// 	{
		// 		$pagenext=$page+1;
		// 	}
		// 	else
		// 	{
		// 		$pagenext=$count;
		// 	}
		// 	$data['page']['pre']='companytour/index/'.$pagepre;
		// 	$data['page']['next']='companytour/index/'.$pagenext;
		// }
		// $this->load->model('webpage');
		// $this->webpage=new webpage();
		// $type="regular_tour";
		// $data['webinfo'] = $this->webpage->getpage($type);
		// $data['tour']=$this->show->showtermtour($start,$per_page,$action);
		// $this->load->view('web/landingpage-company',$data);	
	}
}
?>