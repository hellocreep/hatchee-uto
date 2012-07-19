<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companytour extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->model('company');
		$this->load->model('webpage');
		$type="company_tour";
		$data['webinfo'] = $this->webpage->getpage($type);
		$data['tour']=$this->company->getcompanytour();
		$data['note']=$this->company->getcompanynote();
		$data['expand']=$this->company->getcompanyexpand();
		$this->load->view('web/landingpage-company',$data);	
	}
	function postinquiry()
	{
		$inquiry=json_decode($_POST['data']);
		$arruser=array(
			'name'=>$inquiry->name,
			'email'=>$inquiry->email,
			'password'=>rand(100000,999999),
			'tel'=>$inquiry->tel,
			'qq'=>$inquiry->qq,
			'order'=>'',
			'avtar'=>'',
			'registered'=>date('Y-m-d H:i:s',time()),
			'logintime'=>''
		);
		$this ->load->model('member');
		$user = $this->member->addmember($arruser);
		$info=array(
			"user"=>$user[0]->Id,
			"uuid"=>'TM-C-'.time(),
			"tour"=>'0',
			"tour_time"=>$inquiry->tour_time,
			"people"=>$inquiry->people,
			"company"=>$inquiry->company,//公司名称
			"activity"=>$inquiry->expand,//公司拓展
			"purpose"=>$inquiry->train,//企业内训课程
			"train"=>$inquiry->aim,//达到的目地
			"other"=>$inquiry->other,
			"create_date"=>date('Y-m-d H:i:s',time()),
			"inquiry_type"=>'1'//订单类型 默认0  小包团  1 公司出游
		);
		$this->load->model('order');
		$res=$this->order->tailormade($info);
		$cusinfo=$this->order->checkcustomize($res);
		if($res)
		{
			$cusinfo=$this->order->checkcustomize($res);
			$this->sendmail($inquiry->name,$inquiry->email,$cusinfo['uuid']);
		}
	}
	public function sendmail($name,$email,$content)
	{
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
		$this->email->to($email);
		$this->email->subject('您好：'.$name);
		$this->email->message($content);
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
?>