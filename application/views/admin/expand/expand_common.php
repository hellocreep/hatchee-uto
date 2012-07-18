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

	$( '#submit-expand' ).click(function(){
		var data = {
			title: $( 'input[name="title"]' ).val(),
			intro: $( 'input[name="intro"]' ).val(),
			des: $( 'input[name="des"]' ).val(),
			keywords: $( 'input[name="keywords"]' ).val(),
			people: $('input[name="people"]').val()
		}

		//var content =editor.document.getBody().getHtml();//获取ckeditor内容
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}
		var url = '';
		
		if( $('#e_id').length > 0 ){
			data.id = $( '#n_id' ).val();
			url = ''; 
		}

		if( data.title!=='' ){
			loadings.show( '正在保存' );
			$( 'body' ).append( '<div class="modal-backdrop fade in"></div>' );
			$( '#submit-expand' ).addClass( 'disabled' ).text( '正在保存...' );
			$.ajax({
				url: url,
				data: {
					data: $.toJSON( data ),
					content: $( '#expand_editor' ).val()
				},
				success: function( result ){
					location.href = 'manage/#expand-manage-list';
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

	$( '#cancel-expand' ).click(function(){
		location.href = 'manage/#expand-manage-list';
	});

})
})(jQuery);

</script>