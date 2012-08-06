<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<?php if(isset($desinfo)&& $desinfo!=''):?>
		<title><?php echo $desinfo['title'];?></title>
		<meta name="description" content="<?php echo $desinfo['des'];?>">
		<meta name="keywords" content="<?php echo $desinfo['keywords'];?>">
		<?php else:?>
		<title><?php echo $webinfo[0] -> title;?>| 友途旅行网</title>
		<meta name="description" content="<?php echo $webinfo[0] -> description;?>">
		<meta name="keywords" content="<?php echo $webinfo[0] -> keywords;?>">
		<?php endif;?>
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
					<?php if(isset($bread) && $bread!=''):?>
						您的位置：<a href="<?php echo base_url();?>">首页</a> > <?php echo $bread;?>
					<?php else:?>
						您的位置：<a href="<?php echo base_url();?>">首页</a> > 主题旅行
					<?php endif;?>
				</div>
				<?php $this -> load -> view("web/include/aside-theme");?> <!-- 侧边栏chunk -->
				<div class="article">
					<div class="pageintro">

						<?php if(isset($title)):?>
							<h1><?php echo $title;?></h1>
						<?php else:?>
							<h1>主题旅行</h1>
						<?php endif;?>
					
						<?php if(isset($desinfo) && $desinfo!=''):?>
							<?php echo $desinfo['synopsis'];?>
						<?php else:?>

						<p>
							友途的系列主题旅行产品，以休闲度假、舌尖美食、徒步探索、身心休养、光影行摄、及公益慈善为出游主题，深度行走成都及绝美四川的各个地方，涵盖多彩魔幻的水世界 - 九寨沟，瑶池仙山的黄龙，天边灵魂自由如风的若尔盖，东方的阿尔卑斯四姑娘山，中国最美高原古村丹巴，落入凡间的水晶宫殿海螺沟，光影天堂的新都桥，以及沉睡的天堂稻城亚丁，等等。
						</p>
						<p>
							还记得吗？友途的宗旨是：一样的地方，但给你不一样的体验，更不用提传统旅游的购物，加点，赶路等。友途想给的是让你回忆一生，且每每想起会感动的旅行。　
						</p>
						<?php endif;?>
					</div>
	
					<div class="sort">
						排序方式：
						<a href="<?php echo $sortday;?>">依天数</a> | <a href="<?php echo $sortprice;?>">依价格</a>|<select name="tourtype" id="tourtype"><option value='0' class='type0'>选择全部</option><option value="1"  class='type1'>定制旅行</option><option value="3"  class='type3'>自由行</option><option value="4"  class='type4'>纯玩跟团</option></select>
					<div class="pagenate">
							<!--<a>共<?php echo $count;?>页</a>
							<a>当前第 <?php echo $pagenow;?> 页  </a>
							<a href="<?php echo $page['first'];?>">首页</a>-->
							<?php if($count>1):?>
								<?php if($pagenow!=1):?>
								<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
								<?php endif;?>
								<?php for($i=1;$i<=count($page['plist']);$i++):?>
									<?php if($i==$pagenow):?>
										<a href="<?php echo $page['plist'][$i];?>" style="color:red"><?php echo $i;?></a>
									<?php else:?>
										<a href="<?php echo $page['plist'][$i];?>"><?php echo $i;?></a>
									<?php endif;?>
								<?php endfor;?>
								<?php if($pagenow!=$count):?>
								<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
								<?php endif;?>
							<?php endif;?>
							<!--<a href="<?php echo $page['end'];?>">尾页</a>-->
						</div>
					</div>

					<ul class="routelist clearfix">
					
						<?php if(isset($tour)):?>
							<?php for($i=0;$i<count($tour);$i++):?>
								<?php if($tour[$i]['tour_type']=='1'):?>
								<li>
								<span class="days"><?php echo $tour[$i]['days'];?></span>
								<span class="tags tags<?php echo$tour[$i]['tour_type']?>"> 独立成团 </span>

								<h2><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><?php echo $tour[$i]['name'];?></a></h2>
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
									<span>最佳季节：</span><div><?php echo $tour[$i]['best_season']?></div>
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
									<span class="s-wrap discount">
										<i>早多优惠</i>
										<span class="inbox">
			                                &bull;&nbsp;提前<em>20</em>天（含）以上完成签约和付清全款，每位成人优惠<em>50</em>元。<br>
			                                &bull;&nbsp;<em>5</em>位（含）以上成人预订，每位成人立减<em>50</em>元；<br>
			                                &bull;&nbsp;行程不做修改，立即付款的，每位成人立减<em>80</em>元；<br>
			                                &bull;&nbsp;以上促销不能叠加使用。
										</span>
									</span>	
									</dd>
									<dd class="last">
										<a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" class="btn">线路详情</a>	
									</dd>
				
								</dl>
								</li>

								<?php elseif($tour[$i]['tour_type']!='2'):?>
									<li>
										<span class="days"><?php echo $tour[$i]['days'];?></span>
									<?php if($tour[$i]['tour_type']=='0') :?>
										<span class="tags tags<?php echo$tour[$i]['tour_type']?>">友途活动</span>
										
											


									<?php elseif($tour[$i]['tour_type']=='3') :?>
										<span class="tags tags<?php echo$tour[$i]['tour_type']?>">自由行</span>
										
										
									<?php else :?>
							
										<span class="tags tags<?php echo$tour[$i]['tour_type']?>">纯玩跟团</span>
									<?php endif ;?>
									<h2><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>"><?php echo $tour[$i]['name'];?></a></h2>
									<p><?php echo str_replace('<br>','',mb_substr($tour[$i]['intro'],0,90,'utf-8')).'......';?><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>">更多</a></p>
									<dl class="route-detail">
										<dt><a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" alt="<?php echo $tour[$i]['name'];?>"><img src="<?php echo $tour[$i]['thumbnail']?>" alt="<?php echo $tour[$i]['name'];?>" width="240" height="140" /></a></dt>
										<!-- <dd>
											<span><b>旅行主题：&nbsp;&nbsp;</b></span><div><?php echo str_replace(',','、',substr($tour[$i]['theme'],0,-1));?></div>
										</dd> -->
										<!-- 出发时间: -->
										<dd>
											<span><b>旅行地区：&nbsp;&nbsp;</b></span><div><?php echo str_replace(',','、',substr($tour[$i]['destination'],0,-1));?></div>
										</dd>
										<dd>
											<span><b>旅行时间：&nbsp;&nbsp;</b></span><div><?php   ?></div>
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



<!-- 										<dd>
											<p>
												<em class="red">*&nbsp;&nbsp;</em>友途官方组织的活动线路，保证一个人也发团，价格
												<b class="price"><?php if(isset($tour[$i]['price'])): ?>
											<?php echo $tour[$i]['price'];?>
											<?php endif;?></b>
												元起;
											</p>
										</dd> -->
										<dd>
											<span class="promotion"><img src="assets/images/promotion100.png"></span>
										</dd>
										<dd class="last">
											<a href="tourdetail/?tid=<?php echo $tour[$i]['Id']?>" class="btn">线路详情</a>	
										</dd>
					
									</dl>
									</li>
								<?php endif;?>
							<?php endfor;?>
						<?php endif;?>
					</ul>

					<div class="sort">
						<div class="pagenate">
						<?php if($count>1):?>
								<?php if($pagenow!=1):?>
								<a href="<?php echo $page['pre'];?>" class="prevPage">上一页</a>
								<?php endif;?>
								<?php for($i=1;$i<=count($page['plist']);$i++):?>
									<?php if($i==$pagenow):?>
										<a href="<?php echo $page['plist'][$i];?>" style="color:red"><?php echo $i;?></a>
									<?php else:?>
										<a href="<?php echo $page['plist'][$i];?>"><?php echo $i;?></a>
									<?php endif;?>
								<?php endfor;?>
								<?php if($pagenow!=$count):?>
								<a href="<?php echo $page['next'];?>" class="nextPage">下一页</a>
								<?php endif;?>
							<?php endif;?>
						</div>
					</div>
				</div> <!-- end of .article -->
					
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
