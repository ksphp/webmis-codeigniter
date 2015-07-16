var AutoSelect = function (options,obj) {
	var defaults = {url:'',data:'',getVal:'',getValType:'',type:'GET',dataType:'json',num:4}
	var options = $.extend(defaults, options);
	var valArr = new Array();
	var idName = obj.attr('id');
	//获取数据
	var getData=function(num){
		$.ajax({url:options.url,data:{'fid':options.data},type:options.type,dataType:options.dataType,
			success:function(db){
				var html = '<select id="'+idName+'_'+num+'">';
				html += '<option value="">---请选择---</option>';
				for(var i= 0; i < db.length;i++){
					html += '<option value="'+db[i].id+'">'+db[i].title+'</option>';
				}
				html += '</select>';
				$('#'+idName).append(html);
				$('#'+idName+'_'+num).change(function(){
					//清除
					for(var i= 1; i < options.num+1;i++){
						if(i>num){
							//删除当前以后Select
							$('#'+idName+'_'+i).remove();
							//删除当前以后数组元素
							valArr.splice(i-1,1);
						}
					}
					//追加
					options.data = $(this).val();
					if(options.data){
						if(options.getValType){
							//将字符串写入数组
							valArr[num-1]= options.data+options.getValType;
							//组合字符串
							var chr = options.getValType;
							for(var i= 0; i < valArr.length;i++){
								chr += valArr[i];
							}
							$(options.getVal).val(chr);
						}else{
							$(options.getVal).val(options.data);
						}
						getData(num+1);
					}
				});
			}
		});
	}
	//提交数据
	if(options.url){
		getData(1);
	}
}