var IsMobile = $('#IsMobile').text();
var moWidth = $(document).width()-20;
var moHeight = $(window).height()-60;
$(function(){
	// Version
	$('#webmisVersion').webmisVersion();
	// Auto Size
	var autoSize = function(size){
		var height = $(window).height()-110;
		var DisplayTop = $("#DisplayTop").text();
		if(DisplayTop == 'hide'){
			$("#top").hide();
		}else{
			$("#top").show();
		}
		if(size){height = height+size;}else if(DisplayTop == 'hide'){height = height+50;}
		// Change Height
		$(".ct_left,.ct_right").height(height);
		$(".web_iframe").height(height-10);
	}
	autoSize();
	$(window).resize(function(){autoSize();});
	// Show or Hide TOP
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
	// Show or Hide Menus
	$('#LeftMenus').click(function(){
		if($(".ct_left").is(":hidden")){
			$(".ct_left").show();
		}else{
			$(".ct_left").hide();
		}
		return false;
	});
	// All or Not all
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
/* Click Menus */
function menuTwo(id,type){
	var p = $('#menuThree_'+id);
	if(p.is(':hidden')){
		p.slideDown('fast');
		type.find('#tu').attr('class','jian UI');
	}else{
		p.slideUp('fast');
		type.find('#tu').attr('class','jia UI');
	}
}

/* Remove */
function actionDel(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:'json'});
	if(id!=''){
		$.get($base_url+'home/getLang/msg',{msg_title:'',msg_remove:''},function (data){
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
		$.get($base_url+'home/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
			$.webmis.win('open',{title:data.msg_title, content:'<b class="red">'+data.msg_select+'</b>',AutoClose:3,AutoCloseText:data.msg_auto_close});
		},'json');
	}
}
/* Audit */
function actionAudit(dataUrl,targetUrl) {
	var id = $('#listBG').webmis('GetInputID',{type:'json'});
	if(id!=''){
		$.get($base_url+'home/getLang/msg',{msg_title:'',msg_pass:'',msg_notpass:''},function (data){
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
		$.get($base_url+'home/getLang/msg',{msg_title:'',msg_select:'',msg_auto_close:''},function (data){
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