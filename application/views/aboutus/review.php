<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>精彩回顾 | 友途旅行网</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
		<link rel="stylesheet" type="text/css" href="assets/styles/aboutus.css">
	</head>
	<body id="n-about">
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
					<h1>友途旅行精彩回顾</h1>				
					<p>
						精彩瞬间 - 记录我们的精彩回忆。(游记)
					</p>
					<ul>
						<?php foreach($note as $travel):?>
							<li><a href="aboutus/note?id=<?php echo $travel->Id;?>">【<?php echo $travel->type;?>】：<?php echo $travel->title;?></a></li>
						<?php endforeach;?>
					</ul>
					<div class="pagenate">
							<a href="<?php echo $page['first'];?>">首页</a>
							<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
							<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
							<a href="<?php echo $page['end'];?>">尾页</a>
					</div>
					<h2>小小镜头里的四川大世界</h2>
						<div class="imglist clearfix">
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
							<a rel="fancyimg" href="" title="" > <img class="fancyimg" alt="" src="assets/images/img.jpg"> </a>
						</div>

					<h2>友途的电影狂欢之夜Film Night (视频)</h2>
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
