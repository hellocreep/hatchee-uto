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
	public function sendmail()
	{
		$data=json_decode($_POST['data']);
		$str="客户姓名：".$data->name."<br>手机：".$data->tel."</br>Email：".$data->email."</br>联系方式：".$data->contact."</br>主题：".$data->theme."</br>更多信息：".$data->more;
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.163.com';
		$config['smtp_user']='remaintears@163.com';
		$config['smtp_pass']='cz19871127';
		$config['charset']='utf-8';
		$config['wordwarp']='TRUE';
		$config['mailtype']='html';
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('remaintears@163.com');
		$this->email->to('363897046@qq.com');
		$this->email->subject('你好'.$$data->name);
		$this->email->message($str);
		if(!$this->email->send())
		{
			$data['status']=false;
			$data['result']="<font color='red'>邮件发送失败，可能是由系统邮箱或密码不匹配造成！</font>";
		}
		else
		{
			$data['status']=true;
			$data['result']="<font color='red'>我们已将您的订单信息发送到您的邮箱，请注意查收！</font>";
		}
		echo json_encode($data['result']);
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */