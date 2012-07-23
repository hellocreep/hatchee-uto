#uto
===

UTO NOT UFO

##安装与开发环境

* 网站使用框架 [CodeIgniter](https://github.com/EllisLab/CodeIgniter)
* 后台前端使用 [TwitterBootstrap](http://twitter.github.com/bootstrap/index.html)
* 图片上传 [jQuery-File-Upload](https://github.com/blueimp/jQuery-File-Upload) 
* 富文本编辑器 [CKEditor](http://ckeditor.com/)
* [markdown](https://github.com/vamsiikrishna/cimarkdown)

### 开发环境 WAMP

### 运行环境 LAMP

##使用

####CI配置
---------------------------------------------------
* application/config/config.php  $config['base_url']	= '网站根目录';
* application/config/database.php 数据库配置

####ckeditor和ckfinder上传路径配置
---------------------------------------------------
* assets/ckfinder/config.php $baseUrl = '文件上传的路径';
* assets/scripts/admin/manage_custome.js   window.finder_base = "ckfinder根目录";

##Feature

* 修复各浏览器中兼容问题，包括IE6
* 加强页面管理功能，比如首页的图片轮播可在后台直接替换，页面上某些板块文字可直接在后台更换
* 后台增加搜索功能
* 除个别复杂表单外，将其他数据表单通过form类直接渲染，提交的表单的js需重写
* 后台增加数据库管理面板
* 增加用户中心模块