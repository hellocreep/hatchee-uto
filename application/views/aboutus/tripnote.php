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
	<body id="n-about" class="n-re">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="#">首页</a> > 友途互动
				</div>
				<div class="aside">
					<?php $this -> load -> view("aboutus/aside");?> <!-- 关于我们侧边栏chunk -->
				</div>
				<div class="article">
					<h1>【<?php echo $note['type'];?>】<?php echo $note['title'];?></h1>				
					<p class="note">
						<?php echo $note['edit_time'];?> | <?php echo $note['editor'];?>
					</p>
					<p>	
						<a class="prev" href="#">上一篇</a> |
						<a class="next" href="#">下一篇：日志名称</a>
					</p>
					<div class="note-content">
						<!-- <img src="assets/images/img.jpg" alt="" width="720" height="300">
						<p>
							【活动时间】2012年6月21-25日<br>
							【活动线路】成都-水磨镇-映秀-日隆镇-四姑娘山（长坪沟-海子沟二峰）--成都<br>
							【活动主办】成都友途旅行网<br>
							【活动领队】木灯<br>
							【回顾图文】友途小编<br>
							【活动简介】端午特别策划四姑娘山二峰攀登的经典完美线路组合，特别定制的旅行计划，行程安排合理，适合身体 健康体能充沛的普通旅游爱好者以及初级入门的户外爱好者，充分感受深度纯净高原旅游的乐趣，圆自 己的攀登雪山的梦想<br>
							【行程安排】第一天：成都—水墨镇—映秀地震遗址—日隆镇<br>
										第二天：日隆镇—双桥沟—日隆镇<br>
										第三天：日隆镇—二峰大本营（海子沟）<br>
										第四天：二峰大本营—二峰峰顶—二峰大本营—日隆镇<br>
										第五天：日隆镇—成都
						</p> -->
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
