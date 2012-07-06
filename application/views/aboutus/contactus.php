<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>联系我们 | 友途旅行网</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<base href="<?php echo base_url();?>"/>
		<base src="<?php echo base_url();?>"/>
		<?php $this -> load -> view("web/global_source");?>
		<link rel="stylesheet" type="text/css" href="assets/styles/aboutus.css">
	</head>
	<body>
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="#">首页</a> > 友途互动
				</div>
				<div class="aside">
					<dl>
						<dt>关于我们</dt>
						<dd class="active"> >和友途一起旅行</dd>
						<dd> >友途使命</dd>
						<dd> >友途领队</dd>
						<dd> >加入友途</dd>
						<dd> >联系我们</dd>
					</dl>


				</div>
				<div class="article">
					<h1>联系我们</h1>					
					<p>
						交流，互助，友爱与分享，是友途铭记在心的理念，因而，我们真心聆听您的每个问题，珍惜每次跟您交流的机会。
					</p>
					<p>
						无论是对多彩魔幻的水世界九寨沟，天边灵魂自由如风的若儿盖，东方阿尔卑斯的四姑娘山，中国最美高原古村丹巴，摄影家的天堂新都桥，落入凡间的水晶宫殿海螺沟，还是对您，家人，朋友的任何旅行问题，或者对我们的服务，网站建设及品牌提出的任何意见或建议，友途的工作人员都将竭力在两小时以内回复您。
					</p>


					<h2>在线咨询</h2>
					<table class="formtab">
						<h2>xdfjkdf</h2>
						<tr>
							<td><em>*</em>姓名：</td>
							<td><input name="" type="text"></td>
						</tr>
						<tr>
							<td><em>*</em>手机：</td>
							<td><input name="" type="text"></td>
						</tr>						
						<tr>
							<td><em>*</em>Email：</td>
							<td><input name="" type="text"></td>
						</tr>
						<tr>
							<td>希望我们联系您的方式是：：</td>
							<td>
								<label><input type="checkbox">通过QQ</label>
								<label><input type="checkbox">通过电话</label>
								<label><input type="checkbox">通过邮件</label>
							</td>
						</tr>
						<tr>
							<td>所在城市：</td>
							<td><input type="text"></td>
						</tr>
						<h2>xdfjkdf</h2>
						<tr>
							<td>主题：</td>
							<td>
								<select name="" id="">
									<option value="">关于四川旅行</option>
									<option value="">关于友途网站反馈</option>
									<option value="">商业合作</option>
									<option value="">我们的领队和工作人员</option>
									<option value="">其它</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>更多信息：</td>
							<td>
								<textarea></textarea>
							</td>
						</tr>
					</table>
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
