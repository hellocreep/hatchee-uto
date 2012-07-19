<?php 
class Webinquiry extends CI_Controller
{
	function __controller()
	{
		parent::__controller();
	}
	public function tailormade()
	{
		$this->load->model('member');
		$member = new Member();
		$info=json_decode($_POST['data']);
		$userdata=array(
			"name"=>$info->name,
			"email"=>$info->email,
			"password"=>rand(100000,999999),
			"tel"=>$info->tel,
			"qq"=>$info->qq,
			"city"=>$info->city,
			"avtar"=>'',
			"registered"=>date('Y-m-d H:i:s',time())
		);
		$user = $member->addmember($userdata);
		$data=array(
			"user"=>$user[0]->Id,
			"uuid"=>'TM-'.time(),
			"tour"=>'0',
			"tour_time"=>$info->tour_time,
			"car"=>$info->car,
			"people"=>$info->people,
			"add_day"=>$info->add_day,
			"add_des"=>$info->add_des,
			"tour_theme"=>'0',
			"other"=>$info->other,
			"special_day"=>$info->special_day
		);
		$this->load->model('order');
		$res=$this->order->tailormade($data);
		$cusinfo=$this->order->checkcustomize($res);
		if($res)
		{
			$cusinfo=$this->order->checkcustomize($res);
			$this->sendmail($info->name,$info->email,$cusinfo['uuid']);
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