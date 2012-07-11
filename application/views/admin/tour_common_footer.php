<div id="images_panel" class="modal hide fade">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" type="button">
			×
		</button>
		<h3>添加图片</h3>
	</div>
	<div class="modal-body">
		<form action="" id="fileupload" method="POST" enctype="multipart/form-data">
			<div class="fileupload-buttonbar">
				<span class="btn btn-success fileinput-button"> <span><i class="icon-plus icon-white"></i> 添加图片...</span>
					<input type="file" name="userfile" multiple>
				</span>
				<button class="btn btn-primary start" type="submit">
					<i class="icon-upload icon-white"></i>
					<span>全部上传</span>
				</button>
				<button class="btn btn-warning cancel" type="reset">
					<i class="icon-ban-circle icon-white"></i>
					<span>全部取消</span>
				</button>
			</div>

			<div class="span5">
				<!-- The global progress bar -->
				<div class="progress progress-success progress-striped active fade">
					<div class="bar" style="width:0%;"></div>
				</div>
			</div>

			<div class="fileupload-loading"></div>
			<br>
			<!-- The table listing the files available for upload/download -->
			<table class="table table-striped">
				<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
			</table>
		</form>
	</div>
	<div class="modal-footer">
		<a class="btn btn-primary" href="#" id="submit-images">确定</a>
		<a class="btn" data-dismiss="modal" href="#">取消</a>
	</div>

	<script id="template-upload" type="text/x-tmpl">
		{% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
		<tr class="template-upload fade">
		<td class="preview"><span class="fade"></span></td>
		<td class="name">{%=file.name%}</td>
		<td class="size">{%=o.formatFileSize(file.size)%}</td>
		{% if (file.error) { %}
		<td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
		{% } else if (o.files.valid && !i) { %}
		<td>
		<div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
		</td>
		<td class="start">{% if (!o.options.autoUpload) { %}
		<button class="btn btn-primary">
		<i class="icon-upload icon-white"></i> {%=locale.fileupload.start%}
		</button>
		{% } %}</td>
		{% } else { %}
		<td colspan="2"></td>
		{% } %}
		<td class="cancel">{% if (!i) { %}
		<button class="btn btn-warning">
		<i class="icon-ban-circle icon-white"></i> {%=locale.fileupload.cancel%}
		</button>
		{% } %}</td>
		</tr>
		{% } %}
	</script>

	<div id="download-files">
		<!-- The template to display files available for download -->
		<script id="template-download" type="text/x-tmpl">
			{% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
			<tr class="template-download fade">
			{% if (file.error) { %}
			<td></td>
			<td class="name">{%=file.name%}</td>
			<td class="size">{%=o.formatFileSize(file.size)%}</td>
			<td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
			{% } else { %}
			<td class="preview">{% if (file.middle) { %}
			<a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img class="images_list" name="{%=file.imgid%}" width="100px" src="{%=file.middle%}"></a>
			{% } %}</td>
			<td class="name">
			<a class="images_wrap" href="{%=file.url%}" title="{%=file.name%}" target="_blank" rel="{%=file.middle&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
				<div rel="{%=file.imgid%}" class="img-info form-horizontal">
					<div class="control-group"><label class="control-label">alt:</label><input class="input-xlarge" type="text" name="alt"></div>
					<div class="control-group"><label class="control-label">描述：</label><textarea class="input-xlarge" type="text" name="des"></textarea></div>
					<div class="control-group"><label class="control-label">标签(空格隔开)：</label><input class="input-xlarge" type="text" name="tags"></div>
				</div>
			</td>
			<td class="size">{%=o.formatFileSize(file.size)%}</td>
			<td colspan="2"></td>
			{% } %}
			<td class="delete">
			<button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
			<i class="icon-trash icon-white"></i> {%=locale.fileupload.destroy%}
			</button>
			<input type="checkbox" name="delete" value="1">
			</td>
			<!--
			<td class="add">
			<button class="btn btn-success add-article"  title="{%=file.name%}" data-type="PRIMARYIMAGE" data-url="{%=file.url%}">
			<i class="icon-plus icon-white"></i> Add
			</button>

			</td>
			-->
			</tr>
			{% } %}

		</script>

	</div>
</div>

<!-- 行程 -->
<div id='route_panel' class='modal hide fade' > 
	<div class="modal-header">
		<button class="close" data-dismiss="modal">×</button>
		<h3 class="route-title"></h3>
	</div>
	<div class="modal-body">
		<ul class="nav nav-pills">
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" data-toggle="dropdown">选择行程<b class="caret"></b></a>
				<ul class="dropdown-menu" id="route_list">
					<?php foreach ($routeinfo as $route):?>
					<li><a href="javascript:;" rel="<?php echo $route->Id;?>"><?php echo $route->course;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
		</ul>
		<input type="hidden" id="route-day" class="input-xlarge">
		<h2>详细行程</h2>
		<label>出发地与目的地</label>
		<input type="text" name="course" class="input-xlarge" />
		<label>详细内容</label>
		<textarea id="route-detail" style="width:600px;height: 150px;" name="route-detail" class="input-xlarge"></textarea>
		<label>互助信息</label>
		<textarea  style="width:600px;" name="route-tips" class="input-xlarge"></textarea>
	</div>
	<div class="modal-footer">
		<a class="btn btn-primary" href="javascript:;" id="submit-route">保存</a>
		<a class="btn" data-dismiss="modal" href="javascript:;">取消</a>
		<a class="btn btn-danger" href="javascript:;" id="del-route">删除</a>
	</div>
</div>

<!-- 修改图片信息 -->
<div id='images_edit_panel' class='modal hide fade' > 
	<div class="modal-header">
		<button class="close" data-dismiss="modal">×</button>
		<h3>修改图片信息</h3>
	</div>
	<div class="modal-body" id="edit-image-info">
		
	</div>
	<div class="modal-footer">
		<a class="btn btn-primary" href="#" id="update-image">保存</a>
		<a class="btn" data-dismiss="modal" href="#">取消</a>
		<a class="btn btn-danger" id="del-image">移除</a>
	</div>
</div>