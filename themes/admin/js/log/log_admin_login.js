$(function(){
/* Index */
	$('#listBG').webmis('TableOddColor');
	$('#admin_log_table').webmis('TableAdjust');
/* Search */
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		// Content
		$.get($base_url+'log_admin_login/search.html',function(data){
			$.webmis.win('load',data);
			$('#seaSub').webmis('SubClass');
		});
		return false;
	});
/* Del */
	$('#ico-del').click(function(){
		actionDel('log_admin_login/delData.html','log_admin_login.html');
		return false;
	});
});