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
			$arr=explode('/',$match[1][0]);
			$config['new_image'] = 'uploads/images/expand/'.$arr[2];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $match[1][0];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 220;
            $config['height'] = 140;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$img=$config['new_image'];
			if(count($match[1])>=5)
			{
				for($i=0;$i<5;$i++)
				{
					$arr=explode('/',$match[1][$i]);
					$images.=$this->makePhotoThumb($match[1][$i],'uploads/images/expand_thumbnails/'.$arr[2]).',';
				}
			}
			else
			{
				for($i=0;$i<count($match[1]);$i++)
				{
					$arr=explode('/',$match[1][$i]);
					$images.=$this->makePhotoThumb($match[1][$i],'uploads/images/expand_thumbnails/'.$arr[2]).',';
				}
			}
		}
		$images='';
		
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
		$images='';
		if(empty($match[1]))
		{
			$img='assets/images/img.jpg';
		}
		else
		{
			$arr=explode('/',$match[1][0]);
			$config['new_image'] = 'uploads/images/expand/'.$arr[2];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $match[1][0];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 220;
            $config['height'] = 140;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$img=$config['new_image'];
			$this->image_lib->clear();
			if(count($match[1])>=5)
			{
				for($i=0;$i<5;$i++)
				{
					$arr=explode('/',$match[1][$i]);
					$images.=$this->makePhotoThumb($match[1][$i],'uploads/images/expand_thumbnails/'.$arr[2]).',';
				}
			}
			else
			{
				for($i=0;$i<count($match[1]);$i++)
				{
					$arr=explode('/',$match[1][$i]);
					$images.=$this->makePhotoThumb($match[1][$i],'uploads/images/expand_thumbnails/'.$arr[2]).',';
				}
			}
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
	function makePhotoThumb($srcFile,$photo_small)
	{  
		$data = @getimagesize($srcFile);
		if($data[0]<$data[1]){
			$out=($data[1]*100)/$data[0];
			$dstW =100;
			$dstH = $out;
		}else{
			$out=($data[0]*100)/$data[1];	
			$dstW = $out;
			$dstH = 100;
		}
		switch($data[2])
		{  
			case 1: //图片类型，1是GIF图  
			$im = @ImageCreateFromGIF($srcFile);  
			break;  
			case 2: //图片类型，2是JPG图  
			$im = @imagecreatefromjpeg($srcFile);  
			break;  
			case 3: //图片类型，3是PNG图  
			$im = @ImageCreateFromPNG($srcFile);  
			break;  
		 }  

		 $srcW=ImageSX($im);  
		 $srcH=ImageSY($im);  
		 $ni=imagecreatetruecolor(100,100);  
		 imagecopyresized($ni,$im,0,0,0,0,$dstW,$dstH,$srcW,$srcH);  
		 ImageJpeg($ni,$photo_small,100);  
		return $photo_small;
	 } 
}
?>