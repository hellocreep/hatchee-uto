#uto
===

UTO NOT UFO

##安装与开发环境
* 后台前端使用 [TwitterBootstrap](http://twitter.github.com/bootstrap/index.html)
* 后端使用 [CodeIgniter](https://github.com/EllisLab/CodeIgniter)
* 图片上传 [jQuery-File-Upload](https://github.com/blueimp/jQuery-File-Upload) 
* 富文本编辑器 [CKEditor](http://ckeditor.com/)
* [markdown](https://github.com/vamsiikrishna/cimarkdown)

### 开发环境 WAMP

### 运行环境 LAMP

##使用

####CI配置
---------------------------------------------------
* applicatin/config/config.php  $config['base_url']	= '网站根目录';

####ckeditor和ckfinder上传路径配置
---------------------------------------------------
* assets/ckfinder/config.php $baseUrl = '文件上传的路径';
* assets/scripts/admin/manage_custome.js   window.finder_base = "ckfinder根目录";
