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
		<link rel="stylesheet" type="text/css" href="assets/styles/tour.css">
		<script type="text/javascript" src="assets/My97DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="assets/My97DatePicker/calendar.js"></script>
	</head>
	<body id="n-theme">
		<div class="wrapper">
			<?php $this -> load -> view("web/include/auth-tool");?>
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>themetour">主题旅行</a> > <?php echo $tour[0] -> name;?>
				</div>
				<?php $this -> load -> view("web/include/aside-theme");?> <!-- 侧边栏chunk -->
				<div class="article">
					<input type="hidden" value="<?php echo $tour[0]->Id;?>" id="tour_id">
					<input type="hidden" value="<?php echo $tour[0]->days;?>" id="tour_day">
					<input type="hidden" value="<?php echo $tour[0]->tour_type;?>" id="is_private">
					<?php if(isset($tour[0]->name)):
					?>
					<h1 id="tour_title"><?php echo $tour[0] -> name;?></h1>
					<?php endif;?>
					<div class="describe clearfix">
						<div class="des-l">
							<?php if(isset($tour[0]->thumbnail)): ?>
								<img class="des-img" width="300" height="180" src="<?php echo $tour[0]->thumbnail; ?>" title="<?php echo $tour[0]->name;?>" alt="<?php echo $tour[0]->name;?>">
							<?php endif;?>
							<ul>
								<li>
									<b>价&#12288;&#12288;格：</b>
									<span class="price">
										<?php if(isset($tour[0]->price) && $tour[0]->price != 0): ?>
										<?php echo '￥<b>'.$tour[0]->price."</b>起";?>
										<?php else:?>
										<?php echo "一团一议";?>
										<?php endif;?>
									</span>
									<span class="s-wrap">
										<img src="assets/images/why.gif">&nbsp;起价说明
										<span class="inbox">
											1. 本起价是从已经核算好的时间内、按双人出行共用一间房的单人最低价格。
											<br>
											2. 本起价为纯玩品质团，包含领队和导游服务费的价格。
											<br>
											3. 产品的价格会根据您的出发日期，出行人数，选择的车辆类型以及所选附加服务的不同而有所差别。 
											<br>
											4. 若您选择的出行方式为拼团或者租车自由行，价格另议。

										</span>
									</span>
									<span class="s-wrap discount">
										<i>早多优惠</i>
										<span class="inbox">
			                                &bull;&nbsp;提前<em>20</em>天（含）以上完成签约和付清全款，每位成人优惠<em>50</em>元。<br>
			                                &bull;&nbsp;<em>5</em>位（含）以上成人预订，每位成人立减<em>50</em>元；<br>
			                                &bull;&nbsp;行程不做修改，立即付款的，每位成人立减<em>80</em>元；<br>
			                                &bull;&nbsp;以上促销不能叠加使用。
										</span>
									</span>								
								</li>
								<li> <b>报名时间：&nbsp;</b>
									<span  class="m-time">
										请提前&nbsp; <b>10</b>
										&nbsp;天报名
									</span>
								</li>
								<li>
									<b>客服电话：&nbsp;</b>
									<span class="price">
										<b>4000-520-161</b>
									</span>
								</li>
								<li>
									<b>客服&nbsp;QQ：&nbsp;</b>
									<?php $this -> load -> view("web/qqonline");?> <!-- 在线联系QQ -->
								</li>
								<li>
									<b>活动主题：</b>
									<span>
										<?php if(isset($tour[0]->theme)):?>
										<?php echo str_replace(',','、',substr($tour[0] -> theme,0,-1));?>
										<?php endif;?>
									</span>
								</li>
							</ul>						
							<h5>该线路可独立包团、或拼团、或租车+酒店自由行 </h5>
							<p>
								1. 独立包团：一个家庭、亲朋好友或者自己圈子里的朋友，按照您指定的时间发团，外人不加入。随时停车拍摄，纯玩品质，无购物。领队或者导游根据游客特点，在旅行过程中加入很多互动体验元素，让旅行更个性化。
								<br>
								2. 游客拼团：是否特别想去某个地方，苦于人数偏少，费用较高？别担心，友途和您一起，寻找一起结伴的游客，共同出游。拼团出游，您预约的时间越早，越能找到志同道合的朋友一起旅行。
								<br>
								3. 租车+酒店自由行：您对四川很熟悉，也熟悉每个景点的不同玩法，只需要有车和酒店，您自己就能安排好朋友在这些目的地玩好吃好。
							</p>
							
						</div>

						<!-- <?php if(isset($tour[0]->intro)):
							?>
							<?php echo $tour[0] -> intro;?>
						<?php endif;?> -->
					</div>
					<div class="vehicle join clearfix">
						<div class="schedule_table clearfix">
							<?php if(isset($tour[0]->term)):?>
							<?php echo $tour[0]->term;?>
							<?php endif;?>
						</div>			
						<p class="apply">
							报名人数：
							<select id="peo">
									<option class="people">1</option>
									<option class="people" selected>2</option>
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
						
						<input class="btn" id="inquiry" value="在线报名" type="submit">						

						<br><span>（成都统一集结，建议提前&nbsp;<em class="red">3</em>&nbsp;天报名.）</span></p>
						<p class="contact"> 
							24小时旅游预订电话：
							<span class="tel">4000-520-161</span><br>
							<?php $this -> load -> view("web/qqonline");?> <!-- 在线联系QQ -->
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
						<p>
						<b class="h4inline">行程简报：</b>
							<?php if(isset($tour[0]->route_intro)):
							?>
							<?php echo $tour[0] -> route_intro;?>
							<?php endif;?>
						</p>
						<h4> 线路简介： </h4>
						<p>
							<?php if(isset($tour[0]->intro)):?>
							<?php echo $tour[0] -> intro;?>
							<?php endif;?>
						</p>
						<p>
						
						<h4>行程亮点及体验：</h4>
						<div class="experience">
							<?php if(isset($tour[0]->content)):
							?>
							<?php echo $tour[0] -> content;?>
							<?php endif;?>
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
											<label><input name="add_des" type="checkbox" value="<?php echo $d;?>"><?php echo $d;?></label>
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
				<div class="separator"></div>
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
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
