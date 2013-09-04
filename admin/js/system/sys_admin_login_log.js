$(function(){
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#admin_log_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		$.webmis.win('open',{title:'搜索',width:360,height:280});
		//加载内容
		$.get($base_url+'sys_admin_login_log/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('sys_admin_login_log/delData.html','sys_admin_login_log.html');
		return false;
	});
});