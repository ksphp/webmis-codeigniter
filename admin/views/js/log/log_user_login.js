$(function(){
/*列表*/
	$('#listBG').webmis('TableOddColor');	//隔行换色
	$('#log_table').webmis('TableAdjust');  //调整宽度
/*搜索*/
	$('#ico-search').click(function(){
		if(!IsMobile){moWidth = 360;}
		$.webmis.win('open',{title:'搜索',width:moWidth,height:280});
		//加载内容
		$.get($base_url+'log_user_login/search.html',function(data){
			$.webmis.win('load',data);   //加载内容
			$('#seaSub').webmis('SubClass'); //按钮样式
		});
		return false;
	});
/*删除*/
	$('#ico-del').click(function(){
		actionDel('log_user_login/delData.html','log_user_login.html');
		return false;
	});
});