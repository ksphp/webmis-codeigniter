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
		$.get($base_url+'welcome/getLang/msg',{msg_title:'',msg_remove:''},function (data){
			$.webmis.win('open',{title:$('#ico-del').text(),width:280,height:160,content:'<div class="delData"><input type="submit" id="delSub" value="'+data.msg_remove+'" /></div>'});
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
		},'json');
	}else{
		$.get($base_url+'welcome/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
}
/*审核*/
function actionAudit(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:' '});
	if(id!=' '){
		$.get($base_url+'welcome/getLang/msg',{msg_title:'',msg_pass:'',msg_notpass:''},function (data){
			$.webmis.win('open',{title:$('#ico-audit').text(),width:240,height:140,content:'<div class="delData"><input type="submit" id="auditSub1" value="'+data.msg_pass+'" />&nbsp;&nbsp;<input type="submit" id="auditSub2" value="'+data.msg_notpass+'" /></div>'});
			$('#auditSub1,#auditSub2').webmis('SubClass'); //按钮样式
			//通过
			$('#auditSub1').click(function(){
				auditData(id,'1');
			});
			//不通过
			$('#auditSub2').click(function(){
				auditData(id,'2');
			});
		},'json');
	}else{
		$.get($base_url+'welcome/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
	//提交数据
	var lock = false;
	var auditData = function(id,state){
		if(lock){return;} lock=true;
		$.post($base_url+dataUrl,{'id':id,'state':state},function(data){
			if(data.status=='y'){
				$.webmis.win('close');
				var url = $('#getUrl').text();
				$.webmis.win('open',{content:'<b class="green">审核成功</b>',target:targetUrl+url,AutoClose:3});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{content:'<b class="red">审核失败</b>',AutoClose:3});
			}
			lock=false;
		},'json');
	}
}