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
		$user = $this->member->addmember($userinfo);
		$info=array(
			"user"=>$user[0]->Id,
			"uuid"=>'TM-C-'.time(),
			"tour"=>'0',
			"tour_time"=>$inquiry->tour_time,
			"people"=>$inquiry->people,
			"company"=>$inquiry->company,//��˾����
			"activity"=>$inquiry->activity,//��˾��չ
			"purpose"=>$inquiry->purpose,//��ҵ��ѵ�γ�
			"train"=>$inquery->train,//�ﵽ��Ŀ��
			"other"=>$inquiry->other,
			"inquiry_type"=>'1'//�������� Ĭ��0  С����  1 ��˾����
		);
		$this->load->model('order');
		$res=$this->order->tailormade($info);
		$cusinfo=$this->order->checkcustomize($res);
		if($res)
		{
			$cusinfo=$this->order->checkcustomize($res);
			$this->sendmail($info->name,$info->email,$cusinfo['uuid']);
		}
	}
}
?>