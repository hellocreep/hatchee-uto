<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $tour[0] -> title;?> | 友途旅行网</title>
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
		<script type="text/javascript" src="assets/My97DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="assets/My97DatePicker/calendar.js"></script>
	</head>
	<body id="n-theme">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>themetour">主题旅行</a> > <?php echo $tour[0] -> name;?>
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
					<div class="des-p clearfix">
						<?php if(isset($tour[0]->thumbnail)): ?>
							<img class="des-img" width="300" height="180" src="<?php echo $tour[0]->thumbnail; ?>" title="<?php echo $tour[0]->name;?>" alt="<?php echo $tour[0]->name;?>">
						<?php endif;?>
						<?php if(isset($tour[0]->intro)):
						?>
						<?php echo $tour[0] -> intro;?>
						<?php endif;?>
					</div>
					<div class="join clearfix">
						<div class="schedule_table clearfix">
							<?php if(isset($tour[0]->term)):?>
							<?php echo $tour[0]->term;?>
							<?php endif;?>
						</div>			
						<p class="apply">
							报名人数：
							<input class="people" type="text">
						
						<input class="btn" id="inquiry" value="在线报名" type="submit">						

						<br><span>（成都统一集结，建议提前&nbsp;<em class="red">3</em>&nbsp;天报名.）</span></p>
						<p class="contact"> 
							24小时旅游预订电话：
							<span class="tel">4000-520-161</span><br>
							<a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=fd67b19c8f7cb596955cf0d3e879b31202f3ba7b4181ed2c">
								<img src="http://wpa.qq.com/imgd?IDKEY=fd67b19c8f7cb596955cf0d3e879b31202f3ba7b4181ed2c&pic=41" alt="点击这里给我发消息" title="点击这里给我发消息">
							</a>
						</p>


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
						<li>
							量身定制 <span></span>
						</li>
					</ul>
					<div class="sub-wrap clearfix">
					<div class="unit"><!-- 线路简介 -->
						<h4>行程简报：</h4>
						<p>
							<?php if(isset($tour[0]->route_intro)):
							?>
							<?php echo $tour[0] -> route_intro;?>
							<?php endif;?>
						</p>
						<h4> 线路简介 </h4>
						<p>
							<?php if(isset($tour[0]->intro)):
							?>
							<?php echo $tour[0] -> intro;?>
							<?php endif;?>
						</p>
						<p>
						<h4 class="inline"> 活动主题 </h4>
							<?php if(isset($tour[0]->theme)):
							?>
							<?php echo substr($tour[0] -> theme,0,-1);?>
							<?php endif;?>
						</p>
						<h4>行程亮点及体验</h4>
						<div class="experience">
							<?php if(isset($tour[0]->content)):
							?>
							<?php echo $tour[0] -> content;?>
							<?php endif;?>
							<p>
								<img src="assets/images/banner-big.jpg" alt="map" width="670px" height="260px" >
							</p>
							
						</div>
					</div> <!-- end of .unit -->

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
					<div class="unit customize">
						<p>这条线路，是我们包装出来的基本线路，如果您在这条线路上需要进行修改，必须增加天数、景点等，可以填写下面的表单，我们按照您的要求来进行定制。</p>
						<h4>联系人信息</h4>
						<form id="custom_inquiry">
							<table class="formtab">
								<tr>
									<td><em>*</em>姓名：</td>
									<td ><input type="text" name="name" class="required"></td>
								</tr>	
								<tr>
									<td><em>*</em>手机：</td>
									<td><input type="text" name="tel" class="required num"></td>
								</tr>
								<tr>
									<td><em>*</em>邮箱：</td>
									<td><input type="text" name="email" class="required email"></td>
								</tr>
								<tr>
									<td>QQ：</td>
									<td><input type="text" name="qq"></td>
								</tr>
								<tr>
									<td>来自哪个城市：</td>
									<td><input type="text" name="city"></td>
								</tr>
							</table>

							<h4>定制化信息</h4>
							<table class="formtab">
								<tr>
									<td>出发时间：</td>
									<td><input type="text" name="tour_time" class="date"></td>
								</tr>
								<tr>
									<td>选用车型：</td>
									<td><input type="text" name="car"></td>
								</tr>
								<tr>
									<td>参加人数：</td>
									<td><input type="text" name="people"></td>
								</tr>
								<tr>
									<td>增加的旅行天数：</td>
									<td><input type="text" name="add_day"></td>
								</tr>
								<tr>
									<td>想增加的旅行目的地：</td>
									<td class="maxwidth">
										<?php foreach($des as $d):?>
											<label><input name="add_day" type="checkbox" value="<?php echo $d;?>"><?php echo $d;?></label>
										<?php endforeach;?>
									</td>
								</tr>
								<tr>
									<td> 这趟旅行有特殊纪念意义<br>或庆祝特别的日子吗？</td>
									<td><textarea name="special_day"></textarea></td>
								</tr>
								<tr>
									<td>其他要求：</td>
									<td><textarea name="other"></textarea></td>
								</tr>
								<tr><td></td><td><input id="custom-submit" type="submit" class="btn" value="确认提交"></td></tr>
							</table>
						</form>
					</div>
				</div>
				<h3>往期照片集锦</h3>
				<div class="imglist clearfix">
					<?php if(isset($img)):
					?>
					<?php foreach($img as $imginfo):
					?>
					<a rel="fancyimg" href="<?php echo $imginfo['path'];?>" title="<?php echo $imginfo['des'];?>" ><img class="fancyimg" alt="<?php echo $imginfo['alt'];?>" src="<?php echo $imginfo['small'];?>" width="170" height="100" /></a>
					<?php endforeach;?>
					<?php endif?>
				</div>
				</div>
			</div><!-- end of .article -->
			<div class="footer"></div>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
