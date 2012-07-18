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
				<?php $this -> load -> view("web/include/aside-theme");?> <!-- 侧边栏chunk -->
				<div class="article">
					<div class="pageintro">
						<p><img src="assets/images/ztlx.gif"></p>
						<p>
							友途的系列主题旅行产品，以休闲度假、舌尖美食、徒步探索、身心休养、光影行摄、及公益慈善为出游主题，深度行走成都及绝美四川的各个地方，涵盖多彩魔幻的水世界 - 九寨沟，瑶池仙山的黄龙，天边灵魂自由如风的若尔盖，东方的阿尔卑斯四姑娘山，中国最美高原古村丹巴，落入凡间的水晶宫殿海螺沟，光影天堂的新都桥，以及沉睡的天堂稻城亚丁，等等。
						</p>
						<p>
							还记得吗？友途的宗旨是：一样的地方，但给你不一样的体验，更不用提传统旅游的购物，加点，赶路等。友途想给的是让你回忆一生，且每每想起会感动的旅行。　
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
									<dt><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><img src="<?php echo $tour[$i]['thumbnail']?>" alt="<?php echo $tour[$i]['name'];?>" width="240" height="140"/></a></dt>
									<dd>
										<span>旅行主题：</span><div><?php echo str_replace(',','、',substr($tour[$i]['theme'],0,-1));?></div>
									</dd>
									<dd>
										<span>旅行地区：</span><div><?php echo str_replace(',','、',substr($tour[$i]['destination'],0,-1));?></div>
									</dd>
									<dd>
									<span>最佳季节：</span><div><?php echo str_replace(',','、',substr($tour[$i]['tags'],0,-1));?></div>
								</dd>
									<dd>
									<span>价&#12288;&#12288;格：</span>
									<div>
										<?php if(isset($tour[$i]['price']) && $tour[$i]['price'] != 0): ?>
										<?php echo '<b class="price">'.$tour[$i]['price']."</b>元起";?>
										<?php else:?>
										<?php echo "一团一议";?>
										<?php endif;?>
									</div>
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
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
