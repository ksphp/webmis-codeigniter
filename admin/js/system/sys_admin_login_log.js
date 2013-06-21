$(function(){
/*
列表
*/
	$('#listBG').WMisTableUI();   //表格样式
	$('#admin_log_table').WMisMoveTW();  //调整表格宽度
/*
搜索
*/
	$('.action_sea').click(function(){
		$.WMisMsg({title:'搜索',width:340,height:250});
		//加载内容
		$.get($base_url+'sys_admin_login_log/search.html',function(data){
			$('#WebMisMsgCT').html(data);   //加载内容
			$('#seaSub').WMisSub(); //按钮样式
		});
	});
/*
删除
*/
	$('.action_del').click(function(){
		var id = $('#listBG').WMisGetID({type:' '});
		if(id!=' '){
			$.WMisMsg({title:'删除',width:210,height:140,content:'<div class="delData"><input type="submit" id="delSub" value="彻底删除" /></div>'});
			$('#delSub').WMisSub(); //按钮样式
			//点击提交
			$('#delSub').click(function(){
				$.post($base_url+'sys_admin_login_log/delData.html',{'id':id},function(data){
					if(data){
						$.WMisMsgClose();
						var url = $('#getUrl').text();
						$.WMisMsg({content:'<b class="green">删除成功</b>',target:'sys_admin_login_log.html'+url,AutoClose:3});
					}else{
						$.WMisMsgClose();
						$.WMisMsg({content:'<b class="red">删除失败</b>',AutoClose:3});
					}
				});
			});
		}else{
			$.WMisMsg({content:'<b class="red">请选择！</b>',AutoClose:3});
		}
	});
});