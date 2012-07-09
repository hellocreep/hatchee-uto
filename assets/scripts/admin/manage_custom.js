;(function(){

//全局加载提示
window.loadings = {
	show: function( msg ){
		if( msg !==undefined ) {
			$( '.window-tip' ).text( msg ).show();
		}else{
			$( '.window-tip' ).text( '努力加载中...' ).show();
		}
	},
	hide: function(){
		$( '.window-tip' ).fadeOut();
	}
}

//ajax初始化设置
$.ajaxSetup({
	type: 'POST',
	dataType: 'json',
	cache: false,
	error: function(){
		//$( '.window-tip' ).text( '加载失败，请稍后重试' ).show();
		if( $('#list-panel').length > 0 ){
			$('#list-panel').empty();
		}
		if( $('.modal-backdrop').length > 0 ){
			$( '.modal-backdrop' ).hide();
		}
	}
});

//翻页
//TODO 上一页下一页 
$.fn.uto_pag = function( opts ){
	this.on('click', function(){
		var t = $( this );
		var page = t.text();
		$.ajax({
			url: opts.url,
			data: {
				page: page
			},
			success: function( result ){
				$( '.pagination' ).attr( 'data-page', page );
				if( opts.type=='tour' ){
				            tour.list_tour( result );
				}
				if( opts.type=='member' ){
					member.list_member( result );
				}
				if( opts.type=='order' ){
					order.list_order( result );
				}
				if( opts.type=='travel_note' ){
					travel_note.list_note( result );
				}
				if( opts.type=='custom_order' ){
					custom_order.list_order( result );
				}
			}
		});
		return this;
	});
}

//TPL
var manager_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th>姓名</th> \
			<th>Email</th> \
			<th>level</th> \
			<th class='span2'>管理操作</th> \
			</tr>";

var tour_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th>名称</th> \
			<th class='span2'>价格</th> \
			<th class='span2'>最后编辑时间</th> \
			<th class='span3'>管理操作</th> \
			</tr>";

var user_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th>姓名</th> \
			<th>QQ</th> \
			<th>邮箱</th> \
			<th>电话</th> \
			<th>最后登录时间</th> \
			<th class='span2'>操作管理</th> \
			</tr>";

var order_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th class='span1'>订单号</th> \
			<th>用户</th> \
			<th>线路</th> \
			<th>下单时间</th> \
			<th class='span3'>操作管理</th> \
			</tr>";

var tags_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th>标签</th> \
			<th class='span2'>操作管理</th> \
			</tr>";

var note_list_tpl = "<tr> \
			<th class='span1'>ID</th> \
			<th>标题</th> \
			<th>最后编辑时间</th> \
			<th class='span3'>操作管理</th> \
			</tr>";

//点击左导航通用效果
var left_menu_post_list = function( e ){
	e.preventDefault();
	$( '#welcome-message' ).hide();
	window.location.hash = $( e.target ).attr( 'id' ) + '-list';
	loadings.show();
	$( e.target ).parent().addClass( 'active' ).siblings().removeClass( 'active' );
	$( '.pagination' ).removeAttr( 'data-page' );
	$.cookie( 'uto_admin_status',location.hash ); //cookie储存上一个状态
}

//数据总数与分页
// url1_获取数据总数 url2_获取分页数据 type_数据类型
var page_count = function( opts ){
	var _step = 15;
	$.ajax({
		url: opts.url1,
		success: function( result ){
			if( $('#list-title .badge').length == 0 ){
				$( '#list-title' ).append( '<span class="badge">'+result+'</span>' );
			}
			var pagination = '';
			result = Math.ceil(result / _step);
			for( var i = 1; i <= result; i++ )
			{	
				pagination +=  '<li class="page-num"><a href="javascript:;">'+i+'</a></li>';	
			}
			$( '.page-num' ).remove();
			$( '.pagination .pre-pag' ).after( pagination );
			var current_page =  $( '.pagination' ).attr( 'data-page' );
			$( '.page-num' ).eq( current_page-1 ).addClass( 'disabled' );
			$( '.pagination li' ).not( '.disabled' ).uto_pag({
				url: opts.url2,
				type: opts.type
			});
		}
	});
}

//管理员
var manager = {
	list_manager: function( result ){
		var manager_list;
		for( var i=0; i<result.length; i++ ){
			manager_list += "<tr><td class='m_id'>"+result[i].Id+"</td> \
			<td class='m_name'>" + result[i].name +"</td> \
			<td class='m_email'>" + result[i].email +"</td> \
			<td class='m_level'>" + result[i].level +"</td> \
			<td><i class='icon-pencil'></i><a href='#edit-panel' class='edit-manager' data-toggle='modal'>修改</a> \
			<i class='icon-trash'></i><a class='del-manager' href='#'>删除</a></td></tr>";
		}
		$( '#list-head' ).html( manager_list_tpl );
		list_panel.html( manager_list );
		loadings.hide();
		manager.edit_manager();
		manager.del_manager();
		manager.add_manager();
	},

	add_manager: function(){
		var add_manager_tpl = "<div class='form-horizontal'> \
				<p><lable class='control-label'>姓名：</lable><input type='text' name='name' id='add_name'></p> \
				<p><lable class='control-label'>Email：</lable><input type='text' name='email' id='add_email'></p> \
				<p><lable class='control-label'>密码：</lable><input type='password' name='password' id='add_password'></p> \
				<p><lable class='control-label'>权限：</lable><input class='span1' type='text' name='level' id='add_level'>数字0到2,0的权限最高)</p></div> ";
		$( '#add-manager' ).on( 'click', function( e ){
			e.preventDefault();
			$( '.modal-header h3' ).text( '添加管理员' ); 
			$( '.modal-body' ).html( add_manager_tpl );
			$( '#edit_panel' ).modal();
			$( '#save' ).unbind( 'click' );
			$( '#save' ).click(function( e ){
				e.preventDefault();
				var data = {
					name: $( '#add_name' ).val(),
					email: $( '#add_email' ).val(),
					password: $( '#add_password' ).val(),
					level: $( '#add_level' ).val()
				}
				if( data.name!==''||data.password!=='' ){
					loadings.show();
					$.ajax({
						url: 'usermanage/addadmin',
						data: {
							data: $.toJSON( data )
						},
						success: function( result ){
							loadings.hide();
							$( '.close' ).trigger( 'click' );
							$( '#manager-manage' ).trigger( 'click' );
						}
					});
				}else{
					alert( "请将信息填写完整！" );
				}
			});
		});
	},

	edit_manager: function(){
		$( '.edit-manager' ).on('click', function( e ){
			e.preventDefault();
			$( '.modal-header h3' ).text( '管理信息修改' ) 
			var target = $( this ).parent();
			var m_id = target.siblings( '.m_id' ).text();
			var m_name = target.siblings( '.m_name' ).text();
			var m_email = target.siblings( '.m_email' ).text();
			var m_level = target.siblings( '.m_level' ).text();

			var edit_manager_tpl = "<div class='form-horizontal'> \
						<p><lable class='control-label'>姓名:</lable><input class='new_name' type='text' value="+m_name+"></p> \
					   	<p><lable class='control-label'>Email:</lable><input class='new_email' type='text' value="+m_email+"></p> \
					   	<p><lable class='control-label'>等级权限:</lable><input class='span1 new_level' type='text' value="+m_level+">(数字0到2,0的权限最高)</p> \
					   	<p><lable class='control-label'>新密码：</lable><input class='new_password' type='text' id='manager-pwd'></p> \
					   	<input type='hidden' id='edited-id' value="+m_id+"></div>";
			$( '.modal-body' ).html( edit_manager_tpl );

			$( '#edit_panel' ).modal();
			$( '#save' ).unbind( 'click' );//取消上次绑定的方法
			$( '#save' ).click(function( e ){
				e.preventDefault();
				var uid
				var data = {
					name: $( '.new_name' ).val(),
					email: $( '.new_email' ).val(),
					level: $( '.new_level' ).val(),
					password: $( '.new_password' ).val()
				}
				loadings.show();
				$.ajax({
					url: 'usermanage/updateadmin',
					data: {
						data: $.toJSON(data),
						uid: $( '#edited-id' ).val()
					},
					success: function( result ){
						loadings.hide();
						$( '.close' ).trigger( 'click' );
						$( '#manager-manage' ).trigger( 'click' );
					}
				});
			});
		});
	},

	del_manager: function(){
		$( '.del-manager' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确定删除管理员？' );
			var target = $( this ).parent().parent();
			if( r ){
				var uid = $( this ).parent().siblings( '.m_id' ).text(); 
				$.ajax({
					url: 'usermanage/deladmin',
					data: {
						uid: uid
					},
					success: function( result ){
						target.remove();
					}
				});
			}
		});
	}
}

//线路
var tour = {
	list_tour: function( result ){
		var tour_list = ' ';
		var who_edit =' ';
		for( var i = 0; i<result.length; i++ ){
			if( result[i].who_edit.length>0 ){
				who_edit = "<span class='label label-warning' title='正在编辑'>"+result[i].who_edit+"</span>";
			}else{
				who_edit = '';
			}
			tour_list += "<tr><td class='t_id'>"+result[i].Id+"</td> \
			<td class='t_name'>" +result[i].name+ "</td> \
			<td class='t_price' rel='"+result[i].price+"'>"+result[i].price+"</td> \
			<td>"+result[i].edit_time+"</td> \
			<td><i class='icon-share'></i><a target='_blank' href='tourdetail/?tid="+result[i].Id+"'>预览</a> \
			<i class='icon-pencil'></i><a href='tourmanage/edittour/?tid="+result[i].Id+"' class='edit-tour'>修改</a> \
			<i class='icon-trash'></i><a class='del-tour' href='#'>删除</a>"+who_edit+"</td></tr>";
		}
		$( '#list-head' ).html( tour_list_tpl );
		list_panel.html( tour_list );
		loadings.hide();
		tour.count_tour();
		tour.del_tour();
		tour.edit_price();
		$( '.pagination' ).show();
	},

	count_tour: function(){
		page_count({
			url1: 'tourmanage/tourcount',
			url2:  'tourmanage',
			type: 'tour'
		});
	},
	
	edit_price: function(){
		$( '.t_price' ).on('click',function(){
			var price = $( this ).attr( 'rel' );
			if( $(this).hasClass( 'edting_price' ) ){
				return;
			}else{	
				$( this ).addClass( 'edting_price' );
				$( this ).html( '<input class="span1 new_price" value="'+price+'"><a href="javascript:;" class="update_price btn btn-mini btn-success"><i class="icon-ok-sign icon-white"></i>确认</a>');
				$( document ).bind('click',function( e ){
					if( $( e.target ).hasClass( 't_price' ) || $(e.target).hasClass('new_price') ){
						return;
					}else{
						$( '.t_price' ).each(function( e ){
							var price = $( this ).attr( 'rel' );
							$( this ).empty().text( price ).removeClass( 'edting_price' );
						});
					}
				});
				$( '.update_price' ).on('click',function(){
					var price = $( this ).prev().val();
					var target = $( this ).parent();
					var data = {
						id: target.siblings( '.t_id' ).text(),
						price: price
					}
					$.ajax({
						url: 'tourmanage/updateprice',
						data: {
							data: $.toJSON(data)
						},
						success: function(){
							target.empty();	
							target.text( price ).attr( 'rel',price ).removeClass( 'edting_price' );
						}
					});
				});
			}
			
		});
	},

	del_tour: function(){
		$( '.del-tour' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确定删除线路？' );
			var target = $( this ).parent().parent();
			if( r ){
				var tid = $( this ).parent().siblings( '.t_id' ).text(); 
				$.ajax({
					url: 'tourmanage/deltour',
					data: {
						tid: tid
					},
					success: function( result ){
						if( result.status ){
							target.remove();
						}else{
							loadings.show( result.msg );
						}
					}
				});
			}
		});
	}

}

//游记
var travel_note = {

	list_note: function( result ){
		var note_list = ' ';
		for( var i = 0; i<result.length; i++ ){
			note_list += "<tr><td class='n_id'>"+result[i].Id+"</td> \
			<td class='n_title'>" +result[i].title+ "</td> \
			<td>"+result[i].edit_time+"</td> \
			<td><i class='icon-share'></i><a target='_blank' href='="+result[i].Id+"'>预览</a> \
			<i class='icon-pencil'></i><a href='travelnote/noteupdate/"+result[i].Id+"' class='edit-note'>修改</a> \
			<i class='icon-trash'></i><a class='del-note' href='javascript:;'>删除</a></td></tr>";
		}
		$( '#list-head' ).html( note_list_tpl );
		list_panel.html( note_list );
		loadings.hide();
		travel_note.count_note();
		travel_note.del_note();
		$( '.pagination' ).show();	
	},

	count_note: function(){
		page_count({
			url1: 'travelnote/notecount',
			url2:  'travelnote/notelist',
			type: 'travel_note'
		});
	},

	del_note: function(){
		$( '.del-note' ).on('click',function(){
			var r = confirm( '确定删除这篇游记？' );
			var target = $( this ).parent().parent();
			if( r ){
				var tid = $( this ).parent().siblings( '.n_id' ).text(); 
				$.ajax({
					url: 'travelnote/deltravel',
					data: {
						id: tid
					},
					success: function( result ){
						if( result ){
							target.remove();
						}else{
							loadings.show( result.msg );
						}
					}
				});
			}
		});
	}
}

//会员
var member = {

	list_member: function( result ){
		var member_list = ' ';
		for( var i= 0; i<result.length; i++ ){
			member_list += "<tr><td class='m_id'>"+result[i].Id+"</td>\
			<td class='m_name'>" +result[i].name+ "</td> \
			<td>"+result[i].qq+ "</td> \
			<td>"+result[i].email+ "</td> \
			<td>"+result[i].tel+"</td> \
			<td>"+result[i].logintime+"</td> \
			<td><i class='icon-trash'></i><a class='del-member' href='#'>删除</a></td></tr>";
		}
		$( '#list-head' ).html( user_list_tpl );
		list_panel.html( member_list );
		loadings.hide();
		member.count_member();
		member.del_member();
		$( '.pagination' ).show();
	},

	count_member: function(){
		page_count({
			url1: 'membermanage/membercount',
			url2:  'membermanage/memberlist',
			type: 'member'
		});
	},
	//TODO	
	edit_member: function(){
		$( '.edit_member' ).on('click',function(){
			var id = $( this ).attr( 'rel' );
			$( '.modal-header h3' ).text( '会员信息' ); 
			$.ajax({
				url: 'membermanage/getmenber',
				data: {
					id: id
				},
				success: function( result ){
					var edit_manager_tpl = "<div class='form-horizontal'> \
						<p><lable class='control-label'>姓名:</lable><span class='uneditable-input' type='text'>"+result[0].name+"</span></p> \
					   	<p><lable class='control-label'>Email:</lable><input name='u_email' type='text' value="+result[0].email+"></p> \
					   	<p><lable class='control-label'>电话:</lable><input name='u_tel' type='text' value="+result[0].tel+"></p> \
					   	<p><lable class='control-label'>QQ:</lable><input name='u_qq' type='text' value="+result[0].qq+"></p> \
					   	<p><lable class='control-label'>城市:</lable><input name='u_city' type='text' value="+result[0].city+"></p> \
					   	<p><lable class='control-label'>新密码：</lable><input name='u_password' type='text'></p> \
					   	<input type='hidden' id='user-id' value="+id+"></div>";
					$( '.modal-body' ).html( edit_manager_tpl );
					$( '#edit_panel' ).modal();
					$( '#save' ).unbind( 'click' );//取消上次绑定的方法
					$( '#save' ).click(function( e ){
						e.preventDefault();
						$( '.close' ).click();
						return;
						var data = {
							id: $( '#user-id' ).val(),
							email: $( '.input[name="u_email"]' ).val(),
							tel: $( '.input[name="u_tel"]' ).val(),
							password: $( '.input[name="u_password"]' ).val()
						}
						loadings.show();
						$.ajax({
							url: '',
							data: {
								data: $.toJSON(data),
							},
							success: function( result ){
								loadings.hide();
								$( '.close' ).trigger( 'click' );
								$( '#member-manage' ).trigger( 'click' );
							}
						});
					});
				}
			});
		});
	},

	del_member: function(){
		$( '.del-member' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确定删除此会员？' );
			var target = $( this ).parent().parent();
			if( r ){
				var id = $( this ).parent().siblings( '.m_id' ).text();
				$.ajax({
					url: 'membermanage/delmember',
					data: {
						id: id
					},
					success: function( result ){
						if( result ){
							target.remove();
						}
					}
				});
			}
		});
	}
}

//订单
var order = {
	list_order: function( result ){
		var order_list = ' ';
		for( i = 0; i < result.length; i++ ){
			var pay_info = '<span class="label label-warning">未付</span>';
			var is_worked = '<span class="label label-important">未处理</span>';
			if( result[i].status == 1 ){
				pay_info = '<span class="label label-success">已付</span>';
			}
			if( result[i].status == 2 ){
				pay_info = '<span class="label label-success">已发团</span>';
			}
			if( result[i].is_worked == 1 ){
				is_worked =  '<span class="label label-success handle_time" data-original-title="'+result[i].handle_time+'">已处理</span>';
			}
			order_list += "<tr><td class='o_id'>"+result[i].id+"</td> \
			<td class='o_uuid'>"+result[i].orderid+"</td> \
			<td class='o_name'><a class='edit_member' data-toggle='modal' href='#edit-panel' rel='"+result[i].uid+"'>"+result[i].username+"</a></td> \
			<td class='o_tour'><a target='_blank' href='tourdetail/?tid="+result[i].tid+"'>"+result[i].tourname+"</a></td> \
			<td>"+result[i].ordertime+"</td> \
			<td><i class='icon-pencil'></i><a href='ordermanage/editorder/?oid="+result[i].id+"&type=normal' class='edit-order'>查看</a> \
			<i class='icon-trash'></i><a class='del-order' href='#'>删除</a>"+pay_info+is_worked+"</td></tr>";
		}
		$( '#list-head' ).html( order_list_tpl );
		list_panel.html( order_list );
		loadings.hide();
		order.count_order();
		order.del_order();
		member.edit_member();
		$( '.handle_time' ).tooltip();//处理订单时间
		$( '.pagination' ).show();
	},

	count_order: function(){
		page_count({
			url1: 'ordermanage/countorder',
			url2:  'ordermanage/orderlist',
			type: 'order'
		});
	},

	del_order: function(){
		$( '.del-order' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确定要删除此条订单？' );
			var target = $( this ).parent().parent();
			if( r ){
				var id = $( this ).parent().siblings( '.o_id' ).text();
				$.ajax({
					url: 'ordermanage/delorder',
					data: {
						id: id
					},
					success: function( result ){
						target.remove();
					}
				});
			}
		});
	}
}

//定制旅行订单
var custom_order = {
	list_order: function( result ){
		var order_list = ' ';
		for( i = 0; i < result.length; i++ ){
			var is_worked = '<span class="label label-important">未处理</span>';
			if( result[i].is_worked == 1 ){
				is_worked =  '<span class="label label-success handle_time" data-original-title="'+result[i].handle_time+'">已处理</span>';
			}
			order_list += "<tr><td class='o_id'>"+result[i].id+"</td> \
			<td class='o_uuid'>"+result[i].orderid+"</td> \
			<td class='o_name'><a class='edit_member' data-toggle='modal' href='#edit-panel' rel='"+result[i].uid+"'>"+result[i].username+"</a></td> \
			<td>"+result[i].tourtime+"</td> \
			<td>"+result[i].ordertime+"</td> \
			<td><i class='icon-pencil'></i><a href='ordermanage/editorder/?oid="+result[i].id+"&type=custom' class='edit-order'>查看</a> \
			<i class='icon-trash'></i><a class='del-order' href='#'>删除</a>"+is_worked+"</td></tr>";
		}
		$( '#list-head' ).html( order_list_tpl );
		list_panel.html( order_list );
		$( '#list-head th' ).eq(3).text( '出行时间' );
		loadings.hide();
		custom_order.count_order();
		custom_order.del_order();
		member.edit_member();
		$( '.handle_time' ).tooltip();//处理订单时间
		$( '.pagination' ).show();
	},

	count_order: function(){
		page_count({
			url1: 'ordermanage/countcustomize',
			url2:  'ordermanage/getcustomize',
			type: 'custom_order'
		});
	},

	del_order: function(){
		$( '.del-order' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确定要删除此条订单？' );
			var target = $( this ).parent().parent();
			if( r ){
				var id = $( this ).parent().siblings( '.o_id' ).text();
				$.ajax({
					url: 'ordermanage/delcustomize',
					data: {
						id: id
					},
					success: function( result ){
						target.remove();
					}
				});
			}
		});
	}
	
}

//标签
var tag = {
	add_tags: function(){
		$( '#add-tags' ).on('click', function( e ){
			e.preventDefault();
			var type = $( this ).attr( 'class' );
			var target, url, data;
			var name = $( 'input[name="tag"]' ).val();
			if( name!== '' ){
				if( $(this).hasClass('add-destination') ){
					target = '#destination-manage';
					url = 'systemmanage/adddestination';
					var destination = {
						name: name,
						synopsis: ''
					}
					data = {
						data: $.toJSON(destination)
					}
				}
				if( $(this).hasClass('add-theme') ){
					target = '#theme-manage';
					url = 'systemmanage/addtheme';	
					data = {
						name: name
					}
				}
				if( $(this).hasClass('add-traveltime') ){
					target = '#traveltime-manage';
					url = 'systemmanage/addtraveltime';
					data = {
						name: name
					}
				}
				if( $(this).hasClass('add-group') ){
					target = '#group-manage';
					url = 'systemmanage/addgroup';
					data = {
						name: name
					}
				}
				$.ajax({
					url: url,
					data: data,
					success: function( result ){
						$( target ).click();
					}
				});
			}else{
				loadings.show( '所填信息不能为空！' );
				setTimeout(function(){
					loadings.hide();
				},2000);
			}
		});
	},

	del_tags: function(){
		$( '.del-tags' ).on('click', function( e ){
			e.preventDefault();
			var r = confirm( '确实要删除这个标签？' );
			var target = $( this ).parent().parent();
			var id = $( this ).parent().siblings( '.tag_id' ).text();
			var type = $( this ).attr( 'rel' );
			if( r ){
				var url;
				if( type == 'del-theme' ){
					url = 'systemmanage/deltheme';
				}
				if( type == 'del-traveltime' ){
					url = 'systemmanage/deltraveltime'
				}
				if( type == 'del-destination' ){
					url = 'systemmanage/deletedes';
				}
				if( type == 'del-group' ){
					url = 'systemmanage/delgroup'
				}
				$.ajax({
					url: url,
					data: {
						id: id
					},
					success: function( result ){
						if( result.status ){
							target.remove();
						}else{
							loadings.show( result.msg );
						}
					}
				});
			}
		});
	}
}

$(function(){

	list_panel = $( '#list-panel' );

	//fixed nav
	if(  $( '.subnav' ).length>0 ){
		var nav_offset = $( '.subnav' ).offset().top;
		var nav_height = $( '.subnav' ).height();
		$( window ).on( 'scroll' ,function(){
			if( $( window ).scrollTop() > (nav_offset+nav_height) ){
				$( '.subnav' ).addClass( 'subnav-fixed' );
			}else{
				$( '.subnav' ).removeClass( 'subnav-fixed' );
			}
		});
	}

	//页面
	//TODO
	$( '.web-manage' ).each(function( e ){
		$( this ).hover(function(){
			var page_link = $( this ).attr( 'rel' );
			$( this ).append('<a target="_blank" class="preview-link" href="'+page_link+'">预览</a>' );
		},function(){
			$( this ).children().eq( 1 ).remove();
		});
	});

	//管理员列表
	$( '#manager-manage' ).click(function( e ){
		left_menu_post_list( e );
		$( '.pagination' ).hide();
		$( '#list-title' ).text( '后台管理员管理' )
		$( '#tool-bar' ).html( '<a href="#" class="btn btn-primary btn-inverse" id="add-manager"><i class="icon-plus icon-white"></i>添加管理员</a>' );
		$.ajax({
			url: 'usermanage',
			success: function( result ){
				//var json = $.evalJSON( result )
				manager.list_manager( result );
			}
		});
	});

	// 会员列表
	$( '#member-manage').click(function( e ){
		left_menu_post_list( e );
		$( '#list-title' ).text( '会员管理' );
		$( '#tool-bar' ).empty();
		$.ajax({
			url: 'membermanage/memberlist',
			data: {
				page: 1
			},
			success: function( result ){
				member.list_member( result );
			}
		});
	});

	//线路列表
	//TODO  搜索 过滤
	$( '#tour-manage' ).click(function( e ){
		left_menu_post_list( e );
		$( '#list-title' ).text( '线路管理' );
		$( '#tool-bar' ).html( '<a href="tourmanage/newtour" class="btn btn-primary" id="add-tour"><i class="icon-plus icon-white"></i>添加线路</a>' );
		$.ajax({
			url: 'tourmanage',
			data: {
				page: 1
			},
			success: function( result ){
				tour.list_tour( result );
			}
		});
	});
	
	//游记列表
	$( '#travelnote-manage' ).click(function( e ){
		left_menu_post_list( e );
		$( '#list-title' ).text( '游记管理' );
		$( '#tool-bar' ).html( '<a href="travelnote/newnote" class="btn btn-primary" id=""><i class="icon-plus icon-white"></i>写游记</a>' );
		$.ajax({
			url: 'travelnote/notelist',
			data: {
				page: 1
			},
			success: function( result ){
				travel_note.list_note( result );
			}
		});
	});

	//订单列表
	$( '#order-manage' ).click(function( e ){
		left_menu_post_list( e );
		$( '#list-title' ).text( '常规订单管理' );
		$( '#tool-bar' ).empty();
		$.ajax({
			url: 'ordermanage/orderlist',
			data: {
				page: 1
			},
			success: function( result ){
				order.list_order( result );
			}
		});
	});
	//定制旅行订单列表
	$( '#custome-order-manage' ).click(function( e ){
		left_menu_post_list( e );
		$( '#list-title' ).text( '定制化旅行订单管理' );
		$( '#tool-bar' ).empty();
		$.ajax({
			url: 'ordermanage/getcustomize',
			data: {
				page: 1
			},
			success: function( result ){
				custom_order.list_order( result );
			}
		});
	});

	//标签列表
	$( '.tags-manage' ).each(function(){
		$( this ).click(function( e ){
			$( '.pagination' ).hide();
			left_menu_post_list( e );
			var type = $( this ).attr( 'id' );
			$( '#list-head' ).html( tags_list_tpl );
			var tags_list = ' ';
			if( type == 'destination-manage' ){
				$( '#list-title' ).text( '目的地管理' );
				$( '#tool-bar' ).html( '<div class="well form-search"><input class="input-medium" name="tag"><a href="javascript:;" id="add-tags" class="add-destination btn btn-success"><i class="icon-plus icon-white"></i>添加目的地</a></div>' );
				$.ajax({
					url: 'systemmanage/deslist',
					success: function( result ){
						for( i = 0; i < result.length; i++ ){
							tags_list += "<tr><td class='tag_id'>"+result[i].Id+"</td> \
							<td class='tags_name'>"+result[i].name+"</td> \
							<td><i class='icon-edit'></i><a class='edit-tags' rel='edit-destination' href='systemmanage/editdes/?id="+result[i].Id+"'>编辑</a> \
							<i class='icon-trash'></i><a class='del-tags' rel='del-destination' href='#'>删除</a></td></tr>";
						}
						$( '#list-head' ).html( tags_list_tpl );
						list_panel.html( tags_list );
						loadings.hide();
						tag.add_tags();
						//tag.edit_tags();
						tag.del_tags();
					}
				});
			}
			
			if( type == 'theme-manage' ){
				$( '#list-title' ).text( '主题管理' );
				$( '#tool-bar' ).html( '<div class="well form-search"><input class="input-medium" name="tag"><a href="javascript:;" id="add-tags" class="add-theme btn btn-success"><i class="icon-plus icon-white"></i>添加主题</a></div>' );
				$.ajax({
					url: 'systemmanage/themelist',
					success: function( result ){
						for( i = 0; i < result.length; i++ ){
							tags_list += "<tr><td class='tag_id'>"+result[i].id+"</td> \
							<td class='tags_name'>"+result[i].name+"</td> \
							<td><i class='icon-trash'></i><a class='del-tags' rel='del-theme' href='#'>删除</a></td></tr>";
						}
						list_panel.html( tags_list );
						loadings.hide();
						tag.add_tags();
						tag.del_tags();
					}
				});
			}
			
			if( type == 'traveltime-manage' ){
				$( '#list-title' ).text( '出行时间管理' );
				$( '#tool-bar' ).html( '<div class="well form-search"><input class="input-medium" name="tag"><a href="javascript:;" id="add-tags" class="add-traveltime btn btn-success"><i class="icon-plus icon-white"></i>添加出行时间</a></div>' );
				$.ajax({
					url: 'systemmanage/listtraveltime',
					success: function( result ){
						for( i = 0; i < result.length; i++ ){
							tags_list += "<tr><td class='tag_id'>"+result[i].id+"</td> \
							<td class='tags_name'>"+result[i].taveltime+"</td> \
							<td><i class='icon-trash'></i><a class='del-tags' rel='del-traveltime' href='#'>删除</a></td></tr>";
						}
						list_panel.html( tags_list );
						loadings.hide();
						tag.add_tags();
						tag.del_tags();
					}
				});
			}
			
			if( type == 'group-manage' ){
				$( '#list-title' ).text( '活动群体管理' );
				$( '#tool-bar' ).html( '<div class="well form-search"><input class="input-medium" name="tag"><a href="javascript:;" id="add-tags" class="add-group btn btn-success"><i class="icon-plus icon-white"></i>添加活动群体</a></div>' );
				$.ajax({
					url: 'systemmanage/grouplist',
					success: function( result ){
						for( i = 0; i < result.length; i++ ){
							tags_list += "<tr><td class='tag_id'>"+result[i].id+"</td> \
							<td class='tags_name'>"+result[i].group+"</td> \
							<td><i class='icon-trash'></i><a class='del-tags' rel='del-group' href='#'>删除</a></td></tr>";
						}
						list_panel.html( tags_list );
						loadings.hide();
						tag.add_tags();
						tag.del_tags();
					}
				});
			}
		}); 
	});
	
	//location hash判断
	var hash = window.location.hash;
	$( hash.replace('-list','') ).trigger( 'click' );
	
	//hashchange
	$( window ).on('hashchange', function(){
		if( location.hash == $.cookie( 'uto_admin_status' ) ){
			return false;
		}else{
			$( location.hash.replace('-list','') ).trigger( 'click' );
		}
	});
	
	//判断浏览器	
	var ua = navigator.userAgent;
	if( ua.indexOf( 'Gecko' )==-1 && ua.indexOf( 'WebKit' )==-1 && ua.indexOf( 'MSIE 9.0' )==-1 ){
    		$( '.navbar' ).before("<div class='alert alert-error'>您可能正在使用奇怪的浏览器，我们建议您切换到<b>火狐</b>或者<b>Chrome</b>浏览器，以获得更好的操作体验</div>");
	}

})
})(jQuery);
