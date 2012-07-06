;(function(){

//ajax初始化设置
$.ajaxSetup({
	type: 'POST',
	dataType: 'json'
});

// 固定排期弹出框内容 
var inquiry_form ="<form class='inquiry-form'> \
			<h3>确认预订线路信息</h3> \
			<table class='formtab'> \
			<tr><td>线路名称：</td><td class='r_name'></td></tr> \
			<tr><td>发团期数：</td><td class='r_term'></td></tr> \
			<tr><td>天数：</td><td class='r_day'></td></tr> \
			<tr><td>参加人数：</td><td><input type='text' class='r_people'></td></tr> \
			</table><table class='formtab'> \
			<h3>填写联系人信息</h3> \
			<tr><td><em>*</em>姓名：</td><td><input class='required' name='u_name' type='text'></td></tr> \
			<tr><td><em>*</em>手机：</td><td><input class='required num' name='u_phone' type='text'></td></tr> \
			<tr><td><em>*</em>邮箱：</td><td><input class='required email' name='u_email' type='text'></td></tr> \
			<tr><td>QQ：</td><td><input name='u_qq' class='num' type='text'></td></tr> \
			<tr><td>来自那个城市：</td><td><input name='u_city' type='text'></td></tr> \
			<tr><td>其他需求：</td><td><textarea name='u_other'></textarea></td></tr> \
			<tr><td></td><td><input class='btn' id='inquiry-submit' type='submit' value='确认提交'></td></tr> \
			</table> \
			</form>";

// 小包团弹出框内容
var inquiry_form2="<form class='inquiry-form'> \
			<h3>确认预订线路信息</h3> \
			<table class='formtab'> \
			<tr><td>线路名称：</td><td class='r_name'></td></tr> \
			<tr><td>天数：</td><td class='r_day'></td></tr> \
			<tr><td>出发时间：</td><td><input type='text' class='r_date Wdate date' onfocus=''></td></tr> \
			<tr><td>选用车型：</td><td><select class='car-select'></select></td></tr> \
			<tr><td>参加人数：</td><td><input type='text' class='r_people'></td></tr> \
			</table> \
			<h3>填写联系人信息</h3> \
			<table class='formtab'> \
			<tr><td><em>*</em>姓名：</td><td><input class='required' name='u_name' type='text'></td></tr> \
			<tr><td><em>*</em>手机：</td><td><input class='required num' name='u_phone' type='text'></td></tr> \
			<tr><td><em>*</em>邮箱：</td><td><input class='required email' name='u_email' type='text'></td></tr> \
			<tr><td>QQ：</td><td><input name='u_qq' class='num' type='text'></td></tr> \
			<tr><td>来自那个城市：</td><td><input name='u_city' type='text'></td></tr> \
			<tr><td>其他需求：</td><td><textarea name='u_other'></textarea></td></tr> \
			<tr><td></td><td><input class='btn' id='inquiry-submit' type='submit' value='确认提交'></td></tr> \
			</table> \
			</form>";

//按钮提交中mask
var btn_mask = function( target ){
	$( target ).ajaxStart(function(){
		var h = $( this ).outerHeight();
		var w = $( this ).outerWidth();
		var offset = $( this ).offset();
		var mask = $( '<div class="btn-mask"></div>' ).css({
			height: h,
			widht: w,
			left: -w,
			top: -h
		});
		$( this ).attr('value','提交中...').addClass( 'btn-updating' )
		.parent().append( mask );
	});
}



$(function(){
	// 线路内页选项卡切换
	$('.sub-nav > li').each(function(index){
		$(this).click(function(){
			$(this).addClass("current").siblings().removeClass("current");
			$('.unit').hide();
			$('.unit').eq(index).show();
		})	
	})
	$('.sub-nav > li').eq(0).click();

	
	$("a[rel=fancyimg]").fancybox({
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'titlePosition' : 'over',
		'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">'+ title + '</span>';
		}
	}); 



	//订单(固定排期)
	/*
	$( '#inquiry' ).fancybox({
		content: inquiry_form,
		onComplete: function(){
			var peo_num = $('.people').val();
			$('.r_people').val(peo_num);
			$( 'r_name' ).text( $('#tour_title').val() );
			btn_mask( '#inquiry-submit ');
			$( '.inquiry-form' ).validate({
				submitHandler: function(form) {
					var data = {
						tid: $( '#tour_id' ).val(),
						name: $( 'input[name="u_name"]' ).val(),
						tel: $( 'input[name="u_phone"]' ).val(),
						email: $( 'input[name="u_email"]' ).val(),
						qq: $('input[name="u_qq"]').val(),
						term: '',
						people: $( 'input[name="people"]' ).val(),
						comment: $( 'textarea[name="u_other"]' ).val()
					}
					if( $( '.term').length > 0 ){
						data.term = $( '.term:selected').val()||'';
					}
					$.ajax({
						url: 'ordermanage/addorder',
						data: {
							data: $.toJSON(data)
						},
						success: function( result ){
							$( '.btn-mask' ).remove();
							$( '#inquiry-submit' ).attr('value','确认提交').removeClass('btn-updating').after( result );
						},
						error: function( result ){
							$( '.btn-mask' ).remove();
							$( '#inquiry-submit' ).attr('value','确认提交').removeClass('btn-updating').after( result );
						}
					});
				}
			});
		}
	});
	*/
	//小包团显示不同表单	
	if( $('#is_private').val() ==1 ){
		inquiry_form = inquiry_form2;
	}

	//订单
	$( '#inquiry' ).fancybox({
		content: inquiry_form,
		onComplete: function(){
			$( '.r_people' ).val( $('.people').val() );
			$( '.r_name' ).text( $('#tour_title').text() );
			$( '.r_day' ).text( $('#tour_day').val()+'天' );
			$( '.r_term' ).text( $( '.term:selected' ).val() );
			//判断是否小包团
			if( $('#is_private').val() == 1 ){
				$( '.r_date' ).focus(function(){
					WdatePicker({minDate:'%y-%M-{%d}'});
				});
				var car_type = ' ';
				var car = $( '.car-type' );
				for( var i = 0; i < car.length/2; i++  ){
					car_type += "<option value='"+car.eq(i).text().replace(/(^\s*)|(\s*$)|(\n)/g,"")+"'>"+car.eq(i).text()+"</option>";
				}
				$( '.car-select' ).append( car_type );
			}
			
			btn_mask( '#inquiry-submit ');
			$( '.inquiry-form' ).validate({
				submitHandler: function(form) {
					var data = {
						is_private: $('#is_private').val(),
						tid: $( '#tour_id' ).val(),
						name: $( 'input[name="u_name"]' ).val(),
						tel: $( 'input[name="u_phone"]' ).val(),
						email: $( 'input[name="u_email"]' ).val(),
						qq: $('input[name="u_qq"]').val(),
						city: $('input[name="u_city"]').val(),
						term: '',
						car: '',
						tour_time: '',
						people: $( 'input[name="people"]' ).val(),
						comment: $( 'textarea[name="u_other"]' ).val()
					}
					//常规活动
					if( $( '.term').length > 0 ){
						data.term = $( '.term:selected').val()||'';
					}
					//小包团
					if( $('.r_date').length > 0 ){
						data.car = $( '.car-select option:selected' ).val();
						data.tour_time = $( '.r_date' ).val();
					}
					$.ajax({
						url: 'ordermanage/addorder',
						data: {
							data: $.toJSON(data)
						},
						success: function( result ){
							if( result ){
								if( result.status ){
									$( '#fancybox-close' ).click();
									$( '.apply' ).append( result );
								}else{
									$( '.btn-mask' ).remove();
									$( '#inquiry-submit' ).attr('value','确认提交').removeClass('btn-updating').after( result );
								}
							}else{	
								$( '.btn-mask' ).remove();
								$( '#inquiry-submit' ).attr('value','确认提交').removeClass('btn-updating').after( '<span class="red">系统正忙，请稍候提交</span>' );
							}
						}
					});
				}
			});
		}

	});

	//定制旅行表单
	$( '#custom_inquiry' ).validate({
		submitHandler: function(){
			var des = [];
			$( 'input[name="add_day"]:checked' ).each(function(){
			    des.push( $(this).val() )
			});
			btn_mask( '#custom-submit' );
			var data = {
				tid: $('#tid').val(),
				name: $('input[name="name"]').val(),
				tel: $('input[name="tel"]').val(),
				email: $('input[name="email"]').val(),
				qq: $('input[name="qq"]').val(),
				city: $('input[name="city"]').val(),
				tour_time: $('input[name="tour_time"]').val(),
				car: $('input[name="car"]').val(),
				people: $('input[name="people"]').val(),
				add_day: $('input[name="add_day"]').val(),
				add_des: des.toString(),
				special_day: $('textarea[name="special_day"]').val(),
				other: $('textarea[name="other"]').val()
			}
			$.ajax({
				url: 'webinquiry/tailormade',
				data: {
					data: $.toJSON(data)
				},
				success: function( result ){
					if( result ){
						$( '#custom-submit' ).attr( 'value','确认提交' ).removeClass( 'btn-updating' )
						.after( '<span class="red">提交订单成功</span>');
					}else{ 
						$( '#custom-submit' ).attr( 'value','确认提交' ).removeClass( 'btn-updating' )
						.after( '<span class="red">提交订单失败</span>');
					}
				}
			});
		}
	});

	//定制旅行栏目页表单
	$( '#customize' ).validate({
		submitHandler: function(){
			var data = {
				place: $('input[name="place"]').val(),
				tour_time: $('input[name="tour_time"]').val(),
				car: $('select[name="car"]').val(),
				people: $('input[name="people"]').val(),
				day: $('input[name="day"]').val(),
				theme: $('input[name="theme"]').val(),
				special_day: $('textarea[name="special"]').val(),
				comment: $('textarea[name="comment"]').val(),
				name: $('input[name="name"]').val(),
				tel: $('input[name="tel"]').val(),
				email: $('input[name="email"]').val(),
				qq: $('input[name="qq"]').val(),
				city: $('input[name="city"]').val()
			}
			$.ajax({
				url: 'customize/customize_order',
				data: {
					data: $.toJSON(data)
				},

				success: function( result ){
					if( result[0].status ){
						$('#next').click();
						$('.marqueen .unit:eq(3)').html('<h2>定制完成</h2><p>您的订单号为'+result[0].uuid+'，我们将在3个工作日内处理好您的订单！请注意查收邮件！</p>');
					}else{ 
						$( '#customize-submit' ).attr( 'value','确认提交' ).removeClass( 'btn-updating' )
						.after( '<span class="red">请核对您提供的信息是否完整。</span>');
					}
				}
			});
		}
	});

	// 定制页面表单效果
	$('#next').click(function(){
		$("#prev").show();
		$('.guidenav li.current').next().addClass('current').siblings().removeClass('current');
		var ind = $('.guidenav > li').index($('.current'));
		$('.marqueen').animate({"margin-left":(ind)*(-900)});
		if( ind == 3){
			$("#next").hide();
		}		
	})

	$('#prev').click(function(){
		$("#next").show();
		$('.guidenav li.current').prev().addClass('current').siblings().removeClass('current');
		var ind = $('.guidenav > li').index($('.current'));
		$('.marqueen').animate({"margin-left":(ind)*(-900)});
		if( ind == 0){
			$("#prev").hide();
		}
	})
	$("#prev").click()

	
	// 表单表格左侧对齐
	$('.formtab tr').each(function(){
		$(this).children('td').eq(0).css({"text-align":"right","width":"200px"});
	})

})
})(jQuery);
