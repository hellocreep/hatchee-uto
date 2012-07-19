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
	public function counttour($field,$key)
	{
		$sql="select id from tour where ".$field." LIKE '%".$key."%'";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	public function tourtypelist($field,$key,$start,$per_page,$action,$sort)
	{
		if($action!='')
		{
			if($action=='price')
			{
				$orderby=" order by price ".$sort.', days '.$sort;
			}
			else
			{
				$orderby=" order by days ".$sort.', price '.$sort;
			}
		}
		else
		{
			$orderby='';
		}
		$sql="select * from tour where ".$field." LIKE '%".$key."%' ".$orderby." limit ".$start.",".$per_page;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
}
?>