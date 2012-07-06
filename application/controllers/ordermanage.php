<?php
class Ordermanage extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		session_start();
		$this->load->model('order');
		$this->order=new order();
	}
	public function orderlist()
	{	
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$this->load->model('order');
		$order=new Order();
		$orderinfo=$order->orderList( $page );
		echo json_encode($orderinfo);
	}
	public function countorder(){
		$data = $this->order->countorder();
		echo $data; 
	}
	public function addorder()
	{
		$data = json_decode($_POST['data']);
		$this ->load->model('member');
		$userinfo = array(
			'name'=>$data->name,
			'email'=>$data->email,
			'password'=>rand(100000,999999),
			'tel'=>$data->tel,
			'qq'=>$data->qq,
			'order'=>'',
			'avtar'=>'',
			'registered'=>date('Y-m-d H:i:s',time()),
			'logintime'=>''
		);
		$member = new Member();
		$user = $member->addmember($userinfo);
		$id_private=$data->is_private;
		$orderinfo = array(
			'uuid'=>uniqid(),
			'user'=>$user[0]->Id,
			'tour'=>$data->tid,
			'people'=>$data->people,
			'create_date'=>date('Y-m-d H:i:s',time()),
			'tour_term'=>$data->term,
			'tour_time'=>$data->tour_time,
			'car'=>$data->car,
			'comment'=>$data->comment
			);
		$this->load->model('order');
		$order = new Order();
		$res=$order->addorder($orderinfo);	
		if($res)
		{
			$this->sendmail($data->name,$data->email);
		}
		//echo $order->addorder($orderinfo);
	}
	public function delorder()
	{
		$power=$_SESSION['power'];
		if($power==1 || $power==0)
		{
		$id=$_POST['id'];
		$this->load->model('order');
		$order=new Order();
			if($order->delOrder($id))
			{
				$resinfo['msg']='订单删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='订单删除失败，请稍后再试！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你无权进行该操作！';
			$resinfo['status']=false;
		}
		echo json_encode($resinfo);
	}
	public function editorder(){
		$id=$_GET['oid'];
		$this->load->model('order');
		$order=new Order();
		$this->load->view('admin/updateorder');
	}
	
	public function getorder($condition)
	{
		echo $this->order->checkorder($condition);
	}
	public function checkorder()
	{
		$action='';
	}
	public function sendmail($name,$email)
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
		$this->email->subject('你好'.$name);
		$this->email->message('感谢你！');
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
	public function getcustomize()
	{
		
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$this->load->model('order');
		$data['custom']=$this->order->gettailormade($page);
		echo json_encode($data['custom']);
	}
	public function countcustomize(){
		$data = $this->order->counttailormade();
		echo $data; 
	}
	public function delcustomize()
	{	
		$id = $_POST['id'];
		$this->load->model('order');
		echo $this->order->delcustomize($id);
	}
}

?>