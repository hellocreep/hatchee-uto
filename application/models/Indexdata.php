<?php
class Indexdata extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getterm()//获得活动排期线路
	{
		$this->db->where('tour_type','0');
		$this->db->limit('2');
		$this->db->order_by('Id','desc');
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->result_array();
	}
	function gettheme()//获得小包团线路
	{
		$this->db->where('tour_type','1');
		$this->db->limit('8');
		$this->db->order_by('days','desc');
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->result_array();
	}
	function getcompany()//获得公司出游的线路
	{
		$this->db->where('tour_type','2');
		$this->db->limit('9');
		$this->db->order_by('Id','desc');
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->result_array();
	}
	function getexpand()//获得拓展活动的线路
	{
		$this->db->limit('9');
		$this->db->order_by('Id','desc');
		$this->db->from('expand');
		$query=$this->db->get();
		return $query->result_array();
	}
	function gettravel()//获得游记
	{
		$this->db->limit('3');
		$this->db->order_by('Id','desc');
		$this->db->from('travel_note');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>