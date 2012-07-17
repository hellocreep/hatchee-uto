<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $webinfo[0] -> title;?> | 友途旅行网</title>
		<meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/landingpage.css">
		<?php $this -> load -> view("web/global_source");?>
	</head>
	<body id="n-trip">
		<div class="wrapper">
			<?php $this->load->view('web/header'); ?>
			
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > 友途活动
				</div>
				<div class="aside"></div>
				<div class="article">
					<div class="pageintro">
						<p><img src="assets/images/ythd.gif"></p>
						<p>
							友途活动是友途旅行网官方品牌活动，目前以川西体验探索为主，领略那些最熟悉的画面与灿烂无比的景色，蓝天、白云、雪山、草原、藏民、牦牛、青青的草地，悠悠的民歌，美丽的少女，我们精心策划的趣味活动给让你的旅行更加梦幻，如三五人选一样颜色的马儿，在皑皑的雪山下、在美丽的山谷中、在清澈的溪流边并肩骑马，享受极度的浪漫与惬意。
						</p>
						<p>
							友途活动全年固定排期，承诺一人发团，成都集结，全国统一价，无购物，加点，一路随时停车，回归最简单，最快乐的旅行。 							
						</p>
					</div>
					<!-- 当前线路不多，因此暂时隐藏排序功能，勿删 -->
					<div class="sort">
						排序方式：
						<a href="<?php echo $sortday;?>">依天数</a> | <a href="<?php echo $sortprice;?>">依价格</a>
						<div class="pagenate">
							<a href="<?php echo $page['first'];?>">首页</a>
							<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
							<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
							<a href="<?php echo $page['end'];?>">尾页</a>
						</div>
					</div>
					<ul class="routelist clearfix">
						<?php if(isset($tour)):?>
							<?php for($i=0;$i<count($tour);$i++):?>
								<li>
								<span class="days"><?php echo $tour[$i]['days'];?></span><h2><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><?php echo $tour[$i]['name'];?></a></h2>
								<p><?php echo str_replace('<br>','',mb_substr($tour[$i]['intro'],0,90,'utf-8')).'......';?><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>">更多</a></p>
								<dl class="route-detail">
									<dt><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" alt="<?php echo $tour[$i]['name'];?>"><img src="<?php echo $tour[$i]['thumbnail']?>" alt="<?php echo $tour[$i]['name'];?>" width="240" height="140" /></a></dt>
									<dd>
										<span><b>旅行主题：&nbsp;&nbsp;</b></span><div><?php echo str_replace(',','、',substr($tour[$i]['theme'],0,-1));?></div>
									</dd>
									<dd>
										<span><b>旅行地区：&nbsp;&nbsp;</b></span><div><?php echo str_replace(',','、',substr($tour[$i]['destination'],0,-1));?></div>
									</dd>
									<dd>
										<p>
											<em class="red">*&nbsp;&nbsp;</em>友途官方组织的活动线路，保证一个人也发团，价格
											<b class="price"><?php if(isset($tour[$i]['price'])): ?>
										<?php echo $tour[$i]['price'];?>
										<?php endif;?></b>
											元起;
										</p>
									</dd>
									<dd class="last">
										<a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" class="btn">线路详情</a>	
									</dd>
				
								</dl>
								</li>
							<?php endfor;?>
						<?php endif;?>
					</ul>
					<!-- <div class="sort">
						<div class="pagenate">
							<a href="<?php echo $page['first'];?>">首页</a>
							<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
							<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
							<a href="<?php echo $page['end'];?>">尾页</a>
						</div>
					</div> -->
					<!-- 当前线路不多，因此暂时隐藏排序功能，勿删 -->
				</div> <!-- end of .article -->
					
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
