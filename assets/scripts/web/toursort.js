;(function(){
$(function(){
	$('#tourtype').change(function(){
		alert($(this).val());
		/*$.ajax({
			url: 'ordermanage/addorder',
			type: 'POST',
			dataType: 'json',
			data:{
					sorttype: $('#tourtype').val();
			},
			success: function( result ){
				alert(result);
				//$('.routelist').html(result);
			}
		});*/
	})
});
})(jQuery);