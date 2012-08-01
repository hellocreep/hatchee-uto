<?php
class Systemuser extends CI_Model{
    var $name;
    var $pwd;
    var $email;
    var $level;
    function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
    function checkuser($name,$pwd)
	{
		$sql="select * from uto_admin where name='".$name."' and password='".$pwd."'";
		$query=$this->db->query($sql);
		if($query->num_rows>0)
		{
			$data = $query->result_array();
			return $data;
		}
		else
		{
			return false;
		}
	}
	function adduser($data)
	{
		$query=$this->db->insert('uto_admin',$data);
		return $this->db->affected_rows();
	}
	function checkadd($name)
	{
		$this->db->query("select * from uto_admin where name='".$name."'");
		return $this->db->affected_rows();
	}
	function userlist()
	{
		$query=$this->db->query('select Id,name,email,level from uto_admin');
		$data = $query->result();
		return $data;
	}
	function updateuser($uid,$data)
	{
		  $this->db->where("id",$uid);
          $this->db->update("uto_admin",$data);
		return $this->db->affected_rows();
	}
	function deluser($uid)
	{
		$this->db->where('Id',$uid);
		$this->db->delete('uto_admin');
		return $this->db->affected_rows();
	}
}
?>