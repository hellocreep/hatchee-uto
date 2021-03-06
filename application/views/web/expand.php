<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>拓展活动 | 友途旅行网</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
		<link rel="stylesheet" type="text/css" href="assets/styles/aboutus.css">
	</head>
	<body id="n-about" class="n-re">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>aboutus">关于友途</a> > <a href="<?php echo base_url();?>aboutus/review">精彩回顾</a> > <?php echo $expand['title'];?>
				</div>
				<?php $this -> load -> view("web/include/aside-company");?> <!-- 侧边栏chunk -->
				<div class="article">
					<h1><?php echo $expand['title'];?></h1>				
					<p class="note">
						时间：<?php echo $expand['edit_time'];?> &nbsp;&nbsp;&nbsp;&nbsp;
					</p>
					<p class="pagenating">	
						<?php if($upexpand!=''):?>
						<a class="prev" href="expandtour/expand?id=<?php echo $upexpand['Id'];?>">上一篇</a> |
						<?php endif?>
						<?php if($nextexpand!=''):?>
						<a class="next" href="expandtour/expand?id=<?php echo $nextexpand['Id'];?>">下一篇：<?php echo $nextexpand['title'];?></a>
						<?php endif;?>
					</p>
					<div class="note-content">
						<?php echo $expand['content'];?>

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
