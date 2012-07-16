<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo$webinfo[0] -> title;?>| 友途旅行网</title>
		<meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/landingpage.css">
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body id="n-theme">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > 主题旅行
				</div>
				<div class="aside"></div>
				<div class="article">
					<!-- 当前线路不多，因此暂时隐藏排序功能，勿删 -->
					<!-- <div class="sort">
						排序方式：
						<a href="themetour/index/1/days">依天数</a>
						<div class="pagenate">
							<a href="<?php echo $page['first'];?>">首页</a>
							<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
							<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
							<a href="<?php echo $page['end'];?>">尾页</a>
						</div>
					</div> -->
					<ul class="routelist clearfix">
						<?php if(isset($tour)):?>
							<?php for($i=0;$i<count($tour);$i++):?>
								<li>
								<span class="days"><?php echo $tour[$i]['days'];?></span><h2><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><?php echo $tour[$i]['name'];?></a></h2>
								<p><?php echo str_replace('<br>','',mb_substr($tour[$i]['intro'],0,90,'utf-8')).'......';?><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>">更多</a></p>
									<dl class="route-detail">
									<dt><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><img src="<?php echo $tour[$i]['thumbnail']?>" alt="<?php echo $tour[$i]['name'];?>" width="240" height="140"/></a></dt>
									<dd>
										<span>旅行主题：&nbsp;</span><div><?php echo substr($tour[$i]['theme'],0,-1);?></div>
									</dd>
									<dd>
										<span>旅行地区：&nbsp;</span><div><?php echo substr($tour[$i]['destination'],0,-1);?></div>
									</dd>
									<dd>
									<span>最佳季节：&nbsp;</span><div><?php echo str_replace(',','、',substr($tour[$i]['tags'],0,-1));?></div>
								</dd>
									<dd>
									<span>价&nbsp;&nbsp;&nbsp;&nbsp;格：&nbsp;</span><div><b class="price"><?php if(isset($tour[$i]['price'])): ?>
										<?php echo $tour[$i]['price'];?>
										<?php endif;?></b>元起</div>
									</dd>
									<dd class="last">
										<a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" class="btn">线路详情</a>	
									</dd>
				
								</dl>
								</li>
							<?php endfor;?>
						<?php endif;?>
					</ul>

					<!-- 当前线路不多，因此暂时隐藏排序功能，勿删 -->
					<!-- <div class="sort">
						<div class="pagenate">
							<a href="<?php echo $page['first'];?>">首页</a>
							<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
							<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
							<a href="<?php echo $page['end'];?>">尾页</a>
						</div>
					</div> -->
				</div> <!-- end of .article -->
					
			</div>
			<div class="footer"></div>
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
