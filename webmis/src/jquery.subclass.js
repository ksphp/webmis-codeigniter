var SubClass = function (options,obj) {
	var defaults = {overClass:'SubClass2',outClass:'SubClass1'}
	var options = $.extend(defaults, options);
	obj.addClass(options.outClass).hover(
		function () { 
			$(this).addClass(options.overClass);
		},
		function () { 
			$(this).removeClass(options.overClass);
		}
	);
}