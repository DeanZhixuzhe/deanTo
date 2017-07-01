$(function(){
	$(".side ul li").hover(function(){
		if ($(this).find(".sidebox").text()==""){
			$(this).find(".sidebox").stop().animate({"width":"54px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background":"#ae1c1c"});
		}else {
			$(this).find(".sidebox").stop().animate({"width":"124px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background":"#ae1c1c"});
		}
		$(this).find(".circle").show();
	},function(){
		$(this).find(".sidebox").stop().animate({"width":"54px"},200).css({"opacity":"0.8","filter":"Alpha(opacity=80)","background":"#7DBEFF"})
		$(this).find(".circle").hide();	
	});
});

$(function(){
	$(".city").hover(function(){
		$(this).find(".cityList").show();
	},function(){
		$(this).find(".cityList").hide();
	});
});
//回到顶部函数
function goTop(){
	$('html,body').animate({'scrollTop':0},200);
}
$(function(){
	var a = $('.header-frame'),
		b = a.offset();
	$(document).on('scroll',function(){
		var	c = $(document).scrollTop();
		if(b.top<=c){
			a.css({'position':'fixed','top':'0px'})
		}else{
			a.css({'position':'absolute','top':'0px'})
		}
	});
});