<?php
class Usermanage extends CI_Controller{
 function __construct()
    {
		parent::__construct();
		session_start();
    }
	public function index()
	{
		$this->load->model('systemuser');
		$user=new SystemUser();
		$data=$user->userList();
		echo json_encode($data);
	}
	public function addadmin()
	{
		$data=json_decode($_POST['data']);
		$uname=$data->name;
		$upwd=md5($data->password);
		$email=$data->email;
		$level=$data->level;
		$userdata=array('name' => $uname,'password' => $upwd, 'email' => $email, 'level' => $level);
		$this->load->model('systemuser');
		$user= new SystemUser();
		if($user->checkadd($uname))
		{
			//$resinfo['id']=3;
			//$resinfo['msg']='该用户已经存在，不能重复添加！';
			echo false;
		}
		else
		{
			$res=$user->addUser($userdata);
			//$resinfo['id']=$res;
			if($res)
			{
				//$resinfo['msg']='添加成功！';
				echo true;
			}
			else 
			{
				//$resinfo['msg']='添加用户失败,请正确填写用户信息！';	
				echo false;
			}
		}
		//echo $resinfo;
	}
	public function deladmin()
	{
		if($_SESSON['power']==1 || $_SESSON['power']==0)
		{
			$uid=$_POST['uid'];
			$this->load->model('systemuser');
			$user=new Systemuser();
			$res=$user->deluser($uid);
			$resinfo['id']=$res;
			if($res)
			{
				$resinfo['msg']='用户删除成功！';
				$resinfo['status']=true;
				
			}
			else
			{
				$resinfo['msg']='用户删除失败，请稍后再试！';
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
	public function updateadmin()
	{
		$uid=$_POST['uid'];
		$userdata=json_decode($_POST['data']);
		if($userdata->password=='')
		{
			$data=array('name' => $userdata->name, 'email' => $userdata->email, 'level' => $userdata->level);
		}
		else
		{
			$data=array('name' => $userdata->name,'password' => md5($userdata->password), 'email' => $userdata->email, 'level' => $userdata->level);
		}
		$this->load->model('systemuser');
		$user=new Systemuser();
		$res=$user->updateuser($uid,$data);
		$resinfo['id']=$res;
		if($res)
		{
			//$resinfo['msg']='用户信息修改成功！';
			echo true;
		}
		else
		{
			$resinfo['msg']='用户信息修改失败,请稍后再试！';
			echo false;
		}
		//echo $resinfo;
	}
}
?>
