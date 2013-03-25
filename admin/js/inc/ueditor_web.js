/*
编辑器配置
*/
(function () {
	URL= window.UEDITOR_HOME_URL||"/webmis/plugin/ueditor/";
	window.UEDITOR_CONFIG = {
		UEDITOR_HOME_URL : URL
		,imageUrl: "/upload/web/web_imageUp.php"	//图片上传提交
		,imagePath: "/upload/web/"
		,imageManagerUrl: "/upload/web/web_imageManager.php"	//图片在线管理
		,imageManagerPath: "/upload/web/"
		,scrawlUrl: "/upload/web/web_scrawlUp.php"	//涂鸦上传地址
		,scrawlPath: "/upload/web/"
		,fileUrl: "/upload/web/web_fileUp.php"		//附件上传提交地址
		,filePath: "/upload/web/"
		,catcherUrl: "/upload/web/web_getRemoteImage.php"	//处理远程图片抓取的地址
		,catcherPath: "/upload/web/"
		,wordImageUrl: "/upload/web/web_imageUp.php"	//word转存提交地址
		,wordImagePath: "/upload/web/"
		,getMovieUrl: "/upload/web/getMovie.php"	//视频数据获取地址
		,snapscreenHost: '127.0.0.1'	//屏幕截图的server端文件所在的网站地址或者ip，请不要加http://
		,snapscreenServerUrl: "/upload/web/web_imageUp.php"	//屏幕截图的server端保存程序
		,snapscreenPath: "/upload/web/"
		,toolbars:[
	      ['fullscreen', 'source', '|', 'undo', 'redo', '|',
	          'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch','autotypeset', '|',
	          'blockquote', '|', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist','selectall', 'cleardoc', '|',
	          'rowspacingtop', 'rowspacingbottom','lineheight', '|','directionalityltr', 'directionalityrtl', '|', 'paragraph', 'fontfamily', 'fontsize', '|',
	          '', 'indent', '|',
	          'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|','touppercase','tolowercase','|',
	          'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright',
	          'imagecenter', '|', 'insertimage', 'emotion','scrawl', 'insertvideo', 'attachment', 'map', 'gmap', 'insertframe','highlightcode','webapp','pagebreak','template','background', '|',
	          'horizontal', 'date', 'time', 'spechars','snapscreen', 'wordimage', '|',
	          'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|',
	          'print', 'preview', 'searchreplace','help']
	  ]
	  ,autoFloatEnabled: false	//是否保持toolbar的位置不动,默认true
	  ,initialFrameWidth:800  //初始化编辑器宽度,默认1000
	  ,initialFrameHeight:320  //初始化编辑器高度,默认320
	};
})();