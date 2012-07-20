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
		$this->load->view('admin/travelnote/new_travelnote',$data);
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

	public function managenote(){
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
		$note=$this->travel->getnotelist($page,$step);
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
		if(empty($match[1]))
		{
			$img='assets/images/img.jpg';
		}
		else
		{
			$img=$match[1][0];
		}
		$images='';
		for($i=0;$i<4;$i++)
		{
			$arr=explode('/',$match[1][$i]);
			$config['new_image'] = 'uploads/images/expand'.$arr[2];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $match[1][$i];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 130;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$images.=$config['new_image'].",";
		}
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
			"thumb"=>$img,
			'images'=>$images,
			"company"=>$data->company,
			"people"=>$data->people
		);	
		echo $this->travel->add($travel);

	}
	public function noteupdate()
	{
		$id=$this->uri->segment(3);
		$this->load->model('travel');
		$data['note']=$this->travel->getnote($id);
		$this->load->model('tour');
		$data['tour']=$this->tour->getalltour();
		$this->load->view('admin/travelnote/update_travelnote',$data);
	}
	public function updatetravel()
	{	
		$this->load->model('travel');
		$this->travel=new Travel();
		$data=json_decode($_POST['data']);
		$content = $_POST['content'];
		$id=$data->id;
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
		$images='';
		for($i=0;$i<4;$i++)
		{
			$arr=explode('/',$match[1][$i]);
			$config['new_image'] = 'uploads/images/expand'.$arr[2];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $match[1][$i];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 130;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$images.=$config['new_image'].",";
		}

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
			"thumb"=>$img,
			'images'=>$images,
			"company"=>$data->company,
			"people"=>$data->people
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