/**
 * 使用方式
 * 	var defaultSetting={
			url:base+"manager/User_updateAccountStates",
			data:{id:1},
			callback:function(data){
				alert(data.msg);
			}
	};
	$("#testA").myClickAjax(defaultSetting);
 */
(function($){
	  $.ajaxSetup( {  //为了 在 用户登录状态失效的情况下 刷新当前页面  ajax 达不到重定向的目的
	        //设置ajax请求结束后的执行动作  
	        complete :   
	        function(XMLHttpRequest, textStatus) {  
	            // 通过XMLHttpRequest取得响应头，sessionstatus  
	            if (textStatus == "parsererror") {  
	               window.location.reload();
	            }  
	        }  
	    })
	$.extend({//类方法
		myCommonAjax:function(option){
			var defaultSetting={
					url:"",
					data:{},
					showTip:false,
                      msg:"",
					callback:function(data){
					}
			};
			
			var setting=$.extend(defaultSetting,option);//合并属性
		/*	var subm= $.ajax({
				type : 'post',
				url:setting.url,
				dataType : "json",
				data : setting.data,
				success : function(data) {
					setting.callback(data);
				}
			});*/
			var msg="确定"+setting.msg+"吗？";
			if(setting.showTip){
				 if(confirm(msg))
				   {
					 $.ajax({
							type : 'post',
							url:setting.url,
							dataType : "json",
							data : setting.data,
							success : function(data) {
								setting.callback(data);
							}
						});
				   }	
			}else{
				$.ajax({
					type : 'post',
					url:setting.url,
					dataType : "json",
					data : setting.data,
					success : function(data) {
						setting.callback(data);
					}
				});
			}
	}
	
	
	})
		$.fn.extend({//对象方法
		myClickAjax:function(option){
			this.click(function(){
				$.myCommonAjax(option);
			})
		}
			
	
	
	})
	
}(jQuery))


/** 
* 将时间转换成固定格式输出 
* new Date().toFormatString('yyyy-MM-dd HH:mm:ss'); 
* new Date().toFormatString('yyyy/MM/dd hh:mm:ss'); 
* 只支持关键字（yyyy、MM、dd、HH、hh、mm、ss）HH：表示24小时，hh表示12小时 
*/  
Date.prototype.toFormatString=function(format){  
    var formatstr = format;  
    if(format != null && format != ""){  
        //设置年  
        if(formatstr.indexOf("yyyy") >=0 ){  
            formatstr = formatstr.replace("yyyy",this.getFullYear());  
        }  
        //设置月  
        if(formatstr.indexOf("MM") >=0 ){  
            var month = this.getMonth() + 1;  
            if(month < 10){  
                month = "0" + month;  
            }  
            formatstr = formatstr.replace("MM",month);  
        }  
        //设置日  
        if(formatstr.indexOf("dd") >=0 ){  
            var day = this.getDate();  
            if(day < 10){  
                day = "0" + day;  
            }  
            formatstr = formatstr.replace("dd",day);  
        }  
        //设置时 - 24小时  
        var hours = this.getHours();  
        if(formatstr.indexOf("HH") >=0 ){  
            if(hours < 10){  
                month = "0" + hours;  
            }  
            formatstr = formatstr.replace("HH",hours);  
        }  
        //设置时 - 12小时  
        if(formatstr.indexOf("hh") >=0 ){  
            if(hours > 12){  
                hours = hours - 12;  
            }  
            if(hours < 10){  
                hours = "0" + hours;  
            }  
            formatstr = formatstr.replace("hh",hours);  
        }  
        //设置分  
        if(formatstr.indexOf("mm") >=0 ){  
            var minute = this.getMinutes();  
            if(minute < 10){  
                minute = "0" + minute;  
            }  
            formatstr = formatstr.replace("mm",minute);  
        }  
        //设置秒  
        if(formatstr.indexOf("ss") >=0 ){  
            var second = this.getSeconds();  
            if(second < 10){  
                second = "0" + second;  
            }  
            formatstr = formatstr.replace("ss",second);  
        }  
    }  
    return formatstr;  
}  

/*日期字符串格式化日期*/
function formatDateStr(date_str,format){
	var date_strNew = date_str.replace(/-/g,"/");
	var date = new Date(date_strNew);
	return (date).toFormatString(format);
}

/*方法*/
function keyPress(ob,type) {
    //type=2只能输入整数
	 if(type&&type==2){
		 if ((!ob.value.match(/^[\+\-]?\d*?\d*?$/))||(!ob.value.match( /^([1-9]\d*|0)(\.\d*[1-9])?$/))) ob.value = 0; else ob.t_value = ob.value; if (ob.value.match(/^[\+\-]?\d*?\d*?$/)) ob.o_value = ob.value;

	 }else{//允许小数点
		 if ((!ob.value.match(/^[\+\-]?\d*?\.?\d*?$/))||(!ob.value.match( /^([1-9]\d*|0)(\.\d*[1-9])?$/))) ob.value = 0; else ob.t_value = ob.value; if (ob.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?)?$/)) ob.o_value = ob.value;
	 }
}
/*验证金额*/
function checkMoney(money,callback){
    var reg = /^([1-9]\d{0,9}|0)([.]?|(\.\d{1,2})?)$/;
    checkCommon(reg,money,callback,"金额");
}

function checkCommon(reg,str,callback,desc){
    if(str==""){
        callback(0,"请输入"+desc+"！");	return false ;
    }
    if (reg.test(str)) {
        callback(1,"");
    }else{
        callback(0,""+desc+"有误！");
    };
}
/*验证手机号*/
function checkMobile(tel,callback){
    var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
    checkCommon(reg,tel,callback,"手机号码");
}

/*修改图片高度*/
function DrawImage(ImgD, FitWidth,padding) {
	FitWidth = FitWidth-padding;
    var image = new Image();
    image.src = ImgD.src;
    if (image.complete) {
	   if (image.width > 0 && image.height > 0) {
	        if (image.width > FitWidth) {
	            ImgD.width = FitWidth;
	            ImgD.height = (image.height * FitWidth) / image.width;
	        } else {
	            ImgD.width = image.width;
	            ImgD.height = image.height;
	        }
	    }
    } else {
        image.onload = function () {
		   if (image.width > 0 && image.height > 0) {
		        if (image.width > FitWidth) {
		            ImgD.width = FitWidth;
		            ImgD.height = (image.height * FitWidth) / image.width;
		        } else {
		            ImgD.width = image.width;
		            ImgD.height = image.height;
		        }
		    }
		   image.onload = null;
        };
    };
}
