<?php
class Travel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this -> load -> database();
	}

	public function notelist($page){
		$step = 15;
		$begin = ($page-1) * $step;
		$sql = "select Id,title,edit_time from travel_note limit ".$begin.",".$step;
		$query=$this->db->query($sql);
		$data=$query->result();
		return $data;
	}

	public function notecount(){
		$sql = "select Id from travel_note";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}

	public function gettravel()
	{
		$this->db->from('travel_note');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function add($data)
	{
		$this->db->insert('travel_note',$data);
		return $this->db->insert_id();
	}
	public function update($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('travel_note',$data);
		return $this->db->affected_rows();
	}
	public function del($id)
	{
		$this->db->where("Id",$id);
        $this->db->delete("travel_note");
		return $this->db->affected_rows();	
	}
	public function getnote($id)
	{
		$this->db->where("Id",$id);
		$this->db->from('travel_note');
		$query=$this->db->get();
		return $query->row_array();
	}
}
?>