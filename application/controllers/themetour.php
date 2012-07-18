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
				$data['sortday']='themetour/index/1/days/'.$sort;
				$data['sortprice']='themetour/index/1/price/'.$sort;
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
		$type=$_GET['searchtype'];
		$key=$_GET['key'];
		switch($type)
		{
			case 'destination': $field='destination';$bread='<a href="themetour">主题旅行</a> > 目的地 > '.$key;break;
			case 'theme': $field='theme';$bread='<a href="themetour">旅行主题</a> > 目的地 > '.$key;break;
			case 'holidays': $field='tags';$bread='<a href="themetour">节假日出行</a> > 目的地 > '.$key;break;
		}
		$this->load->model('webpage');
		$data['webinfo'] = $this->webpage->getpage('theme_tour');
		$this->load->model('show');
		$num=$this->show->counttour($field,$key);
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
		}
		else
		{
			$page=1;
		}
		$per_page=5;
		if(isset($page) && $page!='')
		{
			$start=($page*$per_page)-$per_page;
		}
		else
		{
			$start=0;
		}
		if(isset($_GET['action']))
		{
			$action=$_GET['action'];
		}
		else
		{
			$action='';
		}
		if(isset($_GET['sort']))
		{
			$sort=$_GET['sort'];
		}
		else
		{
			$sort='';
		}
		
		if(isset($action) &&$action!='')
		{
			$data['page']['first']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1&&action='.$action.'&&sort='.$sort;
			$data['page']['end']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$num.'&&action='.$action.'&&sort='.$sort;
			if($page>1)
			{
				$pagepre=$page-1;
			}
			else
			{
				$pagepre=1;
			}
			if($page<$num)
			{
				$pagenext=$page+1;
			}
			else
			{
				$pagenext=$num;
			}
			$data['page']['pre']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagepre.'&&action='.$action.'&&sort='.$sort;
			$data['page']['next']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagenext.'&&action='.$action.'&&sort='.$sort;
		}
		else
		{
			$data['page']['first']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1';
			$data['page']['end']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$num;
			if(isset($page) && $page>1)
			{
				$pagepre=$page-1;
			}
			else
			{
				$pagepre=1;
			}
			if(isset($page) && $page<$num)
			{
				$pagenext=$page+1;
			}
			else
			{
				$pagenext=$num;
			}
			$data['page']['pre']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagepre;
			$data['page']['next']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagenext;
		}
		if(isset($sort) && $sort!='')
		{
			if($sort=='asc')
			{
				$sortnew='desc';
			}
			else
			{
				$sortnew='asc';
			}
			$data['sortday']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1&&action=days&&sort='.$sortnew;
			$data['sortprice']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1&&action=price&&sort='.$sortnew;
		}
		else
		{
			$sort='asc';
			$data['sortday']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1&&action=days&&sort='.$sort;
			$data['sortprice']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1&&action=price&&sort='.$sort;
		}
		$data['tour']=$this->show->tourtypelist($field,$key,$start,$per_page,$action,$sort);
		$data['bread']=$bread;
		$this->load->view('web/landingpage-theme',$data);	
	}
	
}
?>