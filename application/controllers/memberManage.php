<?php
class Membermanage extends CI_Controller
{
	var $member;
	function __construct()
	{
		parent::__construct();
		$this->load->model('member');
		$this->member=new Member();
	}
	public function memberlist()
	{	
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$memberinfo=$this->member->memberlist( $page );
		echo json_encode($memberinfo);
	}

	public function membercount(){
		$data = $this->member->membercount();
		echo $data; 
	}

	public function delmember(){
		$id=$_POST['id'];

		echo $this->member->delMember($id);
	}
	public function getmenber()
	{
		$id=$_POST['id'];
		$info=$this->member->getMember($id);
		echo json_encode($info);
	}
}
?>