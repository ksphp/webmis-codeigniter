$(function(){
	//菜单操作
	var NavId = $('#NavId').text();
	var MenuTwoId = $('#MenuTwoId').text();
	menuOne(NavId);
	menuTwo(MenuTwoId);    
	//显示、隐藏头部
	$('#TopMenus').click(function(){
		if($("#top").is(":hidden")){
			$("#top").slideDown('fast');
		}else{
			$("#top").slideUp('fast');
		}
	});
	//显示、隐藏左侧菜单
	$('#LeftMenus').click(function(){
		if($("#tb_left").is(":hidden")){
			$("#tb_left").show();
		}else{
			$("#tb_left").hide();
		}
	});
});
//全选,全不选
function All(){
	$("input:checkbox").attr("checked", true);
}
function delAll(){
	$("input:checkbox").removeAttr("checked");
}
/*----------------------------
菜单操作
----------------------------*/
//点击一级菜单
function menuOne(id){
	var title = $('#nav_'+id).text();
	$('#menu_title').text(title);
	//导航样式
	$('#nav span').each(function(){
		$(this).attr('class','nav_an2');
	});
	$('#nav_'+id).attr('class','nav_an1');
	
	//隐藏二级菜单
	$('#menus .menuOne').each(function(){
		$(this).hide();
	});
	//显示对应菜单
	$('#menuOne_'+id).show().find('div').hover( 
		function () { 
			$(this).attr('class','menu_an_bg2 UI');
		},
		function () { 
			$(this).attr('class','menu_an_bg1 UI');
		}
	);
}

//点击二级菜单
function menuTwo(id){
	//显示对应菜单
	var p = $('#menuThree_'+id);
	if(p.is(':hidden')){
		p.slideDown('fast');
		$('#menuTwo_'+id).find('#tu').attr('class','jian UI');
	}else{
		p.slideUp('fast');
		$('#menuTwo_'+id).find('#tu').attr('class','jia UI');
	}
}