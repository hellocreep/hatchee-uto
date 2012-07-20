<?php if ($auth): ?>
<script type="text/javascript">
(function(){
	$(function(){
		$(".auth-top-tool").fancybox({
		'width' : '100%',
		'height' : '80%',
		'autoScale' : false,
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'type' : 'iframe',
		onClosed: function(){
			window.location.href=window.location.href;
		}
		}); 
	})
})(jQuery);
</script>
<a  class="auth-top-tool"  href="tourmanage/edittour/?tid=<?php echo  $tour[0] -> Id;?>">修改</a>
<?php endif;?>