<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>UTO后台管理系统</title>
<base href="<?php echo base_url(); ?>"/>
<base src="<?php echo base_url(); ?>"/>
<?php $this -> load -> view("admin/global_source"); ?>

</head>
<body>
	
	<?php $this -> load -> view('admin/header'); ?>
	
	<div class="window-tip label-info label">
		正在加载...
	</div>

	<div class="container">
		<div class="page-header">
			<h1>订单修改</h1>
		</div>

		<form class="well form-horizontal" action="ordermanage/updateorder" method="post">
			<fieldset class="offset1">
				<input type="hidden" name="order_id" value="<?php echo $order['Id'];?>">
				<div class="control-group">
					<label class="control-label" for="uuid">订单号：</label>
					<div class="controls">
						<input id="disabledInput" name="uuid" class="input-xlarge disabled" type="text" disabled="disabled" placeholder="Disabled input here…" value="<?php echo $order['uuid'];?>">
						<p class="help-block">
						</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="user">用户：</label>
					<div class="controls">
						<input name="user" class="input-xlarge disabled"  disabled="disabled" type="text" value="<?php echo $order['name'];?>">
						<p class="help-block">
						</p>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tour">线路名称：</label>
					<div class="controls">
						<input name="tour" class="input-xlarge disabled" type="text" disabled="disabled" value="<?php echo $order['tourname'];?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="people">人数：</label>
					<div class="controls">
						<input name="people" class="input-small disabled" disabled="disabled" value="<?php echo $order['people'];?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="term">排期：</label>
					<div class="controls">
					<?php if(isset($order['is_private']) && $order['is_private']!='1'):?>
						<input name="term" class="input-xlarge disabled" type="text" disabled="disabled" value="<?php echo $order['tour_term'];?>">
					<?php else:?>
						<input name="term" class="input-xlarge disabled" type="text" disabled="disabled" value="<?php echo $order['tour_time'];?>">
					<?php endif;?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="date">下单日期：</label>
					<div class="controls">
						<input name="date" class="input-xlarge disabled" type="text" disabled="disabled" value="<?php echo $order['create_date'];?>">
						<p class="help-block">SEO</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="comment">备注：</label>
					<div class="controls">
						<textarea name="comment" class="input-xlarge" value="<?php echo $order['comment'];?>"><?php echo $order['comment'];?></textarea>
					</div>
				</div>
				
				<input type="hidden" value="TRUE" name="EOF">
			</fieldset>
			<div class="offset9">
				<input type="submit" class="btn btn-success" value="保存">
				<a class="btn" href="#" id="cancel-order">取消</a>
			</div>

		</form>
	</div>
	
	
</body>
</html>
 
 

