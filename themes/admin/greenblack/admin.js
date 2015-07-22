var IsMobile = $('#IsMobile').text();
var moWidth = $(document).width()-20;
var moHeight = $(window).height()-60;
$(function(){
	//版本信息
	$('#webmisVersion').webmisVersion();
	//自动调整大小
	var autoSize = function(size){
		var height = $(window).height()-72;
		var DisplayTop = $("#DisplayTop").text();
		if(DisplayTop == 'hide'){
			$("#top").hide();
		}else{
			$("#top").show();
		}
		if(size){height = height+size;}else if(DisplayTop == 'hide'){height = height+50;}
		//调整高
		$(".ct_left,.ct_right").height(height);
		$(".web_iframe").height(height-5);
	}
	autoSize();
	$(window).resize(function(){autoSize();});
	//显示、隐藏头部
	$('#TopMenus').click(function(){
		if($("#top").is(":hidden")){
			$("#top").slideDown('fast');
			$.get($base_url+'welcome/DisplayTop/show');
			$("#DisplayTop").text('show');
			autoSize();
		}else{
			$("#top").hide();
			$.get($base_url+'welcome/DisplayTop/hide');
			$("#DisplayTop").text('hide');
			autoSize(50)
		}
		return false;
	});
	//显示、隐藏左侧菜单
	$('#LeftMenus').click(function(){
		if($(".ct_left").is(":hidden")){
			$(".ct_left").show();
		}else{
			$(".ct_left").hide();
		}
		return false;
	});
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
/*点击二级菜单*/
function menuTwo(id,type){
	//显示对应菜单
	var p = $('#menuThree_'+id);
	if(p.is(':hidden')){
		p.slideDown('fast');
		type.find('#tu').attr('class','jian UI');
	}else{
		p.slideUp('fast');
		type.find('#tu').attr('class','jia UI');
	}
}
/*
** ******动作******
*/
/*删除*/
function actionDel(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:' '});
	if(id!=' '){
		$.webmis.win('open',{title:$('#ico-del').text(),width:280,height:160,content:'<div class="delData"><input type="submit" id="delSub" value="彻底删除" /></div>'});
		$('#delSub').webmis('SubClass'); //按钮样式
		//点击提交
		var lock = false;
		$('#delSub').click(function(){
			if(lock){return;} lock=true;
			$.post($base_url+dataUrl,{'id':id},function(data){
				if(data.status=='y'){
					$.webmis.win('close');
					var url = $('#getUrl').text();
					$.webmis.win('open',{content:'<b class="green">删除成功</b>',target:targetUrl+url,AutoClose:3});
				}else{
					$.webmis.win('close');
					$.webmis.win('open',{content:'<b class="red">删除失败</b>',AutoClose:3});
				}
				lock=false;
			},'json');
		});
	}else{
		$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
	}
}
/*审核*/
function actionAudit(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:' '});
	if(id!=' '){
		$.webmis.win('open',{title:'审核',width:280,height:160,content:'<div class="delData"><input type="submit" id="auditSub1" value="通过" />&nbsp;&nbsp;<input type="submit" id="auditSub2" value="不通过" /></div>'});
		$('#auditSub1,#auditSub2').webmis('SubClass'); //按钮样式
		//通过
		$('#auditSub1').click(function(){
			auditData(id,'1');
		});
		//不通过
		$('#auditSub2').click(function(){
			auditData(id,'2');
		});
	}else{
		$.webmis.win('open',{content:'<b class="red">请选择！</b>',AutoClose:3});
	}
	//提交数据
	var auditData = function(id,state){
		$.post($base_url+dataUrl,{'id':id,'state':state},function(data){
			if(data){
				$.webmis.win('close');
				var url = $('#getUrl').text();
				$.webmis.win('open',{content:'<b class="green">审核成功</b>',target:targetUrl+url,AutoClose:3});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">审核失败</b>',AutoClose:3});
			}
		});
	}
}