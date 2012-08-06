<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Themetour extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		session_start();
	}
	function index()
	{
		if(isset($_GET['type']) && $_GET['type']!='0')
		{
			$sorttype=$_GET['type'];
		}
		elseif(isset($_COOKIE['sort']) && isset($_COOKIE['sort'])!='0')
		{
			$sorttype=$_COOKIE['sort'];
		}
		else
		{
			$sorttype='';
		}
		$this->load->model('show');
		$num=$this->show->totaltour('',$sorttype);
		$per_page=8;
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
			$data['page']['first']='themetour/index/1/'.$action.'/'.$sort.$this->config->item('url_suffix');
			$data['page']['end']='themetour/index/'.$count.'/'.$action.'/'.$sort.$this->config->item('url_suffix');
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
			for($i=1;$i<=$count;$i++)
			{
				$data['page']['plist'][$i]='termtour/index/'.$i.'/'.$action.'/'.$sort.$this->config->item('url_suffix');
			}
			$data['page']['pre']='themetour/index/'.$pagepre.'/'.$action.'/'.$sort.$this->config->item('url_suffix');
			$data['page']['next']='themetour/index/'.$pagenext.'/'.$action.'/'.$sort.$this->config->item('url_suffix');
		}
		else
		{
			$data['page']['first']='themetour/index/1'.$this->config->item('url_suffix');
			$data['page']['end']='themetour/index/'.$count.$this->config->item('url_suffix');
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
			for($i=1;$i<=$count;$i++)
			{
				$data['page']['plist'][$i]='themetour/index/'.$i.$this->config->item('url_suffix');
			}
			$data['page']['pre']='themetour/index/'.$pagepre.$this->config->item('url_suffix');
			$data['page']['next']='themetour/index/'.$pagenext.$this->config->item('url_suffix');
		}
		if(isset($sort) && $sort!='')
		{
			if($sort=='asc')
			{
				$data['sortday']='themetour/index/1/days/desc'.$this->config->item('url_suffix');
				$data['sortprice']='themetour/index/1/price/desc'.$this->config->item('url_suffix');
			}
			else
			{
				$data['sortday']='themetour/index/1/days/asc'.$this->config->item('url_suffix');
				$data['sortprice']='themetour/index/1/price/asc'.$this->config->item('url_suffix');
			}
		}
		else
		{
			$data['sortday']='themetour/index/1/days/asc'.$this->config->item('url_suffix');
			$data['sortprice']='themetour/index/1/price/asc'.$this->config->item('url_suffix');
			$sort='asc';
		}

		$data['count']=$count;
		$data['pagenow']=$page;
		$this->load->library('cimarkdown');
		$this->load->model('webpage');
		$this->webpage=new webpage();
		$type="theme_tour";
		$data['webinfo'] = $this->webpage->getpage($type);
		$data['dess']=$this->show->deslist();
		$data['theme']=$this->show->themelist();
		$data['tour']=$this->show->showthemetour($start,$per_page,$action,$sort,$sorttype);
		$data['dess']=$this->show->deslist();
		$this->load->view('web/landingpage-theme',$data);		
	}
}
?>