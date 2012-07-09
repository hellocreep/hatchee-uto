<?php
class Customize extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('tour');
		$data['theme']=$this->tour->tourtheme();
		$data['des']=$this->tour->destination();
		$this->load->view('web/customize',$data);
	}
	public function customize_order()
	{
		$cusinfo=json_decode($_POST['data']);
		$datauser=array(
			"name"=>$cusinfo->name,
			"email"=>$cusinfo->email,
			"password"=>rand(111111,999999),
			"tel"=>$cusinfo->tel,
			"qq"=>$cusinfo->qq,
			"city"=>$cusinfo->city
		);
		$this->load->model('member');
		$user=$this->member->addmember($datauser);
		$data=array(
			"uuid"=>'TM-'.time(),
			"user"=>$user[0]->Id,
			"tour"=>'0',
			"tour_time"=>$cusinfo->tour_time,
			"car"=>$cusinfo->car,
			"people"=>$cusinfo->people,
			"add_day"=>$cusinfo->day,
			"add_des"=>$cusinfo->place,
			"tour_theme"=>$cusinfo->theme,
			"other"=>$cusinfo->comment,
			"special_day"=>$cusinfo->special_day,
			"create_date"=>date('Y-m-d H:i:s',time())
		);
		$this->load->model('order');
		$res=$this->order->tailormade($data);
		if($res)
		{
			$info=$this->order->checkcustomize($res);
			$this->sendmail($cusinfo->name,$cusinfo->email,$info['uuid']);
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
			$data['uuid']=$content;
			$data['status']=false;
			$data['result']="<font color='red'>邮件发送失败，可能是由系统邮箱或密码不匹配造成！</font>";
		}
		else
		{
			$data['uuid']=$content;
			$data['status']=true;
			$data['result']="<font color='red'>我们已将您的订单信息发送到您的邮箱，请注意查收！</font>";
		}
		echo json_encode($data);
	}	
}
?>