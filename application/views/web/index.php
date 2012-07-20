<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>友途旅行网</title>
		<meta name="description" content="<?php echo $webinfo[0]->description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0]->keywords;?>">
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
								$('.slide-num li').eq(e).addClass('active').siblings().removeClass('active');
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
							<div class="item">
								<a href="tourdetail/?tid=30"><img src="assets/images/banner/gonggashan-banner.jpg"></a>
							</div>
							<div class="item">
								<a href="tourdetail/?tid=29"><img src="assets/images/banner/siguniangshan-banner.jpg"></a>
							</div>
							<div class="active item">
								<a href="tourdetail/?tid=33"><img src="assets/images/banner/emeishan-banner.jpg"></a>
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
								友途活动是友途旅行网官方品牌活动 - 独家、趣味、探索、自由。目前以前往“大美川西”贡嘎山和四姑娘为主，固定排期，承诺一人发团，成都集结，全国同一家，无购物，加点，一路随时停车，回归最简单，最快乐的旅行。
							</dt>
							<?php foreach($term as $termtour):?>
							<dd>
								<a href="tourdetail/?tid=<?php echo $termtour['Id']?>"><img src="<?php echo $termtour['thumbnail'];?>"></a>
								<h4><a href="tourdetail/?tid=<?php echo $termtour['Id']?>"><?php echo $termtour['title'];?></a></h4>
								<p>
									<?php echo mb_substr(str_replace('<br>','',$termtour['intro']),0,40,'utf-8').'......';?><a href="tourdetail/?tid=<?php echo $termtour['Id']?>">更多</a>
									<br>
									<b>旅行地区：</b> <?php echo str_replace(',','、',substr($termtour['destination'],0,-1));?>
									<br>
									<b>全国统一价：</b><em class="red"><?php echo $termtour['price'];?> </em>元/人
								</p>
							</dd>
							<?php endforeach;?>
						</dl>
					</div>
					<div class="col col-theme">
						<h2>主题旅行</h2>
						<p>
							友途的系列主题旅行产品，延续友途轻户外体验旅行方式，但出行时间、人数、地方等等由您来定，所有行程可独立包团、可拼团、也可只租车+酒店的自由行方式。
							<br>
							多个炫彩主题，数条顶级行程，让您玩转四川。　
						</p>
						<ul>
							<?php foreach($theme as $themetour):?>
								<li>
								<a href="tourdetail/?tid=<?php echo $themetour['Id']?>"><img src="<?php echo $themetour['thumbnail']?>">
								<div>
									<h4><?php echo $themetour['title'];?></h4>
									<p>
										<?php echo mb_substr(str_replace('<br>','',$themetour['intro']),0,40,'utf-8').'......';?>
									</p>
								</div>
								</a>
							</li>	
							<?php endforeach;?>
													
						</ul>
					</div>

					

					<div class="col col-com">
						<h2>公司出游</h2>
						<ul>
							<li>
								<img src="assets/images/company-small.jpg">
							</li>
							<?php foreach($company as $companytour):?>
								<li>
								<h4><a href="tourdetail/?tid=<?php echo $companytour['Id']?>"><?php echo $companytour['sub_name'];?></a></h4>
								<p>
									<?php echo str_replace('<br>','',mb_substr($companytour['intro'],0,50,'utf-8')).'......';?>
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
								<?php echo mb_substr(preg_replace('~<img(.*?)>~s','',$note['content']),0,100,'utf-8').'......';?> 
								</p>
							</li>
							<?php endforeach;?>
							
						</ul>
					</div>
				</div>	





				<div class="homert">
					<div class="choose">
						<img src="assets/images/head-top.jpg">
					</div>

					<div class="idea clearfix">
						<h3>友途始终如一的理念</h3>
						<ul>
							<li>
								<img src="assets/images/ziyou.png">
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地。
								</p>
							</li>
							<li>
								<img src="assets/images/tiyan.png">
								<p>
									与友途，感受最真实的世界，体验最原汁原味的四川。

								</p>
							</li>
							<li>
								<img src="assets/images/fenxiang.png">
								<p>
									与五湖四海的朋友一起谈天说地，分享人生，瞬间成长。 

								</p>
							</li>
							<li>
								<img src="assets/images/shengtai.png">
								<p>
									友途需要每个人一点点的爱来维护我们生活的这片土地.... 

								</p>
							</li>
							<li>
								<img src="assets/images/jiazhi.png">
								<p>
									友途只做让你每每回忆起来感动的旅行，而不是奢华的高费用旅游。 

								</p>
							</li>
							<li>
								<img src="assets/images/fuwu.png">
								<p>
									友途的360度管家式服务，全程一对一，让你的出行更简单，更快乐。 　

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
								<b>亓纯静</b>
								<span>友途小编</span>
							</li>
							<li>
								<a class="more" href="aboutus/leader">>>详情</a>
							</li>
						</ul>
					</div>

					<div class="social clearfix">
						<h3>关注友途， 关注不一样的旅行</h3>
						<a class="mt" href="http://page.renren.com/601461125/index">
							<img src="assets/images/renren.png">
							人人网<br>
							友途旅行
						</a>
						<a href="http://weibo.com/utotrip">
							<img src="assets/images/weibo.png">
							新浪微博<br>
							友途旅行
						</a>
						<a href="http://1758863234.qzone.qq.com">
							<img src="assets/images/qzone.png">
							QQ空间<br>
							友途旅行
						</a>
					</div>
				</div>
			</div>
			<?php $this->load->view('web/footer'); ?>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
