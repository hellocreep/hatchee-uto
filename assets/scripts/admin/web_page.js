;(function(){
$(function(){
	
	CKEDITOR.replace('web_content',{
		});

	$( '#submit' ).click(function( e ){
		e.preventDefault();
		//ckeditor数据同步到textarea	
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}
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