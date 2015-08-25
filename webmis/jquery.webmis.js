/**
 * jQuery WebMIS 2015
 * Copyright (c) www.ksphp.com. All rights reserved.
 * Date: 2015-07-30
 */
 /* Public */
var $base_url;
var $webmis_root = '/webmis/';
var $webmis_src = $webmis_root+'src/';
var $webmis_plugin = $webmis_root+'plugin/';

$(function(){
	$base_url = $('#base_url').text();
	/* Version */
	var D = new Date();
	$.fn.webmisVersion = function (options) {
		var defaults = {version: 'WebMIS '+D.getFullYear()}
		var options = $.extend(defaults, options);
		this.text(options.version);
	}
	
	/* Plugin */
	$.webmis={
		// Load CSS or JS
		inc: function (options) {
			var defaults = {files: '', doc: 'body'}
			var options = $.extend(defaults, options);
			var files = options.files;
			for (var i=0; i<files.length; i++) {
				if(files[i]){
					var att = files[i].replace(/^\s|\s$/g, "").split('.');
					var ext = att[att.length - 1].toLowerCase();
					var isCSS = ext == "css";
					var tag = isCSS ? "link" : "script";
					var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
					var link = (isCSS ? "href" : "src") + "='" + files[i] + "'";
					var f = "<" + tag + attr + link + "></" + tag + ">";
					if ($('script[src="'+files[i]+'"]').length == 0 && $('link[href="'+files[i]+'"]').length == 0) {$(options.doc).append(f);}
				}
			}
		},
		// Win
		win: function (effect,options) {
			var file = $webmis_src + 'jquery.window.js';
			if ($('script[src="'+file+'"]').length == 0) {$.webmis.inc({files:[file]});}
			//APP
			switch (effect){
				case 'open':
					openWin(options);
				break;
				case 'load':
					loadWin(options);
				break;
				case 'close':
					closeWin(options);
				break;
				case 'menu':
					addWinMenu(options);
				break;
			}
		},
		// VOD
		vod: function (options) {
			var file = $webmis_src + 'jquery.vod.js';
			if ($('script[src="'+file+'"]').length == 0) {$.webmis.inc({files:[file]});}
			//APP
			openVod(options);
		}
	};
	
	/* Effect */
	$.fn.webmis = function (effect,options) {
		var effect = effect.toLowerCase();
		var file = $webmis_src + 'jquery.'+effect+'.js';
		if ($('script[src="'+file+'"]').length == 0) {$.webmis.inc({files:[file]});}
		//APP
		switch (effect){
			case 'msg':
				msgCreate(options,this);
			break;
			case 'menu':
				menuCreate(options,this);
			break;
			case 'subclass':
				SubClass(options,this);
			break;
			case 'tableoddcolor':
				TableOddColor(options,this);
			break;
			case 'tableadjust':
				TableAdjust(options,this);
			break;
			case 'autoselect':
				AutoSelect(options,this);
			break;
			case 'getinputid':
				return GetInputID(options,this);
			break;
		}
	};
});