$(function(){
	//版本信息
	$('#webmisVersion').webmisVersion();
	//内容区域
	var dwidth = $(document).width()-20;
	$('#NavBody').css({'width':dwidth});
	//菜单操作
	var NavId = $('#NavId').text();
	var MenuTwoId = $('#MenuTwoId').text();
	$('#nav_'+NavId).attr('class','an1');
	//全选,全不选
	$('#checkboxY').click(function () {
		$(this).hide();
		$(this).parent().parent().parent().parent().find("input:checkbox").prop("checked", true);
		$('#checkboxN').show().click(function () {
			$(this).hide();
			$('#checkboxY').show();
			$(this).parent().parent().parent().parent().find("input:checkbox").prop("checked", false);
			return false;
		});
		return false;
	});
});
/*点击一级菜单*/
function menuOne(id){
	//导航样式
	$('#Nav a').each(function(){
		$(this).attr('class','an2');
	});
	$('#nav_'+id).attr('class','an1');
	//显示菜单区域
	$('#NavBody').show();
	//隐藏二级菜单dia 
	$('#NavBody .nav_two').each(function(){
		$(this).hide();
	});
	$('#menuOne_'+id).show();
	//
	$('#NavHide').click(function () {
		$('#NavBody').hide();
		return false;
	});
}