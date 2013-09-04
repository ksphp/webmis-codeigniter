var myDate = new Date();
myDate.getYear();        //获取当前年份(2位)
myDate.getFullYear();    //获取完整的年份(4位,1970-????)
myDate.getMonth();       //获取当前月份(0-11,0代表1月)
myDate.getDate();        //获取当前日(1-31)
myDate.getDay();         //获取当前星期X(0-6,0代表星期天)
myDate.getTime();        //获取当前时间(从1970.1.1开始的毫秒数)
myDate.getHours();       //获取当前小时数(0-23)
myDate.getMinutes();     //获取当前分钟数(0-59)
myDate.getSeconds();     //获取当前秒数(0-59)
myDate.getMilliseconds();    //获取当前毫秒数(0-999)
myDate.toLocaleDateString();     //获取当前日期
var mytime=myDate.toLocaleTimeString();     //获取当前时间
myDate.toLocaleString( );        //获取日期与时间

//---------------------------------------------------  
// 判断闰年  
//---------------------------------------------------  
Date.prototype.isLeapYear = function()   
{   
	return (0==this.getYear()%4&&((this.getYear()%100!=0)||(this.getYear()%400==0)));   
}   
  
//---------------------------------------------------  
// 日期格式化  
// 格式 YYYY/yyyy/YY/yy 表示年份  
// MM/M 月份  
// W/w 星期  
// dd/DD/d/D 日期  
// hh/HH/h/H 时间  
// mm/m 分钟  
// ss/SS/s/S 秒  
//---------------------------------------------------  
Date.prototype.Format = function(formatStr)   
{   
	var str = formatStr;   
	var Week = ['日','一','二','三','四','五','六'];  
  
	str=str.replace(/yyyy|YYYY/,this.getFullYear());   
	str=str.replace(/yy|YY/,(this.getYear() % 100)>9?(this.getYear() % 100).toString():'0' + (this.getYear() % 100));   
  
	str=str.replace(/MM/,this.getMonth()>9?this.getMonth().toString():'0' + this.getMonth());   
	str=str.replace(/M/g,this.getMonth());   
  
	str=str.replace(/w|W/g,Week[this.getDay()]);   
  
	str=str.replace(/dd|DD/,this.getDate()>9?this.getDate().toString():'0' + this.getDate());   
	str=str.replace(/d|D/g,this.getDate());   
  
	str=str.replace(/hh|HH/,this.getHours()>9?this.getHours().toString():'0' + this.getHours());   
	str=str.replace(/h|H/g,this.getHours());   
	str=str.replace(/mm/,this.getMinutes()>9?this.getMinutes().toString():'0' + this.getMinutes());   
	str=str.replace(/m/g,this.getMinutes());   
  
	str=str.replace(/ss|SS/,this.getSeconds()>9?this.getSeconds().toString():'0' + this.getSeconds());   
	str=str.replace(/s|S/g,this.getSeconds());   
  
	return str;   
}

/*----------------------------
时间函数
----------------------------*/
//日期比较
function compareDate(d1, d2){
	//获取当天日期
	if(!d2){
		var now = new Date();
		d2 = now.getFullYear()+'-'+(now.getMonth()+1)+'-'+now.getDate();
	}
	return Date.parse(d1.replace(/-/g, "/")) > Date.parse(d2.replace(/-/g, "/"));
}
//|求两个时间的天数差 日期格式为 YYYY-MM-dd   
function daysBetween(DateOne,DateTwo){
	//获取当天日期
	if(!DateTwo){
		var now = new Date();
		DateTwo = now.getFullYear()+'-'+(now.getMonth()+1)+'-'+now.getDate();
	}
	
	var OneMonth = DateOne.substring(5,DateOne.lastIndexOf ('-'));
	var OneDay = DateOne.substring(DateOne.length,DateOne.lastIndexOf ('-')+1);
	var OneYear = DateOne.substring(0,DateOne.indexOf ('-'));
	
	var TwoMonth = DateTwo.substring(5,DateTwo.lastIndexOf ('-'));
	var TwoDay = DateTwo.substring(DateTwo.length,DateTwo.lastIndexOf ('-')+1);
	var TwoYear = DateTwo.substring(0,DateTwo.indexOf ('-'));
 
	var cha=((Date.parse(OneMonth+'/'+OneDay+'/'+OneYear)- Date.parse(TwoMonth+'/'+TwoDay+'/'+TwoYear))/86400000);
	return Math.abs(cha);
}
  
//+---------------------------------------------------  
//| 求两个时间的天数差 日期格式为 YYYY-MM-dd   
//+---------------------------------------------------  
function daysBetween(DateOne,DateTwo)  
{   
	var OneMonth = DateOne.substring(5,DateOne.lastIndexOf ('-'));  
	var OneDay = DateOne.substring(DateOne.length,DateOne.lastIndexOf ('-')+1);  
	var OneYear = DateOne.substring(0,DateOne.indexOf ('-'));  
  
	var TwoMonth = DateTwo.substring(5,DateTwo.lastIndexOf ('-'));  
	var TwoDay = DateTwo.substring(DateTwo.length,DateTwo.lastIndexOf ('-')+1);  
	var TwoYear = DateTwo.substring(0,DateTwo.indexOf ('-'));  
  
	var cha=((Date.parse(OneMonth+'/'+OneDay+'/'+OneYear)- Date.parse(TwoMonth+'/'+TwoDay+'/'+TwoYear))/86400000);   
	return Math.abs(cha);  
}  
  
  
//+---------------------------------------------------  
//| 日期计算  
//+---------------------------------------------------  
Date.prototype.DateAdd = function(strInterval, Number) {   
	var dtTmp = this;  
	switch (strInterval) {   
		case 's' :return new Date(Date.parse(dtTmp) + (1000 * Number));  
		case 'n' :return new Date(Date.parse(dtTmp) + (60000 * Number));  
		case 'h' :return new Date(Date.parse(dtTmp) + (3600000 * Number));  
		case 'd' :return new Date(Date.parse(dtTmp) + (86400000 * Number));  
		case 'w' :return new Date(Date.parse(dtTmp) + ((86400000 * 7) * Number));  
		case 'q' :return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number*3, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());  
		case 'm' :return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());  
		case 'y' :return new Date((dtTmp.getFullYear() + Number), dtTmp.getMonth(), dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());  
	}  
}  
  
//+---------------------------------------------------  
//| 比较日期差 dtEnd 格式为日期型或者有效日期格式字符串  
//+---------------------------------------------------  
Date.prototype.DateDiff = function(strInterval, dtEnd) {   
	var dtStart = this;  
	if (typeof dtEnd == 'string' )//如果是字符串转换为日期型  
	{   
		dtEnd = StringToDate(dtEnd);  
	}  
	switch (strInterval) {   
		case 's' :return parseInt((dtEnd - dtStart) / 1000);  
		case 'n' :return parseInt((dtEnd - dtStart) / 60000);  
		case 'h' :return parseInt((dtEnd - dtStart) / 3600000);  
		case 'd' :return parseInt((dtEnd - dtStart) / 86400000);  
		case 'w' :return parseInt((dtEnd - dtStart) / (86400000 * 7));  
		case 'm' :return (dtEnd.getMonth()+1)+((dtEnd.getFullYear()-dtStart.getFullYear())*12) - (dtStart.getMonth()+1);  
		case 'y' :return dtEnd.getFullYear() - dtStart.getFullYear();  
	}  
}  
  
//+---------------------------------------------------  
//| 日期输出字符串，重载了系统的toString方法  
//+---------------------------------------------------  
Date.prototype.toString = function(showWeek)  
{   
	var myDate= this;  
	var str = myDate.toLocaleDateString();  
	if (showWeek)  
	{   
		var Week = ['日','一','二','三','四','五','六'];  
		str += ' 星期' + Week[myDate.getDay()];  
	}  
	return str;  
}  
  
//+---------------------------------------------------  
//| 日期合法性验证  
//| 格式为：YYYY-MM-DD或YYYY/MM/DD  
//+---------------------------------------------------  
function IsValidDate(DateStr)   
{   
	var sDate=DateStr.replace(/(^\s+|\s+$)/g,''); //去两边空格;   
	if(sDate=='') return true;   
	//如果格式满足YYYY-(/)MM-(/)DD或YYYY-(/)M-(/)DD或YYYY-(/)M-(/)D或YYYY-(/)MM-(/)D就替换为''   
	//数据库中，合法日期可以是:YYYY-MM/DD(2003-3/21),数据库会自动转换为YYYY-MM-DD格式   
	var s = sDate.replace(/[\d]{ 4,4 }[\-/]{ 1 }[\d]{ 1,2 }[\-/]{ 1 }[\d]{ 1,2 }/g,'');   
	if (s=='') //说明格式满足YYYY-MM-DD或YYYY-M-DD或YYYY-M-D或YYYY-MM-D   
	{   
		var t=new Date(sDate.replace(/\-/g,'/'));   
		var ar = sDate.split(/[-/:]/);   
		if(ar[0] != t.getYear() || ar[1] != t.getMonth()+1 || ar[2] != t.getDate())   
		{   
			//alert('错误的日期格式！格式为：YYYY-MM-DD或YYYY/MM/DD。注意闰年。');   
			return false;   
		}   
	}   
	else   
	{   
		//alert('错误的日期格式！格式为：YYYY-MM-DD或YYYY/MM/DD。注意闰年。');   
		return false;   
	}   
	return true;   
}   
  
//+---------------------------------------------------  
//| 日期时间检查  
//| 格式为：YYYY-MM-DD HH:MM:SS  
//+---------------------------------------------------  
function CheckDateTime(str)  
{   
	var reg = /^(\d+)-(\d{ 1,2 })-(\d{ 1,2 }) (\d{ 1,2 }):(\d{ 1,2 }):(\d{ 1,2 })$/;   
	var r = str.match(reg);   
	if(r==null)return false;   
	r[2]=r[2]-1;   
	var d= new Date(r[1],r[2],r[3],r[4],r[5],r[6]);   
	if(d.getFullYear()!=r[1])return false;   
	if(d.getMonth()!=r[2])return false;   
	if(d.getDate()!=r[3])return false;   
	if(d.getHours()!=r[4])return false;   
	if(d.getMinutes()!=r[5])return false;   
	if(d.getSeconds()!=r[6])return false;   
	return true;   
}   
  
//+---------------------------------------------------  
//| 把日期分割成数组  
//+---------------------------------------------------  
Date.prototype.toArray = function()  
{   
	var myDate = this;  
	var myArray = Array();  
	myArray[0] = myDate.getFullYear();  
	myArray[1] = myDate.getMonth();  
	myArray[2] = myDate.getDate();  
	myArray[3] = myDate.getHours();  
	myArray[4] = myDate.getMinutes();  
	myArray[5] = myDate.getSeconds();  
	return myArray;  
}  
  
//+---------------------------------------------------  
//| 取得日期数据信息  
//| 参数 interval 表示数据类型  
//| y 年 m月 d日 w星期 ww周 h时 n分 s秒  
//+---------------------------------------------------  
Date.prototype.DatePart = function(interval)  
{   
	var myDate = this;  
	var partStr='';  
	var Week = ['日','一','二','三','四','五','六'];  
	switch (interval)  
	{   
		case 'y' :partStr = myDate.getFullYear();break;  
		case 'm' :partStr = myDate.getMonth()+1;break;  
		case 'd' :partStr = myDate.getDate();break;  
		case 'w' :partStr = Week[myDate.getDay()];break;  
		case 'ww' :partStr = myDate.WeekNumOfYear();break;  
		case 'h' :partStr = myDate.getHours();break;  
		case 'n' :partStr = myDate.getMinutes();break;  
		case 's' :partStr = myDate.getSeconds();break;  
	}  
	return partStr;  
}  
  
//+---------------------------------------------------  
//| 取得当前日期所在月的最大天数  
//+---------------------------------------------------  
Date.prototype.MaxDayOfDate = function()  
{   
	var myDate = this;  
	var ary = myDate.toArray();  
	var date1 = (new Date(ary[0],ary[1]+1,1));  
	var date2 = date1.dateAdd(1,'m',1);  
	var result = dateDiff(date1.Format('yyyy-MM-dd'),date2.Format('yyyy-MM-dd'));  
	return result;  
}  
  
//+---------------------------------------------------  
//| 取得当前日期所在周是一年中的第几周  
//+---------------------------------------------------  
Date.prototype.WeekNumOfYear = function()  
{   
	var myDate = this;  
	var ary = myDate.toArray();  
	var year = ary[0];  
	var month = ary[1]+1;  
	var day = ary[2];  
	document.write('< script language=VBScript\> \n');  
	document.write('myDate = Datue(''+month+'-'+day+'-'+year+'') \n');  
	document.write('result = DatePart('ww', myDate) \n');  
	document.write(' \n');  
	return result;  
}  
  
//+---------------------------------------------------  
//| 字符串转成日期类型   
//| 格式 MM/dd/YYYY MM-dd-YYYY YYYY/MM/dd YYYY-MM-dd  
//+---------------------------------------------------  
function StringToDate(DateStr)  
{   
  
	var converted = Date.parse(DateStr);  
	var myDate = new Date(converted);  
	if (isNaN(myDate))  
	{   
		//var delimCahar = DateStr.indexOf('/')!=-1?'/':'-';  
		var arys= DateStr.split('-');  
		myDate = new Date(arys[0],--arys[1],arys[2]);  
	}  
	return myDate;  
}  

 

//若要显示:当前日期加时间(如:2009-06-12 12:00)

function CurentTime()
	{ 
		var now = new Date();
       
		var year = now.getFullYear();       //年
		var month = now.getMonth() + 1;     //月
		var day = now.getDate();            //日
       
		var hh = now.getHours();            //时
		var mm = now.getMinutes();          //分
       
		var clock = year + "-";
       
		if(month < 10)
			clock += "0";
       
		clock += month + "-";
       
		if(day < 10)
			clock += "0";
           
		clock += day + " ";
       
		if(hh < 10)
			clock += "0";
           
		clock += hh + ":";
		if (mm < 10) clock += '0'; 
		clock += mm; 
		return(clock); 
	} 