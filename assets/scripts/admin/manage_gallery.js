;(function(){

/*	
	required: 
	views/admin/tour_common_header.php
	views/admin/tour_common_footer.php
*/

	var uto_img = {
		addimg: function(){
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
						im += "<li class='span2'><a class='thumbnail' rel="+imges_list[i].name+"><img class=' ' src="+imges_list[i].src+" /></a></li>";
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
						im += "<span class='span2'><a class='thumbnail' rel='"+imges_list[i].name+"'><img class='tour-thumbnail' src="+imges_list[i].src+" /></a></span>";
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
							uto_img.getinfo();
							uto_img.editimg();
							uto_img.delimg();
							$( '.close' ).click();
							$( '.files' ).empty();			
						}
					}
				});
			});
		},

		getinfo: function(){
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
		},

		editimg: function(){
			var info = $( '#edit-image-info' );
			$( '#update-image' ).unbind( 'click' );
			$( '#update-image' ).on('click',function( e ){
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
						uto_img.delimg();
						$( '.close' ).trigger( 'click' ); 
					},
					error: function(){
						alert( '修改失败' );
					}
				})
			});
		},

		delimg: function(){
			$( '#del-image' ).on('click',function(){
				var info = $( '#edit-image-info' );
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
		}

	}

$(function(){

	//修改线路页面直接绑定修改图片方法
	if( location.href.indexOf( 'newtour' ) == -1 ){
		uto_img.getinfo();
		uto_img.editimg();
		uto_img.delimg();
	}

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
	uto_img.addimg();

})
})(jQuery);