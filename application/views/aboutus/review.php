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
	<body id="n-about" class="n-re">
		<div class="wrapper" >
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>aboutus">关于友途</a> > 精彩回顾
				</div>
				<div class="aside">
					<?php $this -> load -> view("aboutus/aside");?> <!-- 关于我们侧边栏chunk -->
				</div>
				<div class="article">
					<h1>友途旅行精彩回顾</h1>				
					<p>
						<b>精彩瞬间 - 记录我们的精彩回忆。(游记)</b>
					</p>
					<div class="event">
						<h5>公司出游</h5>
						<ul class="clearfix">
							<?php foreach($company as $c):?>
								<li>
								<a href="aboutus/note?id=<?php echo $c['Id'];?>"><img src="<?php echo $c['thumb'];?>" alt=""></a>
								<h5><a href="aboutus/note?id=<?php echo $c['Id'];?>"><?php echo $c['title'];?></a></h5>								
								<p>时间：<?php echo $c['tour_time'];?></br>
								地点：<?php echo $c['route_intro'];?></p>
								<!-- <?php echo mb_substr($c['content'],0,50,'utf-8').'…';?> -->
								<a class="detail" href="aboutus/note?id=<?php echo $c['Id'];?>">活动详情</a>
								</li>
							<?php endforeach;?>
						</ul>
					</div>
					
					<div class="event">
						<h5>主题旅行</h5>
						<ul class="clearfix">
							<?php foreach($theme as $t):?>
								<li>
								<a href="aboutus/note?id=<?php echo $t['Id'];?>"><img src="<?php echo $t['thumb'];?>" alt=""></a>
								<h5><a href="aboutus/note?id=<?php echo $t['Id'];?>"><?php echo $t['title'];?></a></h5>		
								<p>时间：<?php echo $t['tour_time'];?></br>
								地点：<?php echo $t['route_intro'];?></p>
								<!-- <?php echo mb_substr($t['content'],0,50,'utf-8').'…';?> -->
								<a class="detail" href="aboutus/note?id=<?php echo $t['Id'];?>">活动详情</a>
								</li>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="event">
						<h5>定制旅行</h5>
						<ul class="clearfix">
							<?php foreach($customize as $cus):?>
								<li>
								<a href="aboutus/note?id=<?php echo $cus['Id'];?>"><img src="<?php echo $cus['thumb'];?>" alt=""></a>
								<h5><a href="aboutus/note?id=<?php echo $cus['Id'];?>"><?php echo $cus['title'];?></a></h5>				
								<p>时间：<?php echo $cus['tour_time'];?></br>
								地点：<?php echo $cus['tour_time'];?></p>
								<!-- <?php echo mb_substr($cus['content'],0,50,'utf-8').'…';?> -->
								<a class="detail" href="aboutus/note?id=<?php echo $cus['Id'];?>">活动详情</a>
								</li>
							<?php endforeach;?>
						</ul>
					</div>

					<div class="separator"></div>
					<h2>友途的电影狂欢之夜Film Night (视频)</h2>
					<div class="video">
						<embed src="http://player.youku.com/player.php/Type/Folder/Fid/17829831/Ob/1/sid/XNDI1MzM2OTQ4/v.swf" quality="high" width="240" height="200" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
					</div>
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
