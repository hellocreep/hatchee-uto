<?php 
	class Tour extends CI_Model{
		public function __construct()
		   {
		     parent::__construct();
		     $this -> load -> database();
		}
		public function managetour( $page ) {
			$step = 15;
			$begin = ($page-1) * $step;
			$sql = "select Id,name,edit_time,who_edit,price from tour limit ".$begin.",".$step;
			$query=$this->db->query($sql);
			$data=$query->result();
			return $data;	
		}
		
		public function tourcount(){
			$sql = "select Id from tour";
			$query = $this->db->query($sql);
			$data = $query->num_rows();
			return $data;
		}

		public function whoedit($tid){
			$this->db->where('Id',$tid);
			$this->db->from('tour');
			$query=$this->db->get();
			return $query->row_array();
		}
		public function setWhoEdit($tid,$data)
		{
			$this->db->where('Id',$tid);
			$this->db->update('tour',$data);
			return $this->db->affected_rows();
		}
		public function addtour($data){
			$query=$this->db->insert('tour',$data);
			return $this->db->affected_rows();
		}
		public function tourtheme(){
			$query=$this->db->query('select * from tour_theme');
			$data = $query->result();
			return $data;
		}
		public function destination()
		{
			$sql="select * from destination";
			$query=$this->db->query($sql);
			$data=$query->result();
			return $data;
		}
		public function destinations()
		{
			//$sql="select name from destination";
			$this->db->select('name');
			$this->db->from('destination');
			$query=$this->db->get();
			return $query->result_array();
		}
		public function traveltime()
		{
			$sql="select * from travel_time";
			$query=$this->db->query($sql);
			$data=$query->result();
			return $data;
		}
		public function groups()
		{
			$sql="select * from activity_groups";
			$query=$this->db->query($sql);
			$data=$query->result();
			return $data;
		}
		public function deltour($id)
		{
			$this->db->where('Id',$id);
			$this->db->delete('tour');
			return $this->db->affected_rows();
		}
		public function showtour($id)
		{	
			$this->db->cache_off();
			$query=$this->db->query( "select * from tour where Id=".$id );
			$data=$query->result();
			return $data;
		}
		public function updatetour($tid,$data)
		{
			$this->db->where("Id",$tid);
            			$this->db->update("tour",$data);
			return $this->db->affected_rows();
		}
		public function addimginfo($id,$data)
		{
			$this->db->where("Id",$id);
            			$this->db->update("images",$data);
			return $this->db->affected_rows();
		}
		public function checkedit($id)
		{
			$query=$this->db->query("select who_edit from tour where Id='".$id."'");
			$data = $query->result();
			return $data;
		}
		public function setedit($id,$data)
		{
			$this->db->where("Id",$id);
           			 $this->db->update("tour",$data);
			return $this->db->affected_rows();
		}
		public function addroute($data)
		{
			$query=$this->db->insert('route',$data);
			return $this->db->insert_id();
				
		}
		public function updateroute($id,$data)
		{
			$this->db->where("Id",$id);
           			$this->db->update("route",$data);
			return $this->db->affected_rows();
				
		}
		public function delroute($id)
		{
			$this->db->where("Id",$id);
            			$this->db->delete("route");
			return $this->db->affected_rows();	
		}
		public function getroute($id)
		{

			$this->db->where('Id',$id);
			$this->db->from('route');
			$query=$this->db->get();
			return $query->row_array();
		}
		public function getallroute()
		{
			$query=$this->db->query("select Id,course from route");
			$data = $query->result();
			return $data;
		}
		public function getimginfo($id)
		{
			$query=$this->db->query("select * from images where Id='".$id."'");
			$data=$query->result();
			return $data;
		}
		public function delimg($id)
		{
			$this->db->where("Id",$id);
			$this->db->delete("images");
			return $this->db->affected_rows();
		}
		public function updateimg($id,$data)
		{
			$this->db->where("Id",$id);
			$this->db->update("images",$data);
			return $this->db->affected_rows();
		}
		public function priceupdate($id,$data)
		{
			$this->db->where("Id",$id);
			$this->db->update("tour",$data);
		}

		public function getalltour(){
			$query=$this->db->query("select Id,name from tour" );
			$data = $query->result();
			return $data;
		}
	}
?>