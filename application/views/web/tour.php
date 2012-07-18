<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $tour[0] -> title;?>| 友途旅行网</title>
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
		<link rel="stylesheet" type="text/css" href="assets/styles/tour.css">
	</head>
	<body id="n-trip">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>termtour">友途活动</a> > <?php echo $tour[0] -> name;?>
				</div>
				<div class="aside"></div>
				<div class="article">
					<input type="hidden" value="<?php echo $tour[0] -> Id;?>" id="tour_id">
					<input type="hidden" value="<?php echo $tour[0] -> days;?>" id="tour_day">
					<input type="hidden" value="<?php echo $tour[0] -> tour_type;?>" id="is_private">
					<?php if(isset($tour[0]->name)):
					?>
					<h1 id="tour_title"><?php echo $tour[0] -> name;?></h1>
					<?php endif;?>
					<div class="describe clearfix">
						<?php if(isset($tour[0]->thumbnail)):
						?><img class="des-img" width="300" height="180" src="<?php echo $tour[0] -> thumbnail;?>" title="<?php echo $tour[0] -> name;?>" alt="<?php echo $tour[0] -> name;?>">
						<?php endif;?>
						<?php if(isset($tour[0]->intro)):?>
						<?php echo $tour[0] -> intro;?>
						<?php endif;?>
					</div>
					<div class="join clearfix">
						<!-- <h4>快速报名：</h4> -->
						<div class="j-left">
							<p>
								<b>选择期数：</b>
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
								<b>参加人数：</b>
								<select id="peo">
									<option class="people">1</option>
									<option class="people">2</option>
									<option class="people">3</option>
									<option class="people">4</option>
									<option class="people">5</option>
									<option class="people">6</option>
									<option class="people">7</option>
									<option class="people">8</option>
									<option class="people">9</option>
									<option class="people">10</option>
									<option class="people" value="more">更多</option>
								</select>
								<script type="text/javascript">
									$(function(){
										var result =$(".peo .people:last").val();
									      if(result =="more") 
									      alert( "此选择 为 自定义");// 主要 用 接收 的value 值来判断； 
									})
									

								</script>
								<input class="btn" id="inquiry" value="在线报名" type="submit"><span class="promotion"><img src="assets/images/promotion100.png"></span>
								<!-- <input class="people" type="text"> -->
							</p>
							<!-- <p class="pad">
								<input class="btn" id="inquiry" value="在线报名" type="submit"><span class="promotion"><img src="assets/images/promotion100.png"></span>
							</p> -->
								<span><em class="red">*&nbsp;&nbsp;</em>成都统一集结，建议提前<em class="red big">&nbsp;3&nbsp;</em>天报名.</span>
						</div>
						<div class="j-right">
							<p>
								<b>24小时旅游预订电话：</b>
								<br>
								<span class="tel">4000-520-161</span>

								<?php $this -> load -> view("web/qqonline");?> <!-- 在线联系QQ -->
							</p>
						</div>
					</div>
					<ul class="sub-nav clearfix">
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
					<div class="sub-wrap clearfix">
						<div class="unit">
							<!-- 线路简介 -->
							<p>
								<b class="h4inline">行程简报：</b>
								<?php if(isset($tour[0]->route_intro)):
								?>
								<?php echo $tour[0] -> route_intro;?>
								<?php endif;?>
							</p>
							<h4>行程亮点及体验：</h4>
							<div class="experience">
								<?php if(isset($tour[0]->content)):
								?>
								<?php echo $tour[0] -> content;?>
								<?php endif;?>
							</div>
							<h4>线路地图</h4>
								<div>
									<?php if(isset($tour[0]->tour_map)): ?>
										<img src="<?php echo $tour[0]->tour_map; ?>" alt="map" width="670px" height="580px" >
									<?php endif;?>
								</div>
						</div>
						<div class="unit route">
							<!-- 具体行程 -->
							<?php if(isset($route)):
							?>
							<?php for($i=0;$i<count($route);$i++):?>
<?php if(($i+1)%2==0):
							?>
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
						<div class="unit fee">
							<!-- 费用说明 -->
							<?php if(isset($tour[0]->price_detail)):
							?>
							<?php echo $tour[0] -> price_detail;?>
							<?php endif;?>
						</div>
						<div class="unit">
							<!--  注意事项 -->
							<?php if(isset($tour[0]->notice)):
							?>
							<?php echo $tour[0] -> notice;?>
							<?php endif;?>
						</div>
					</div>
					<div class="separator"></div>
					<h3>往期照片集锦</h3>
					<div class="imglist clearfix">
						<?php if(isset($img)):
						?>
						<?php foreach($img as $imginfo):
						?>
						<a rel="fancyimg" href="<?php echo $imginfo['path'];?>" title="<?php echo $imginfo['des'];?>"><img width="170" height="100" class="fancyimg" alt="<?php echo $imginfo['alt'];?>" src="<?php echo $imginfo['small'];?>"></a>
						<?php endforeach;?>
						<?php endif;?>
					</div>
					</div>
					
				</div><!-- end of .article -->
				<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
			</div><!-- 	end of .wrapper	 -->
	</body>
</html>
