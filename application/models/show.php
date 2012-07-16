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
			$this->db->where('tour_type','0');
		}
		else
		{
			$this->db->where('tour_type','1');
		}
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function showthemetour($offset,$num,$action,$sort)
	{
		
		$this->db->where('tour_type','1');
		$this->db->limit($num,$offset);
		$this->db->from('tour');
		if($action!='')
		{
			if($action=='price')
			{
				$this->db->order_by("price",$sort);
				$this->db->order_by("days",$sort);

			}
			else
			{
				$this->db->order_by("days",$sort);
				$this->db->order_by("price",$sort);
			}
		}

		$query=$this->db->get();
		return $query->result_array();
	}
	public function showtermtour($offset,$num,$action,$sort)
	{
		
		$this->db->where('tour_type','0');
		$this->db->limit($num,$offset);
		$this->db->from('tour');
		if($action!='')
		{
			if($action=='price')
			{
				$this->db->order_by("price",$sort);
				$this->db->order_by("days",$sort);

			}
			else
			{
				$this->db->order_by("days",$sort);
				$this->db->order_by("price",$sort);
			}
		}

		$query=$this->db->get();
		return $query->result_array();
	}
}
?>