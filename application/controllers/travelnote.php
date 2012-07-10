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
		$note=$this->travel->notelist($page,$step);
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
		$data=json_decode($_POST['data']);
		$content = $_POST['content'];
		$pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$content,$match);
		$img=$match[1][0];
		//echo $img;
		$travel=array(
			"tour"=>$data->tour,
			"type"=>$data->type,
			"title"=>$data->title,
			"description"=>$data->description,
			"keywords"=>$data->keywords,
			"content"=>$content,
			"editor"=>$data->editor,
			"tour_time"=>$data->tour_time,
			"edit_time"=>date('Y-m-d H:i:s',time()),
			"thumb"=>substr($img,5)
		);	
		if($this->travel->add($travel))
		{
			echo "<script>window.loaction.href='../aboutus/review';</script>"
		}

	}
	public function noteupdate()
	{
		$id=$this->uri->segment(3);
		$this->load->model('travel');
		$data['note']=$this->travel->getnote($id);
		$this->load->model('tour');
		$data['tour']=$this->tour->getalltour();
		//print_r($data['note']);
		//$this->load->view('admin/update_travelnote.php',$data);
	}
	public function updatetravel()
	{	
		$this->load->model('travel');
		$this->travel=new Travel();

		$data=json_decode($_POST['data']);
		$content = $_POST['content'];
		$id=$data->id;
		$travel=array(
			"tour"=>$data->tour,
			"type"=>$data->type,
			"title"=>$data->title,
			"description"=>$data->description,
			"keywords"=>$data->keywords,
			"content"=>$content,
			"editor"=>$data->editor,
			"tour_time"=>$data->tour_time,
			"edit_time"=>date('Y-m-d H:i:s',time())
		);
		echo $this->travel->update($id,$travel);
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