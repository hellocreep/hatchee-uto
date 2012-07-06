<?php
	
	class Pagemanage extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			session_start();
			$this->load->model('webpage');
			$this->webpage=new webpage();
		}

		public function editpage(){
			if(@$_SESSION['username']){
				$data['type'] = $_GET['type'];
				$data['info'] = $this->webpage->getpage($data['type']);
				$this->load->view('admin/web_page',$data);
			}else{
				$data['msg'] = '请先登录！';
				$this->load->view('admin/system_login.html',$data);
			}
			
		}
		public function updatepage(){
			if(@$_SESSION['username']){
				$data = json_decode($_POST['data']);
				echo $this->webpage->updatepage( $data );
			}else{
				$data['msg'] = '请先登录！';
				$this->load->view('admin/system_login.html',$data);
			}
			
		}

	}

?>