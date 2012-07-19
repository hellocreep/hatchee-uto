<div class="window-tip label-info label">
	正在加载...
</div>

<div class="span12 uto-body">
	<section>
		<div class="page-header">
			<h1 id="list-title" class="clearfix"></h1>
		</div>
		<div class="well" id="welcome-message">
			<h2>欢迎使用UTO后台管理系统</h2>
			<ul class="message-list">
				<li>这是<a href="http://utotrip.com" target="_blank">友途</a>网站后台管理系统的<span class="label label-success">第一个</span>版本</li>
				<li>时间不多只完成了线路，游记，订单等基本需求，更多功能将在以后添加</li>
				<li>登录时请务必使用自己的帐号，尽量不要使用<span class="label label-important">utoadmin</span>帐号登录，否则数据被删除将无法找回</li>
				<li>在填写后台数据时，你会看到<code>*</code>或<code>+</code>等奇怪的符号，这是我们所使用的<a href="http://wowubuntu.com/markdown/">Markdown</a>标记语言，希望你能花5分钟学习一下</li>
				<li>这不是一个完美的系统，它也存在Bug，请在操作时尽量温柔对待，如遇问题请即时向我们反馈</li>
				<li>建议你使用Firefox或者Chrome等现代浏览器，如在一些奇怪的浏览器下出现问题，那就自求多福吧</li>
				<li>如果你对现在的后台有任何<span class="label label-warning">新的需求</span>，请仔细斟酌之后向我们提出，我们会尽力完成</li>
			</ul>
		</div>
		<p id="tool-bar"></p>
		<table class="table table-bordered table-striped">
			<thead id="list-head">
			</thead>
			<tbody id="list-panel">
			</tbody>
		</table>
	</section>
	<section>
		<div class="pagination hide">
			<ul>
				<li class="disabled pre-pag">
					<a href="javascript:;">«</a>
				</li>
				<!--
				<li class="active">
					<a href="javascript:;">1</a>
				</li>
				<li class="valid">
					<a href="javascript:;">2</a>
				</li>
				-->
				<li class="next-pag disabled">
					<a href="javascript:;">»</a>
				</li>
			</ul>
		</div>
	</section>
</div>


<div id='edit_panel' class='modal hide fade' > 
	<div class="modal-header">
		<button class="close" data-dismiss="modal">×</button>
		<h3></h3>
	</div>
	<div class="modal-body"></div>
	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" href="#">取消</a>
		<a class="btn btn-primary" href="#" id="save">保存</a>
	</div>
</div>