<?php 

	class Webpage extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();	
		}
		public function updatepage($data){

			$this->db->where('type',$data->type);
			$this->db->update('uto_web_page',$data);
			return $this->db->affected_rows();
		}

		public function getpage($type){
			$query=$this->db->query("select * from uto_web_page where type='".$type."'");
			$data=$query->result();
			return $data;
		}

	}
?>