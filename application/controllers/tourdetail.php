<?php 
class Tourdetail extends CI_Controller{
	function __construct()
    	{
		parent::__construct();
		session_start();
	}

	function index(){
		$tid = $_GET['tid'];
		$this->load->model('tour');
		$this->load->library('cimarkdown');
		$tourinfo = $this->tour->showTour($tid);
		$tourinfo[0]->price_detail = $this->cimarkdown->markit($tourinfo[0]->price_detail);
		//$tourinfo[0]->content = $this->cimarkdown->markit($tourinfo[0]->content);
		$tourinfo[0]->notice = $this->cimarkdown->markit($tourinfo[0]->notice);
		$tourinfo[0]->intro = $this->cimarkdown->markit($tourinfo[0]->intro);
		$this->load->model('image');
		$image=new Image();
		if( isset($_SESSION['auth']) && $_SESSION['auth'] ){
			$data['auth'] = true;
		}else{
			$data['auth'] = false;
		}
		if($tourinfo[0]->gallery!='')
		{
			$idarr=explode(',',$tourinfo[0]->gallery);
			foreach($idarr as $id)
			{	
				$info=$image->getimg($id);
				$data['img'][]=$info;
			}
		}
		if($tourinfo[0]->route!='')
		{
			$routeid=explode(',',$tourinfo[0]->route);
			foreach($routeid as $day)
			{
				$route=$this->tour->getroute($day);
				$data['route'][]=$route;
			}
		}
		$data['tour']=$tourinfo;
		$customerip=$this->input->ip_address();
		if(!isset($_COOKIE[$tid]))
		{
			setcookie($tid,$customerip,time()+3600*24*36500);
			$this->tour->addhits($tid);
		}
		if($tourinfo[0]->tour_type==0)
		{
			$this->load->view('web/tour',$data);
		}
		elseif($tourinfo[0]->tour_type==1)
		{
			$destination=$this->tour->destinations();
			$arr=explode(",",$tourinfo[0]->destination);
			for($i=0;$i<count($destination);$i++)
			{
				if(!in_array($destination[$i]['name'],$arr))
				{
					$data['des'][]=$destination[$i]['name'];
				}
			}

			$this->load->view('web/smalltour',$data);
		}
		else
		{
			$destination=$this->tour->destinations();
			$arr=explode(",",$tourinfo[0]->destination);
			for($i=0;$i<count($destination);$i++)
			{
				if(!in_array($destination[$i]['name'],$arr))
				{
					$data['des'][]=$destination[$i]['name'];
				}
			}
			$this->load->view('web/companytour',$data);
		}
	} 

}
?>