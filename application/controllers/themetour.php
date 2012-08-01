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
			for($i=1;$i<=$count;$i++)
			{
				$data['page']['plist'][$i]='termtour/index/'.$i.'/'.$action.'/'.$sort;
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
			for($i=1;$i<=$count;$i++)
			{
				$data['page']['plist'][$i]='themetour/index/'.$i;
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

		$data['count']=$count;
		$data['pagenow']=$page;
		$this->load->library('cimarkdown');
		$this->load->model('webpage');
		$this->webpage=new webpage();
		$type="theme_tour";
		$data['webinfo'] = $this->webpage->getpage($type);
		$data['dess']=$this->show->deslist();
		$data['theme']=$this->show->themelist();
		$data['tour']=$this->show->showthemetour($start,$per_page,$action,$sort);
		$data['dess']=$this->show->deslist();
		$this->load->view('web/landingpage-theme',$data);		
	}
	function searchtour()
	{
		$type=$_GET['searchtype'];
		$key=$_GET['key'];
		switch($type)
		{
			case 'destination': $field='destination';$bread='<a href="themetour">主题旅行</a> > 目的地 > '.$key;break;
			case 'theme': $field='theme';$bread='<a href="themetour">主题旅行</a> > 旅行主题 > '.$key;break;
			case 'holidays': $field='tags';$bread='<a href="themetour">主题旅行</a> > 节假日出行 > '.$key;break;
		}
		$this->load->model('webpage');
		$data['webinfo'] = $this->webpage->getpage('theme_tour');
		$this->load->model('show');
		$num=$this->show->counttour($field,$key);
		$per_page=5;
		$count=ceil($num/$per_page);
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
		}
		else
		{
			$page=1;
		}
		
		$start=($page*$per_page)-$per_page;
		
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
			$data['page']['end']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$count.'&&action='.$action.'&&sort='.$sort;
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
				$data['page']['plist'][$i]='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$i.'&&action='.$action.'&&sort='.$sort;
			}
			$data['page']['pre']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagepre.'&&action='.$action.'&&sort='.$sort;
			$data['page']['next']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$pagenext.'&&action='.$action.'&&sort='.$sort;
		}
		else
		{
			$data['page']['first']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page=1';
			$data['page']['end']='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$count;
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
				$data['page']['plist'][$i]='themetour/searchtour?searchtype='.$type.'&&key='.$key.'&&page='.$i;
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
		$data['title']=$key.'|主题旅行';
		if($type=='destination')
		{
			$data['desinfo']=$this->show->getdecinfo($key);
			$data['title']=$key;
		}
		else if($type=='holidays')
		{
			$data['title']=$key;
		}
		$data['count']=$count;
		$data['pagenow']=$page;
		$data['tour']=$this->show->tourtypelist($field,$key,$start,$per_page,$action,$sort);
		$data['bread']=$bread;
		$data['dess']=$this->show->deslist();
		$data['theme']=$this->show->themelist();
		$this->load->view('web/landingpage-theme',$data);	
	}
	
}
?>