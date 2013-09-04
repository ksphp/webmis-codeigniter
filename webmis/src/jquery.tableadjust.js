var TableAdjust = function (options,obj) {
	//移动
	var moveTableWidht=function(id){
		var _move = false;
		var _x,_w,x,w;
		var __x;
		$(id).unbind().mousedown(function(e){
			_move=true;
			_x=e.pageX;
			_w = $(this).parent().prev().width();
		});
		$(document).mousemove(function(e){
			if(_move){
				__x = e.pageX;
				w = _w+(__x-_x);
				$(id).parent().prev().width(w);
			}
		}).mouseup(function(){
			_move=false;
		});
	}
	//添加
	var i= 1;
	var html = '';
	obj.find('td').each(function(){
		if(i!=1){
			html = '<div id="TableAdjust'+i+'" class="TableAdjust">&nbsp;</div>';
			$(this).prepend(html);
			moveTableWidht('#TableAdjust'+i);
		}
		i++;
	});
}