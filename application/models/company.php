<?php
class Company extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getcompanytour()
	{
		$this->db->where('tour_type','2');
		$this->db->from('tour');
		$query=$this->db->get();
		return $query->result_array();
	}
	function getextour()
	{
		$this->db->where('type','��˾���ΰ���');
		$this->db->from('travel_note');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>