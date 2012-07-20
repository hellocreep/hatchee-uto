<?php
class Manage extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		session_start();
	}	
	public function index()
	{
			if(isset($_POST['sub']) && $_POST['sub']!='')
			{
				$uname= $this->security->xss_clean($_POST['name']);
				$upwd=md5($this->security->xss_clean($_POST['password']));
				$this->load->model('systemuser');
				$user= new SystemUser();
				$res=$user->checkUser($uname,$upwd);
				if($res)
				{
					$data['power']=$res[0]['level'];
				        	$_SESSION['username']=$uname;
				        	$_SESSION['power']=$res[0]['level'];
				        	$_SESSION['auth']=true;
				        	$data['name']=$uname;
				        	$this->load->vars($data);
					
					$this->load->view('admin/system_index');
				}
				else
				{
					$data['msg'] = '请正确输入用户名和密码';	
					$this->load->view('admin/system_login.html',$data);	
				}
			}
			else if(@$_SESSION['username'])
			{
				//$data['power']=$res[0]['level'];
			      //  	$_SESSION['username']=$uname;
			        	//$_SESSION['power']=$res[0]['level'];
			       // 	$data['name']=$uname;
			        //	$this->load->vars($data);
				$data['power'] = $_SESSION['power'];
				$data['name'] = $_SESSION['username'];
				$this->load->view('admin/system_index',$data);
			}
			else
			{	$data['msg'] = false;
				$this->load->view('admin/system_login.html',$data);
			}

	}
	
	public function loginout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['auth']);
		self::index();
	}
}
?>