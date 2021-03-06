<?php 
class Expand extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function expandlist($type)
	{
		$this->db->where('type',$type);
		$this->db->from('uto_expand');
		$query=$this->db->get();
		return $query->result_array();
		
	}
	
	public function expandcount(){
		$sql = "select Id from uto_expand";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}

	public function getexpandlist($page,$step)
	{
		$start=($page-1)*$step;
		$sql="select Id,title,edit_time from uto_expand limit ".$start.",".$step;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function add($data)
	{
		$this->db->insert('uto_expand',$data);
		return $this->db->insert_id();
	}
	public function update($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('uto_expand',$data);
		return $this->db->affected_rows();
	}
	public function del($id)
	{
		$this->db->where("Id",$id);
        $this->db->delete("uto_expand");
		return $this->db->affected_rows();	
	}
	public function getexpand($id)
	{
		$this->db->where("Id",$id);
		$this->db->from('uto_expand');
		$query=$this->db->get();
		return $query->row_array();
	}
	public function getupexpand($id)
	{
		$this->db->select('min(Id) as id');
		$this->db->from('uto_expand');
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
			$this->db->from('uto_expand');
			$this->db->order_by('Id','desc');
			$query=$this->db->get();
			return $query->row_array();

		}
	}
	public function getnextexpand($id)
	{
		$this->db->select('max(Id) as id');
		$this->db->from('uto_expand');
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
			$this->db->from('uto_expand');
			$this->db->order_by('Id');
			$query=$this->db->get();
			return $query->row_array();
		}
	}
	public function addhits($id)
	{
		$sql="UPDATE uto_expand SET hits = hits+1 where Id='".$id."'";
		$this->db->query($sql);
	}
}
?>