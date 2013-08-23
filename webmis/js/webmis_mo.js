/*
* WebMIS 3.2
* Copyright (c) 灵创网络 http://www.ksphp.com/
* Date: 2013-06-28
* 主要用于封装WebMIS前段样式
*/
/*参数*/
var $base_url = 'http://www.ksphp.com/';
var $webmis_root = '/webmis/';
var $webmis_js = $webmis_root+'js/';
var $webmis_css = $webmis_root+'css/';
var $webmis_plugin = $webmis_root+'plugin/';

$(function(){
	$base_url = $('#base_url').text();			//网址
	$('#webmisVersion').text('WebMIS v4.0');	//版本
	/*
	** 加载 css,js
	*/
	var include = function (options) {
		var defaults = {files: '', doc: 'body'}
		var options = $.extend(defaults, options);
		var files = options.files;
		for (var i=0; i<files.length; i++) {
			var att = files[i].replace(/^\s|\s$/g, "").split('.');
			var ext = att[att.length - 1].toLowerCase();
			var isCSS = ext == "css";
			var tag = isCSS ? "link" : "script";
			var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
			var link = (isCSS ? "href" : "src") + "='" + files[i] + "'";
			$(options.doc).append("<" + tag + attr + link + "></" + tag + ">");
		}
	}
});