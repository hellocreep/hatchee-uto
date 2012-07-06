<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UTO后台管理系统</title>
		<base href="<?php echo base_url(); ?>"/>
		<base src="<?php echo base_url(); ?>"/>
		<?php $this -> load -> view("admin/global_source"); ?>
		<?php $this -> load -> view("admin/tour_common_header"); ?>

	</head>
	<body>

		<?php $this -> load -> view('admin/header'); ?>

		<div class="window-tip label-info label">
			正在加载...
		</div>
		<div class="container">
			<div class="page-header">
				<h1>添加一条新的线路</h1>
			</div>

			<div class="subnav">
				<div class="offset9">
					<a id="submit-tour" class="btn btn-success" href="javascript:;">保存</a>
					<a class="btn" href="javascript:;" id="cancel-tour">取消</a>
				</div>
			</div>

			<form class="well form-horizontal" action="tourmanage/addtour" method="post">
				<fieldset class="offset1">

					<div class="control-group">
						<label class="control-label" for="name">是否小包团：</label>
						<div class="controls">
							<input type="checkbox" name="is-private">
							<p class="help-block">
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="title">页面TITLE：</label>
						<div class="controls">
							<input name="title" class="input-xlarge" type="text">
							<p class="help-block row-fluid">
								<div class="alert alert-error hide span3 required-info">
									<strong>你一定忘了填写什么重要的信息 ↑</strong>
								</div>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="name">线路名称：</label>
						<div class="controls">
							<input name="name" class="input-xlarge" type="text">
							<p class="help-block row-fluid">
								<div class="alert alert-error hide span3 required-info">
									<strong>你一定忘了填写什么重要的信息 ↑</strong>
								</div>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="thumbnail">线路缩略图（300*180）：</label>
						<div class="controls">
							<input name="thumbnail" class="input-xlarge" type="hidden">
							<a href="tourmanage/newtour/#images_panel" class="btn btn-primary" id="thumbnail-upload">上传图片</a>
							<p class="help-block">
								<ul class="thumbnails" id="thubmnail-preview">
									
								</ul>
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="keywords">关键词（keywords）：</label>
						<div class="controls">
							<input name="keywords" class="input-xlarge" type="text">
							<p class="help-block">
								页面关键词,便于搜索引擎检索
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="description">描述（description）：</label>
						<div class="controls">
							<input name="description" class="input-xlarge" type="text">
							<p class="help-block">
								SEO
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="price">价格：</label>
						<div class="controls">
							<input name="price" class="input-small" type="text">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="price_detail">费用说明：</label>
						<div class="controls">
							<textarea  id="price_detail" name="price_detail" class="input-xlarge" rows="10"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="route_intro">行程简报：</label>
						<div class="controls">
							<textarea name="route_intro" class="input-xlarge" rows="3"></textarea>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="days">行程天数：</label>
						<div class="controls">
							<input name="days" class="input-small" type="text"><a id="create-route" href="#" class="btn">确认</a>
						</div>
						<div class="offset2">
							<div class="btn-toolbar">
								<ul id="new-route-list" class="btn-toolbar"></ul>
							</div>
						</div>

						<!-- <input name="route"  type="hidden">	-->	
					</div>

					<div class="control-group">
						<label class="control-label" for="intro">线路简介：</label>
						<div class="controls">
							<textarea name="intro" class="input-xlarge" rows="8"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="content">行程亮点：</label>
						<div class="controls">
							<textarea id="tour_content" name="content" class="input-xlarge" rows="10"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="content">图片集：</label>
						<div class="controls">
							<a id="gallery-upload" href="#" class="btn btn-primary">从本地添加图片</a>
							<a href="#" class="btn btn-warning" id="filemanager">从图片库选择</a>
							<input type="hidden" id="userfile" name="userfile" value="">
						</div>
						<input type="hidden" name="gallery" >
						<div class="well show-grid offset1">
							<ul class="thumbnails" id="gallery-preview">
							</ul>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="notice">注意事项：</label>
						<div class="controls">
							<textarea id="tour_notice" name="notice" class="input-xlarge" rows="10"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="term">常规活动排期与小包团时间表（任选其一填写）：</label>
						<div class="controls" id="term-controls">
							<textarea id="tour-term-private" name="term" class="input-xlarge" rows="10" style="height:430px;"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="traveltime">出行时间：</label>
						<div class="controls">
							<?php foreach ($traveltime as $travel):
							?>
							<div class="span1">
								<span class="badge tour-tags tags-color-1"><?php echo $travel -> taveltime; ?></span>
								<input class="tags-checkbox" type="checkbox" value="<?php echo $travel -> taveltime; ?>" name="traveltime">
							</div>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="theme">主题：</label>
						<div class="controls">
							<?php foreach ($theme as $row):
							?>
							<div class="span1">
								<span class="badge tour-tags tags-color-2"><?php echo $row -> name; ?></span>
								<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> name; ?>" name="theme">
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="group">活动群体：</label>
						<div class="controls">
							<?php foreach ($groups as $row):
							?>
							<div class="span1">
								<span class="badge tour-tags tags-color-3"><?php echo $row -> group; ?></span>
								<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> group; ?>" name="group">
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">目的地：</label>
						<div class="controls destination-span">
								<?php foreach ($destination as $row):?>
								<div class="span1">
									<span class="badge tour-tags tags-color-4"><?php echo $row -> name; ?></span>
									<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> name; ?>" name="destination">
								</div>
								<?php endforeach; ?>
							
						</div>
					</div>

					<input type="hidden" value="TRUE" name="EOF">
				</fieldset>
			</form>
		</div>

		<?php $this -> load -> view("admin/tour_common_footer"); ?>

	</body>
</html>

