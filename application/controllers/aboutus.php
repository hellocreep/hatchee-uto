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
		$this->load->model('tour');
		$data['company']=$this->travel->notelist('公司出游');
		for($i=0;$i<count($data['company']);$i++)
		{
			$res=$this->tour->showtour($data['company'][$i]['tour']);
			$data['company'][$i]['route_intro']=$res[0]->route_intro;
			$data['company'][$i]['intro']=$res[0]->intro;
		}
		
		$data['theme']=$this->travel->notelist('主题旅行');
		for($i=0;$i<count($data['theme']);$i++)
		{
			$res=$this->tour->showtour($data['theme'][$i]['tour']);
			$data['theme'][$i]['route_intro']=$res[0]->route_intro;
			$data['theme'][$i]['intro']=$res[0]->intro;
		}
		$data['customize']=$this->travel->notelist('定制旅行');
		for($i=0;$i<count($data['customize']);$i++)
		{
			$res=$this->tour->showtour($data['customize'][$i]['tour']);
			$data['customize'][$i]['route_intro']=$res[0]->route_intro;
			$data['customize'][$i]['intro']=$res[0]->intro;
		}
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