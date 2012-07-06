<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>UTO后台管理系统</title>
<base href="<?php echo base_url();?>"/>
<base src="<?php echo base_url();?>"/>
<?php $this->load->view("admin/global_source");?>

</head>
<body>
	
	<?php $this->load->view('admin/header'); ?>
	<div class="container-fluid">
		<?php $this->load->view('admin/leftmenu'); ?>
		<?php $this->load->view('admin/mainbody'); ?>
	</div>
</body>
</html>
 
 
