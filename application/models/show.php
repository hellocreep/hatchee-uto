<?php
class Show extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function totaltour($term)
	{
		if($term!='')
		{
			$this->db->where('is_private','0');
		}
		else
		{
			$this->db->where('is_private','1');
		}
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function showthemetour($offset,$num,$action)
	{
		
		$this->db->where('is_private','1');
		$this->db->limit($num,$offset);
		$this->db->from('tour');
		if($action!='')
		{
			$this->db->order_by("days","desc");
		}

		$query=$this->db->get();
		return $query->result_array();
	}
	public function showtermtour($offset,$num,$action)
	{
		
		$this->db->where('is_private','0');
		$this->db->limit($num,$offset);
		$this->db->from('tour');
		if($action!='')
		{
			$this->db->order_by("days","desc");
		}

		$query=$this->db->get();
		return $query->result_array();
	}
}
?>