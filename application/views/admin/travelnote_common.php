<script charset="utf-8" src="assets/ckeditor/ckeditor.js"></script>
<script charset="utf-8" src="assets/ckfinder/ckfinder.js"></script>

<script>
;(function(){
$(function(){
	
	var editor = CKEDITOR.replace( 'note_editor', {
		toolbar : 'MyToolbar',
		height: 500
	});

	CKFinder.setupCKEditor( editor, finder_base );

	$( '#submit-note' ).click(function(){
		$( '#travel_note' ).submit();

	})

	// $( '#submit-note' ).click(function(){
	// 	//ckeditor数据同步到textarea	
	// 	for ( instance in CKEDITOR.instances ){
	// 		CKEDITOR.instances[instance].updateElement();
	// 	}
		
	// 	var data = {
	// 		tour: $( 'option[name="t_id"]:selected' ).val(),
	// 		type: $( 'input[name="type"]:checked' ).val(),
	// 		title: $( 'input[name="title"]' ).val(),
	// 		description: $( 'input[name="des"]' ).val(),
	// 		keywords: $( 'input[name="keywords"]' ).val(),
	// 		tour_time: $( 'input[name="tour_time"]' ).val(),
	// 		editor: $( 'input[name="editor"]' ).val(),
	// 		company: $('input[name="company"]').val(),
	// 		people: $('input[name="people"]').val()
	// 	}
	// 	var content = $( 'textarea[name="note"]' ).val();
	// 	var url = 'travelnote/addtravel';
		
	// 	if( $('#n_id').length > 0 ){
	// 		data.id = $( '#n_id' ).val();
	// 		url = 'travelnote/updatetravel'; 
	// 	}

	// 	if( data.title!=='' ){
	// 		loadings.show();
	// 		$( 'body' ).append( '<div class="modal-backdrop fade in"></div>' );
	// 		$( '#submit-note' ).addClass( 'disabled' ).text( '正在保存...' );
	// 		$.ajax({
	// 			url: url,
	// 			data: {
	// 				data: $.toJSON( data ),
	// 				content: content
	// 			},
	// 			success: function( result ){
	// 				location.href = 'manage/#travelnote-manage-list';
	// 			}
	// 		});
	// 	}else{
	// 		$( '.modal-backdrop' ).hide();
	// 		loadings.show( '请将信息填写完整' );
	// 		$( '.required-info' ).show();
	// 		setTimeout(function(){
	// 			loadings.hide();
	// 		},2000);
	// 	}
	// });

	$( '#cancel-note' ).click(function(){
		location.href = 'manage/#travelnote-manage-list';
	});

})
})(jQuery);

</script>