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
		$content='<table><tbody><tr><td>公司名称：</td><td>'.$inquiry->company.'</td></tr>
		<tr><td>公司拓展活动：</td><td>'.$inquiry->expand.'</td></tr>
		<tr><td>企业内训课程：</td><td>'.$inquiry->train.'</td></tr>
		<tr><td>这趟出游要达到的目的：</td><td>'.$inquiry->aim.'</td></tr>
		<tr><td>参加人数：</td><td>'.$inquiry->people.'</td></tr>
		<tr><td>出发时间：</td><td>'.$inquiry->tour_time.'</td></tr>
		</tbody>
		</table>
		<table class="formtab">
		<tbody>
		<tr><td>姓名：</td><td>'.$inquiry->name.'</td></tr>
		<tr><td>手机：</td><td>'.$inquiry->tel.'</td></tr>
		<tr><td>邮箱：</td><td>'.$inquiry->email.'</td></tr>
		<tr><td>QQ：</td><td>'.$inquiry->qq.'</td></tr>
		<tr><td>其他需求：</td><td>'.$inquiry->other.'</td></tr>
		</tbody>
		</table>';
		$this->load->model('order');
		$res=$this->order->tailormade($info);
		$cusinfo=$this->order->checkcustomize($res);
		if($res)
		{
			$cusinfo=$this->order->checkcustomize($res);
			$this->load->library('sendmail');
			$result1=$this->sendmail->send('no-replay@utotrip.com','bm@utotrip.com','来自友途的公司出游定制订单',$content,$attachment=null);
			if($result1)
			{
				$result2=$this->sendmail->send('no-replay@utotrip.com',$inquiry->email,$inquiry->name,$cusinfo['uuid'],$attachment=null);//将订单信息发送给客人
				if($result2)
				{
					$result['uuid']=$cusinfo['uuid'];
					$result['status']=true;
					$result['result']="<font color='red'>我们已将您的订单信息发送到您的邮箱，请注意查收！</font>";
				}
				else
				{
					$result['uuid']=$cusinfo['uuid'];
					$result['status']=false;
					$result['result']="<font color='red'>邮件发送失败，可能是由系统邮箱或密码不匹配造成！</font>";
				}
			}
			echo json_encode($result);
		}
	}

}
?>