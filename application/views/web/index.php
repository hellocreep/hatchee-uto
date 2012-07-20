<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>友途旅行网</title>
		<!-- <meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>"> -->
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/onecol.css">
		<script type="text/javascript" src="assets/My97DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="assets/My97DatePicker/calendar.js"></script>
		<?php $this -> load -> view("web/global_source");?>
		<script type="text/javascript" src="assets/scripts/web/bootstrap-carousel.js"></script>
	</head>
	<body id="n-index">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
				
			<script type="text/javascript">
				(function(){
					$(function(){
						$('.carousel').carousel();
						$( '.slide-num li' ).each(function(e){
							$(this).mouseover(function(){
								$('.carousel').carousel(e);
							})
						})
					})
				})(jQuery)
			</script>
			<div class="content clearfix">
				<div class="homelt">
					<div class="slide carousel" id="myCarousel">
						<div class="carousel-inner">
							<div class="active item">
								<img src="assets/images/banner-big.jpg">
								<div class="carousel-caption">
									<h4>test0</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
							<div class="item">
								<img src="assets/images/img.jpg">
								<div class="carousel-caption">
									<h4>test1</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
							<div class="item">
								<img src="assets/images/banner-big.jpg">
								<div class="carousel-caption">
									<h4> test2</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
						</div>
						<!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->

						<ul class="slide-num clearfix">
							<li>1</li>
							<li>2</li>
							<li>3</li>
						</ul>

					</div>

					<div class="col col-tour">
						<h2>友途活动</h2>
						<dl>
							<dt>
								友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色，蓝天、白云、雪山、草原、藏民、牦牛、青青的草地，悠悠的民歌，美丽的少女，我们精心策划的趣味活动给让你的旅行更加梦幻，如三五人选一样颜色的马儿，在皑皑的雪山下、在美丽的山谷中、在清澈的溪流边并肩骑马，享受极度的浪漫与惬意。 
							</dt>
							<dd>
								<h4>朝圣贡嘎神山，沐浴雪域阳光—贡嘎雪山、泉华滩、新都桥、雅家梗6日游</h4>
								<img src="assets/images/img.jpg">
								<p>
									我们的“蜀山之后”之旅，带你探索自然，了解景观的多样性，并亲身体验，感受人文的多元化。 独家安排雪山，原始森林环绕的高山草甸享用下午茶，大自然的清新气息混着红酒的甘醇，一定......更多
								</p>
								<p>
									<b>旅行地区：</b> 四姑娘山、新都桥、丹巴、米亚罗、康定、雅家埂、磨西
									<br>
									<b>全国统一价：</b>2888 元/人
								</p>
							</dd>
							<dd>
								<h4>朝圣贡嘎神山，沐浴雪域阳光—贡嘎雪山、泉华滩、新都桥、雅家梗6日游</h4>
								<img src="assets/images/img.jpg">
								<p>
									我们的“蜀山之后”之旅，带你探索自然，了解景观的多样性，并亲身体验，感受人文的多元化。 独家安排雪山，原始森林环绕的高山草甸享用下午茶，大自然的清新气息混着红酒的甘醇，一定......更多
								</p>
								<p>
									<b>旅行地区：</b> 四姑娘山、新都桥、丹巴、米亚罗、康定、雅家埂、磨西
									<br>
									<b>全国统一价：</b>2888 元/人
								</p>
							</dd>
						</dl>
					</div>
					<div class="col col-theme">
						<h2>主题旅行</h2>
						<p>
							友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色，蓝天、白云、雪山、草原、藏民、牦牛、青青的草地，悠悠的民歌，美丽的少女，我们精心策划的趣味活动给让你的旅行更加梦幻，如三五人选一样颜色的马儿，在皑皑的雪山下、在美丽的山谷中、在清澈的溪流边并肩骑马，享受极度的浪漫与惬意。 
						</p>
						<ul>
							<li>
								<a href="#"><img src="assets/images/theme/short01.jpg" width="167" height="120">
								<div>
									<h4>活动是友途旅行网官方品牌活</h4>
									<p>
										友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色。
									</p>
								</div>
								</a>
							</li>						
							<li>
								<a href="#"><img src="assets/images/theme/long01.jpg" width="334" height="120">
								<div>
									
									<h4>2活动是友途旅行网官方品牌活</h4>
									<p>
										友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色。
									</p>
								</div>
								</a>
							</li>						
							<li>
								<a href="#"><img src="assets/images/theme/short01.jpg" width="167" height="120"></a>
							</li>						
							<li><a href="#"><img src="assets/images/theme/long01.jpg" width="334" height="120"></a></li>						
							<li><a href="#"><img src="assets/images/theme/long01.jpg" width="334" height="120"></a></li>						
							<li><a href="#"><img src="assets/images/theme/long01.jpg" width="334" height="120"></a></li>						
							<li><a href="#"><img src="assets/images/theme/short01.jpg" width="167" height="120"></a></li>						
							<li><a href="#"><img src="assets/images/theme/short01.jpg" width="167" height="120"></a></li>						
						</ul>
					</div>

					<script type="text/javascript">
						$('.col-theme li a').each(function(index){
							$(this).hover(function(){
								$(this).children('div').stop().animate({"opacity":1 },500);
							},function(){
								$(this).children('div').stop().animate({
									"opacity":0,
								},500);
							});

						})
					</script>

					<div class="col col-com">
						<h2>公司出游</h2>
						<ul>
							<li>
								<img src="assets/images/img.jpg" width="200" height="100">
							</li>
							<li>
								<h4>都江堰-虹口-青城山两日游</h4>
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
							<li>
								<h4>都江堰-虹口-青城山两日游</h4>
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
							<li>
								<h4>都江堰-虹口-青城山两日游</h4>
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
							<li>
								<h4>都江堰-虹口-青城山两日游</h4>
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
							<li>
								<h4>都江堰-虹口-青城山两日游</h4>
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
							
						</ul>	

						<dl>
							<dt><h3>拓展活动</h3></dt>
							<dd><a href="">这是我的船</a></dd>
							<dd><a href="">这是我的船</a></dd>
							<dd><a href="">这是我的船</a></dd>
							<dd><a href="">这是我的船</a></dd>
							<dd><a href="">这是我的船</a></dd>
						</dl>
					</div>

					<div  class="col col-review">
						<h2>友途旅行经典回顾</h2>
						<ul>
							<li>
								<h4>端午特别定制团：徒步双桥沟，勇攀四姑娘山二峰！</h4>
								<p>
									<span>小编：哈哈哈哈</span>
									<span> 浏览：123 </span>
									<span> 评论：12 </span>
									<span> 时间：2012.2.2</span>
								</p>
								<img src="assets/images/img.jpg">
								<p>
									截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。截然不同的都江堰青城山两日游线路，带您感受别样的青城天下幽。
								</p>
							</li>
						</ul>
					</div>



				</div>	





				<div class="homert">

				</div>
			</div>
			<?php $this->load->view('web/footer'); ?>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
