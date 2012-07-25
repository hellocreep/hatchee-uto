<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>友途领队 | 友途旅行网</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
		<link rel="stylesheet" type="text/css" href="assets/styles/aboutus.css">
	</head>
	<body id="n-about" class="n-le">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>aboutus">关于友途</a> > 友途领队
				</div>
				
					<?php $this -> load -> view("aboutus/aside");?> <!-- 关于我们侧边栏chunk -->
				
				<div class="article">
					<div class="know clearfix">
						<div class="left">
							<h1>结识友途领队</h1>					
							<p>
								<b>They are the hearts of our company. 他们是友途旅行的心脏和发动机，是点亮友途旅行精彩的火把.....</b>
							</p>
							<p>
拥有丰富旅行经验的他们，总能引领队员领略醉美的风景，感受最震撼的画面。每个白天晚上，他们总是认真负责任的完成旅行中每个细节的服务，用心体会每个队员的需求。每次篝火燃气或田间小憩时，他总有那么多的idea与热情去活跃旅行气氛，或分享他们这些年旅行的快乐，遇见的人与事。  
</p>
<p>跟友途小编一起来认识可爱，认真，负责任的他们。
 
							</p>
							
						</div>
						<div class="right">
							<h4>TA刚结束的旅行 Just Back From......</h4>
							<div class="over">
								<img src="<?php echo $newnote['thumb'];?>">
									<h5><a href="aboutus/note/?id=<?php echo $newnote['Id'];?>"><?php echo $newnote['title'];?></a></h5>
									<b>小编：<?php echo $newnote['editor'];?></b><br>
									<b>时间：<?php echo $newnote['tour_time'];?></b><br>
									<p>
										<?php echo mb_substr(preg_replace('~<img(.*?)>~s','',$newnote['content']),0,100,'utf-8').'......';?> 
										<a class="they" href="aboutus/note/?id=<?php echo $newnote['Id'];?>" title="">查看他们的旅行故事>> </a><br>
									</p>
									<a href="aboutus/review" title="">查看更多友途精彩故事>> </a>
							</div>
						</div>
					</div>

					<div class="person">
						<h4>友途领队&nbsp;&bull;&nbsp;曾可 （木灯）<span>旅行开始时间：2000年 </span></h4>
						<img src="assets/images/leaders/leader-mudeng.jpg">		
						<h5>跟我们讲讲，你是如何跟旅游行业结缘的？</h5>
						<p>
							1999年北大毕业，毕业后的一年，换了好几份工作，没换一份工作之前出去旅行一次，后来想：为什么不把自己热爱的旅行当做工作来做，把自己的经验和感受一点点的分享给所有爱旅行的人，所以从2000年就进去的旅游行业。 <br>一不小心，把玩当成了事业，面对过现实生活的困顿、经历过人生的困惑，最终选择义无反顾，继续上路，因为路上的风景，是最美的；
						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							行百里者看周遭事；行千里者阅世间情；行万里者穷天下径。
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							旅行让我更了解自己、了解身边的人以及了解外面的世界，当旅行已经从个人兴趣转变成我生活中的一部分时，旅行也就成为自然而然发生的事情了；
						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？   </h5>
						<p>
							每次活动结束后，队员的肯定和满足的笑容，是让我继续前行的动力.
						</p>
					</div>
					
					<div class="person">
						<h4>友途领队&nbsp;&bull;&nbsp;张磊 （木雅）<span>旅行开始时间：2000年 </span></h4>
						<img src="assets/images/leaders/leader-muya.jpg">		
						<h5>关于自己，给我们做个简单的介绍？</h5>
						<p>
                        我是<br>
							一个从瘦子变成了胖子的人；<br>
一个从山西到广西最后到四川的人；<br>
一个开始卖设备后来销红酒最后做旅游的人；<br>
一个开心乐观愿意带你走进四川，体验四川的旅游人。

						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							炼眼修心，穿越在天堂
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							最开始是满足于看风景，后来是因为每次旅行都会有不同的经历，给自己
    不同的成长。

						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？</h5>
						<p>
							1.初见雅家梗红石裸拍的冲动;<br>
    2.上木居蓝天白云下悠然的躺着;<br>
3.泽西多家受到的最朴实却最热情的招待; <br>


						</p>
					</div>
                    
                    
                    
					
					
                    
                    
                    <div class="person">
						<h4>友途领队&nbsp;&bull;&nbsp;陈传敏 （Jesson 大猫）<span>旅行开始时间：2007年 </span></h4>
						<img src="assets/images/leaders/leader-damao.jpg">		
						<h5>跟我们讲讲，你是如何跟旅游行业结缘的？</h5>
						<p>
							之前希望像爷爷奶奶一样，在自己的那口碗大的天空里，安安静静、平平淡淡过完人生；<br>
一场地震迫使我重新思考人生的意义；<br>
生命时间有限，地球资源有限。<br>
那为何不在有限的时间里，去外面看看这个世界？<br>
最后弥留之际，若我能平静地告诉自己：这个世界，我曾经来过。足矣！<br>

						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							你若决定启程，旅途上最大的困难就已经解决了。
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							有些路，如果你不去启程，你永远不知道它是多么的美丽。
						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？   </h5>
						<p>
							如画的风景、淳朴的民风、一路上的旅伴、青旅的畅聊和每个人的故事。
						</p>
					</div>
					
					<div class="person">
						<h4>友途领队&nbsp;&bull;&nbsp;宋中伟 （野猪）<span>旅行开始时间：2007年 </span></h4>
						<img src="assets/images/leaders/leader-yezhu.jpg">		
						<h5>关于自己，给我们做个简单的介绍？</h5>
						<p>
                        我是一个渴望自由的人，喜欢与人共处，也会享受孤独，是典型的双鱼座，所以我爱旅行，特别是一个人的旅行。

						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							不收取门票的地方才会有醉美的风景！
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							旅游可以增长见识，也可以陶冶情操，能让我瞬间成长。

						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？</h5>
						<p>
							藏区人民纯真的笑容，和满山遍野的牛羊。


						</p>
					</div>
                    
                    
                    <div class="person">
						<h4>友途小编&nbsp;&bull;&nbsp;亓纯静 <span>旅行开始时间：2010年 </span></h4>
						<img src="assets/images/leaders/leader-yuanchunjing.jpg">		
						<h5>跟我们讲讲，你是如何跟旅游行业结缘的？</h5>
						<p>
							疲惫生活里怀揣着英雄梦想，一步一步踏实的走着，为的是离梦想近些，再近些。
						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							在路上，保持一颗行走的心。
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							喜欢在路上的感觉，遇上形形色色的人，分享有关旅行的故事。<br>
忘却生活中的疲惫与烦恼，自由的行走，把心沉淀下来，安静的享受生活。

						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？   </h5>
						<p>
							行走在莫斯卡的路上----2011年10月跟随成都越野一族自驾去莫斯卡村，这是一群从未谋面的网友，只因同样怀揣着对莫斯卡的迷恋，走在了一起。去莫斯卡村的山路崎岖陡峭，海拔高，一路上大家相互帮助，成功抵达目的地。这次旅行中最不能忘却的是莫斯卡村藏民的质朴，由于当时山上正下雪，气温下降，我们的队伍不得不放弃露营的计划，住到当地藏民的家里面。我们几个人围坐在火炉旁边，藏民伯伯在旁边给我们制作酥油茶，当一碗浓香的酥油茶端到我们手里，感觉异常温暖。
						</p>
					</div>
					
					<div class="person">
						<h4>友途小编&nbsp;&bull;&nbsp;袁辰恺 （圆小胖） <span>旅行开始时间：2008年 </span></h4>
						<img src="assets/images/leaders/leader-xiaoyuan.jpg">		
						<h5>关于自己，给我们做个简单的介绍？</h5>
						<p>
                        我是一个喜欢到处乱跑的乖孩子。

						</p>
						<h5>关于旅行，你的宣言是？</h5> 
						<p>
							生命不死，行走不止
						</p>
						<h5>为什么热爱旅行？ </h5>
						<p>
							每一次旅行都是一场经历，一场特别的经历。无论人，无论事，他们都能让我看到另一个世界，找到另一个自我。

						</p>
                        <h5>在四川这么多年，你最不能忘的人或事是什么？</h5>
						<p>
							行走到郎木寺的时候，被曲扎师傅收留。和师傅一起吃住生活了些日子。这是我第一次那么真切的接触到藏传佛教，接触到喇嘛。感触万千，难以言表。


						</p>
					</div>
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
