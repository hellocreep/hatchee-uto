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
				<div class="aside"></div>
				<div class="article com">
					<div class="recommend">
						<h3>推荐的公司活动线路</h3>	
						<ul class="routelist clearfix">
							<?php foreach($tour as $company):?>
								<li>
								<span class="days"><?php echo $company['days'];?></span><h2><a href="tourdetail/?tid=<?php echo $company['Id'];?>"><?php echo $company['name'];?></a></h2>
								<p><?php echo mb_substr($company['intro'],0,90,'utf-8').'......';?><a href="tourdetail/?tid=<?php echo $company['Id'];?>">更多</a></p>
								<dl class="route-detail">
									<dt><a href="tourdetail/?tid=<?php echo $company['Id'];?>"><img width="240" height="140" alt="<?php echo $company['name'];?>" src="<?php echo $company['thumbnail'];?>"></a></dt>
									<dd>
										<span>旅行地区：</span><div><?php echo substr($company['destination'],0,-1);?></div>
									</dd>
									<dd>
										<span>活动内容：</span><div><?php echo substr($company['company_intro'],0,-1);?></div>
									</dd>
									<dd>
										<span>适合人数：</span><div><?php echo $company['people'];?></div>
									</dd>
									
									<dd class="last">
										<a class="btn" href="tourdetail/?tid=<?php echo $company['Id'];?>">线路详情</a>	
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
								<a href="aboutus/note?id=<?php echo $travel['Id'];?>">
									<img alt="" src="<?php echo $travel['thumb'];?>"></a>
								<h5>
									<a href="aboutus/note?id=<?php echo $travel['Id'];?>"><?php echo $travel['title'];?></a>
								</h5>
								<p>
									活动时间：<?php echo $travel['tour_time'];?><br>
									活动人数：<?php echo $travel['people'];?>人<br>
									公司名称：<?php echo $travel['company'];?>
								</p>
								<a href="aboutus/note?id=<?php echo $travel['Id'];?>" class="detail">活动详情</a>
								</li>
							<?php endforeach;?>
							
						</ul>
					</div>

					<div class="separator"></div>

					<div class="activity">
						<h3>拓展活动内容</h3>
						<ul>
							<li>
								<img src="http://www.utotrip.com/utoadmin/uploads/middels/1342001376DSC_0716.jpg" alt="">
								<h5>真人CS</h5>	
								<p>
									放假了快点撒发了就斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较经济；
								</p>
								<p>
									活动性质：
								</p>
							</li>
							<li>
								<img src="http://www.utotrip.com/utoadmin/uploads/middels/1342001376DSC_0716.jpg" alt="">
								<h5>真人CS</h5>	
								<p>
									放假了快点撒发了就斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较经济；
								</p>
								<p>
									活动性质：
								</p>
							</li>
							<li>
								<img src="http://www.utotrip.com/utoadmin/uploads/middels/1342001376DSC_0716.jpg" alt="">
								<h5>真人CS</h5>	
								<p>
									放假了快点撒发了就斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较经济；
								</p>
								<p>
									活动性质：
								</p>
							</li>
							<li>
								<img src="http://www.utotrip.com/utoadmin/uploads/middels/1342001376DSC_0716.jpg" alt="">
								<h5>真人CS</h5>	
								<p>
									放假了快点撒发了就斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较斤斤计较经济；
								</p>
								<p>
									活动性质：
								</p>
							</li>
						</ul>
						
					</div>
				</div> <!-- end of .article -->
					
			</div>
			<div class="footer"></div>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
