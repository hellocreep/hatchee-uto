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
	$( window.frames[0].document ).find( '.ke-content' ).empty();
}

//行程
var route = {
	addroute: function(){
		$( '#submit-route' ).unbind( 'click' ); //取消上次绑定方法
		$( '#submit-route' ).click(function( e ){
			e.preventDefault();
			editor.sync(); //从kindeditor iframe中把数据同步到 textarea
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
	//清空上次添加到数据
	empty_route_input()
	},

	getroute: function( id ){
		$.ajax({
			url: 'tourmanage/getdaytravel',
			data: {
				id: id
			},
			success: function( result ){
				$( 'input[name="course"]' ).val( result.course );
				$( window.frames[0].document ).find( '.ke-content' ).html( result.content );
				$( 'textarea[name="route-tips"]' ).val( result.tips );
				$( '#submit-route' ).unbind( 'click' );
				$( '#submit-route' ).click(function( e ){
					e.preventDefault();
					editor.sync(); //从kindediter iframe中把数据同步到 textarea
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
	//清空上次添加的数据
	empty_route_input();
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

//获取与修改图片信息
var editimage = function(){
	$( '.thumbnail' ).unbind( 'click' );
	var info = $('#edit-image-info' );
	$( '#update-image' ).unbind( 'click' );
	$( '#update-image' ).click(function( e ){
		e.preventDefault();
		var data = {
			id: info.find( '.image-id' ).val(),
			alt: info.find( 'input[name="edit-image-alt"]' ).val(),
			des: info.find( 'textarea[name="edit-image-des"]' ).val(),
			tags: info.find( 'input[name="edit-image-tags"]' ).val()
		}
		$.ajax({
			url: 'imagemanage/updateimg',
			data: {
				data: $.toJSON( data )
			},
			success: function( result ){
				if( result ){
					var img_info = "<div class='images-info' rel='"+data.id+"'> \
							<input type='hidden' class='image-id' class='input-xlarge' value='"+data.id+"'> \
							<label>alt:</label> \
							<input type='text' name='edit-image-alt' class='input-xlarge' value='"+data.alt+"' /> \
							<label>描述：</label> \
							<textarea style='width:490px;' name='edit-image-des' class='input-xlarge' value='"+data.des+"'>"+data.des+"</textarea> \
							<label>标签：</label> \
							<input type='text' name='edit-image-tags' value='"+data.tags+"'> \
							</div>" ;
					
					$( '.images-info[rel="'+data.id+'"]' ).html( img_info );
					$( '.close' ).trigger( 'click' ); 
				}else{
					alert( '修改失败' );
				}
			},
			error: function(){
				alert( '修改失败' );
			}
		})
	});
	
	//移除图片并不在服务器上删除
	$( '#del-image' ).unbind( 'click' );
	$( '#del-image' ).click(function(){
		var id = info.find( '.image-id' ).val();
		$( '.close' ).trigger( 'click' );
		$( '.thumbnail[rel="'+id+'"]' ).parent().remove();
		/*
		$.ajax({
			url: 'imagemanage/delimg',
			data: {
				id: id
			},
			success: function( result ){
				if( result ){
					$( '.close' ).trigger( 'click' );
					$( '.thumbnail[rel="'+id+'"]' ).parent().remove();
				}else{
					alert( '删除失败' );
				}
			}
		});
		*/
	});
	
	$( '.thumbnail' ).not( '.tour-thumbnail' ).each(function(){
		$( this ).on('click', function(){
			if( $(this).next().length > 0 ){
				$( '#edit-image-info' ).html( $(this).next().html() );
			}else{
				var id = $( this ).attr( 'rel' );
				$.ajax({
					url: 'imagemanage/getimginfo',
					data: {
						id: id
					},
					success: function( result ){
						var img_info = "<div class='images-info' rel='"+result[0].Id+"'> \
								<input type='hidden' class='image-id' class='input-xlarge' value='"+result[0].Id+"'> \
								<label>alt:</label> \
								<input type='text' name='edit-image-alt' class='input-xlarge' value='"+result[0].alt+"' /> \
								<label>描述：</label> \
								<textarea style='width:490px;' name='edit-image-des' class='input-xlarge' value='"+result[0].des+"'>"+result[0].des+"</textarea> \
								<label>标签：</label> \
								<input type='text' name='edit-image-tags' value='"+result[0].tags+"'> \
								</div>" ;
						$( this ).next().html( img_info );
						$( '#edit-image-info' ).html( img_info );
					}
				});
			}
			
			$( '#images_edit_panel' ).modal();
		}).css('cursor','pointer');
	});
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
		//从kindeditor iframe中把数据同步到 textarea
		private_editor.sync(); 
		//判断是否为小包团
		var term = $( '#tour-term-private' ).val();
		price_editor.sync();
		content_editor.sync();
		notice_editor.sync();
		var data = {
			is_private: $('input:checkbox[name="is-private"]')[0].checked,
			title: $('input[name="title"]').val(),
			name : $('input[name="name"]').val(),
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
	
	//修改线路页面直接绑定修改图片方法
	if( location.href.indexOf( 'newtour' ) == -1 ){
		editimage();
	}

	//判断是否小包团
	$( 'input[name="is-private"]').change(function(){
		if( $(this)[0].checked ){
			$( window.frames[1].document ).find( '.ke-content' ).html( uto_var.tpl_table +'</br>'+ uto_var.tpl_table );
		}else{
			$( window.frames[1].document ).find( '.ke-content' ).html( '' );
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
	
	//缩略图上传modal
	$('#thumbnail-upload').click(function( e ) {
		e.preventDefault();
		$( '#fileupload' ).attr('action', 'upload/upload_img');
		$( '#fileupload' ).removeClass( 'gallery-form' );
		$( '#images_panel' ).modal();
	});
	//图片集上传modal
	$( '#gallery-upload' ).click(function( e ){
		e.preventDefault();
		$( '#fileupload' ).attr('action', 'upload/upload_img');
		$( '#fileupload' ).addClass( 'gallery-form' );
		$( '#images_panel' ).modal();
	});

	//提交图片
	$( '#submit-images' ).click(function( e ){
		e.preventDefault();
		var imges_list = $( '.images_list' );
		var im = '';
		var imges_info = [];
		$( '.img-info' ).each(function(){
			var data = {
				id: $( this ).attr( 'rel' ),
				alt: $( this ).find( 'input[name="alt"]' ).val(),
				des: $( this ).find( 'textarea[name="des"]' ).val(),
				tags: $( this ).find( 'input[name="tags"]' ).val()
			}
			imges_info.push( data );
		});
		if( imges_list.length == 0 ){
			$( '.close' ).click();
			return;
		}
		if( $('#fileupload').attr('class')==='gallery-form' ){
			for( var i = 0; i<imges_list.length; i++ ){
				im += "<li class='span2'><span class='thumbnail' rel="+imges_list[i].name+"><img class=' ' src="+imges_list[i].src+" /></span></li>";
			}
			$( '#gallery-preview' ).append( im );

			var gallery_list = [];
			for( var i = 0; i < imges_info.length; i++ ){
				gallery_list.push( imges_info[i].id )
			}

			//放入gallery ID 其实放不放无所谓的
			if( gallery_list.length > 0 ){
				var gallery_val = $( 'input[name="gallery"]' ).val();
				if( gallery_val.length > 0 ){
					var g = gallery_val +","+ gallery_list.join(",");
					$( 'input[name="gallery"]' ).val(g); 
				}else{
					$( 'input[name="gallery"]' ).val( gallery_list );	
				}
			}		

		}else{
			for( var i = 0; i < imges_list.length; i++ ){
				im += "<span class='span2'><span class='thumbnail' rel='"+imges_list[i].name+"'><img class='tour-thumbnail' src="+imges_list[i].src+" /></span></span>";
			}
			$( '#thubmnail-preview' ).html( im );
			$( 'input[name="thumbnail"]' ).val( $('.tour-thumbnail').attr('src') );
		}
		
		$.ajax({
			url: 'imagemanage/addimginfo',
			data: {
				data: $.toJSON( imges_info )
			},
			success: function( result ){
				if( result ){
					editimage();
					$( '.close' ).click();
					$( '.files' ).empty();			
				}
			}
		});
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
	
	//tags选择
	tagschoose();
	
	//取消
	$( '#cancel-tour' ).click(function( e ){
		e.preventDefault();
		window.location.href = 'manage/#tour-manage';
	});
		
})
})(jQuery);
