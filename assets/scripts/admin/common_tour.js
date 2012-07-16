;(function(){

window.uto_var = {
	tpl_table: "<table cellspacing='0' cellpadding='2' bordercolor='#DDD' border='1' style='width:100%;'> \
	<tbody> \
		<tr> \
			<th>时间</th> \
			<th colspan='8'></th> \
		</tr> \
		<tr> \
			<td>车型/人数</td> \
			<td>2人</td> \
			<td>3人</td> \
			<td>4人</td> \
			<td>5-6人</td> \
			<td>7-8人</td> \
			<td>9-10人</td> \
			<td>11-12人</td> \
			<td>13-14人</td> \
		</tr> \
		<tr> \
			<td class='car-type'>丰田4500</td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
		</tr> \
		<tr> \
			<td class='car-type'>三菱越野</td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
		</tr> \
		<tr> \
			<td class='car-type'>9座商务车</td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
		</tr> \
		<tr> \
			<td class='car-type'>17座全顺</td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
		</tr> \
		<tr> \
			<td class='car-type'>19-23座考斯特</td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
			<td></td> \
		</tr> \
	</tbody> \
</table>",
}

//标签选择
var tagschoose = function(){
	$( '.tour-tags' ).each(function( index ){
		$( this ).click(function(){
			$( this ).toggleClass( 'active' );
			var checkbox = $( '.tags-checkbox' ).eq( index );
			if( checkbox.attr( 'checked') !== undefined ){
				checkbox.attr( 'checked', false );	
			}else{
				checkbox.attr( 'checked', true );
			}	
		});
	});
}

//清空行程输入框
var empty_route_input = function(){
	$( '.modal-body .input-xlarge' ).each(function(){
		$( this ).val('');
	});
	$( window.frames[0].document ).find( '.cke_show_borders' ).empty();
}

//行程
var route = {
	createroute: function(){
		$( '#create-route' ).click(function( e ){
			e.preventDefault();
			var days = $( 'input[name="days"]' ).val() * 1;
			var exist_route = $( '#new-route-list li' ).length;
			var route_list = '';
			if( days > exist_route ){
				for( var i = exist_route+1; i <= days; i++ ){
					route_list += "<li class='btn'><a href=#route_panel rel="+i+">"+i+"</a></li>";
				}
				$( '#new-route-list' ).append( route_list );
				$( '#new-route-list li a' ).each(function(){
					if( $(this).attr('rel')*1 > 0 ){
						$( this ).click(function( e ){
							e.preventDefault();
							if( $( this ).attr( 'id' ) > 0 ){ 
								route.getroute( $(this).attr('id') );
								route.delroute( $(this).attr('id') );
							}else{
								route.addroute();
							}
							$( '.route-title' ).text( '第'+$(this).text()+'天的行程' );
							$( '#route-day' ).val( $(this).text() );
							$( '#route_panel' ).modal();
						});
					}
				});
			}else{
				alert( '请手动删除行程' );
			}
		});
	},

	addroute: function(){
		$( '#submit-route' ).unbind( 'click' ); //取消上次绑定方法
		$( '#submit-route' ).click(function( e ){
			e.preventDefault();
			//editor.sync(); //从kindeditor iframe中把数据同步到 textarea
			for ( instance in CKEDITOR.instances ){
				CKEDITOR.instances[instance].updateElement();
			}
			var day = $( '#route-day' ).val();
			var data = {
				course: $( 'input[name="course"]' ).val(),
				tips: $( 'textarea[name="route-tips"]' ).val(),
				img: ''
			}
			$.ajax({
				url: 'tourmanage/adddaytravel',
				data: {
					data: $.toJSON(data),
					content: $( '#route-detail' ).val()
				},
				success: function( result ){
					if( result > 0 ){
						$( '#new-route-list li a[rel='+day+']' ).attr( 'id', result ).parent().addClass( 'btn-success' );
						$( '.close' ).click();
					}else{
						alert( '保存失败' );
					}
				}
			});
		});
	empty_route_input();//清空上次添加到数据
	},

	getroute: function( id ){
		$.ajax({
			url: 'tourmanage/getdaytravel',
			data: {
				id: id
			},
			success: function( result ){
				$( 'input[name="course"]' ).val( result.course );
				$( window.frames[0].document ).find( '.cke_show_borders' ).html( result.content );
				$( 'textarea[name="route-tips"]' ).val( result.tips );
				$( '#submit-route' ).unbind( 'click' );
				$( '#submit-route' ).click(function( e ){
					e.preventDefault();
					//editor.sync(); //从kindediter iframe中把数据同步到 textarea
					for ( instance in CKEDITOR.instances ){
						CKEDITOR.instances[instance].updateElement();
					}
					var data = {
						id: result.Id,
						course: $( 'input[name="course"]' ).val(),
						tips: $( 'textarea[name="route-tips"]' ).val()
					}
					$.ajax({
						url: 'tourmanage/updatedaytravel',
						data: {
							data: $.toJSON( data ),
							content: $( 'textarea[name="route-detail"]' ).val()
						},
						success: function( result ){
							$( '.close' ).click();
						}
					});

				});
			}
		});
	empty_route_input();//清空上次添加的数据
	},

	selectroute: function(){
		$( '#route_list li a' ).each(function( e ){
			$( this ).click(function(){
				var day = $( '#route-day' ).val();
				var route_id = $( this ).attr( 'rel' );
				$( '#new-route-list li a' ).eq( day-1 ).attr( 'id', route_id ).parent().addClass( 'btn-success' );
				$( '.close' ).click();
			});
		});
	},

	delroute: function( id ){
		$( '#del-route' ).unbind( 'click' );
		$( '#del-route' ).click(function(e){
			e.preventDefault();
			$( '#'+id ).parent().nextAll().each(function(index){
				$( this ).children().text( $(this).text()*1 - 1 );
			});
			$( '#'+id ).parent().remove();
			$( 'input[name="days"]' ).val( $('#new-route-list li').length );	
			$( '.close' ).click();
		});
	}

}

//提交线路
var submittour = function(){
	$('#submit-tour').click(function( e ) {
		e.preventDefault();
		var ga = $( '#gallery-preview .thumbnail' );
		var gallery = [];
		for(var i = 0; i < ga.length; i++ ){
			gallery.push(ga.eq(i).attr('rel'));
		}
		var t = $(':checkbox[name="traveltime"]:checked');
		var traveltime = [];
		for(var i = 0; i < t.length; i++) {
			traveltime.push(t[i].value);
		}
		var th = $(':checkbox[name="theme"]:checked');
		var theme = [];
		for(var i = 0; i < th.length; i++) {
			theme.push(th[i].value);
		}
		var g = $(':checkbox[name="group"]:checked');
		var group = [];
		for(var i = 0; i < g.length; i++) {
			group.push(g[i].value);
		}
		var d = $(':checkbox[name="destination"]:checked');
		var destination = [];
		for(var i = 0; i < d.length; i++) {
			destination.push(d[i].value);
		}
		var r = $('#new-route-list .btn-success a');
		var route = [];
		for(var i=0; i<r.length; i++) {
			route.push(r[i].id)
		}
		//ckeditor数据同步到textarea	
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}
		//判断是否为小包团
		var term = $( '#tour-term-private' ).val();
		var data = {
			is_private: $('input:checkbox[name="is-private"]')[0].checked,
			title: $('input[name="title"]').val(),
			name : $('input[name="name"]').val(),
			sub_name: $('input[name="sub_name"]').val()||'',
			thumbnail : $('input[name="thumbnail"]').val(),
			keywords : $('input[name="keywords"]').val(),
			description : $('input[name="description"]').val(),
			price : $('input[name="price"]').val(),
			price_detail: $('textarea[name="price_detail"]').val(),
			days : r.length,
			route : route.toString(),
			route_intro:  $('textarea[name="route_intro"]').val(),
			intro : $('textarea[name="intro"]').val(),
			content : $('textarea[name="content"]').val(),
			map: $( 'input[name="map"]').val()||'',
			gallery : gallery.toString(),//$('input[name="gallery"]').val(),
			notice : $('textarea[name="notice"]').val(),
			term : term,
			traveltime : traveltime,
			theme : theme,
			group : group,
			destination : destination,
			EOF : $('input[name="EOF"]').val()
		}
		var url;
		//判断新建线路或者修改线路
		if( $('input[name="upid"]' ).val() > 0 ){
			data.upid = $('input[name="upid"]' ).val();
			url = 'tourmanage/updatetour';
		}else{
			url =  'tourmanage/addtour';
		}
		
		if( data.name!==''||data.title!=='' ){
			loadings.show();
			$( 'body' ).append( '<div class="modal-backdrop fade in"></div>' );
			$( '#submit-tour' ).addClass( 'disabled' ).text( '正在保存...' );
			$.ajax({
				url : url,
				data : {
					data : $.toJSON(data)
				},
				success : function(result) {
					if(result) {
						loadings.show('保存成功');
						changeFlag = false;
						setTimeout(function() {
							window.location = 'manage/#tour-manage'
						}, 1000)
					} else {
						loadings.show('保存失败');
						$( '.modal-backdrop' ).hide();
					}
				}
			});
		}else{	
			$( '.modal-backdrop' ).hide();
			loadings.show( '请将信息填写完整' );
			$( '.required-info' ).show();
			setTimeout(function(){
				loadings.hide();
			},2000);
		}
	});
}

$(function(){

	//shift+enter ——> br
	var finder = new CKFinder();
	//frames[0]
	var route_editor = CKEDITOR.replace( 'route-detail',{
		toolbar : 'MyToolbar'
	});
	CKFinder.setupCKEditor( route_editor, finder_base );

	//frames[1]
	CKEDITOR.replace( 'tour-term-private', {
		height: 500
	});

	//frames[2]
	// CKEDITOR.replace( 'price_detail',{
	// 	height: 500
	// });
	//frames[3]
	CKEDITOR.replace( 'tour_content',{
		height: 500
	});
	//frames[4]
	CKEDITOR.replace('tour_notice',{
	})

	$( '#filemanager' ).click(function(e){
		e.preventDefault();
		finder.callback = function( api ){

		}
		finder.basePath = finder_base;
		finder.selectActionFunction = function( fileUrl, data ) {
			$.ajax({
				url : 'imagemanage/imgUpload',
				data : {
					userfile : fileUrl
				},
				success : function(result) {
					var gallery_val = $('input[name="gallery"]').val();
					if (gallery_val.length > 0) {
						var g = gallery_val + "," + result[0].Id;
						$('input[name="gallery"]').val(g);
					} else {
						$('input[name="gallery"]').val(result[0].Id);
					}
					if( result[0].small !== null ){
						$('#gallery-preview').append("<li class='span2'><a class='thumbnail' rel='"+result[0].Id+"'><img src=" + result[0].small + " /></a></li>");
					}else{
						$('#gallery-preview').append("<li class='span2'><a class='thumbnail' rel='"+result[0].Id+"'><img width='130px' height='80px' src=" + result[0].path + " /></a></li>");
					}
					
				}
			});
			// Using CKFinderAPI to show simple dialog.
			//this.openMsgDialog( '', 'Additional data: ' + data['selectActionData'] );
			//document.getElementById( data['selectActionData'] ).innerHTML = fileUrl;
		}
		finder.popup( 800,600 );
	})

	//判断是否小包团
	$( 'input[name="is-private"]').change(function(){
		if( $(this)[0].checked ){
			$( window.frames[1].document ).find( '.cke_show_borders' ).html( uto_var.tpl_table +'<br />'+ uto_var.tpl_table );
		}else{
			$( window.frames[1].document ).find( '.cke_show_borders' ).html( '' );
		}
	});

	//提交线路
	submittour();
	
	//FIXME
	//刷新或退出页面提示
	changeFlag = true; //false
	$( 'input' ).change(function(){
		changeFlag = true;
	});
	$( 'textarea' ).change(function(){
		changeFlag = true;
	});
	var upid = $( 'input[name="upid"]' ).val();
	$( window ).on( 'beforeunload', function( e ){
		if( changeFlag == true ){
			if( upid>0 ){
				$.ajax({
					url: 'tourmanage/recallupdate',
					data: {
						id: $( 'input[name="upid"]' ).val()
					},
					success: function( result ){
						return;
					},
					error: function(){
						return;
					}
				});
			}
			return true;
		}
	}); 

	//每天行程
	route.selectroute();
	
	$( '#new-route-list li a' ).each(function( index ){
		$( this ).text( index+ 1 );
	});
	$( '#new-route-list li a' ).on('click', function( e ){
		e.preventDefault();
		if( $( this ).attr( 'id' ) > 0 ){ //修改行程
			route.getroute( $(this).attr('id') );
			route.delroute( $(this).attr('id') );
		}else{
			route.addroute();
		}
		$( '.route-title' ).text( '第'+$(this).text()+'天的行程' );
		$( '#route-day' ).val( $(this).text() );
		$( '#route_panel' ).modal();
	});

	route.createroute();
	
	//tags选择
	tagschoose();
	
	//取消
	$( '#cancel-tour' ).click(function( e ){
		e.preventDefault();
		window.location.href = 'manage/#tour-manage';
	});
		
})
})(jQuery);
