<?php 
class Tourdetail extends CI_Controller{
	function __construct()
    	{
		parent::__construct();
	}

	function index(){
		$tid = $_GET['tid'];
		//$tid=$this->uri->segment(4)
		$this->load->model('tour');
		$this->load->library('cimarkdown');
		$tourinfo = $this->tour->showTour($tid);
		$tourinfo->price_detail = $this->cimarkdown->markit($tourinfo->price_detail);
		$this->load->model('image');
		$image=new Image();
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