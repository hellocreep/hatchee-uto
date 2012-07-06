<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('aboutus/aboutus');
	}

	public function mission()
	{
		$this->load->view('aboutus/mission');
	}

	public function leader()
	{
		$this->load->view('aboutus/leader');
	}

	public function contactus()
	{
		$this->load->view('aboutus/contactus');
	}

	public function review()
	{
		$step='5';
		$this->load->model('travel');
		$num=$this->travel->notecount();
		$count=ceil($num/$step);
		$page=$this->uri->segment(3);
		if($page=='')
		{
			$page=1;
		}
		$data['page']['first']='aboutus/review/1';
		$data['page']['end']='aboutus/review/'.$count;
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
		$data['page']['pre']='aboutus/review/'.$pagepre;
		$data['page']['next']='aboutus/review/'.$pagenext;
		$data['note']=$this->travel->notelist($page,$step);
		$this->load->view('aboutus/review',$data);
	}
	public function note()
	{
		$id=addslashes($_GET['id']);
		$this->load->model('travel');
		$data['note']=$this->travel->getnote($id);
		$data['upnote']=$this->travel->getupnote($id);
		$data['nextnote']=$this->travel->getnextnote($id);
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//$this->load->view("aboutus/tripnote",$data);
	}
	public function tripnote()
	{
		$this->load->view('aboutus/tripnote');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */