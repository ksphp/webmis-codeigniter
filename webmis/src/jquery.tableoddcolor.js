var TableOddColor = function (options,obj) {
	var defaults = {oddClass:'TableTrBg1',overClass:'TableTrBg2'}
	var options = $.extend(defaults, options);
	//隔行变色
	obj.children('tr:odd').addClass(options.oddClass);
	//鼠标经过样式变化处
	obj.children('tr').hover(
		function () { 
			$(this).addClass(options.overClass);
		},
		function () { 
			$(this).removeClass(options.overClass);
		}
	);
}