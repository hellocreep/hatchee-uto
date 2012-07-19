<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UTO后台管理系统</title>
		<base href="<?php echo base_url(); ?>"/>
		<base src="<?php echo base_url(); ?>"/>
		<?php $this -> load -> view("admin/global_source"); ?>
		<?php $this -> load -> view("admin/expand/expand_common"); ?>
	</head>
	<body>
		<?php $this -> load -> view('admin/header'); ?>

		<div class="window-tip label-info label">
			正在加载...
		</div>

		<div class="container">

			<div class="page-header">
				<h1>添加新的扩展活动</h1>
			</div>

			<div class="subnav">
				<div class="offset9">
					<a id="submit-expand" class="btn btn-success" href="javascript:;">保存</a>
					<a class="btn" href="javascript:;" id="cancel-expand">取消</a>
				</div>
			</div>

			<form id="travel_note" class="well form-horizontal" action="expandtour/updateexpand" method="post">
				<fieldset>
					<input type="hidden" value="<?php echo $expand['Id'];?>" id="e_id">
					<div class="control-group">
						<label class="control-label" for="title">标题：</label>
						<div class="controls">
							<input name="title" class="input-xlarge" type="text" value="<?php echo $expand['title'];?>">
							<p class="help-block row-fluid">
								<div class="alert alert-error hide span3 required-info">
									<strong>你一定忘了填写什么重要的信息 ↑</strong>
								</div>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="intro">简介：</label>
						<div class="controls">
							<input name="intro" class="input-xlarge" type="text" value="<?php echo $expand['intro'];?>">
							<p class="help-block row-fluid">
								<div class="alert alert-error hide span3 required-info">
									<strong>你一定忘了填写什么重要的信息 ↑</strong>
								</div>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="des">Description：</label>
						<div class="controls">
							<input name="des" class="input-xlarge" type="text" value="<?php echo $expand['des'];?>">
							<p class="help-block">
								SEO
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="keywords">Keywords：</label>
						<div class="controls">
							<input name="keywords" class="input-xlarge" type="text" value="<?php echo $expand['keywords'];?>">
							<p class="help-block">
								SEO
							</p>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="day">活动天数：</label>
						<div class="controls">
							<input name="day" class="input-xlarge" type="text" value="<?php echo $expand['day'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="people">参加人数：</label>
						<div class="controls">
							<input name="people" class="input-xlarge" type="text" value="<?php echo $expand['people'];?>">
						</div>
					</div>
					
					<div class="control-group">
						<h2 class="" style="text-align: center;">正文：</h2>
						<div>
							<textarea name="content" class="input-xlarge" rows="10" id="expand_editor" style="height: 530px; width: 100%; margin-left: 0"><?php echo $expand['content'];?></textarea>
						</div>
					</div>

				</fieldset>

			</form>

		</div>


	</body>
</html>