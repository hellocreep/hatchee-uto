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
		$content='<table class="formtab">
		<tbody>
		<tr><td>目的地：</td><td>'.$info->add_des.'</td></tr>
		<tr><td>特别纪念：</td><td>'.$info->special_day.'</td></tr>
		<tr><td>增加天数：</td><td class="r_day">'.$info->add_day.'</td></tr>
		<tr><td>参加人数：</td><td>'.$info->people.'</td></tr>
		</tbody>
		</table>
		<table class="formtab">
		<tbody>
		<tr><td>姓名：</td><td>'.$info->name.'</td></tr>
		<tr><td>手机：</td><td>'.$info->tel.'</td></tr>
		<tr><td>邮箱：</td><td>'.$info->email.'</td></tr>
		<tr><td>QQ：</td><td>'.$info->qq.'</td></tr>
		<tr><td>来自那个城市：</td><td>'.$info->city.'</td></tr>
		<tr><td>其他需求：</td><td>'.$info->other.'</td></tr>
		</tbody>
		</table>';
		$this->load->model('order');
		$res=$this->order->tailormade($data);
		$cusinfo=$this->order->checkcustomize($res);
		if($res)
		{
			$cusinfo=$this->order->checkcustomize($res);
			$this->load->library('sendmail');
			$result1=$this->sendmail->send('no-replay@utotrip.com','bm@utotrip.com','来自友途的订单',$content,$attachment=null);
			
			$result2=$this->sendmail->send('no-replay@utotrip.com',$data->email,$data->name,$cusinfo['uuid'],$attachment=null);//将订单信息发送给客人
			if($result2)
			{
				$data['status']=true;
				$data['result']="<font color='red'>我们已将您的订单信息发送到您的邮箱，请注意查收！</font>";
			}
			else
			{
				$data['status']=false;
				$data['result']="<font color='red'>邮件发送失败，可能是由系统邮箱或密码不匹配造成！</font>";
			}
			echo json_encode($data['result']);
		}
	}
	
}
?>