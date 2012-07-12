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

<script src="assets/scripts/admin/common_tour.js"></script>
<script src="assets/scripts/admin/manage_gallery.js"></script>

<script charset="utf-8" src="assets/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script>
<script>
	//frames[0] 每天行程
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#route-detail', {
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : true,
			allowImageUpload : true,
			items : ['source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'image', 'multiimage', 'link']
		});
	});
	//frames[1] 线路排期
	var private_editor;
	 KindEditor.ready(function(K) {
		private_editor = K.create('#tour-term-private', {
			newlineTag: 'br',
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['source', '|','table', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'link']
		});
	});
	 //frames[2] 费用说明
	var price_editor;
	 KindEditor.ready(function(K) {
		price_editor = K.create('#price_detail', {
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['source', '|','table', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'link']
		});
	});

	 //frames[3] 行程亮点
	var content_editor;
	 KindEditor.ready(function(K) {
		content_editor = K.create('#tour_content', {
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['source', '|','table', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'link']
		});
	});

	 //frames[4] 注意事项
	var notice_editor;
	 KindEditor.ready(function(K) {
		notice_editor = K.create('#tour_notice', {
			newlineTag: 'br',
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['source', '|','table', '|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'link']
		});
	});

</script>

<script>
	KindEditor.ready(function(K) {
		var fm = K.editor({
			fileManagerJson : 'editor/manage'
		});
		K('#filemanager').click(function(e) {
			e.preventDefault();
			fm.loadPlugin('filemanager', function() {
				fm.plugin.filemanagerDialog({
					viewType : 'VIEW',
					dirName : 'image',
					clickFn : function(url, title) {
						K('#userfile').val(url);
						$.ajax({
							url : 'imagemanage/imgUpload',
							data : {
								userfile : url
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
						fm.hideDialog();
					}
				});
			});
		});
	}); 
</script>