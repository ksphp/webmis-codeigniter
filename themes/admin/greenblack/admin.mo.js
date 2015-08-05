var IsMobile;
var moWidth;
var moHeight;
$(function(){
	// Version
	$('#webmisVersion').webmisVersion();
	// Lang
	$('#Lang').hover(function(){
		$(this).find('ul').show();
	},function(){
		$(this).find('ul').hide();
	});
	// Slide Nav
	$.webmis.inc({files:[$webmis_plugin+'jquery/jquery.touchwipe.min.js',$webmis_plugin+'tool/smartFloat.js']});
	navMove();
	menuShow();
	// All or Not al
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

// Slide Nav
function navMove(){
	$("#Nav .an1").css({'color':'#FFF'});
	// Menus
	$(".nav_ct").smartFloat();
	// Equal width
	var W = $(window).width();
	var N = 2;
	if(W >= 320){N = 3;}
	if(W >= 420){N = 4;}
	if(W >= 520){N = 5;}
	if(W >= 620){N = 6;}
	if(W >= 720){N = 7;}
	if(W >= 820){N = 8;}
	$("#Nav li").width(W/N-1);
	//统计li宽度
	var li = $("#Nav li").length;
	var li_w = (W/N-1)*li;
	//左右滑动
	$('#Nav').touchwipe({
		wipeLeft: function() {
			var W = $(window).width();
			var left = parseInt($('#Nav').css('left'));
			//限制
			if(-left+W < li_w){left = left-W;}
			$('#Nav').animate({'left':left});
		},
		wipeRight: function() {
			var W = $(window).width();
			var left = parseInt($('#Nav').css('left'));
			//限制
			if(left+W <= 0){left = left+W;}
			$('#Nav').animate({'left':left});
		}
	});
}
function menuShow(){
	var W = $(window).width();
	//初始化
	IsMobile = $('#IsMobile').text();
	moWidth = W-20;
	moHeight = $(window).height()-20;
	var Menu = $('.menu_ct');
	//点击滑动
	$('.left_menu').click(function (){
		$(this).hide();
		var W = $(window).width();
		Menu.css({'left':0-W}).show().animate({'left':0});
	});
//	//右滑动
//	$("#ctBody").touchwipe({
//		wipeRight: function() {
//			var W = $(window).width();
//			Menu.css({'left':0-W}).show().animate({'left':0});
//		},
//		min_move_x: 60,
//		preventDefaultEvents: false
//	});
	//左滑动
	Menu.touchwipe({
		wipeLeft: function() {
			var W = $(window).width();
			Menu.animate({'left':0-W},function(){
				$(this).hide();
				$('.left_menu').show();
			});
		},
		min_move_x: 60,
		preventDefaultEvents: false
	});
}

/* Remove */
function actionDel(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:' '});
	if(id!=' '){
		$.get($base_url+'index_c/getLang/msg',{msg_title:'',msg_remove:''},function (data){
			$.webmis.win('open',{title:$('#ico-del').text(),width:280,height:160,content:'<div class="delData"><input type="submit" id="delSub" value="'+data.msg_remove+'" /></div>'});
			$('#delSub').webmis('SubClass');
			//点击提交
			var lock = false;
			$('#delSub').click(function(){
				if(lock){return;} lock=true;
				$.post($base_url+dataUrl,{'id':id},function(data){
					if(data.status=='y'){
						$.webmis.win('close');
						var url = $('#getUrl').text();
						$.webmis.win('open',{title:data.title,content:'<b class="green">'+data.msg+'</b>',target:targetUrl+url,AutoClose:3,AutoCloseText:data.text});
					}else{
						$.webmis.win('close');
						$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
					}
					lock=false;
				},'json');
			});
		},'json');
	}else{
		$.get($base_url+'index_c/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
}
/* Audit */
function actionAudit(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:' '});
	if(id!=' '){
		$.get($base_url+'index_c/getLang/msg',{msg_title:'',msg_pass:'',msg_notpass:''},function (data){
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
		$.get($base_url+'index_c/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
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
				$.webmis.win('open',{title:data.title,content:'<b class="green">'+data.msg+'</b>',target:targetUrl+url,AutoClose:3,AutoCloseText:data.text});
			}else{
				$.webmis.win('close');
				$.webmis.win('open',{title:data.title,content:'<b class="red">'+data.msg+'</b>',AutoClose:3,AutoCloseText:data.text});
			}
			lock=false;
		},'json');
	}
}