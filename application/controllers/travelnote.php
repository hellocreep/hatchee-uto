<?php
class Travelnote extends CI_Controller
{	
	function __controller()
	{
		parent::__controller();
		$this->load->helper('url');
		session_start();
	}

	public function newnote(){
		$this->load->model('tour');
		$this->tour = new Tour();
		$data['tour'] = $this->tour->getalltour();
		$this->load->view('admin/new_travelnote',$data);
	}

	public function notelist()
	{	
		$this->load->model('travel');
		$this->travel=new Travel();
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$step = 15;
		$note=$this->travel->gettravel($page,$step);
		echo json_encode( $note );
	}

	public function notecount(){
		$this->load->model('travel');
		$this->travel=new Travel();
		$data = $this->travel->notecount();
		echo $data; 
	}

	public function addtravel()
	{
		$this->load->model('travel');
		$this->travel=new Travel();
		// $data=json_decode($_POST['data']);
		// $content = $_POST['content'];
		$content = $_POST['note'];
		$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$content,$match);
		if(empty($match[1]))
		{
			$img='assets/images/img.jpg';
		}
		else
		{
			$img=$match[1][0];
		}
		
		$travel=array(
			"tour"=>$_POST['tid'],//$data->tour,
			"type"=>$_POST['type'],//$data->type,
			"title"=>$_POST['title'],//$data->title,
			"description"=>$_POST['des'],//$data->description,
			"keywords"=>$_POST['keywords'],//$data->keywords,
			"content"=>$_POST['note'],//$content,
			"editor"=>$_POST['editor'],//$data->editor,
			"tour_time"=>$_POST['tour_time'],//$data->tour_time,
			"edit_time"=>date('Y-m-d H:i:s',time()),
			"thumb"=>$img,
			"company"=>$_POST['company'],//$data->company,
			"people"=>$_POST['people'],//$data->people
		);	
		if($this->travel->add($travel))
		{
			echo "<script>window.location.href='../manage#travelnote-manage-list';</script>";
		}

	}
	public function noteupdate()
	{
		$id=$this->uri->segment(3);
		$this->load->model('travel');
		$data['note']=$this->travel->getnote($id);
		$this->load->model('tour');
		$data['tour']=$this->tour->getalltour();
		$this->load->view('admin/update_travelnote.php',$data);
	}
	public function updatetravel()
	{	
		$this->load->model('travel');
		$this->travel=new Travel();
		//$data=json_decode($_POST['data']);
		//$content = $_POST['content'];
		//$id=$data->id;
		$content = $_POST['note'];
		$id = $_POST['nid'];
		$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$content,$match);
		if(empty($match[1]))
		{
			$img='assets/images/img.jpg';
		}
		else
		{
			$img=$match[1][0];
		}
		$travel=array(
			"tour"=>$_POST['tid'],//$data->tour,
			"type"=>$_POST['type'],//$data->type,
			"title"=>$_POST['title'],//$data->title,
			"description"=>$_POST['des'],//$data->description,
			"keywords"=>$_POST['keywords'],//$data->keywords,
			"content"=>$_POST['note'],//$content,
			"editor"=>$_POST['editor'],//$data->editor,
			"tour_time"=>$_POST['tour_time'],//$data->tour_time,
			"edit_time"=>date('Y-m-d H:i:s',time()),
			"thumb"=>$img,
			"company"=>$_POST['company'],//$data->company,
			"people"=>$_POST['people'],//$data->people
		);
		$this->travel->update($id,$travel);
		echo "<script>window.location.href='../manage#travelnote-manage-list';</script>";
	}
	public function deltravel()
	{
		$this->load->model('travel');
		$this->travel=new Travel();
		$id=$_POST['id'];
		echo $this->travel->del($id);
	}
}
?>