<?php 
class Tourmanage extends CI_Controller{
	function __construct()
    {
		parent::__construct();
		session_start();
    }
	
	function index(){
		if(isset($_POST['page']) &&$_POST['page']!='')
		{
			$page = $_POST['page'];
		}
		else
		{
			$page=1;
		}
		$this->load->model('tour');
		$tour=new Tour();
		$data = $this->tour->managetour( $page );
		echo json_encode($data);
	}

	function tourcount(){
		$this->load->model('tour');
		$tour = new Tour();
		$data = $this->tour->tourcount();
		echo $data; 
	}

	function newtour(){
		if(@$_SESSION['username'])
		{
			$this->load->model('tour');
			$tour=new Tour();
			//获得route
			$data['routeinfo']=$tour->getallroute();
			//获得主题
			$data['theme']=$tour->tourtheme();
			//获得目的地
			$data['destination']=$tour->destination();
			//获得出行时间
			$data['traveltime']=$tour->traveltime();
			//获得活动群体
			$data['groups']=$tour->groups();
			$this->load->view('admin/newtour',$data);
		}
		else
		{
				$data['msg'] = '请先登录！';
				$this->load->view('admin/system_login.html',$data);
		}

	}
	function addimginfo()
	{
		$this->load->model('tour');
		$tour=new Tour();
		$imginfo=json_decode($_POST['data']);
		for($i=0;$i<count($imginfo);$i++)
		{
			$data=array(
				'alt'=>$imginfo[$i]->alt,
				'tags'=>$imginfo[$i]->tags,
				'des'=>$imginfo[$i]->des
			);
			$res=$tour->addimginfo($imginfo[$i]->id,$data);
		}
		echo $res;
	}
	function addtour(){
		$data=json_decode($_POST['data']);
		$title=$data->title;
		$thumbnail=$data->thumbnail;
		$tourname=$data->name;
		$key=$data->keywords;
		$description=$data->description;
		$price=$data->price;
		$price_detail=$data->price_detail;
		$days=$data->days;
		$route=$data->route;
		$route_intro=$data->route_intro;
		$intro=$data->intro;//线路简介
		$content=$data->content;
		$notice=$data->notice;
		$term=$data->term;
		$gallery=$data->gallery;
		$is_private=$data->is_private;
		$tags='';
		$theme='';
		$group='';
		$destination='';
		if(count($data->traveltime)!='')
		{
			foreach($data->traveltime as $val)
			{
				$tags.=$val.",";
			}
		}


		if(count($data->theme)!='')
		{
			foreach($data->theme as $them)
			{
				$theme.=$them.",";
			}
		}
		if(count($data->group)!='')
		{
			foreach($data->group as $g)
			{
				$group.=$g.",";
			}
		}
		if(count($data->destination)!='')
		{
			foreach($data->destination as $des)
			{
				$destination.=$des.",";
			}
		}
		
		$EOF=$data->EOF;
		if(!$EOF)
		{
			self::newtour();
		}
		else
		{
			$data=array(
				'title'=>$title,
				'keywords'=>$key,
				'description'=>$description,
				'name'=>$tourname,
				'price'=>$price,
				'price_detail'=>$price_detail,
				'days'=>$days,
				'route'=>$route,
				'route_intro'=>$route_intro,
				'intro'=>$intro,
				'content'=>$content,
				'gallery'=>$gallery,
				'notice'=>$notice,
				'thumbnail'=>$thumbnail,
				'who_edit'=>'',
				'create_time'=>date('Y-m-d H:i:s',time()),
				'edit_time'=>date('Y-m-d H:i:s',time()),
				'term'=>$term,
				'tags'=>$tags,
				'theme'=>$theme,
				'destination'=>$destination,
				'groups'=>$group,
				'is_private'=>$is_private
				
			);

			$this->load->model('tour');
			$tour=new Tour();
			$res=$tour->addtour($data);
			echo $res;
		}
	}
	
	function deltour()
	{
		$power=$_SESSION['power'];
		if($power==1 || $power==0)
		{
			$tid=$_POST['tid'];
			$this->load->model('tour');
			$tour=new Tour();
			if($tour->deltour($tid))
			{
				$resinfo['msg']='线路删除成功！';
				$resinfo['status']=true;
			}
			else
			{
				$resinfo['msg']='线路删除失败，请稍后再试！';
				$resinfo['status']=false;
			}
		}
		else
		{
			$resinfo['msg']='对不起，你无权进行该操作！';
			$resinfo['status']=false;
		}
		echo json_encode($resinfo);
	}
	function edittour()
	{
		if(!@$_SESSION['username'])
		{
			$data['msg']='请登录！';
			$this->load->view('admin/system_login.html',$data);
		}
		else
		{
			$this->load->model('tour');
			$tour=new Tour();
			$username = $_SESSION['username'];

			$tid=$_GET['tid'];
			$who=$tour->whoedit($tid);
			if(isset($who['who_edit']) && $who['who_edit']!='' && $who['who_edit']!=$username)
			{
				$data['who_edit']=$who['who_edit'];
				echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
				echo "<script>alert('".$who['who_edit']." 正在编辑，请稍后再试！');window.history.go(-1);</script>";
			}
			else
			{
				$info=array('who_edit'=>$username);
				$tour->setWhoEdit($tid,$info);
				$this->load->model('image');
				$image=new Image();
				$tourinfo=$tour->showTour($tid);
				if($tourinfo[0]->gallery!='')
				{
					$idarr=explode(',',$tourinfo[0]->gallery);
					foreach($idarr as $id)
					{	
						$info=$image->getimg($id);
						$data['img'][]=$info;
					}
				}
				$data['routeinfo']=$tour->getallroute();
				$data['tour']=$tourinfo;
				$data['theme']=$tour->tourTheme();
				//获得目的地
				$data['destination']=$tour->destination();
				//获得出行时间
				$data['traveltime']=$tour->travelTime();
				//获得活动群体
				$data['groups']=$tour->groups();
				$this->load->view('admin/updatetour',$data);
			}
		}
	
		
	}
	function recallupdate()//取消修改
	{
		$id=$_POST['id'];
		$this->load->model('tour');
		$tour=new Tour();
		$info=array('who_edit'=>'');
		$tour->setWhoEdit($id,$info);
		echo '1';
	}
	function updatetour()
	{
		$data=json_decode($_POST['data']);
		$tid=$data->upid;
		$title=$data->title;
		$tourname=$data->name;
		$key=$data->keywords;
		$description=$data->description;
		$price=$data->price;
		$price_detail=$data->price_detail;
		$days=$data->days;
		$route=$data->route;
		$route_intro=$data->route_intro;
		$intro=$data->intro;//线路简介
		$content=$data->content;
		$notice=$data->notice;
		$thumbnail=$data->thumbnail;
		$gallery=$data->gallery;
		$term=$data->term;
		$is_private=$data->is_private;
		$tags='';
		$theme='';
		$group='';
		$destination='';
		if(count($data->traveltime)!='')
		{
			foreach($data->traveltime as $val)
			{
				$tags.=$val.",";
			}
		}


		if(count($data->theme)!='')
		{
			foreach($data->theme as $them)
			{
				$theme.=$them.",";
			}
		}
		if(count($data->group)!='')
		{
			foreach($data->group as $ter)
			{
				$group.=$ter.",";
			}
		}
		if(count($data->destination)!='')
		{
			foreach($data->destination as $des)
			{
				$destination.=$des.",";
			}
		}
		
		$EOF=$data->EOF;
		if(!$EOF)
		{
			self::newtour();
		}
		else
		{
			$data=array(
				'title'=>$title,
				'keywords'=>$key,
				'description'=>$description,
				'name'=>$tourname,
				'price'=>$price,
				'price_detail'=>$price_detail,
				'days'=>$days,
				'route'=>$route,
				'route_intro'=>$route_intro,
				'intro'=>$intro,
				'content'=>$content,
				'gallery'=>$gallery,
				'notice'=>$notice,
				'thumbnail'=>$thumbnail,
				'who_edit'=>'',
				'edit_time'=>date('Y-m-d H:i:s',time()),
				'term'=>$term,
				'tags'=>$tags,
				'theme'=>$theme,
				'destination'=>$destination,
				'groups'=>$group,
				'is_private'=>$is_private	
			);
		}
		$this->load->model('tour');
		$tour=new Tour();
		$info=array('who_edit'=>'');
		$tour->setWhoEdit($tid,$info);
		echo $tour->updatetour($tid,$data);
	}
	public function adddaytravel()
	{
		$data=json_decode($_POST['data']);
		$course=$data->course;
		$content=$_POST['content'];
		$tips=$data->tips;
		$img=$data->img;
		$routeinfo=array('content'=>$content,'course'=>$course,'tips'=>$tips);
		$this->load->model('tour');
		$tour=new Tour();
		echo $tour->addroute($routeinfo);
	}
	public function updatedaytravel()
	{
		$data=json_decode($_POST['data']);
		$id=$data->id;
		$info=array('content'=>$_POST['content'] ,'course'=>$data->course,'tips'=>$data->tips);
		$this->load->model('tour');
		$tour=new Tour();
		echo $tour->updateroute($id,$info);
	}
	public function deldaytravel()
	{
		$power=$_SESSION['power'];
			$id=$_POST['id'];
			$this->load->model('tour');
			$tour=new Tour();
			echo $tour->delroute($id);
		
	}
	function getdaytravel()
	{
		$id=$_POST['id'];
		$this->load->model('tour');
		$tour=new Tour();
		$info=$tour->getroute($id);
		echo json_encode($info);
	}
	function getimginfo()
	{
		$id=$_POST['id'];
		$this->load->model('tour');
		$tour=new Tour();
		$imginfo=$tour->getimginfo($id);
		echo json_encode($imginfo);
	}
	function delimg()
	{
		$id=$_POST['id'];
		$this->load->model('tour');
		$tour=new Tour();
		echo $tour->delimg($id);
	}
	function updateimg()
	{
		$info=json_decode($_POST['data']);
		$id=$info->id;
		$data=array('alt'=>$info->alt,'tags'=>$info->tags,'des'=>$info->des);
		$this->load->model('tour');
		$tour=new Tour();
		echo $tour->updateimg($id,$data);
	}
	function updateprice()
	{
		$upprice=json_decode($_POST['data']);
		$id=$upprice->id;
		$price=$upprice->price;
		$data=array('price'=>$price);
		$this->load->model('tour');
		$tour=new Tour();
		echo $tour->priceupdate($id,$data);
		
	}
}
?>