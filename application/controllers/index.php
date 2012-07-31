<?php
class Index extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function tour()
	{
		$des=$this->uri->segment(3);
		$this->load->model('show');
		$dess=$this->show->getdes($des);
		$key=$dess['title'];
		$bread='<a href="themetour">主题旅行</a> > 目的地 > '.$key;
		$this->load->model('webpage');
		$data['webinfo'] = $this->webpage->getpage('theme_tour');
		
		$num=$this->show->alltour($des);
		
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
			$data['page']['first']='index/tour/'.$des.'/1/'.$action.'/'.$sort;
			$data['page']['end']='index/tour/'.$des.'/'.$count.'/'.$action.'/'.$sort;
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
				$data['page']['plist'][$i]='index/tour/'.$des.'/'.$i.'/'.$action.'/'.$sort;
			}
			$data['page']['pre']='index/tour/'.$des.'/'.$pagepre.'/'.$action.'/'.$sort;
			$data['page']['next']='index/tour/'.$des.'/'.$pagenext.'/'.$action.'/'.$sort;
		}
		else
		{
			$data['page']['first']='index/tour/'.$des.'/1';
			$data['page']['end']='index/tour/'.$des.'/'.$count;
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
				$data['page']['plist'][$i]='index/tour/'.$des.'/'.$i;
			}
			$data['page']['pre']='index/tour/'.$des.'/'.$pagepre;
			$data['page']['next']='index/tour/'.$des.'/'.$pagenext;
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
			$data['sortday']='index/tour/'.$des.'/1/days/'.$sortnew;
			$data['sortprice']='index/tour/'.$des.'&&/1/price/'.$sortnew;
		}
		else
		{
			$sort='asc';
			$data['sortday']='index/tour/'.$des.'/1/days/'.$sort;
			$data['sortprice']='index/tour/'.$des.'/1/price/'.$sort;
		}
		$data['title']=$des.'|主题旅行';
		
		$data['desinfo']=$this->show->getdes($des);
		$data['title']=$key;

		$data['count']=$count;
		$data['pagenow']=$page;
		$data['tour']=$this->show->tourthemelist($dess['name'],$start,$per_page,$action,$sort);
	
		$data['bread']=$bread;	
		$data['dess']=$this->show->deslist();
		$data['theme']=$this->show->themelist();
		$this->load->view('web/landingpage-theme',$data);	
	
	}
	function themetour()
	{
		$des=$this->uri->segment(3);
		$this->load->model('show');
		$dess=$this->show->gettheme($des);
		$key=$dess['name'];
		$bread='<a href="themetour">主题旅行</a> > 旅行主题 > '.$key;
		$this->load->model('webpage');
		$data['webinfo'] = $this->webpage->getpage('theme_tour');
		
		$num=$this->show->alltour($des);
		
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
			$data['page']['first']='index/themetour/'.$des.'/1/'.$action.'/'.$sort;
			$data['page']['end']='index/themetour/'.$des.'/'.$count.'/'.$action.'/'.$sort;
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
				$data['page']['plist'][$i]='index/themetour/'.$des.'/'.$i.'/'.$action.'/'.$sort;
			}
			$data['page']['pre']='index/themetour/'.$des.'/'.$pagepre.'/'.$action.'/'.$sort;
			$data['page']['next']='index/themetour/'.$des.'/'.$pagenext.'/'.$action.'/'.$sort;
		}
		else
		{
			$data['page']['first']='index/themetour/'.$des.'/1';
			$data['page']['end']='index/themetour/'.$des.'/'.$count;
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
				$data['page']['plist'][$i]='tour/index/'.$des.'/'.$i;
			}
			$data['page']['pre']='index/themetour/'.$des.'/'.$pagepre;
			$data['page']['next']='index/themetour/'.$des.'/'.$pagenext;
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
			$data['sortday']='index/themetour/'.$des.'/1/days/'.$sortnew;
			$data['sortprice']='index/themetour/'.$des.'&&/1/price/'.$sortnew;
		}
		else
		{
			$sort='asc';
			$data['sortday']='index/themetour/'.$des.'/1/days/'.$sort;
			$data['sortprice']='index/themetour/'.$des.'/1/price/'.$sort;
		}
		$data['title']=$des.'|主题旅行';
		
		$data['desinfo']=$this->show->gettheme($des);;
		$data['title']=$key;

		$data['count']=$count;
		$data['pagenow']=$page;
		$data['tour']=$this->show->themetourlist($dess['name'],$start,$per_page,$action,$sort);
	
		$data['bread']=$bread;	
		$data['dess']=$this->show->deslist();
		$data['theme']=$this->show->themelist();
		$this->load->view('web/landingpage-theme',$data);
	}
}
?>