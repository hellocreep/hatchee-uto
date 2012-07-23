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
	<body id="n-about" class="n-co">
		<div class="wrapper">
			<?php $this -> load -> view("web/header");?> <!-- 头部及导航chunk -->
			<div class="content clearfix">
				<div class="breadcrumb">
					您的位置：<a href="<?php echo base_url();?>">首页</a> > <a href="<?php echo base_url();?>aboutus">关于友途</a> > 联系我们
				</div>
				<div class="aside">
					<?php $this -> load -> view("aboutus/aside");?> <!-- 关于我们侧边栏chunk -->
				</div>
				<div class="article contact-con">
					<h1>联系我们</h1>					
					<p>
						交流，互助，友爱与分享，是友途铭记在心的理念，因而，我们真心聆听您的每个问题，珍惜每次跟您交流的机会。
					</p>
					<p>
						无论是对多彩魔幻的水世界九寨沟，天边灵魂自由如风的若儿盖，东方阿尔卑斯的四姑娘山，中国最美高原古村丹巴，摄影家的天堂新都桥，落入凡间的水晶宫殿海螺沟，还是对您，家人，朋友的任何旅行问题，或者对我们的服务，网站建设及品牌提出的任何意见或建议，友途的工作人员都将竭力在两小时以内回复您。
					</p>
					<div class="method clearfix">
						<dl>
							<dt>友途电话联系：</dt>
							<dd>24小时热线：<span>4000-520-161</span></dd>
							<dd>公司电话：<span>028-85227215</span></dd>
						</dl>
						<dl>
							<dt>友途QQ咨询： </dt>
							<dd><span>1758863234</span></dd>
						</dl>
						<dl>
							<dt>邮件联系： </dt>
							<dd><a href="mailto:bm@utotrip.com"><span>bm@utotrip.com</span></a></dd>
						</dl>	
					</div>
					<p><b>友途旅行网：</b>成都雅竹国际旅行社有限公司官方预定网站</p>
					<p><b>友途地址：</b> 成都市武侯区武阳大道1段288号中央花园城市别墅1栋23号</p>
					<div class="separator"></div>
					<h2>在线咨询</h2>
					<form id="contact-form">
					<h4>您的联系方式：</h4>
					<table class="formtab">
						<tr>
							<td><em>*</em>姓名：</td>
							<td><input name="name" type="text" class="required"></td>
						</tr>
						<tr>
							<td><em>*</em>手机：</td>
							<td><input name="phone" type="text" class="required num"></td>
						</tr>						
						<tr>
							<td><em>*</em>Email：</td>
							<td><input name="email" type="text" class="required email"></td>
						</tr>
						<tr>
							<td><em>*</em>QQ：</td>
							<td><input name="qq" type="text" class="required num"></td>
						</tr>
	
						<tr>
							<td>希望我们联系您的方式是：</td>
							<td>
								<label><input type="checkbox" name="contact-way" value="通过QQ">通过QQ</label><br>
								<label><input type="checkbox" name="contact-way" value="通过电话">通过电话</label><br>
								<label><input type="checkbox" name="contact-way" value="通过邮件">通过邮件</label>
							</td>
						</tr>
						<tr>
							<td>所在城市：</td>
							<td><input type="text" name="city"></td>
						</tr>
					</table>
					<h4>您的问题：</h4>
					<table class="formtab">
						<tr>
							<td>主题：</td>
							<td>
								<select>
									<option name="theme" value="关于四川旅行">关于四川旅行</option>
									<option name="theme" value="关于友途网站反馈">关于友途网站反馈</option>
									<option name="theme" value="商业合作">商业合作</option>
									<option name="theme" value="我们的领队和工作人员">我们的领队和工作人员</option>
									<option name="theme" value="其它">其它</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>更多信息：</td>
							<td>
								<textarea name="more"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input id="contact-submit" class="btn" type="submit" value="提  交"></td>
						</tr>
					</table>
				</form>
				</div> <!-- end of div.article -->
			</div>
			<?php $this -> load -> view("web/footer");?> <!-- 底部chunk -->
		</div><!-- 	end of .wrapper	 -->
	</body>
</html>
