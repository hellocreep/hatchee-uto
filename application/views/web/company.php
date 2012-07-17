<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>定制化旅行 | 友途旅行网</title>
		<!-- <meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>"> -->
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/onecol.css">
		<script type="text/javascript" src="assets/My97DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="assets/My97DatePicker/calendar.js"></script>
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body id="a-index">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > 公司出游
				</div>
				<div class="onecol">
					<h1>主页。。。</h1>
				</div>
					
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>