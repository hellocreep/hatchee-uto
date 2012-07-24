<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>定制化旅行 | 友途旅行网</title>
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/onecol.css">
		<script type="text/javascript" src="assets/My97DatePicker/WdatePicker.js"></script>
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body id="n-customize">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > 定制旅行
				</div>
				<div class="guideword">
					<h1>定制旅行</h1>
					<p>
						友途的定制旅行旨在打造您的专属旅程、专注于帮助您实现心中最原始的旅行梦想，寻觅那抹最让你动心的风景，感受这个承载着原始与纯净土地上的不可思议、原汁原味、自然奇迹和民俗文化，也只能这样的地方，才能担当得起友途如此厚重的神情。 
					</p>
					<p>
						请您一定要记得，友途定制旅行卖的不是昂贵的奢华，而是根据您的预算，依您口味，随您选择，为您量身定做最有性价比的旅行解决方案。
					</p>	
				</div>
				<div class="onecol">
					<ul class="guidenav clearfix" >
						<li class="current">01.选择您的旅游地</li>	
						<li >02.旅游定制化</li>	
						<li>03.填写您的个人信息</li>	
						
						<li>04.定制完成</li>	
					</ul>
					<div class="guidezone">
						<div class="marqueen">
							<form id="customize" >
						<div class="unit unit-first">
						<h2>1.选择目的地</h2>
						<ul class="placelist clearfix">
						<?php foreach($des as $d):?>
							<li>
							<label>
							<img src="<?php echo $d['img'];?>" alt="">
							<input name="place" type="checkbox" value="<?php echo $d['name'];?>"><?php echo $d['name'];?>
							</label>
							</li>
						<?php endforeach;?>
					</ul>
					</div>
					<div class="unit">	
						<h2>2.定制化信息</h2>
						<table class="infozone formtab">
							<tr>
								<td>出发时间：</td>
								<td><input name="tour_time" class="Wdate" type="text" onfocus="WdatePicker({minDate:'%y-%M-{%d}'})" name="start"></td>

							</tr>
							<tr>
								<td>选用车型：</td>
								<td>
									<select name="car">
										<option value="三菱越野">三菱越野</option>	
										<option value="17座全顺">17座全顺</option>	
										<option value="19-23座考斯特">19-23座考斯特</option>	
										<option value="30-39座大巴">30-39座大巴</option>	
									</select>
								</td>
							</tr>
							<tr>
								<td>参加人数：</td>
								<td><input name="people" type="text"></td>
							</tr>
							<tr>
								<td>旅行天数：</td>
								<td><input name="day" type="text"></td>
							</tr>
							<tr>
								<td>旅行主题：</td>

								<td>
									<?php foreach($theme as $t):?>
									<label><input name="theme" type="checkbox" value="<?php  echo $t->name;?>"><?php  echo $t->name;?></label>
									<?php endforeach;?>
								</td>
							</tr>
							<tr>
								<td> 这趟旅行有特殊纪念意义&nbsp;<br>或庆祝特别的日子吗？</td>
								<td><textarea name="special"></textarea></td>
							</tr>
							<tr>
								<td>其他需求：</td>
								<td><textarea name="comment"></textarea></td>
							</tr>
						</table>
					</div>
					<div class="unit">
					<h2>3.联系人信息</h2>
					<table class="infozone formtab">
							<tr>
								<td><em>*</em>姓名：</td>
								<td><input name="name" class="required" type="text"></td>
							</tr>	
							<tr>
								<td><em>*</em>手机：</td>
								<td><input name="tel" class="required num" type="text"></td>
							</tr>
							<tr>
								<td><em>*</em>邮箱：</td>
								<td><input name="email" class="required email" type="text"></td>
							</tr>
							<tr>
								<td>QQ：</td>
								<td><input name="qq" type="text"></td>
							</tr>
							<tr>
								<td>来自哪个城市：</td>
								<td><input name="city" type="text"></td>
							</tr>
							<tr><td></td><td><input id="customize-submit" type="submit" class="btn" value="确认提交"></td></tr>
						</table>
					</div>
					<div class="unit">
						<h2>4.信息提示</h2>
						<p>
							您的信息尚未提交，请点击<b>上一步</b>进行确认提交。
							
						</p>
					</div>
				</form>
				</div>
					</div>
					<ul class="guidefoot clearfix" >
						<li class="note">预订有问题？请拨打24小时咨询电话：<span class="tel">4000-520-161</span></li>
						<li id="next" class="current btn">下一步></li>	
						<li id="prev" class="btn"><上一步</li>	
					</ul>
				</div>
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
