$(function(){
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#admin_log_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 420;}
		$.webmis.win('open',{title:$(this).text(),width:moWidth,height:320});
		//加载内容
		$.get($base_url+'log_admin_login/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('log_admin_login/delData.html','log_admin_login.html');
		return false;
	});
});