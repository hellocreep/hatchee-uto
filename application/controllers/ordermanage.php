<?php
class Ordermanage extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		session_start();
		$this->load->helper('url');
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
		$this->load->model('tour');
		$tour=$this->tour->gettourname($data->tid);
		$orderinfo = array(
			'uuid'=>uniqid(),
			'user'=>$user[0]->Id,
			'tour'=>$data->tid,
			'people'=>$data->people,
			'day'=>$data->day,
			'create_date'=>date('Y-m-d H:i:s',time()),
			'tour_term'=>$data->term,
			'tour_time'=>$data->tour_time,
			'car'=>$data->car,
			'comment'=>$data->comment
			);
		$this->load->model('order');
		$order = new Order();
		$res=$order->addorder($orderinfo);
		$content='<table class="formtab">
		<tbody>
		<tr><td>线路名称：</td><td class="r_name">'.$tour['title'].'</td></tr>
		<tr><td>发团期数：</td><td class="r_term">'.$data->tour_time.'</td></tr>
		<tr><td>天数：</td><td class="r_day">'.$data->day.'</td></tr>
		<tr><td>参加人数：</td><td>'.$data->people.'</td></tr>
		</tbody>
		</table>
		<table class="formtab">
		<tbody>
		<tr><td>姓名：</td><td>'.$data->name.'</td></tr>
		<tr><td>手机：</td><td>'.$data->tel.'</td></tr>
		<tr><td>邮箱：</td><td>'.$data->email.'</td></tr>
		<tr><td>QQ：</td><td>'.$data->qq.'</td></tr>
		<tr><td>来自那个城市：</td><td>'.$data->city.'</td></tr>
		<tr><td>其他需求：</td><td>'.$data->comment.'</td></tr>
		</tbody>
		</table>';
		if($res['uuid'])
		{
			//$this->sendmailtosystem($content);
			$this->sendmailtocustomer($data->name,$data->email,$res['uuid']);//将订单信息发送给客人
		}
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
		$id=addslashes($_GET['oid']);
		$type = addslashes($_GET['type']);
		if( $type == 'normal' ){
			$this->load->model('order');
			$order=new Order();
			$data['order']=$order->getorder($id);
			$this->load->view('admin/updateorder',$data);
		}
		if( $type == 'custom' ){
			$this->load->model('order');
			$order=new Order();
			$data['order']=$order->getcustomize($id);
			if($data['order']['inquiry_type']=='1')
			{
				$this->load->view('admin/update_company',$data);
			}
			else
			{
				$this->load->view('admin/update_custom',$data);
			}
		}
	}
	public function updateorder()
	{
		$id=$_POST['order_id'];
		$is_worked = 0;
		if( isset( $_POST['is_worked']) ){
			$is_worked = 1;
		}
		$conment=array("comment"=>$_POST['comment'],
				"is_worked"=>$is_worked,
				"handle_time"=>date('Y-m-d H:i:s',time())
				);
		$this->load->model('order');
		$result=$this->order->updateorder($id,$conment);
		if($result)
		{
			echo "<script>location.href='../manage#order-manage-list';</script>";
		}
		else
		{
			echo "<script>location.href='../manage#order-manage-list';</script>";
		}
	}
	public function updatecustomize()
	{
		$id=$_POST['order_id'];
		$is_worked = 0;
		if( isset( $_POST['is_worked']) ){
			$is_worked = 1;
		}
		$conment=array("other"=>$_POST['comment'],
				"is_worked"=>$is_worked,
				"handle_time"=>date('Y-m-d H:i:s',time())
				);
		$this->load->model('order');
		$result=$this->order->updatecustomize($id,$conment);
		if($result)
		{
			echo "<script>location.href='../manage#custome-order-manage-list';</script>";
		}
		else
		{
			echo "<script>location.href='../manage#custome-order-manage-list';</script>";
		}
	}
	public function getorder($condition)
	{
		echo $this->order->checkorder($condition);
	}
	public function sendmailtosystem($content)
	{
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.exmail.qq.com';
		$config['smtp_user']='no-replay@utotrip.com';
		$config['smtp_pass']='uto51766';
		$config['charset']='utf-8';
		$config['wordwarp']='TRUE';
		$config['mailtype']='html';
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('no-replay@utotrip.com');
		$this->email->to('bm@utotrip.com');
		$this->email->subject('友途订单邮件');
		$this->email->message($content);
		$this->email->send();
		
	}
	public function sendmailtocustomer($name,$email,$content)
	{
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.exmail.qq.com';
		$config['smtp_user']='no-replay@utotrip.com';
		$config['smtp_pass']='uto51766';
		$config['charset']='utf-8';
		$config['wordwarp']='TRUE';
		$config['mailtype']='html';
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('no-replay@utotrip.com');
		$this->email->to($email);
		$this->email->subject('你好'.$name);
		$this->email->message('您的订单号：'.$content);
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
	public function handleinquiry()//未处理的订单
	{
		$this->load->model("order");
		$this->order->handleinquiry();
	}
	public function searchinquiry()
	{
		$id=$_POST['id'];
		$this->load->model('order');
		$data['inquiry']=$this->order->getorder($id);
	}
	public function checkcustomize()
	{
		$id=$this->uri->segment(3);
		$this->load->model('order');
		$data['customize']=$this->order->getcustomize($id);
	}

}

?>