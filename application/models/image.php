<?php
class Image extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function addimginfo($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("images",$data);
		return $this->db->affected_rows();
	}
	public function getimg($id)
	{	
		$this->db->cache_off();
		$sql="select * from images where Id='".$id."'";
		$query=mysql_query($sql);
		$row=mysql_fetch_array($query);
		return $row;
	}
	public function getimginfo($id)
	{
		$query=$this->db->query("select * from images where Id='".$id."'");
		$data=$query->result();
		return $data;
	}
	public function delimg($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("images");
		return $this->db->affected_rows();
	}
	public function updateimg($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("images",$data);
		return $this->db->affected_rows();
	}
	public function upload($url)
	{
		$sql="select * from images where path='".$url."' or small='".$url."'";
		$query=$this->db->query("select * from images where path='".$url."' or small='".$url."'");
		if($query->result())
		{
			return $query->result();
		}
		else
		{
			$query=$this->db->query("insert into images (path) values ('".$url."')");
			$id=$this->db->insert_id();
			$query=$this->db->query("select * from images where Id='".$id."'");
			return $query->result();
			
		}
	}
	public function uploadimg($data)
	{
		$query=$this->db->insert('images',$data);
		return $this->db->insert_id();
	}
}
?>