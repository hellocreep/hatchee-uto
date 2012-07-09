<?php
class Order extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function orderlist( $page ){
		$step = 15;
		$begin = ($page-1) * $step;
		$query=$this->db->query('select inquiry.Id as id,inquiry.user as uid,inquiry.tour as tid,inquiry.status as status,inquiry.uuid as orderid,inquiry.people as num,inquiry.create_date as ordertime,inquiry.is_worked as is_worked,users.name as username,tour.name as tourname from inquiry,users,tour where inquiry.user=users.id and inquiry.tour=tour.id order by id desc limit ' .$begin.','.$step);
		$data=$query->result();
		return $data;
	}

	public function countorder(){
		$sql = "select Id from inquiry";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}

	public function addorder($data){
		$query=$this->db->insert('inquiry',$data);
		return $this->db->affected_rows();
	}

	public function delorder($id){
		$this->db->where('Id',$id);
		$this->db->delete('inquiry');
		return $this->db->affected_rows();
	}
	public function getorder($id){
		
		$sql="select u.name,t.name as tourname,o.Id,o.uuid,o.people,o.tour_term,o.tour_time,o.create_date,o.comment,o.is_worked,t.is_private from users as u left join inquiry as o on u.id=o.user left join tour as t on o.tour=t.id where o.Id=".$id;
		$query=$this->db->query($sql);
		$data=$query->row_array();
		return $data;
	}
	public function updateorder($id,$conment)
	{
		$this->db->where('Id',$id);
		$this->db->update('inquiry',$conment);
		return $this->db->affected_rows();
	}
	public function checkorder($condition)
	{
		$sql="select * from users as u left join inquiry as o on u.id=o.user left join tour as t on o.tour=t.id where o.uuid=".$condition." or u.tel='".$condition."'";
		$query=$this->db->query($sql);
		$data=$query->row_array();
		return $data;
	}
	public function tailormade($data)
	{
		$this->db->insert('custom_inquiry',$data);
		return $this->db->insert_id();
	}
	public function checkcustomize($id)
	{
		$this->db->where('Id',$id);
		$this->db->from('custom_inquiry');
		$query=$this->db->get();
		return $query->row_array();
	}
	public function gettailormade($page)
	{
		$step = 15;
		$begin = ($page-1) * $step;
		$query=$this->db->query("select c.Id as id, c.uuid as orderid,c.create_date as ordertime,c.is_worked as is_worked,c.tour_time as tourtime,u.name as username,u.Id as uid from custom_inquiry as c left join users as u on c.user=u.Id limit " .$begin.",".$step);
		$data=$query->result();
		return $data;
	}
	public function counttailormade(){
		$sql = "select Id from custom_inquiry";
		$query = $this->db->query($sql);
		$data = $query->num_rows();
		return $data;
	}
	public function delcustomize($id){
		$this->db->where('Id',$id);
		$this->db->delete('custom_inquiry');
		return $this->db->affected_rows();
	}
	public function getcustomize($id)
	{
		$sql="select c.Id,c.uuid,c.car,c.people,c.tour_time,c.tour_theme,c.add_des,c.special_day,c.create_date,c.other as comment,c.is_worked,u.name,t.name as tourname from users as u left join custom_inquiry as c on u.Id=c.user left join tour as t on c.tour=t.Id where c.Id=".$id;
		$query=$this->db->query($sql);
		return $query->row_array();
	}
	public function updatecustomize($id,$conment)
	{
		$this->db->where('Id',$id);
		$this->db->update('custom_inquiry',$conment);
		return $this->db->affected_rows();
	}
	public function handleinquiry()
	{
			
	}
}
?>