<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $tour[0] -> title;?>|固定排期 友途旅行网</title>
		<?php if(isset($tour[0]->description)):
		?>
		<meta name="description" content="<?php echo $tour[0] -> description;?>">
		<?php endif;?>
		<?php if(isset($tour[0]->keywords)):
		?>
		<meta name="keywords" content="<?php echo $tour[0] -> keywords;?>">
		<?php endif;?>
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body>
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="#">首页</a> > 友途互动
				</div>
				<div class="aside"></div>
				<div class="article">
					<input type="hidden" value="<?php echo $tour[0]->Id;?>" id="tour_id">
					<input type="hidden" value="<?php echo $tour[0]->days;?>" id="tour_day">
					<input type="hidden" value="<?php echo $tour[0]->is_private;?>" id="is_private">
					<?php if(isset($tour[0]->name)):
					?>
					<h1 id="tour_title"><?php echo $tour[0] -> name;?></h1>
					<?php endif;?>
					<div class="des-p">
						<?php if(isset($tour[0]->intro)):
						?>
						<?php echo $tour[0] -> intro;?>
						<?php endif;?>
					</div>
					<?php if(isset($tour[0]->thumbnail)): ?>
						<img class="des-img" width="300" height="180" src="<?php echo $tour[0]->thumbnail; ?>" title="<?php echo $tour[0]->name;?>" alt="<?php echo $tour[0]->name;?>">
					<?php endif;?>
					<div class="join">
						<div class="j-left">
							<h3>快速报名：</h3>
							<p>
								选择期数：
								<select size="3" multiple="multiple">
									<?php if(isset($tour[0]->term)):
									?>
									<?php foreach(explode("<br />",$tour[0]->term) as $term):
									?>
									<option class="term" value="<?php echo $term;?>"><?php echo $term;?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</p>
							<p>
								参加人数：
								<input class="people" type="text">
							</p>
							<p>
								<input class="btn" id="inquiry" value="在线报名" type="submit">
								<span>（成都统一集结，建议提前<em class="red">3</em>天报名.）</span>
							</p>
						</div>
						<div class="j-right">
								<p>
								24小时旅游预订电话
								<br>	
								<span class="tel">400-670-6300</span>
								<a class="qonline" target="_blank" href="http://sighttp.qq.com/authd?IDKEY=fd67b19c8f7cb596955cf0d3e879b31202f3ba7b4181ed2c">
									<img src="http://wpa.qq.com/imgd?IDKEY=fd67b19c8f7cb596955cf0d3e879b31202f3ba7b4181ed2c&pic=41" alt="点击这里给我发消息" title="点击这里给我发消息">
								</a>
								
							</p>	
							
						</div>
						
					</div>
					<ul class="sub-nav">
						<li class="current">
							线路简介 <span></span>
						</li>
						<li>
							具体行程 <span></span>
						</li>
						<li>
							费用说明 <span></span>
						</li>
						<li>
							注意事项 <span></span>
						</li>
						
					</ul>
					<div class="unit"><!-- 线路简介 -->
						<h3>行程简报：</h3>
						<p>
							<?php if(isset($tour[0]->route_intro)):
							?>
							<?php echo $tour[0] -> route_intro;?>
							<?php endif;?>
						</p>
						<h3> 线路简介 </h3>
						<p>
							<?php if(isset($tour[0]->intro)):
							?>
							<?php echo $tour[0] -> intro;?>
							<?php endif;?>
						</p>
						<h3> 活动主题 </h3>
						<p>
							<?php if(isset($tour[0]->theme)):
							?>
							<?php echo $tour[0] -> theme;?>
							<?php endif;?>
						</p>
						<h3>行程亮点及体验</h3>
						<div class="experience">
							<?php if(isset($tour[0]->content)):
							?>
							<?php echo $tour[0] -> content;?>
							<?php endif;?>
							<p>
								<img src="assets/images/banner-big.jpg" alt="map" width="670px" height="260px" >
							</p>
							<h2>往期照片集锦</h2>
							<div class="imglist clearfix">
								<?php if(isset($img)):
								?>
								<?php foreach($img as $imginfo):
								?>
								<a rel="fancyimg" href="<?php echo $imginfo['path'];?>" title="<?php echo $imginfo['des'];?>" ><img class="fancyimg" alt="<?php echo $imginfo['alt'];?>" src="<?php echo $imginfo['small'];?>"></a>
								<?php endforeach;?>
								<?php endif?>
							</div>
						</div>
					</div>
					<div class="unit route"> <!-- 具体行程 -->
						<?php if(isset($route)):?>
						<?php for($i=0;$i<count($route);$i++):?>
							<?php if(($i+1)%2==0):?>
							<dl class="odd">
								<dt>
									<h4> Day <?php echo $i + 1;?></h4>
								</dt>
								<dd>
									<h4><?php echo $route[$i]['course'];?></h4>
									<p>
										<?php echo $route[$i]['content'];?>
									</p>
								</dd>
							</dl>
							<?php else:?>
								<dl>
								<dt>
									<h4>Day <?php echo $i + 1;?></h4>
								</dt>
								<dd>
									<h4><?php echo $route[$i]['course'];?></h4>
									<p>
										<?php echo $route[$i]['content'];?>
									</p>
								</dd>
							</dl>
							<?php endif;?>

						<?php endfor;?>
						<?php endif;?>
					</div>
					<div class="unit fee"> <!-- 费用说明 -->
						<?php if(isset($tour[0]->price_detail)):
						?>
						<?php echo $tour[0] -> price_detail;?>
						<?php endif;?>
					</div>
					<div class="unit"> <!--  注意事项 -->
						<?php if(isset($tour[0]->notice)):
						?>
						<?php echo $tour[0] -> notice;?>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
