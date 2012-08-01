<?php
class Order extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function orderlist($page){
		$step = 15;
		$begin = ($page-1) * $step;
		$query=$this->db->query('select inquiry.Id as id,inquiry.user as uid,inquiry.tour as tid,inquiry.status as status,inquiry.uuid as orderid,inquiry.people as num,inquiry.create_date as ordertime,inquiry.is_worked,inquiry.handle_time,users.name as username,tour.name as tourname from uto_inquiry,uto_users,uto_tour where uto_inquiry.user=uto_users.id and uto_inquiry.tour=uto_tour.id order by is_worked asc limit ' .$begin.','.$step);
		$data=$query->result();
		return $data;
	}

	public function countorder(){
		$sql = "select Id from uto_inquiry";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}

	public function addorder($data){
		$this->db->insert('uto_inquiry',$data);
		$id=$this->db->insert_id();
		$this->db->select('uuid');
		$this->db->where('Id',$id);
		$this->db->from('uto_inquiry');
		$query=$this->db->get();
		return $query->row_array();
	}

	public function delorder($id){
		$this->db->where('Id',$id);
		$this->db->delete('uto_inquiry');
		return $this->db->affected_rows();
	}
	public function getorder($id){
		
		$sql="select u.name,t.name as tourname,o.Id,o.uuid,o.people,o.tour_term,o.tour_time,o.create_date,o.comment,o.is_worked,t.tour_type from uto_users as u left join uto_inquiry as o on u.id=o.user left join tour as t on o.tour=t.id where o.Id=".$id;
		$query=$this->db->query($sql);
		$data=$query->row_array();
		return $data;
	}
	public function updateorder($id,$conment)
	{
		$this->db->where('Id',$id);
		$this->db->update('uto_inquiry',$conment);
		return $this->db->affected_rows();
	}
	public function checkorder($condition)
	{
		$sql="select * from uto_users as u left join uto_inquiry as o on u.id=o.user left join uto_tour as t on o.tour=t.id where o.uuid=".$condition." or u.tel='".$condition."'";
		$query=$this->db->query($sql);
		$data=$query->row_array();
		return $data;
	}
	public function tailormade($data)
	{
		$this->db->insert('uto_custom_inquiry',$data);
		return $this->db->insert_id();
	}
	public function checkcustomize($id)
	{
		$this->db->where('Id',$id);
		$this->db->from('uto_custom_inquiry');
		$query=$this->db->get();
		return $query->row_array();
	}
	public function gettailormade($page)
	{
		$step = 15;
		$begin = ($page-1) * $step;
		$query=$this->db->query("select c.Id as id, c.uuid as orderid,c.create_date as ordertime,c.is_worked,c.handle_time,c.tour_time as tourtime,u.name as username,u.Id as uid from uto_custom_inquiry as c left join uto_users as u on c.user=u.Id order by is_worked limit " .$begin.",".$step);
		$data=$query->result();
		return $data;
	}
	public function counttailormade(){
		$sql = "select Id from uto_custom_inquiry";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}
	public function delcustomize($id){
		$this->db->where('Id',$id);
		$this->db->delete('uto_custom_inquiry');
		return $this->db->affected_rows();
	}
	public function getcustomize($id)
	{
		$sql="select c.Id,c.uuid,c.car,c.people,c.tour_time,c.tour_theme,c.add_des,c.special_day,c.create_date,c.other as comment,c.is_worked,c.company,c.activity,c.purpose,c.train,c.inquiry_type,u.name,t.name as tourname from uto_users as u left join uto_custom_inquiry as c on u.Id=c.user left join tour as t on c.tour=t.Id where c.Id=".$id;
		$query=$this->db->query($sql);
		return $query->row_array();
	}
	public function updatecustomize($id,$conment)
	{
		$this->db->where('Id',$id);
		$this->db->update('uto_custom_inquiry',$conment);
		return $this->db->affected_rows();
	}
	public function handleinquiry()
	{
			$query=$this->db->query('select uto_inquiry.Id as id,uto_inquiry.user as uid,uto_inquiry.tour as tid,uto_inquiry.status as status,uto_inquiry.uuid as orderid,uto_inquiry.people as num,uto_inquiry.create_date as ordertime,uto_inquiry.is_worked,uto_inquiry.handle_time,uto_users.name as username,uto_tour.name as tourname from uto_inquiry,uto_users,uto_tour where uto_inquiry.user=uto_users.id and uto_inquiry.tour=uto_tour.id and inquiry.is_worked=0');
			$data=$query->result();
			return $data;
	}
}
?>