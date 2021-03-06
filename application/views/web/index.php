<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $webinfo[0]->title;?></title>
		<meta name="description" content="<?php echo $webinfo[0]->description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0]->keywords;?>">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="assets/styles/onecol.css">
		<?php $this -> load -> view("web/global_source");?>
		<script type="text/javascript" src="assets/scripts/web/bootstrap-carousel.js"></script>
		<script type="text/javascript" src="assets/scripts/bootstrap-transition.js"></script>
	</head>
	<body id="n-index">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			<div class="content clearfix">
				<div class="homelt">
					<div class="slide carousel" id="myCarousel">
						<div class="carousel-inner">					
							<div class="item active">
								<a href="tourdetail/tour/29"><img src="assets/images/banner/siguniangshan-banner2.jpg"></a>
							</div>
							<div class="item">
								<a href="tourdetail/tour/30"><img src="assets/images/banner/gonggashan-banner.jpg"></a>
							</div>
							<div class="item">
								<a href="index/tour/yading"><img src="assets/images/banner/daocheng-banner.jpg"></a>
							</div>
							<div class="item">
								<a href="index/tour/jiuzhai"><img src="assets/images/banner/jiuzhai-banner.jpg"></a>
							</div>
						</div>
						<!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->

						<ul class="slide-num clearfix">
							<li class="current">1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
						</ul>

					</div>

					<div class="col col-tour">
						<h2>友途活动</h2>
						<dl>
							<dt>
								友途活动是友途旅行网官方品牌活动 - 独家、趣味、探索、自由。目前以前往“大美川西”贡嘎山和四姑娘为主，固定排期，承诺一人发团，成都集结，全国统一价，无购物，加点，一路随时停车，回归最简单，最快乐的旅行。
							</dt>
							<?php foreach($term as $termtour):?>

							<dd>
								<a href="tourdetail/tour/<?php echo $termtour['Id']?>"><img src="<?php echo $termtour['thumbnail'];?>"></a>
								<h4><a href="tourdetail/tour/<?php echo $termtour['Id']?>"><?php echo $termtour['title'];?></a></h4>
								<p>
									<?php echo mb_substr(str_replace('<br>','',$termtour['intro']),0,40,'utf-8').'......';?><a href="tourdetail/tour/<?php echo $termtour['Id']?>">更多</a>
									<br>
									<b>旅行地区：</b> <?php echo str_replace(',','、',substr($termtour['destination'],0,-1));?>
									<br>
									<b>全国统一价：</b><em class="red"><?php echo $termtour['price'];?> </em>元/人
								</p>
							</dd>
							<?php endforeach;?>
						</dl>
					</div>

					<div class="col col-playonly">
						<h2>纯玩跟团</h2>
						<p>
							从友途诞生第一日起，我们就决定：只做与品质相关的事情！市面上常规旅游跟团，很多看上去价格很低，但实际上游客最终所支付的费用并不低，因为那些低价团的操作者总是会用带领客人进旅游购物店消费（获取佣金）和增加额外旅游点或者旅游活动的方式来补足旅行社的利润和导游司机的收入。友途只做纯玩团，也就是不进店、不加点的跟团旅游，表面上价格是高了一些，但最终您为这次旅游所支付的总支出并不高，而且保证了您愉悦的体验和美好的心情！ 
						</p>
						<ul>
							
						<?php foreach($group as $grouptour):?>
							<li>
								<div class="li-lt">
									<a href="tourdetail/tour/<?php echo $grouptour['Id']?>"><img width="50" height="30" src="<?php echo $grouptour['thumbnail'];?>"></a>
								</div>
								<div class="li-mt">
									<h4><a href="tourdetail/tour/<?php echo $grouptour['Id']?>"><?php echo $grouptour['title'];?></a></h4>
									<p>
										<?php echo $grouptour['discount'];?>
									</p>
								</div>
								<div class="li-rt">

									<i>￥<?php echo $grouptour['price'];?></i><br>
									<span><?php echo $grouptour['departure'];?></span>
								</div>
							</li>
						<?php endforeach;?>
						</ul>
					</div>
					
					
					<div class="col col-com">
						<h2>公司出游</h2>
						<ul>
							<?php foreach($company as $companytour):?>
								<li>
								<h4><a href="tourdetail/tour/<?php echo $companytour['Id']?>"><?php echo $companytour['sub_name'];?></a></h4>
								<p>
									<?php echo str_replace('<br>','',mb_substr($companytour['intro'],0,50,'utf-8')).'......';?>
								</p>
							</li>
							<?php endforeach;?>						
						</ul>	

						<dl>
							<dt><h3>拓展活动</h3></dt>
							<?php foreach($expand as $expandtour):?>
								<dd><a href="expandtour/expand/<?php echo $expandtour['Id'];?>"><?php echo $expandtour['title'];?></a></dd>
							<?php endforeach;?>
							<dd>
								<img src="assets/images/tuozhan-small.jpg">
							</dd>
						</dl>
					</div>

					<div  class="col col-review">
						<h2>友途旅行经典回顾</h2>
						<ul>
							<?php foreach($travel as $note):?>
								<li>
								<h4><a href="aboutus/note/<?php echo $note['Id'];?>"><?php echo $note['title'];?></a></h4>
								<p>
									<span>小编：<?php echo $note['editor'];?></span>
									<span> 时间：<?php echo $note['tour_time'];?></span>
								</p>
								<?php if($note['images']!=''):?>
									<?php $arr=explode(',',substr($note['images'],0,-1));?>
										<?php foreach($arr as $img):?>
											<a href="aboutus/note/<?php echo $note['Id'];?>"><img src="<?php echo $img;?>"></a>
										<?php endforeach;?>
								<?php else:?>
									<a href="aboutus/note/<?php echo $note['Id'];?>"><img src="<?php echo $note['thumb'];?>"></a>
								<?php endif;?>
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

					<div class="sidetag clearfix">
						<p id="tagcloud">
							<a href="index/tour/danba" style="font-size:18px;color:#87A800;">丹巴</a>  
							<a href="index/tour/yading" style="font-size:22px;color:#DE2159;">稻城亚丁</a>  
							<a href="index/tour/luguhu" style="font-size:18px;color:#87A800;">泸沽湖</a>
							<a href="index/tour/jiuzhai" style="font-size:22px;color:#DE2159;">九寨沟</a>  
							<a href="index/tour/yanzigou" style="font-size:16px;color:#DE2159;">燕子沟</a> 
							<!-- <a href="" style="font-size:22px;color:#039FAF;">大美川西</a>   -->
							<a href="index/tour/hailuogou" style="font-size:16px;color:#87A800;">海螺沟</a>
							<a href="index/tour/danba" style="font-size:13px;color:#DE2159;">丹巴</a> 
							<a href="index/tour/mugecuo" style="font-size:16px;color:#87A800;">木格措</a> 
							<a href="index/tour/emeishan" style="font-size:14px;color:#FF7600;">峨眉山</a> 
							<a href="index/tour/gongga" style="font-size:14px;color:#DE2159;">贡嘎</a> 
							<a href="index/tour/siguniangshan" style="font-size:22px;color:#039FAF;">四姑娘山</a>
							<a href="index/tour/qingcheng" style="font-size:13px;color:#FF7600;">青城山</a>
							<a href="index/tour/xichang" style="font-size:18px;color:#87A800;">西昌</a>
						</p>
					</div>

					<script type="text/javascript">
						$("#tagcloud a").hover(function(){
							var color = $(this).css('color');
							$(this).css({"color":"#F5F5EB", "background-color":color});
						}, function(){
							var bgcolor = $(this).css('background-color');
							$(this).css({"color":bgcolor, "background":"#F5F5EB"});
						})
					</script>

					<div class="idea clearfix">
						<h3>友途始终如一的理念</h3>
						<ul>
							<li>
								<i class="img01"></i>
								<p>
									与友途，自由永无极限，一路随时停车，任由你逗留某个钟情地。
								</p>
							</li>
							<li>
								<i class="img02"></i>
								<p>
									与友途，感受最真实的世界，体验最原汁原味的四川。

								</p>
							</li>
							<li>
								<i class="img03"></i>
								<p>
									与五湖四海的朋友一起谈天说地，分享人生，瞬间成长。 

								</p>
							</li>
							<li>
								<i class="img04"></i>
								<p>
									友途需要每个人一点点的爱来维护我们生活的这片土地.... 

								</p>
							</li>
							<li>
								<i class="img05"></i>
								<p>
									友途只做让你每每回忆起来感动的旅行，而不是奢华的高费用旅游。 

								</p>
							</li>
							<li>
								<i class="img06"></i>
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
								<i class="img01"></i>
								<b>曾可（木灯）</b>
								<span>友途领队</span>
							</li>
							<li>
								<i class="img02"></i>
								<b>张磊（木雅）</b>
								<span>友途领队</span>
							</li>
							<li>
								<i class="img03"></i>
								<b>陈传敏（大猫）</b>
								<span>友途领队</span>
							</li>
							<li>
								<i class="img04"></i>
								<b>宋中伟（野猪）</b>
								<span>友途领队</span>
							</li>
							<li>
								<i class="img05"></i>
								<b>袁辰恺（圆小胖）</b>
								<span>友途小编</span>
							</li>
							<!-- <li>
								<i class="img06"></i>
								<b>亓纯静</b>
								<span>友途小编</span>
							</li> -->
							<li>
								<a class="more" href="aboutus/leader">>>详情</a>
							</li>
						</ul>
					</div>


					<div class="social clearfix">
						<h3>关注友途， 关注不一样的旅行</h3>
						<a class="mt" href="http://page.renren.com/601461125/index">
							<i class="img01"></i>
							人人网<br>
							友途旅行
						</a>
						<a href="http://weibo.com/utotrip">
							<i class="img02"></i>
							新浪微博<br>
							友途旅行
						</a>
						<a href="http://1758863234.qzone.qq.com">
							<i class="img03"></i>
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
