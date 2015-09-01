var GetInputID = function (options,obj) {
	var defaults = {type:'one'}
	var options = $.extend(defaults, options);
	var id = options.type;
	if(options.type == 'one'){
		id = obj.find('input:checked').val();
	}else if(options.type == 'json'){
		var i = 0;
		id = '{';
		obj.find('input:checked').each(function(){
			id += '"'+i+'":"'+$(this).val()+'",';
			i++;
		});
		id = id.substr(0, id.length-1);
		if(id){id += '}';}
	}else{
		obj.find('input:checked').each(function(){
			id += $(this).val()+options.type;
		});
		id = id.substr(0, id.length-1);
	}
	return id;
}