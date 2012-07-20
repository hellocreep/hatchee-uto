<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $tour[0]->title;?>| 友途旅行网</title>
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
		<script type="text/javascript" src="assets/jquery-ui/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript" src="assets/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui-1.8.21.custom.css">
		<link rel="stylesheet" type="text/css" href="assets/styles/tour.css">
		<script>
			(function(){
			$(function(){
				$( '.Wdate' ).datepicker();	
			})
			})(jQuery)
		</script>
	</head>
	<body id="n-company">
		<div class="wrapper">
			<?php $this -> load -> view("web/include/auth-tool");?>
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>termtour">友途活动</a> > <?php echo $tour[0] -> name;?>
				</div>
				<?php $this -> load -> view("web/include/aside-company");?> <!-- 侧边栏chunk -->
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
									<span class="price">一团一议</span>
								</li>
								<li>
									<b>报名时间：</b><span  class="m-time">请提前&nbsp;<b>10</b>&nbsp;天报名</span>
								</li>
								<li>
									<b>客服电话：</b><span class="price"><b>4000-520-161</b></span>
								</li>
								<li>
									<b>客服&nbsp;QQ：</b>
									<?php $this -> load -> view("web/qqonline");?> <!-- 在线联系QQ -->
								</li>
							</ul>

							<h5>该线路适合公司、企业、学校、单位团队旅行</h5>
							<p>
								该行程适合团队出游。景区目的地或者在景区周边，可以找到相应的活动场地进行团队拓展活动。在相应的目的地也可以找到酒店会议场所，适合内训课程和公司会议的开展。将公司的拓展、内训或会议在这些目的地举行，既能达到培训效果又能尽情释放出激情。
							</p>
						</div>
					</div>
					
					<ul class="sub-nav clearfix">
						<li class="current">
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
						<p>
							我们提供的是四川内经典的单位团队旅游线路，该线路上适合开展相关的拓展活动和公司内训课程。请在下面表单中勾选相关的团队活动。我们会按照您的要求来为您公司量身打造相关的拓展旅游、内训旅游、会议旅游和考察旅游。
						</p>
						<form id="company_inquiry">
							<table class="formtab">
								<tr>
									<td colspan="2">
										<h4>联系人信息</h4>
									</td>
								</tr>
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
									<td>单位名称：</td>
									<td><input type="text" name="company"></td>
								</tr>
								<tr>
									<td colspan="2">
										<h4>定制化信息</h4>
									</td>
								</tr>
								<tr>
									<td>出发时间：</td>
									<td><input type="text" name="tour_time" class="date Wdate"></td>
								</tr>
								<tr>
									<td>参加人数：</td>
									<td><input type="text" name="people"></td>
								</tr>
								<tr>
									<td>公司拓展活动：</td>
									<td>
										<label><input name="expand" type="checkbox" value="武林大会">武林大会</label>
										<label><input name="expand" type="checkbox" value="寻找魔兽">寻找魔兽</label>
										<label><input name="expand" type="checkbox" value="这是我的船">这是我的船</label>
										<label><input name="expand" type="checkbox" value="CS野战">CS野战</label>
										<label><input name="expand" type="checkbox" value="趣味运动会">趣味运动会</label>
									</td>
								</tr>
								<tr>
									<td>企业内训课程：</td>
									<td class="maxwidth">
										<label><input name="train" type="checkbox" value="1天《让顾客回头》">1天《让顾客回头》</label>
										<label><input name="train" type="checkbox" value="1天《绝对执行力》">1天《绝对执行力》</label>
										<label><input name="train" type="checkbox" value="1天《卓越团队共同理念》">1天《卓越团队共同理念》</label><br>
										<label><input name="train" type="checkbox" value="1天《同理心》">1天《同理心》</label>
										<label><input name="train" type="checkbox" value="1天《像狼那样战斗》">1天《像狼那样战斗》</label>
									</td>
								</tr>
								<tr>
									<td>这趟出游要达到的目的：</td>
									<td><textarea name="aim"></textarea></td>
								</tr>
								<tr>
									<td>其他要求：</td>
									<td><textarea name="other"></textarea></td>
								</tr>
								<tr><td></td><td><input id="company-submit" type="submit" class="btn" value="确认提交"></td></tr>
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
