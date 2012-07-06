<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>游记 | 友途旅行网</title>
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
					<h1>【<?php echo $note['type'];?>】<?php echo $note['title'];?></h1>				
					<p class="note">
						<?php echo $note['edit_time'];?> | <?php echo $note['editor'];?>
					</p>	
					<div>
						<?php echo $note['content'];?>
					</div>
				</div> <!-- end of div.article -->
				<!-- Baidu Button BEGIN -->
				<script type="text/javascript" id="bdshare_js" data="type=slide&amp;mini=1&amp;img=8" ></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
				</script>
				<!-- Baidu Button END -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
