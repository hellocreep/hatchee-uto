<?php
class Expandtour extends CI_Controller
{
	function __controller()
	{
		parent::__controller();
		$this->load->helper('url');
		session_start();
	}

	public function expand(){
		$id=addslashes($_GET['id']);
		$this->load->model('expand');
		$data['expand'] = $this->expand->getexpand($id);
		if(!$this->expand->getupexpand($id))
		{
			$data['upexpand']='';
		}
		else
		{
			$data['upexpand']=$this->expand->getupexpand($id);
			
		}
		if(!$this->expand->getnextexpand($id))
		{
			
			$data['nextexpand']='';
		}
		else
		{
			$data['nextexpand']=$this->expand->getnextexpand($id);
		}

		$this->load->view("web/expand",$data);
	}

	public function newexpand(){

		$this->load->view('admin/expand/new_expand');
	}
	function expendlist()
	{
		$this->load->model('expand');
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$step = 15;
		$note=$this->expand->getexpandlist($page,$step);
		echo json_encode( $note );
	}
	public function expandcount(){
		$this->load->model('expand');
		$this->expand=new expand();
		$data = $this->expand->expandcount();
		echo $data; 
	}


	public function addexpand()
	{
		$this->load->model('expand');
		$this->expand=new Expand();
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
		
		$travel=array(
			"title"=>$data->title,
			"des"=>$data->description,
			"keywords"=>$data->keywords,
			"intro"=>$data->intro,
			"day"=>$data->day,
			"thumbnail"=>$img,
			"content"=>$content,
			"edit_time"=>date('Y-m-d H:i:s',time())
		);	
		echo $this->expand->add($travel);

	}
	public function expandupdate()
	{
		$id=$this->uri->segment(3);
		$this->load->model('expand');
		$data['expand']=$this->expand->getexpand($id);
		$this->load->view('admin/expand/update_expand',$data);
	}
	public function updateexpand()
	{	
		$this->load->model('expand');
		$this->expand=new Expand();
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
		$travel=array(
			"title"=>$data->title,
			"des"=>$data->description,
			"keywords"=>$data->keywords,
			"intro"=>$data->intro,
			"day"=>$data->day,
			"thumbnail"=>$img,
			"content"=>$content,
			"edit_time"=>date('Y-m-d H:i:s',time())
		);
		echo $this->expand->update($id,$travel);
	}
	public function delexpand()
	{
		$this->load->model('expand');
		$this->expand=new Expand();
		$id=$_POST['id'];
		echo $this->expand->del($id);
	}
}
?>