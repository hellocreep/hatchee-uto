<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companytour extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->model('company');
		$data['company']=$this->company->getcompanytour();
		$data['note']=$this->company->getextour();
		$this->load->view('web/landingpage-company',$data);	
	}
	function addcompanytour()
	{
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
		$tour_map=$data->map;
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
				'sub_name'=>$data->sub_name,
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
				'is_private'=>$is_private,
				'tour_map'=>$tour_map
				
			);

			$this->load->model('tour');
			$tour=new Tour();
			$res=$tour->addtour($data);
	}
}
?>