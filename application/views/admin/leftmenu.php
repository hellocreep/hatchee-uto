<div class="span3 well">
	<ul class="nav nav-list">
		<li class="nav-header">页面管理</li>
		<li class="web-manage" rel=""><a  href="pagemanage/editpage/?type=index">主页</a></li>
		<li class="web-manage" rel="termtour"><a  href="pagemanage/editpage/?type=regular_tour">定期活动</a></li>
		<li class="web-manage" rel="themetour"><a  href="pagemanage/editpage/?type=theme_tour">主题旅行</a></li>
		<li class="web-manage" rel="companytour"><a  href="pagemanage/editpage/?type=company_tour">公司旅行</a></li>
		<li class="web-manage" rel="aboutus"><a href="pagemanage/editpage/?type=about_us">关于友途</a></li>

		<li class="divider"></li>

		<li class="nav-header">活动管理</li>
		<li><a href="tourmanage" id="tour-manage">线路管理</a></li>
		<li><a href="javascript:;" id="travelnote-manage">游记管理</a></li>
		<li><a href="javascript:;" id="expand-manage">扩展活动管理</a></li>
		<li class="divider"></li>
		
		<li class="nav-header">活动标签管理</li>
		<li><a href="javascript:;" id="destination-manage" class="tags-manage">目的地</a></li>
		<li><a href="javascript:;" id="theme-manage" class="tags-manage">主题</a></li>
		<li><a href="javascript:;" id="traveltime-manage" class="tags-manage">出行时间</a></li>
		<li><a href="javascript:;" id="group-manage" class="tags-manage">活动群体</a></li>
		<li class="divider"></li>
		
		<li class="nav-header">订单与会员管理</li>
		<li><a href="ordermanage/orderlist" id="order-manage">常规订单管理</a></li>
		<li><a href="ordermanage/getcustomize" id="custome-order-manage">定制旅行订单管理</a></li>
		<li><a href="membermanage/memberlist" id="member-manage">会员管理</a></li>
		
		<?php if($power==0):?>
		<li class="divider"></li>
		<li class="nav-header">高级管理员才能看到的哦</li>
			<li><a href="usermanage" id="manager-manage">后台管理员管理</a></li>
		<?php endif;?>
		
		<li class="divider"></li>
		
		<li class="nav-header">资讯 TO BE CONTINUED</li>
		<li><a href="javascript:;">博客</a></li>
		<li><a href="javascript:;">景点</a></li>
	</ul>
</div>

