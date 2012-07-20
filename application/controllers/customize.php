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
		$data['des']=$this->tour->destinations();
		$this->load->model('image');
		for($i=0;$i<count($data['des']);$i++)
		{
			$arr=$this->image->getimg($data['des'][$i]['img']);
			$data['des'][$i]['img']=$arr['small'];
		}
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
		$content='<table><tr><td>想去的地点：</td><td>'.$cusinfo->place.'</td></tr>
		<tr><td>旅行主题：</td><td>'.$cusinfo->theme.'</td></tr>
		<tr><td>车型：</td><td>'.$cusinfo->car.'</td></tr>
		<tr><td>天数：</td><td class="r_day">'.$cusinfo->day.'</td></tr>
		<tr><td>参加人数：</td><td>'.$cusinfo->people.'</td></tr>
		</tbody>
		</table>
		<table class="formtab">
		<tbody>
		<tr><td>姓名：</td><td>'.$cusinfo->name.'</td></tr>
		<tr><td>手机：</td><td>'.$cusinfo->tel.'</td></tr>
		<tr><td>邮箱：</td><td>'.$cusinfo->email.'</td></tr>
		<tr><td>QQ：</td><td>'.$cusinfo->qq.'</td></tr>
		<tr><td>来自那个城市：</td><td>'.$cusinfo->city.'</td></tr>
		<tr><td>其他需求：</td><td>'.$cusinfo->comment.'</td></tr>
		</tbody>
		</table>';
		$this->load->model('order');
		$res=$this->order->tailormade($data);
		if($res)
		{
			$info=$this->order->checkcustomize($res);
			$this->load->library('sendmail');
			$result1=$this->sendmail->send('no-replay@utotrip.com','bm@utotrip.com','来自友途的定制订单',$content,$attachment=null);
			if($result1)
			{
				$result2=$this->sendmail->send('no-replay@utotrip.com',$cusinfo->email,$cusinfo->name,$info['uuid'],$attachment=null);//将订单信息发送给客人
				if($result2)
				{
					$result['uuid']=$info['uuid'];
					$result['status']=true;
					$result['result']="<font color='red'>我们已将您的订单信息发送到您的邮箱，请注意查收！</font>";
				}
				else
				{
					$result['uuid']=$info['uuid'];
					$result['status']=false;
					$result['result']="<font color='red'>邮件发送失败，可能是由系统邮箱或密码不匹配造成！</font>";
				}
			}
			echo json_encode($result);
		}
	}
	
}
?>