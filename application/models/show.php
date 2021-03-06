<?php
class Show extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function totaltour($term,$sort)
	{
		if($term!='')
		{
			$this->db->where('tour_type','0');
		}
		else
		{
			if($sort!='')
			{
				$this->db->where('tour_type',$sort);
			}
			else
			{
				$this->db->where('tour_type !=','0');
				$this->db->where('tour_type !=','2');
			}
		}
		$this->db->where('ispublish','1');
		$this->db->from('uto_tour');
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function showthemetour($offset,$num,$action,$sort,$sorttype)
	{
		if($sorttype!='')
		{
			$this->db->where('tour_type',$sorttype);
		}
		else
		{
			$this->db->where('tour_type !=','0');
			$this->db->where('tour_type !=','2');
		}
		$this->db->where('ispublish','1');
		$this->db->limit($num,$offset);
		$this->db->from('uto_tour');
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
		else
		{
			$this->db->order_by("sortid",'asc');
		}

		$query=$this->db->get();
		return $query->result_array();
	}
	public function showtermtour($offset,$num,$action,$sort)
	{
		
		$this->db->where('tour_type','0');
		$this->db->where('ispublish','1');
		$this->db->limit($num,$offset);
		$this->db->from('uto_tour');
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
		else
		{
			$this->db->order_by("sortid",'asc');
		}

		$query=$this->db->get();
		return $query->result_array();
	}
	public function counttour($field,$key)
	{
		$sql="select id from uto_tour where ispublish='1' and tour_type !=2 and ".$field." LIKE '%".$key."%'";
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
			$orderby=' order by sortid asc';
		}
		$sql="select * from uto_tour where ispublish='1' and tour_type !=2 and ".$field." LIKE '%".$key."%' ".$orderby." limit ".$start.",".$per_page;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function getdecinfo($key)
	{
		$this->db->select('title,des,keywords,name,synopsis');
		$this->db->where('name',$key);
		$this->db->from('uto_destination');
		$query=$this->db->get();
		return $query->row_array();
	}
	public function newestnote()
	{
		$this->db->select('Id,title,content,editor,tour_time,thumb');
		$this->db->limit('1');
		$this->db->order_by('Id','desc');
		$this->db->from('uto_travel_note');
		$query=$this->db->get();
		return $query->row_array();

	}
	public function alltour($key,$keyid)
	{
		$sql="select id from uto_tour where ispublish='1' and tour_type !=2 and destination LIKE '%".$key."%' or desid like '".$keyid."' order by sortid asc";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	public function getdes($key)
	{
		$this->db->where('filename',$key);
		$this->db->from('uto_destination');
		$query=$this->db->get();
		return $query->row_array();

	}
	public function gettheme($key)
	{
		$this->db->where('filename',$key);
		$this->db->from('uto_tour_theme');
		$query=$this->db->get();
		return $query->row_array();
	}
	public function tourthemelist($key,$keyid,$start,$per_page,$action,$sort)
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
			$orderby=' order by sortid asc';
		}
		$sql="select * from uto_tour where ispublish='1' and tour_type !=2 and destination LIKE '%".$key."%' or desid like '".$keyid."' ".$orderby." limit ".$start.",".$per_page;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function themetourlist($key,$start,$per_page,$action,$sort)
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
			$orderby=' order by sortid asc';
		}
		$sql="select * from uto_tour where ispublish='1' and tour_type !=2 and theme LIKE '%".$key."%' ".$orderby." limit ".$start.",".$per_page;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function deslist()
	{
		$this->db->select('name,filename');
		$this->db->where('isshow','1');
		$this->db->order_by('term','asc');
		$this->db->from('uto_destination');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function themelist()
	{
		$this->db->select('name,filename');
		$this->db->where('isshow','1');
		$this->db->order_by('term','asc');
		$this->db->from('uto_tour_theme');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>