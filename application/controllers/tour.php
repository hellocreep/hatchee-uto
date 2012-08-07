<?php
class Tour extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
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
			$data['page']['first']='tour/index/'.$des.'/1/'.$action.'/'.$sort;
			$data['page']['end']='tour/index/'.$des.'/'.$count.'/'.$action.'/'.$sort;
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
				$data['page']['plist'][$i]='tour/index/'.$des.'/'.$i.'/'.$action.'/'.$sort;
			}
			$data['page']['pre']='tour/index/'.$des.'/'.$pagepre.'/'.$action.'/'.$sort;
			$data['page']['next']='tour/index/'.$des.'/'.$pagenext.'/'.$action.'/'.$sort;
		}
		else
		{
			$data['page']['first']='tour/index/'.$des.'/1';
			$data['page']['end']='tour/index/'.$des.'/'.$count;
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
			$data['page']['pre']='tour//'.$des.'/'.$pagepre;
			$data['page']['next']='tour//'.$des.'/'.$pagenext;
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
			$data['sortday']='tour/index/'.$des.'/1/days/'.$sortnew;
			$data['sortprice']='tour/index/'.$des.'&&/1/price/'.$sortnew;
		}
		else
		{
			$sort='asc';
			$data['sortday']='tour/index/'.$des.'/1/days/'.$sort;
			$data['sortprice']='tour/index/'.$des.'/1/price/'.$sort;
		}
		$data['title']=$des.'|主题旅行';
		
		$data['desinfo']=$this->show->getdes($des);
		$data['title']=$key;

		$data['count']=$count;
		$data['pagenow']=$page;
		$data['tour']=$this->show->tourthemelist($dess['name'],$start,$per_page,$action,$sort);
	
		$data['bread']=$bread;	
		//$this->load->helper('file');
		$this->load->view('web/landingpage-theme',$data);	
	   /* $lianglong=$this->output->get_output();
	    if ( !write_file('./application/views/web/'.$des.'.html', $lianglong))
	    {
		  $this->load->view('web/landingpage-theme',$data);	
	    }
	    else
	    {
		  echo 'File written!';
	    }*/
	}
}
?>