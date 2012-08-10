<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $webinfo[0] -> title;?> | 友途旅行网</title>
		<!-- <meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>"> -->
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/landingpage.css">
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body id="n-company">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > 友途活动
				</div>
				<?php $this -> load -> view("web/include/aside-company");?> <!-- 侧边栏chunk -->
				<div class="article com">
					<div class="pageintro">
						<h1>公司出游</h1>
						<p>
							累积多年公司出游服务经验，或公司拓展、或奖励旅行，友途可谓打造了一流的服务。每条由友途专家精心设计安排的行程，都兼顾了趣味性和团队性。旅途中的各项运动项目，既有考验团队合作精神的集体项目，也有充分展示个人风采的个人项目，既有需要较高技巧的项目，也有非常消耗体力的剧烈运动。把大家从日常繁重的工作中解脱出来，彻底抛弃工作中的压力，快乐不再压抑，信心从此增强，让您的员工们拥有了团队，毅力与信心，把力量悄悄凝聚，迎接翘首以盼的胜利。 
						</p>
						<p>
							友途提供给您的公司出游服务，在乎的并不仅仅是每团员的体验，而是您整个团队的改变。 无论小团体还是大团队，友途都将根据您企业的实际需求，为您提供专业的解决方案，使您从容达成目标。　
						</p>
					</div>

					<div class="recommend">
						<ul class="routelist clearfix">
							<?php foreach($tour as $company):?>
								<li>
								<span class="days"><?php echo $company['days'];?></span><h2><a href="tourdetail/tour/<?php echo $company['Id'];?>"><?php echo $company['name'];?></a></h2>
								<p><?php echo mb_substr($company['intro'],0,90,'utf-8').'......';?><a href="tourdetail/tour/<?php echo $company['Id'];?>">更多</a></p>
								<dl class="route-detail">
									<dt><a href="tourdetail/tour/<?php echo $company['Id'];?>"><img width="240" height="140" alt="<?php echo $company['name'];?>" src="<?php echo $company['thumbnail'];?>"></a></dt>
									<dd>
										<span>旅行地区：</span><div><?php echo str_replace(',','、',substr($company['destination'],0,-1));?></div>
									</dd>
									<dd>
										<span>活动内容：</span><div><?php echo mb_substr($company['company_intro'],0,50,'utf-8').'……';?></div>
									</dd>
									<dd>
										<span>适合人数：</span><div><?php echo $company['people'];?></div>
									</dd>
									
									<dd class="last">
										<a class="btn" href="tourdetail/tour/<?php echo $company['Id'];?>">线路详情</a>	
									</dd>
								</dl>
								</li>
								
							<?php endforeach;?>
							
						</ul>
					</div>
						
					<div class="separator"></div>

					<div class="event">
						<h3>往期案列 </h3>
						<ul class="clearfix">
							<?php foreach($note as $travel):?>
								<li>
								<a href="aboutus/note/<?php echo $travel['Id'];?>">
									<img alt="" src="<?php echo $travel['thumb'];?>"></a>
								<h5>
									<a href="aboutus/note/<?php echo $travel['Id'];?>"><?php echo $travel['title'];?></a>
								</h5>
								<p>
									活动时间：<?php echo $travel['tour_time'];?><br>
									活动人数：<?php echo $travel['people'];?>人<br>
									公司名称：<?php echo $travel['company'];?>
								</p>
								<a href="aboutus/note/<?php echo $travel['Id'];?>" class="detail">活动详情</a>
								</li>
							<?php endforeach;?>
							
						</ul>
					</div>

					<div class="separator"></div>

					<div class="activity">
						<h3>拓展活动内容</h3>
						<ul>
							<?php foreach($expand as $list):?>
								<li>
								<a href="expandtour/expand/<?php echo $list['Id'];?>"><img src="<?php echo $list['thumbnail'];?>" alt="<?php echo $list['title'];?>"></a>
								<h5><a href="expandtour/expand/<?php echo $list['Id'];?>"><?php echo $list['title'];?></a></h5>	
								<p>
									<?php echo $list['intro'];?>
								</p>
								<p>
									活动天数：<?php echo $list['day'];?> <a class="detail" href="expandtour/expand/<?php echo $list['Id'];?>">活动详情</a>
								</p>
							</li>
							<?php endforeach;?>
						</ul>
						
					</div>
				</div> <!-- end of .article -->
					
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
