<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>友途领队 | 友途旅行网</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
		<link rel="stylesheet" type="text/css" href="assets/styles/aboutus.css">
	</head>
	<body>
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="#">首页</a> > 友途互动
				</div>
				<div class="aside">
					<dl>
						<dt>关于我们</dt>
						<dd class="active"> >和友途一起旅行</dd>
						<dd> >友途使命</dd>
						<dd> >友途领队</dd>
						<dd> >加入友途</dd>
						<dd> >联系我们</dd>
					</dl>


				</div>
				<div class="article">
					<h1>结识友途领队</h1>					
					
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
