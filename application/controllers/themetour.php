<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Themetour extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->model('show');
		$num=$this->show->totaltour('');
		$per_page=5;
		$count=ceil($num/$per_page);
		$page=$this->uri->segment(3);
		if($page=='')
		{
			$page=1;
		}
		$action=$this->uri->segment(4);
		$sort=$this->uri->segment(5);
		if(isset($page) && $page!='')
		{
			$start=($page*$per_page)-$per_page;
		}
		else
		{
			$start=0;
		}
		
		if(isset($action) &&$action!='')
		{
			$data['page']['first']='themetour/index/1/'.$action.'/'.$sort;
			$data['page']['end']='themetour/index/'.$count.'/'.$action.'/'.$sort;
			if($page>1)
			{
				$pagepre=$page-1;
			}
			else
			{
				$pagepre=1;
			}
			if($page<$count)
			{
				$pagenext=$page+1;
			}
			else
			{
				$pagenext=$count;
			}
			$data['page']['pre']='themetour/index/'.$pagepre.'/'.$action.'/'.$sort;
			$data['page']['next']='themetour/index/'.$pagenext.'/'.$action.'/'.$sort;
		}
		else
		{
			$data['page']['first']='themetour/index/1';
			$data['page']['end']='themetour/index/'.$count;
			if(isset($page) && $page>1)
			{
				$pagepre=$page-1;
			}
			else
			{
				$pagepre=1;
			}
			if(isset($page) && $page<$count)
			{
				$pagenext=$page+1;
			}
			else
			{
				$pagenext=$count;
			}
			$data['page']['pre']='themetour/index/'.$pagepre;
			$data['page']['next']='themetour/index/'.$pagenext;
		}
		if(isset($sort) && $sort!='')
		{
			if($sort=='desc')
			{
				$data['sortday']='themetour/index/1/days/asc';
				$data['sortprice']='themetour/index/1/price/asc';
			}
			else
			{
				$data['sortday']='themetour/index/1/days/desc';
				$data['sortprice']='themetour/index/1/price/desc';
			}
		}
		else
		{
			$data['sortday']='themetour/index/1/days/asc';
			$data['sortprice']='themetour/index/1/price/asc';
			$sort='asc';
		}
		$this->load->library('cimarkdown');
		$this->load->model('webpage');
		$this->webpage=new webpage();
		$type="theme_tour";
		$data['webinfo'] = $this->webpage->getpage($type);
		$data['tour']=$this->show->showthemetour($start,$per_page,$action,$sort);
		$this->load->view('web/landingpage-theme',$data);		
	}
	function searchtour()
	{
		$action=$this->uri->segment(3);
		$key=$this->uri->segment(4);
		switch($action)
		{
			case 'destination': $field='destination';break;
			case 'theme': $field='theme';break;
			case 'holidays': $field='tags';break;
		}
		$this->load->model('webpage');
		$data['webinfo'] = $this->webpage->getpage('theme_tour');
	}
}
?>