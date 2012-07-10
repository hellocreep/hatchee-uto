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

	public function join()
	{
		$this->load->view('aboutus/join');
	}

	public function review()
	{
		$this->load->model('travel');
		$data['company']=$this->travel->notelist('公司出游');
		$data['theme']=$this->travel->notelist('主题旅行');
		$data['customize']=$this->travel->notelist('定制旅行');
		$this->load->view('aboutus/review',$data);
	}
	public function note()
	{
		$id=addslashes($_GET['id']);
		$this->load->model('travel');
		$data['note']=$this->travel->getnote($id);
		if(!$this->travel->getupnote($id))
		{
			$data['upnote']='';
		}
		else
		{
			$data['upnote']=$this->travel->getupnote($id);
			
		}
		if(!$this->travel->getnextnote($id))
		{
			
			$data['nextnote']='';
		}
		else
		{
			$data['nextnote']=$this->travel->getnextnote($id);
		}

		$this->load->view("aboutus/tripnote",$data);
	}
	public function tripnote()
	{
		$this->load->view('aboutus/tripnote');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */