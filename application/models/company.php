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
		$this->db->from('uto_tour');
		$query=$this->db->get();
		return $query->result_array();
	}
	function getcompanynote()
	{
		$this->db->where('type','公司出游案例');
		$this->db->from('uto_travel_note');
		$query=$this->db->get();
		return $query->result_array();
	}
	function getcompanyexpand()
	{
		$this->db->from('uto_expand');
		$query=$this->db->get();
		return $query->result_array();

	}
}
?>