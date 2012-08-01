<div class="aside side-thme">
	<dl>
		<dt>目的地</dt>
		<?php foreach($dess as $d):?>
			<dd><a href="index/tour/<?php echo $d['filename'];?>" title=""><?php echo $d['name'];?></a></dd>
		<?php endforeach;?>
	</dl>
	<dl>
		<dt>旅行主题</dt>
		<?php foreach($theme as $t):?>
			<dd><a href="index/themetour/<?php echo $t['filename'];?>" title=""><?php echo $t['name'];?></a></dd>
		<?php endforeach;?>
	</dl>
</div>