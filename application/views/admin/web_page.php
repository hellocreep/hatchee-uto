<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UTO后台管理系统</title>
		<base href="<?php echo base_url(); ?>"/>
		<base src="<?php echo base_url(); ?>"/>
		<?php $this -> load -> view("admin/global_source"); ?>
		<script charset="utf-8" src="assets/ckeditor/ckeditor.js"></script>
		<script charset="utf-8" src="assets/ckfinder/ckfinder.js"></script>	
		
		<script type="text/javascript">

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
					termtour: $('input[name="termtours"]').val(),
					group:$('input[name="groups"]').val(),
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
		
		</script>

	</head>
	<body>

		<?php $this -> load -> view('admin/header'); ?>

		<div class="window-tip label-info label">
			正在加载...
		</div>
		<div class="container">
			<div class="page-header">
				<h1></h1>
			</div>

			<div class="subnav">
				<div class="offset9">
					<a id="submit" class="btn btn-success" href="javascript:;">保存</a>
					<a class="btn" href="javascript:;" id="cancel">取消</a>
				</div>
			</div>
			<form class="well form-horizontal" action="tourmanage/addtour" method="post">
				<fieldset class="offset1">
					<input name="type" type="hidden" value="<?php echo $type;?>">
					<div class="control-group">
						<label class="control-label" for="title">页面Title：</label>
						<div class="controls">
							<input class="input-xlarge" type="text" name="title" value="<?php echo $info[0]->title; ?>">
							<p class="help-block">
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="keyword">Keywords：</label>
						<div class="controls">
							<input class="input-xlarge" type="text" name="keyword" value="<?php echo $info[0]->keywords;?>">
							<p class="help-block">
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="des">Description：</label>
						<div class="controls">
							<input class="input-xlarge" type="text" name="des" value="<?php echo $info[0]->description; ?>">
							<p class="help-block">
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="des">活动线路：</label>
						<div class="controls">
							<input class="input-xlarge" type="text" name="termtours" value="<?php echo $info[0]->termtour; ?>"><span style="color:#bbb; font-size:11px">(填线路的Id，用 “,” 号隔开)</span>
							<p class="help-block">
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="des">纯玩跟团线路：</label>
						<div class="controls">
							<input class="input-xlarge" type="text" name="groups" value="<?php echo $info[0]->group; ?>">
							<span style="color:#bbb; font-size:11px">(填线路的Id，用 “,” 号隔开)</span>
							<p class="help-block">
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="content">内容：</label>
						<div class="controls">
							<textarea style="width: 490px; height: 400px;" id="web_content" type="text" name="content" value="<?php echo $info[0]->content; ?>">
								<?php echo $info[0]->content; ?>
							</textarea>
							<p class="help-block">
							</p>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</body>
</html>

