<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>友途旅行网</title>
		<meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>">
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
								$( this ).addClass( 'active' ).siblings().removeClass('active');
								setTimeout(function(){
									$('.carousel').carousel(e);
								},600)
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
									<h4>test1</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
							<div class="item">
								<img src="assets/images/img.jpg">
								<div class="carousel-caption">
									<h4>test2</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
							<div class="item">
								<img src="assets/images/banner-big.jpg">
								<div class="carousel-caption">
									<h4> test3</h4>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
								</div>
							</div>
						</div>
						<!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->

						<ul class="slide-num clearfix">
							<li class="active">1</li>
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
							<?php foreach($term as $termtour):?>
							<dd>
								<a href="tourdetail/?tid=<?php echo $termtour['Id']?>"><img src="<?php echo $termtour['thumbnail'];?>"></a>
								<h4><a href="tourdetail/?tid=<?php echo $termtour['Id']?>"><?php echo $termtour['title'];?></a></h4>
								<p>
									<?php echo str_replace('<br>','',mb_substr($termtour['intro'],0,50,'utf-8')).'...';?>
									<br>
									<b>旅行地区：</b> <?php echo str_replace(',','、',substr($termtour['destination'],0,-1));?>
									<br>
									<b>全国统一价：</b><?php echo $termtour['price'];?> 元/人
								</p>
							</dd>
							<?php endforeach;?>
						</dl>
					</div>
					<div class="col col-theme">
						<h2>主题旅行</h2>
						<p>
							友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色，蓝天、白云、雪山、草原、藏民、牦牛、青青的草地，悠悠的民歌，美丽的少女，我们精心策划的趣味活动给让你的旅行更加梦幻，如三五人选一样颜色的马儿，在皑皑的雪山下、在美丽的山谷中、在清澈的溪流边并肩骑马，享受极度的浪漫与惬意。 
						</p>
						<ul>
							<?php foreach($theme as $themetour):?>
								<li>
								<a href="tourdetail/?tid=<?php echo $themetour['Id']?>"><img src="<?php echo $themetour['thumbnail']?>" width="167" height="120">
								<div>
									<h4><?php echo $termtour['title'];?></h4>
									<p>
										<?php echo str_replace('<br>','',mb_substr($termtour['intro'],0,40,'utf-8')).'......';?>
									</p>
								</div>
								</a>
							</li>	
							<?php endforeach;?>
													
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
							<?php foreach($company as $companytour):?>
								<li>
								<h4><a href="tourdetail/?tid=<?php echo $companytour['Id']?>"><?php echo $companytour['title'];?></a></h4>
								<p>
									<?php echo str_replace('<br>','',mb_substr($termtour['intro'],0,50,'utf-8')).'......';?>
								</p>
							</li>
							<?php endforeach;?>
							
						</ul>	

						<dl>
							<dt><h3>拓展活动</h3></dt>
							<?php foreach($expand as $expandtour):?>
								<dd><a href="expandtour/expand?id=<?php echo $expandtour['Id'];?>"><?php echo $expandtour['title'];?></a></dd>
							<?php endforeach;?>
						</dl>
					</div>

					<div  class="col col-review">
						<h2>友途旅行经典回顾</h2>
						<ul>
							<?php foreach($travel as $note):?>
								<li>
								<h4><a href="aboutus/note?id=<?php echo $note['Id'];?>"><?php echo $note['title'];?></a></h4>
								<p>
									<span>小编：<?php echo $note['editor'];?></span>
									<span> 时间：<?php echo $note['tour_time'];?></span>
								</p>
								<img src="<?php echo $note['thumb'];?>">
								<p>
									<?php echo mb_substr($note['content'],0,100,'utf-8').'…';?>
								</p>
							</li>
							<?php endforeach;?>
							
						</ul>
					</div>



				</div>	





				<div class="homert">
					<div class="choose">
						<img src="assets/images/img.jpg">
					</div>

					<div class="idea clearfix">
						<h3>友途始终如一的理念</h3>
						<ul>
							<li>
								<img src="assets/images/ziyou.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
							<li>
								<img src="assets/images/tiyan.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
							<li>
								<img src="assets/images/fenxiang.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
							<li>
								<img src="assets/images/shengtai.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
							<li>
								<img src="assets/images/jiazhi.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
							<li>
								<img src="assets/images/fuwu.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地，只要给领队轻语几句
								</p>
							</li>
						</ul>
					</div>

					<div class="leader clearfix">
						<h3>友途领队与小编</h3>
						<ul>
							<li>
								<img src="assets/images/mudeng.png">
								<b>曾可（木灯）</b>
								<span>友途领队</span>
							</li>
							<li>
								<img src="assets/images/muya.png">
								<b>张磊（木雅）</b>
								<span>友途领队</span>
							</li>
							<li>
								<img src="assets/images/damao.png">
								<b>陈传敏（大猫）</b>
								<span>友途领队</span>
							</li>
							<li>
								<img src="assets/images/yezhu.png">
								<b>宋中伟（野猪）</b>
								<span>友途领队</span>
							</li>
							<li>
								<img src="assets/images/xiaoyuan.png">
								<b>袁辰凯（圆小胖）</b>
								<span>友途小编</span>
							</li>
							<li>
								<img src="assets/images/xiaoqi.png">
								<b>丌纯静（木灯）</b>
								<span>友途小编</span>
							</li>
						</ul>
					</div>

					<div class="social clearfix">
						<h3>关注友途， 关注不一样的旅行</h3>
						<a class="mt" href="">
							<img src="assets/images/renren.png">
							人人网<br>
							友途旅行
						</a>
						<a href="">
							<img src="assets/images/weibo.png">
							人人网<br>
							友途旅行
						</a>
						<a href="">
							<img src="assets/images/qzone.png">
							人人网<br>
							友途旅行
						</a>
					</div>
				</div>
			</div>
			<?php $this->load->view('web/footer'); ?>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
