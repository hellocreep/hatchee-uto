<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UTO后台管理系统</title>
		<base href="<?php echo base_url(); ?>"/>
		<base src="<?php echo base_url(); ?>"/>
		<?php $this -> load -> view("admin/global_source"); ?>
		<link href="assets/jQuery-File-Upload/css/bootstrap-image-gallery.min.css" rel="stylesheet" type="text/css">
		<link href="assets/jQuery-File-Upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">

		<script src="assets/jQuery-File-Upload/js/jquery-ui.min.js"></script>
		<script src="assets/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
		<script src="assets/jQuery-File-Upload/js/tmpl.js"></script>
		<script src="assets/jQuery-File-Upload/js/bootstrap-image-gallery.min.js"></script>
		<script src="assets/jQuery-File-Upload/js/load-image.min.js"></script>
		<script src="assets/jQuery-File-Upload/js/canvas-to-blob.min.js"></script>
		<script src="assets/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
		<script src="assets/jQuery-File-Upload/js/jquery.fileupload.js"></script>
		<script src="assets/jQuery-File-Upload/js/jquery.fileupload-ip.js"></script>
		<script src="assets/jQuery-File-Upload/js/jquery.fileupload-ui.js"></script>
		<script src="assets/jQuery-File-Upload/js/locale.js"></script>
		<script src="assets/jQuery-File-Upload/js/main.js"></script>
		<script charset="utf-8" src="assets/ckeditor/ckeditor.js"></script>
		<script charset="utf-8" src="assets/ckfinder/ckfinder.js"></script>
		<script src="assets/scripts/admin/manage_gallery.js"></script>
<script>

	(function(){
		$(function(){
			CKEDITOR.replace( 'editor',{
				height: 500
			});
			var finder = new CKFinder();
			$( '#filemanager' ).click(function(e){
				e.preventDefault();
				finder.basePath = finder_base;
				finder.callback = function( api ){

				}
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
				finder.popup( 800, 800 );
			})

			$( '#submit-des' ).click(function(){
				//ckeditor数据同步到textarea	
				for ( instance in CKEDITOR.instances ){
					CKEDITOR.instances[instance].updateElement();
				}
				img = [];
				$( '.thumbnail' ).each(function(){
					if( $(this).attr('rel')>0 ){
						img.push( $(this).attr('rel') );
					}
				});
				var data = {
					id: $( '#d_id' ).val(),
					name: $( 'input[name="name"]' ).val(),
					img: img.toString()
				}
				var synopsis = $( '#editor' ).val();
				
				if( data.name !=='' ){
					loadings.show();
					$( 'body' ).append( '<div class="modal-backdrop fade in"></div>' );
					$( '#submit-tour' ).addClass( 'disabled' ).text( '正在保存...' );
					$.ajax({
						url: 'systemmanage/updatedes',
						data: {
							data: $.toJSON( data ),
							synopsis: synopsis
						},
						success: function( result ){
							if( result ){
								loadings.show('保存成功');
								changeFlag = false;
								setTimeout(function() {
									location.href="manage#destination-manage-list";
								}, 1000)
							}else{
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
			

			$( '#cancel-des' ).click(function(){
				changeFlag = false;
				location.href="manage#destination-manage-list";
			})

		});
	})(jQuery)
</script>
	</head>
	<body>
		<?php $this -> load -> view('admin/header'); ?>

		<div class="window-tip label-info label">
			正在加载...
		</div>

		<div class="container">

			<div class="page-header">
				<h1>编辑景点信息</h1>
			</div>

			<div class="subnav">
				<div class="offset9">
					<a id="submit-des" class="btn btn-success" href="javascript:;">保存</a>
					<a class="btn" href="javascript:;" id="cancel-des">取消</a>
				</div>
			</div>

			<form class="well form-horizontal" action="" method="post">
				<fieldset>
					<input type="hidden" id="d_id" value="<?php echo $des['Id'];?>">
					<div class="control-group">
						<label class="control-label" for="name">名称：</label>
						<div class="controls">
							<input class="input-xlarge" name="name" value="<?php echo $des['name']?>">
							<p class="help-block row-fluid">
								<div class="alert alert-error hide span3 required-info">
									<strong>你一定忘了填写什么重要的信息 ↑</strong>
								</div>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="type">景点简介：</label>
						<div class="controls">
							<?php if(isset($des['synopsis']) && $des['synopsis']!='' ):?>
							<textarea id="editor" value="<?php echo $des['synopsis'];?>" class="input-xlarge" name="synopsis" style="height: 500px;"><?php echo $des['synopsis'];?></textarea>
							<?php else:?>
								<textarea id="editor" value="" class="input-xlarge" name="synopsis" style="height: 500px;"></textarea>
							<?php endif;?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="content">景点主题图：</label>
						<div class="controls">
							<a id="gallery-upload" href="#" class="btn btn-primary">从本地添加图片</a>
							<a href="#" class="btn btn-warning" id="filemanager">从图片库选择</a>
							<input type="hidden" id="userfile" name="userfile" value="">
						</div>
						<input type="hidden" name="gallery" >
						<div class="well show-grid offset1">
							<ul class="thumbnails" id="gallery-preview">
								<?php if(isset($img)):?>
									<?php foreach($img as $m):?>
									<li class="span2"><span class="thumbnail" rel="<?php echo $m['Id'];?>"><img src="<?php echo $m['small'];?>" /></span></li>
									<?php endforeach;?>
								<?php endif;?>
							</ul>
						</div>
					</div>

				</fieldset>

			</form>

		</div>

		<?php $this -> load -> view("admin/tour_common_footer"); ?>
	</body>
</html>