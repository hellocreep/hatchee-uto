<?php
class Travel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function notelist($type)
	{
		$this->db->where('type',$type);
		$this->db->from('travel_note');
		$query=$this->db->get();
		return $query->result_array();
		
	}
	
	public function notecount(){
		$sql = "select Id from travel_note";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}

	public function gettravel($page,$step)
	{
		$start=($page-1)*$step;
		$sql="select * from travel_note limit ".$start.",".$step;
		$query=$this->db->query($sql);
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
	public function getupnote($id)
	{
		$this->db->select('min(Id) as id');
		$this->db->from('travel_note');
		$query=$this->db->get();
		$res=$query->row_array();
		if($id==$res['id'])
		{
			return false;
		}
		else
		{
			$this->db->select('Id,title');
			$this->db->where('Id < ',$id);
			$this->db->limit(1);
			$this->db->from('travel_note');
			$this->db->order_by('Id','desc');
			$query=$this->db->get();
			return $query->row_array();

		}
	}
	public function getnextnote($id)
	{
		$this->db->select('max(Id) as id');
		$this->db->from('travel_note');
		$query=$this->db->get();
		$res=$query->row_array();
		if($id==$res['id'])
		{
			return false;
		}
		else
		{
			$this->db->select('Id,title');
			$this->db->where('Id > ',$id);
			$this->db->limit(1);
			$this->db->from('travel_note');
			$this->db->order_by('Id');
			$query=$this->db->get();
			return $query->row_array();
		}
	}
}
?>