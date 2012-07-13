<!-- <script charset="utf-8" src="assets/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script> -->
<script charset="utf-8" src="assets/ckeditor/ckeditor.js"></script>
<script charset="utf-8" src="assets/ckfinder/ckfinder.js"></script>

<script>
;(function(){
$(function(){

	// var note_editor;
	// //FIEME 须定义绝对url才能批量上传图片
	// //var basePath = '/utoadmin/';
	// var basePath = '/uto/';
	// KindEditor.ready(function(K) {
	// 	note_editor = K.create('#note_editor', {
	// 		resizeType : 1,

	// 		uploadJson : basePath+'editor/upload',
	// 		fileManagerJson : basePath+'editor/manage',

	// 		allowFileManager : true,
	// 		allowPreviewEmoticons : true,
	// 		allowImageUpload : true,
	// 		items : ['source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'image', 'multiimage', 'link']
	// 	});
	// });
	
	var editor = CKEDITOR.replace( 'tour-term-private', {
		toolbar : 'MyToolbar',
		height: 500
	});

	CKFinder.setupCKEditor( editor, '/uto/assets/ckfinder/' );

	$( '#submit-note' ).click(function(){
		//note_editor.sync();
		//ckeditor数据同步到textarea	
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}
		
		var data = {
			tour: $( 'option[name="t_id"]:selected' ).val(),
			type: $( 'input[name="type"]:checked' ).val(),
			title: $( 'input[name="title"]' ).val(),
			description: $( 'input[name="des"]' ).val(),
			keywords: $( 'input[name="keywords"]' ).val(),
			tour_time: $( 'input[name="tour_time"]' ).val(),
			editor: $( 'input[name="editor"]' ).val()
		}
		var content = $( 'textarea[name="note"]' ).val();
		var url = 'travelnote/addtravel';
		
		if( $('#n_id').length > 0 ){
			data.id = $( '#n_id' ).val();
			url = 'travelnote/updatetravel'; 
		}

		if( data.title!=='' ){
			loadings.show();
			$( 'body' ).append( '<div class="modal-backdrop fade in"></div>' );
			$( '#submit-note' ).addClass( 'disabled' ).text( '正在保存...' );
			$.ajax({
				url: url,
				data: {
					data: $.toJSON( data ),
					content: content
				},
				success: function( result ){
					location.href = 'manage/#travelnote-manage-list';
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

	$( '#cancel-note' ).click(function(){
		location.href = 'manage/#travelnote-manage-list';
	});

})
})(jQuery);

</script>