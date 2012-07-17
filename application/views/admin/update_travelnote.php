<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>UTO后台管理系统</title>
		<base href="<?php echo base_url(); ?>"/>
		<base src="<?php echo base_url(); ?>"/>
		<?php $this -> load -> view("admin/global_source"); ?>
		<?php $this -> load -> view("admin/travelnote_common"); ?>
	</head>
	<body>
		<?php $this -> load -> view('admin/header'); ?>

		<div class="window-tip label-info label">
			正在加载...
		</div>

		<div class="container">

			<div class="page-header">
				<h1>添加新的游记</h1>
			</div>

			<div class="subnav">
				<div class="offset9">
					<a id="submit-note" class="btn btn-success" href="javascript:;">保存</a>
					<a class="btn" href="javascript:;" id="cancel-note">取消</a>
				</div>
			</div>

			<form id="travel_note" class="well form-horizontal" action="travelnote/updatetravel" method="post">
				<fieldset>
					<input id="n_id" type="hidden" value="<?php echo $note['Id'];?>" name="nid">
					<div class="control-group">
						<label class="control-label" for="t_id">活动：</label>
						<div class="controls">
							<select class="input-xlarge" name="tid">
								<?php foreach($tour as $tour):?>
								<?php if($note['tour']==$tour->Id):?>
								<option name="t_id" value="<?php echo $tour->Id;?>" checked="checked"><?php echo $tour->name;?></option>
								<?php else:?>
								<option name="t_id" value="<?php echo $tour->Id;?>"><?php echo $tour->name;?></option>
								<?php endif;?>
								<?php endforeach;?>
							</select>
							<p class="help-block">
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="type">活动类型：</label>
						<div class="controls">
							<?php if($note['type']=="公司出游案例"):?>
							
							<input type="radio" name="type" value="公司出游案例" checked="checked">
							公司出游案例
							<input type="radio" name="type" value="主题旅行案例">
							主题旅行案例
							<input type="radio" name="type" value="友途活动案例">
							友途活动案例
							<?php elseif($note['type']=="主题旅行案例"):?>
							<input type="radio" name="type" value="主题旅行案例" checked="checked">
							主题旅行案例
							<input type="radio" name="type" value="公司出游案例">
							公司出游案例
							<input type="radio" name="type" value="友途活动案例">
							友途活动案例
							<?php else:?>
							<input type="radio" name="type" value="友途活动案例" checked="checked">
							友途活动案例
							<input type="radio" name="type" value="主题旅行案例">
							主题旅行案例
							<input type="radio" name="type" value="公司出游案例">
							公司出游案例
							<?php endif;?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="title">标题：</label>
						<div class="controls">
							<input name="title" class="input-xlarge" type="text" value="<?php echo $note['title'];?>">
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
							<input name="des" class="input-xlarge" type="text" value="<?php echo $note['description'];?>">
							<p class="help-block">
								SEO
							</p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="keywords">Keywords：</label>
						<div class="controls">
							<input name="keywords" class="input-xlarge" type="text" value="<?php echo $note['keywords'];?>">
							<p class="help-block">
								SEO
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="editor">公司名称(公司出游案例)：</label>
						<div class="controls">
							<input name="company" class="input-xlarge" type="text" value="<?php echo $note['company'];?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="editor">出游人数(公司出游案例)：</label>
						<div class="controls">
							<input name="people" class="input-xlarge" type="text" value="<?php echo $note['people'];?>">
						</div>
					</div>
					<div class="control-group">
						<h2 class="" style="text-align: center;">游记正文：</h2>
						<div>
							<textarea name="note" class="input-xlarge" rows="10" id="note_editor" style="height: 530px; width: 100%; margin-left: 0"><?php echo $note['content'];?></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="tour_time">活动的起止时间：</label>
						<div class="controls">
							<input name="tour_time" class="input-xlarge" type="text" value="<?php echo $note['tour_time'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="editor">留下小编的名字：</label>
						<div class="controls">
							<input name="editor" class="input-xlarge" type="text" value="<?php echo $note['editor'];?>">
						</div>
					</div>

				</fieldset>

			</form>

		</div>


	</body>
</html>