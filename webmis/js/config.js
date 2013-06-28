$(function(){
	$webmis_root = '/webmis/'		//Webmis根目录
	//加载文件
	$.webmis.inc([
		$webmis_root + 'css/admin.css',		//后台样式
		$webmis_root + 'css/webmis.css',		//插件样式
		$webmis_root + 'js/admin.js',			//后台操作
		$webmis_root + 'plugin/Validform_v5.3_min.js'	//表单验证插件
	]);
});