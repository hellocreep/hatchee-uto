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
			<h1>修改线路</h1>
		</div>

		<div class="subnav">
			<div class="offset9">
				<a id="submit-tour" class="btn btn-success" href="#">保存</a>
				<a class="btn" href="#" id="cancel-tour">取消</a>
			</div>
		</div>

		<form class="well form-horizontal" action="tourmanage/updatetour" method="post">
			<fieldset class="offset1">

				<div class="control-group">
					<label class="control-label" for="name">是否小包团：</label>
					<div class="controls">
						<?php if(isset($tour[0]->is_private) && $tour[0]->is_private=='1'):?>
						<input type="checkbox" name="is-private" checked="checked">
						<?php else: ?>
						<input type="checkbox" name="is-private">
						<?php endif; ?>
						<p class="help-block">
						</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name">页面TITLE：</label>
					<div class="controls">
						<input name="title" class="input-xlarge" type="text" value ="<?php echo $tour[0] -> title; ?>">
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
						<input type="hidden" name="upid" value="<?php echo $tour[0] -> Id; ?>">
						<input name="name" class="input-xlarge" type="text" value="<?php echo $tour[0] -> name; ?>">
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
						<input name="thumbnail" class="input-xlarge" type="hidden" value="<?php echo $tour[0] -> thumbnail; ?>">
						<a href="tourmanage/newtour/#images_panel" class="btn btn-primary" id="thumbnail-upload">上传图片</a>
						<p class="help-block">
							<ul class="thumbnails" id="thubmnail-preview">
									<li class="span2">
										<a class="thumbnail tour-thumbnail">
										<img class="tour-thumbnail" src="<?php echo $tour[0] -> thumbnail; ?>" />
										</a>
									</li>
							</ul>
						</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="keywords">关键词（keywords）：</label>
					<div class="controls">
						<input name="keywords" class="input-xlarge" type="text" value="<?php echo $tour[0] -> keywords; ?>">
						<p class="help-block">页面关键词,便于搜索引擎检索</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="description">描述（description）：</label>
					<div class="controls">
						<input name="description" class="input-xlarge" type="text" value="<?php echo $tour[0] -> description; ?>">
						<p class="help-block">SEO</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="price">价格</label>
					<div class="controls">
						<input name="price" class="input-small" type="text" value="<?php echo $tour[0] -> price; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="price_detail">费用说明：</label>
					<div class="controls">
						<textarea id="price_detail" name="price_detail" class="input-xlarge" rows="10" value="<?php echo $tour[0] -> price_detail; ?>"><?php echo $tour[0] -> price_detail; ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="route_intro">行程简报：</label>
					<div class="controls">
						<textarea name="route_intro" class="input-xlarge" rows="3" value="<?php echo $tour[0] -> route_intro; ?>"><?php echo $tour[0] -> route_intro; ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="days">行程天数：</label>
					<div class="controls">
						<input name="days" class="input-small" type="text" value="<?php echo $tour[0] -> days; ?>"><a id="create-route" href="#" class="btn">确认</a>
					</div>

					<div class="offset2">
						<div class="btn-toolbar">
							<ul id="new-route-list" class="btn-toolbar">
							<?php $arr=explode(',',$tour[0]->route)?>
							<?php if (count($arr)>=1): ?>
							<?php foreach ($arr as $id):?>
							<li class="btn btn-success"><a href=#route_panel id="<?php echo $id; ?>"></a></li>
							<?php endforeach; ?>
							<?php endif; ?>
							</ul>
						</div>
					</div>
					<!--<input name="route"  type="hidden" >-->
				</div>
				
				<input name="route" class="input-small" type="hidden">
				
				<div class="control-group">
					<label class="control-label" for="intro">线路简介：</label>
					<div class="controls">
						<textarea name="intro" class="input-xlarge" rows="8"><?php echo $tour[0] -> intro; ?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="content">行程亮点：</label>
					<div class="controls">
						<textarea style="height: 400px" id="tour_content" name="content" class="input-xlarge" rows="10"><?php echo $tour[0] -> content; ?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="content">图片集：</label>
					<div class="controls">
						<a id="gallery-upload" href="#" class="btn btn-primary">从本地添加图片</a>
						<a href="#" class="btn btn-warning" id="filemanager">从图片库选择</a>
						<input type="hidden" id="userfile" name="userfile" value="">
					</div>
					<input type="hidden" name="gallery" value="<?php echo $tour[0] -> gallery; ?>">
					<div class="well show-grid offset1">
						<ul class="thumbnails" id="gallery-preview">
						<?php if($tour[0]->gallery!=''):?>
						<?php foreach ($img as $imginfo):?>
							<li class="span2">
								<a class="thumbnail" rel="<?php echo $imginfo['Id']; ?>">
									<img src="<?php echo $imginfo['small']; ?>" />
								</a> 
								<div class="images-info hide" rel="<?php echo $imginfo['Id']; ?>">
									<input type="hidden" class="image-id" class="input-xlarge" value="<?php echo $imginfo['Id']; ?>">
									<h2></h2>
									<label>alt:</label>
									<input type="text" name="edit-image-alt" class="input-xlarge" value="<?php echo $imginfo['alt']; ?>"/>
									<label>描述：</label>
									<textarea id="" style="width:490px;" name="edit-image-des" class="input-xlarge" value="<?php echo $imginfo['des']; ?>"><?php echo $imginfo['des']; ?></textarea>
									<label>标签：</label>
									<input type="text" name="edit-image-tags" value="<?php echo $imginfo['tags']; ?>">
								</div>
							</li>
						<?php endforeach; ?>
						<?php endif ?>
						</ul>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="notice">注意事项：</label>
					<div class="controls">
						<textarea style="height: 400px" id="tour_notice" name="notice" class="input-xlarge" rows="10"><?php echo $tour[0] -> notice; ?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="term">常规活动排期与小包团时间表：</label>
					<div class="controls">
						<textarea id="tour-term-private" name="term" class="input-xlarge" rows="10" style="height: 430px;"><?php echo $tour[0] -> term; ?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="term">出行时间：</label>
					<div class="controls">
						<?php $travelarr=explode(',', $tour[0]->tags)?>
						<?php foreach ($traveltime as $travel):?>
						<?php if(in_array($travel->taveltime, $travelarr)):?>
						<div class="span1">
							<span class="badge tour-tags tags-color-1 active"><?php echo $travel -> taveltime; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $travel -> taveltime; ?>" name="traveltime" checked="checked">
						</div>
						<?php else: ?>
						<div class="span1">
							<span class="badge tour-tags tags-color-1"><?php echo $travel -> taveltime; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $travel -> taveltime; ?>" name="traveltime">
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="term">主题：</label>
					<div class="controls">
					<?php $themearr=explode(',', $tour[0]->theme)?>
						<?php foreach ($theme as $row):?>						
						<?php if(in_array($row->name, $themearr)):?>
						<div class="span1">
							<span class="badge tour-tags tags-color-2 active"><?php echo $row -> name; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> name; ?>" name="theme" checked="checked">
						</div>
						<?php else : ?>
						<div class="span1">
							<span class="badge tour-tags tags-color-2"><?php echo $row -> name; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> name; ?>" name="theme">
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="term">活动群体：</label>
					<div class="controls">
						<?php $grouparr=explode(',', $tour[0]->groups)?>					
						<?php foreach ($groups as $row):?>
						<?php if(in_array($row->group,$grouparr)):?>
						<div class="span1">
							<span class="badge tour-tags tags-color-3 active"><?php echo $row -> group; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> group; ?>" name="group" checked="checked">
						</div>
						<?php else : ?>
						<div class="span1">
							<span class="badge tour-tags tags-color-3"><?php echo $row -> group; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $row -> group; ?>" name="group">
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">目的地：</label>
					<div class="controls destination-span">
						<?php $destinationarr=explode(',', $tour[0]->destination)?>					
						<?php foreach ($destination as $des):?>
						<?php if(in_array($des->name,$destinationarr)):?>
						<div class="span1">
							<span class="badge tour-tags tags-color-4 active"><?php echo $des -> name; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $des -> name; ?>" name="destination" checked="checked">
						</div>
						<?php else : ?>
						<div class="span1">
							<span class="badge tour-tags tags-color-4"><?php echo $des -> name; ?></span>
							<input class="tags-checkbox" type="checkbox" value="<?php echo $des -> name; ?>" name="destination">
						</div>
						<?php endif; ?>
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
 
 

