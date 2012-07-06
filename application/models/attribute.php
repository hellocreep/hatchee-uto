<?php
class Attribute extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this -> load -> database();
	}
	/**************主题**********/
	public function listtheme()
	{
		$query=$this->db->query('select * from tour_theme');
		return $query->result();
	}
	public function addtheme($data)
	{
		$query=$this->db->insert('tour_theme',$data);
		return $this->db->insert_id();
	}
	public function deltheme($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("tour_theme");
		return $this->db->affected_rows();
	}
	/**************目的地**********/
	public function listdes()
	{
		$query=$this->db->query('select * from destination');
		return $query->result();
	}

	public function getdes($id){
		$this->db->where('Id',$id);
		$this->db->from("destination");
		$query=$this->db->get();
		return $query->row_array();
	}

	public function updatedes($id,$data){
		$this->db->where('Id', $id);
		$this->db->update('destination', $data);
		return $this->db->affected_rows();
	}

	public function adddes($data)
	{
		$query=$this->db->insert('destination',$data);
		return $this->db->insert_id();
	}
	public function deldes($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("destination");
		return $this->db->affected_rows();
	}
	/**********出行时间*****************************/
	public function listtime()
	{
		$query=$this->db->query('select * from travel_time');
		return $query->result();
	}
	public function addtime($data)
	{
		$query=$this->db->insert('travel_time',$data);
		return $this->db->insert_id();
	}
	public function deltime($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("travel_time");
		return $this->db->affected_rows();
	}
	/*******************活动群组**********************************/
	public function listgroup()
	{
		$query=$this->db->query('select * from activity_groups');
		return $query->result();
	}
	public function addgroup($data)
	{
		$query=$this->db->insert('activity_groups',$data);
		return $this->db->insert_id();
	}
	public function delgroup($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("activity_groups");
		return $this->db->affected_rows();
	}
}
?>