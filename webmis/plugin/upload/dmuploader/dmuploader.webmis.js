$(function(){
	$.webmisUpload = $.extend({},{
		addFile: function(id, i, file){
			var html = '<div id="WebMIS_Upload_files_'+i+'" class="WebMIS_Upload_files_ct">'+
						'<div class="WebMIS_Upload_files_title"><span>#'+i+'&nbsp;&nbsp;<b>'+file.name+'</b> ( '+$.webmisUpload.FileSize(file.size)+' )</span><em id="WebMIS_Upload_Close_'+i+'"></em></div>'+
						'<div class="WebMIS_Upload_files_load" title="Loaging"><div class="WebMIS_Upload_files_bar" style="width: 0%;">&nbsp;0%&nbsp;</div></div>'+
					'</div>';
			i++;
			$(id).attr('class','WebMIS_Upload_files').prepend(html);
		},
		updateFileProgress: function(i, percent){
			$('#WebMIS_Upload_files_' + i).find('div.WebMIS_Upload_files_bar').width(percent+'%').html('&nbsp;'+percent+'%&nbsp;');
		},
		FileSize: function(size) {
			var i = Math.floor( Math.log(size) / Math.log(1024));
			return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
		}
	},$.webmisUpload);
});