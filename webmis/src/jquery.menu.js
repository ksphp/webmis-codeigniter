var menuCreate = function (options,obj) {
	obj.addClass('NavMenu');
	var w = obj.find('ul').width();
	obj.find('ul ul').width(w).css({'left':w+'px','top':'-1px'});
	obj.find("ul li:has(ul)").addClass('NavMenu_img');
	obj.find("li").hover(function(){
		$(this).children("ul").show();
	},function(){
		$(this).children("ul").hide();
	});
}