<?php
class Member extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function memberlist( $page )
	{	
		$step = 15;
		$begin = ($page-1) * $step;
		$sql = "select Id,name,email,tel,logintime from users limit ".$begin.",".$step;
		$query=$this->db->query($sql);
		$data=$query->result();
		return $data;
	}

	public function addmember($data){
		$query=$this->db->insert('users',$data);
		$query =  $this->db->query("select * from users where email='".$data['email']."'");
		return $query->result();
	}

	public function membercount(){
		$sql = "select Id from users";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}
	public function delmember($id){
		$this->db->where('Id',$id);
		$this->db->delete('users');
		return $this->db->affected_rows();		
	}
	public function getmember($id)
	{
		$query=$this->db->query("select * from users where Id='".$id."'");
		$data=$query->result();
		return $data;
	}
}
?>