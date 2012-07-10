;(function(){
$(function(){

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#web_content', {
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : true,
			allowImageUpload : true,
			items : ['source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'image', 'multiimage', 'link']
		});
	});

	$( '#submit' ).click(function( e ){
		e.preventDefault();
		editor.sync();
		var data = {
			type: $('input[name="type"]').val(),
			title: $('input[name="title"]').val(),
			keywords: $('input[name="keyword"]').val(),
			description: $('input[name="des"]').val(),
			content: $('textarea[name="content"]').val()
		}
		$.ajax({
			url: 'pagemanage/updatepage',
			data: {
				data: $.toJSON(data),
				content: data.content // 插入图片不显示，不能用json
			},
			success: function( result ){
				location.href="manage";
			}
		});
	});

	$( '#cancel' ).click(function(){
		location.href="manage";
	});


});
})(jQuery);