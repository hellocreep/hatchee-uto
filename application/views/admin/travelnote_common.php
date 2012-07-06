<script charset="utf-8" src="assets/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script>
<script src="assets/scripts/admin/travelnote.js"></script>
<script>
	var note_editor;
	KindEditor.ready(function(K) {
		note_editor = K.create('#note_editor', {
			resizeType : 1,
			uploadJson : 'editor/upload',
			fileManagerJson : 'editor/manage',
			allowFileManager : true,
			allowPreviewEmoticons : true,
			allowImageUpload : true,
			items : ['source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'image', 'multiimage', 'link']
		});
	});
</script>