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
		$this->db->update("uto_images",$data);
		return $this->db->affected_rows();
	}
	public function getimg($id)
	{	
		$this->db->cache_off();
		$sql="select * from uto_images where Id='".$id."'";
		$query=mysql_query($sql);
		$row=mysql_fetch_array($query);
		return $row;
	}
	public function getimginfo($id)
	{
		$query=$this->db->query("select * from uto_images where Id='".$id."'");
		$data=$query->result();
		return $data;
	}
	public function delimg($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("uto_images");
		return $this->db->affected_rows();
	}
	public function updateimg($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("uto_images",$data);
		return $this->db->affected_rows();
	}
	public function upload($data)
	{
		$sql="select * from uto_images where path='".$data['path']."' or middle='".$data['path']."' or small='".$data['path']."'";
		$query=$this->db->query($sql);
		if($query->result())
		{
			return $query->result();
		}
		else
		{
			$query=$this->db->insert('uto_images',$data);
			$id=$this->db->insert_id();
			$query=$this->db->query("select * from uto_images where Id='".$id."'");
			return $query->result();
			
		}
	}
	public function uploadimg($data)
	{
		$query=$this->db->insert('uto_images',$data);
		return $this->db->insert_id();
	}
}
?>