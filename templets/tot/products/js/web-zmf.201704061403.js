/*!
 * NEWSOUL's production http://newsoul.cn
 * Copyright 2017
 * Author zmf http://blog.newsoul.cn
 * This is NOT a freeware, use is subject to license terms
 */
function rebind(){if($("img.lazy").lazyload({failure_limit:10,threshold:200}),$("#main-navbar li").mouseover(function(){return!1}),$("#site-info-toggle,#site-info-holder").mouseover(function(){clearTimeout(navTimeout),navTimeover=setTimeout(function(){$("#site-info-holder").show()},100)}),$("#site-info-toggle,#site-info-holder").mouseout(function(){clearTimeout(navTimeover),navTimeout=setTimeout(function(){$("#site-info-holder").hide()},300)}),$("a[action=ajax]").unbind("click").click(function(){var dom=$(this),data=dom.attr("action-data"),input=dom.attr("action-input");if(!data)return alert("缺少参数"),!1;if(!checkLogin())return simpleDialog({content:"请先登录哦~"}),!1;var passData={YII_CSRF_TOKEN:zmf.csrfToken,action:"ajax",data:data};if(input){var inputDom=$("#"+input),inputVal=inputDom.val();if(!inputVal||parseInt(inputVal)<1)return simpleDialog({content:"请完善输入"}),inputDom.focus(),!1;passData.extra=inputVal}return checkAjax()?void $.post(zmf.ajaxUrl,passData,function(result){ajaxReturn=!0,result=eval("("+result+")"),simpleDialog(1===result.status?{content:result.msg}:{content:result.msg})}):!1}),$("#sendSms-btn").unbind("click").click(function(){var dom=$(this),_target=dom.attr("data-target");if(!_target)return simpleDialog({msg:"请输入手机号"}),!1;var phone=$("#"+_target).val();if(!phone)return $("#"+_target).focus(),simpleDialog({msg:"请输入手机号"}),!1;var type=dom.attr("data-type");if(!type)return simpleDialog({msg:"缺少类型参数"}),!1;if("login"===type||"reg"===type){var validom=$("#validate-code"),valicode=validom.val();if(!valicode)return validom.focus(),simpleDialog({msg:"请输入校验码"}),!1;var _status=!0;if($.post(zmf.ajaxUrl,{action:"checkValidate",valicode:valicode,YII_CSRF_TOKEN:zmf.csrfToken},function(result){return result=eval("("+result+")"),1!==result.status?(simpleDialog({msg:result.msg}),$("#validate-code-img").click(),_status=!1,!1):void(_status=!0)}),!_status)return!1}return checkAjax()?void $.post(zmf.ajaxUrl,{action:"sendSms",type:type,phone:phone,valicode:valicode,YII_CSRF_TOKEN:zmf.csrfToken},function(result){if(ajaxReturn=!0,result=eval("("+result+")"),1===result.status){var totalTime=60,times=0;dom.text("重新发送 "+totalTime+"s").attr("disabled","disabled");var interval=setInterval(function(){times+=1;var a=totalTime-times;dom.text("重新发送 "+a+"s"),0>=a&&(clearInterval(interval),dom.removeAttr("disabled").text("重新发送"))},1e3)}else simpleDialog({msg:result.msg})}):!1}),zmf.remaindSendSmsTime>0){var dom=$("#sendSms-btn"),totalTime=zmf.remaindSendSmsTime,times=0;dom.text("重新发送 "+totalTime+"s").attr("disabled","disabled");var interval=setInterval(function(){times+=1;var a=totalTime-times;dom.text("重新发送 "+a+"s"),0>=a&&(clearInterval(interval),dom.removeAttr("disabled").text("重新发送"))},1e3)}$("#login-btn").unbind("click").click(function(){var type=$("#login-type").val();if(!type||"passwd"!==type&&"sms"!==type)return simpleDialog({msg:"参数错误"}),!1;var phone=$("#login-phone").val();if(!phone)return simpleDialog({msg:"请输入手机号"}),!1;var validom=$("#validate-code"),value="";if("passwd"===type){if(value=$("#login-password").val(),!value)return simpleDialog({msg:"请输入密码"}),!1}else if("sms"===type){var valicode=validom.val();if(!valicode)return validom.focus(),simpleDialog({msg:"请输入校验码"}),!1;if(value=$("#login-code").val(),!value)return simpleDialog({msg:"请输入验证码"}),!1}return value?checkAjax()?void $.post(zmf.ajaxUrl,{action:"login",type:type,phone:phone,value:value,_valiCode:valicode,YII_CSRF_TOKEN:zmf.csrfToken},function(result){ajaxReturn=!0,result=eval("("+result+")"),1===result.status?window.location.href=result.msg:-9===result.status?(simpleDialog({msg:result.msg}),$("#validate-code-img").click()):simpleDialog({msg:result.msg})}):!1:(simpleDialog({msg:"缺少参数"}),!1)}),$("#validate-code").keyup(function(){var a=$(this);a.val()?$("#sendSms-btn").removeClass("disabled").removeAttr("disabled"):$("#sendSms-btn").addClass("disabled").attr("disabled","disabled")}),$("#reg-btn").unbind("click").click(function(){var pdom=$("#reg-phone"),codedom=$("#reg-code"),unamedom=$("#reg-username"),passwddom=$("#reg-password"),validom=$("#validate-code"),phone=pdom.val();if(!phone)return pdom.focus(),simpleDialog({msg:"请输入常用手机号"}),!1;var valicode=validom.val();if(!valicode)return validom.focus(),simpleDialog({msg:"请输入校验码"}),!1;var code=codedom.val();if(!code)return codedom.focus(),simpleDialog({msg:"请输入验证码"}),!1;var name=unamedom.val();if(!name)return unamedom.focus(),simpleDialog({msg:"请输入昵称"}),!1;var passwd=passwddom.val();return passwd?passwd.length<6?(passwddom.focus(),simpleDialog({msg:"密码长度不短于6位"}),!1):checkAjax()?void $.post(zmf.ajaxUrl,{action:"reg",name:name,phone:phone,code:code,passwd:passwd,_valiCode:valicode,YII_CSRF_TOKEN:zmf.csrfToken},function(result){ajaxReturn=!0,result=eval("("+result+")"),1===result.status?window.location.href=result.msg:-9===result.status?(simpleDialog({msg:result.msg}),$("#validate-code-img").click()):simpleDialog({msg:result.msg})}):!1:(passwddom.focus(),simpleDialog({msg:"请输入密码"}),!1)}),$("#updateInfo-btn").unbind("click").click(function(){var unamedom=$("#Users_truename"),avadom=$("#Users_avatar"),pdom=$("#Users_phone"),expdom=$("#exphone-phone"),passwddom=$("#Users_password"),sexdom=$("#Users_sex"),codedom=$("#reg-code"),qqdom=$("#Users_qq"),weixindom=$("#Users_weixin"),name=unamedom.val();if(!name)return unamedom.focus(),simpleDialog({msg:"请输入昵称"}),!1;var avatar=avadom.val(),sex=sexdom.val(),qq=qqdom.val(),weixin=weixindom.val(),_exPhone=pdom.val(),newPhone=expdom.val(),code="";if(!_exPhone)return simpleDialog({msg:"参数错误"}),!1;if(""!==newPhone&&newPhone!==_exPhone&&(code=codedom.val(),!code))return codedom.focus(),simpleDialog({msg:"请输入验证码"}),!1;var passwd=passwddom.val();return""!==passwd&&passwd.length<6?(passwddom.focus(),simpleDialog({msg:"密码长度不短于6位"}),!1):checkAjax()?void $.post(zmf.ajaxUrl,{action:"updateInfo",name:name,phone:newPhone,code:code,passwd:passwd,sex:sex,avatar:avatar,qq:qq,weixin:weixin,YII_CSRF_TOKEN:zmf.csrfToken},function(result){function refreshPage(){window.location.reload(),window.setTimeout("refreshPage()",1500)}ajaxReturn=!0,result=eval("("+result+")"),1===result.status?(simpleDialog({msg:result.msg}),refreshPage()):simpleDialog({msg:result.msg})}):!1}),$(".tags-item").unbind("click").click(function(){function a(){var a=0;return $(".tags-item").each(function(){$(this).hasClass("active")&&++a}),a>=10?!1:!0}var b=$(this);if(b.hasClass("active"))b.removeClass("active"),b.children("input").removeAttr("checked");else{if(!a())return dialog({msg:"最多只能选择10个标签"}),!1;b.addClass("active"),b.children("input").attr("checked","checked")}}),$("#tags-holder .pointer").unbind("click").click(function(){var a=$(this);a.hasClass("active")?(a.parent("._tags_items").children(".hide-item").each(function(){$(this).addClass("displayNone")}),a.removeClass("active").html("︾")):(a.parent("._tags_items").children(".hide-item").each(function(){$(this).removeClass("displayNone")}),a.addClass("active").html("︽"))}),$("a[action=del-content]").unbind("click").click(function(){var a=$(this);delContent(a)}),$("#fixed-contact-us ._item").unbind("click").click(function(){var a=$(this),b=a.children("span"),c=a.attr("data-target");$("#fixed-contact-us ._item").each(function(){var a=$(this),b=a.children("span"),d=a.attr("data-target");d!==c&&"none"!==$("#"+d).css("display")&&($("#"+d).fadeOut(),b.removeClass("remove"))}),"none"!==$("#"+c).css("display")?($("#"+c).fadeOut(),b.removeClass("remove")):($("#"+c).fadeIn(),b.addClass("remove"))}),$("a[action=feedback]").unbind("click").click(function(){var a='<div class="form-group"><label for="feedback-contact">联系方式</label><input type="text" id="feedback-contact" class="form-control" placeholder="常用联系方式(邮箱、QQ、微信等)，便于告知反馈处理进度(可选)"/></div><div class="form-group"><label for="feedback-content">反馈内容</label><textarea id="feedback-content" class="form-control" max-lenght="255" placeholder="您的意见或建议"></textarea></div>';dialog({msg:a,title:"意见反馈",action:"feedback"}),$("button[action=feedback]").unbind("click").click(function(){feedback()})});var clipboard=new Clipboard(".btn-copy");clipboard.on("success",function(a){simpleDialog({content:"复制成功"})}),clipboard.on("error",function(a){dialog({msg:"复制失败，请手动复制浏览器链接"})})}function addVideo(){var a='<div class="form-group"><label>输入视频播放页面的网址</label><input type="text" class="form-control" placeholder="单个视频的播放页地址" id="parse_video_url"/><p class="help-block">暂时仅支持优酷、土豆视频</p><textarea id="parse_video_desc" class="form-control" placeholder="视频描述（选填）"></textarea></div>';dialog({title:"插入视频",msg:a,action:"parseVideo"}),$("button[action=parseVideo]").unbind("click").click(function(){parseVideo()})}function parseVideo(){var a=$("#parse_video_url").val(),b=$("#parse_video_desc").val();if(!a)return alert("请填写视频地址"),!1;if(!checkAjax())return!1;var c={YII_CSRF_TOKEN:zmf.csrfToken,url:a,desc:b,action:"parseVideo"};$.post(zmf.ajaxUrl,c,function(a){return a=$.parseJSON(a),ajaxReturn=!0,1!==a.status?(alert(a.msg),!1):($("#fileSuccess").append(a.msg),$(".toggle-display").each(function(){$(this).removeClass("toggle-display")}),""===$("#Posts_title").val()&&$("#Posts_title").focus(),$(window).bind("beforeunload",function(){return"您输入的内容可能未保存，确定离开此页面吗？"}),closeDialog(beforeModal),rebind(),void 0)})}function playVideo(a,b,c,d){if(!a||!b||!c)return!1;var e="";"youku"===a?e='<iframe height=480 width=600 src="http://player.youku.com/embed/'+b+'" frameborder=0 allowfullscreen></iframe>':"tudou"===a?e='<iframe src="http://www.tudou.com/programs/view/html5embed.action?type=0&'+b+'" allowtransparency="true" allowfullscreen="true" allowfullscreenInteractive="true" scrolling="no" border="0" frameborder="0" style="width:600px;height:480px;"></iframe>':"qq"===a&&(e='<iframe frameborder="0" width="600" height="480" src="http://v.qq.com/iframe/player.html?vid='+b+'&tiny=0&auto=0" allowfullscreen></iframe>'),$("#"+c).html(e),$(d).remove()}function setPostFaceimg(a,b,c,d){var e=$(b).children("i"),f=!1;e.hasClass("fa-bookmark")&&(f=!0),$(".right-bar").each(function(){$(this).find(".fa-bookmark").removeClass("fa-bookmark").addClass("fa-bookmark-o")}),f?a="":e.hasClass("fa-bookmark-o")?e.removeClass("fa-bookmark-o").addClass("fa-bookmark"):(e.removeClass("fa-bookmark").addClass("fa-bookmark-o"),a=""),$("#Posts_faceImg").val(a),$("#Posts_faceUrl").val(d),$("#post-avatar").attr("src",c)}function delContent(a){var b=a.attr("action-data"),c=a.attr("action-type"),d=a.attr("action-confirm"),e=a.attr("action-redirect"),f=a.attr("action-target");if(!b||!c)return!1;var g=!0;if(1===parseInt(d)&&(g=confirm("确定删除此内容？")?!0:!1),!g)return!1;if(!checkAjax())return!1;var h={YII_CSRF_TOKEN:zmf.csrfToken,type:c,data:b,action:"delContent"};$.post(zmf.ajaxUrl,h,function(a){return ajaxReturn=!0,a=$.parseJSON(a),1===a.status?e?window.location.href=e:f?$("#"+f).fadeOut(500).remove():alert(a.msg):dialog({msg:a.msg}),!1})}function feedback(){var a=$("#feedback-content").val();if(!a)return alert("内容不能为空哦~"),!1;if(!checkAjax())return!1;var b=window.location.href,c=$("#feedback-contact").val();$.post(zmf.feedbackUrl,{content:a,email:c,url:b,YII_CSRF_TOKEN:zmf.csrfToken},function(a){return ajaxReturn=!0,a=$.parseJSON(a),dialog({msg:a.msg}),!1})}function scrollPage(a,b){b||(b=0),$("body,html").animate({scrollTop:$("#"+a).offset().top+parseInt(b)},200)}function myUploadify(){$("#uploadfile").uploadify({height:34,width:120,swf:zmf.baseUrl+"/common/uploadify/uploadify.swf",queueID:"fileQueue",auto:!0,multi:!0,fileObjName:"filedata",uploadLimit:zmf.perAddImgNum,fileSizeLimit:zmf.allowImgPerSize,fileTypeExts:zmf.allowImgTypes,fileTypeDesc:"Image Files",uploader:tipImgUploadUrl,buttonText:"请选择",buttonClass:"btn btn-success",debug:!1,formData:{PHPSESSID:zmf.currentSessionId,YII_CSRF_TOKEN:zmf.csrfToken},onUploadSuccess:function(file,data,response){if(data=eval("("+data+")"),1==data.status){var img="<p><img src='"+data.thumbnail+"' data='"+data.attachid+"' class='img-responsive'/><br/></p>";myeditor.execCommand("inserthtml",img)}else dialog({msg:data.msg});tipsImgOrder++}})}function singleUploadify(a){if("object"!=typeof a)return!1;var b=!0;b="undefined"==typeof a.multi?!0:a.multi,$("#"+a.placeHolder).uploadify({height:a.height?a.height:100,width:a.width?a.width:300,swf:zmf.baseUrl+"/common/uploadify/uploadify.swf",queueID:!1,auto:!0,multi:b,queueSizeLimit:zmf.perAddImgNum,fileObjName:a.filedata?a.filedata:"filedata",fileTypeExts:a.allowImgTypes?a.allowImgTypes:zmf.allowImgTypes,fileSizeLimit:zmf.allowImgPerSize,fileTypeDesc:"Image Files",uploader:a.uploadUrl,buttonText:a.buttonText?a.buttonText:null===a.buttonText?"":"添加图片",buttonClass:"btn btn-default",debug:!1,formData:{PHPSESSID:zmf.currentSessionId,YII_CSRF_TOKEN:zmf.csrfToken},onUploadStart:function(b){if("posts"===a.type||"planFile"===a.type||"bomFile"===a.type||"tasks"===a.type||"files"===a.type){var c={},d=new Date,e=b.type,f=a.type+"/"+d.getFullYear()+"/"+(d.getMonth()+1)+"/"+d.getDate()+"/"+uuid()+e;c.key=f,c.token=a.token,$("#"+a.placeHolder).uploadify("settings","formData",c)}},onUploadSuccess:function(b,c,d){if(c=$.parseJSON(c),"posts"===a.type||"files"===a.type){if(c.error)return alert(c.error),!1;var e={YII_CSRF_TOKEN:zmf.csrfToken,filePath:c.key,fileSize:b.size,fileName:b.name,type:a.type,action:"saveUploadImg"};$.post(zmf.ajaxUrl,e,function(b){return b=$.parseJSON(b),1!==b.status?(alert(b.msg),!1):("files"===a.type?(simpleDialog({content:"已上传"}),a.inputId&&$("#"+a.inputId).val(b.imgsrc)):($("#fileSuccess").append(b.html),a.inputId&&$("#"+a.inputId).val(b.attachid)),void rebind())})}else if("planFile"===a.type||"bomFile"===a.type){if(c.error)return alert(c.error),!1;var e={YII_CSRF_TOKEN:zmf.csrfToken,filePath:c.key,fileSize:b.size,type:a.type,planId:a.planId,action:"savePlanFile"};$.post(zmf.ajaxUrl,e,function(b){return b=$.parseJSON(b),1!==b.status?(alert(b.msg),!1):($("#fileSuccess-"+a.type+"-"+a.planId).append(b.html),void rebind())})}else if("tasks"===a.type){if(c.error)return alert(c.error),!1;var e={YII_CSRF_TOKEN:zmf.csrfToken,filePath:c.key,fileSize:b.size,fileName:b.name,type:a.type,taskId:a.taskId,action:"saveTaskFile"};$.post(zmf.ajaxUrl,e,function(b){return b=$.parseJSON(b),1!==b.status?(alert(b.msg),!1):void $("#success"+a.taskId).append(b.html)}),rebind()}else{if(1!==c.status)return alert(c.msg),!1;""!=c.html?$("#fileSuccess").html(c.html):simpleDialog({content:"已上传"}),a.inputId&&$("#"+a.inputId).val(c.attachid),rebind()}}})}function uploadByLimit(a){if("object"!=typeof a)return!1;var b=!0;b="undefined"==typeof a.multi?!0:a.multi,$("#"+a.placeHolder).uploadify({height:a.height?a.height:100,width:a.width?a.width:300,swf:zmf.baseUrl+"/common/uploadify/uploadify.swf",queueID:a.queueID?a.queueID:"singleFileQueue",auto:!0,multi:b,queueSizeLimit:zmf.perAddImgNum,fileObjName:a.filedata?a.filedata:"filedata",fileTypeExts:zmf.allowImgTypes,fileSizeLimit:zmf.allowImgPerSize,fileTypeDesc:"Image Files",uploader:a.uploadUrl,buttonText:a.buttonText?a.buttonText:null===a.buttonText?"":"添加图片",buttonClass:a.buttonClass?a.buttonClass:"btn btn-default",debug:!1,formData:{PHPSESSID:zmf.currentSessionId,YII_CSRF_TOKEN:zmf.csrfToken},onSelect:function(a){},onUploadSuccess:function(b,c,d){c=$.parseJSON(c),1==c.status?(a.inputId&&$("#"+a.inputId).val(c.imgsrc),a.attachInputId&&$("#"+a.attachInputId).val(c.attachid),a.targetHolder&&$("#"+a.targetHolder).attr("src",c.thumbnail)):dialog({msg:c.msg})}})}function dialog(a){if("object"!=typeof a)return!1;var b=a.msg,c=a.id,d=a.title,e=a.action,f=a.actionName,g=a.time,h=a.modalSize;$("#"+beforeModal).modal("hide"),("undefined"==typeof d||""===d)&&(d="提示"),("undefined"==typeof c||""===c)&&(c="myDialog"),"undefined"==typeof e&&(e=""),"undefined"==typeof h&&(h=""),$("#"+c).remove();var i='<div class="modal fade mymodal" id="'+c+'" tabindex="-1" role="dialog" aria-labelledby="'+c+'Label" aria-hidden="true"><div class="modal-dialog '+h+'"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="'+c+'Label">'+d+'</h4></div><div class="modal-body">'+b+'</div><div class="modal-footer">';if(i+='<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>',""!==e&&"undefined"!=typeof e){var j;j=""!==f&&"undefined"!=typeof f?f:"确定",i+='<button type="button" class="btn btn-primary" action="'+e+'" data-loading-text="Loading...">'+j+"</button>"}i+="</div></div></div></div>",$("body").append(i),$("#"+c).modal({backdrop:!1,keyboard:!1}),beforeModal=c,g>0&&"undefined"!=typeof g&&setTimeout("closeDialog('"+c+"')",1e3*g)}function closeDialog(a){a||(a="myDialog"),$("#"+a).modal("hide"),$("#"+a).remove(),$("body").eq(0).removeClass("modal-open")}function simpleDialog(a){if("object"!=typeof a)return!1;var b=a.content;b||(b=a.msg);var c='<div class="simpleDialog" id="simpleDialog">'+b+"</div>";$("body").append(c);var d=$("#simpleDialog"),e=d.outerWidth(),f=d.outerHeight();d.css({"margin-left":-e/2,"margin-top":-f/2}),d.fadeIn(300),clearInterval(simpleDialogInterval),simpleDialogInterval=setTimeout("closeSimpleDialog()",2700)}function closeSimpleDialog(){$("#simpleDialog").fadeOut(100).remove(),clearInterval(simpleDialogInterval)}function simpleLoading(a){if("object"!=typeof a)return!1;var b=a.title,c='<div class="simple-loading-box"><div class="loading-holder"><i class="fa fa-spinner"></i></div><div class="loading-title"><p>'+b+"</p></div></div>";$("body").append(c);var d=$(".simple-loading-box"),e=d.width(),f=d.height();d.css({"margin-left":-e/2,"margin-top":-f/2}),d.fadeIn(300),setTimeout("closeSimpleLoading()",2700)}function closeSimpleLoading(){$(".simple-loading-box").fadeOut(100).remove()}function checkAjax(){return ajaxReturn?(ajaxReturn=!1,!0):(simpleDialog({msg:"请求正在发送中，请稍后"}),!1)}function checkLogin(){return"undefined"==typeof zmf.hasLogin?!1:"true"===zmf.hasLogin?!0:!1}function backToTop(){var a=$(window).width(),b=$(".zazhi-page").width();$("#back-to-top").width();if(b>a)var c=b+8;else var c=parseInt((a+b+16)/2);$("#back-to-top").css("left",c+"px")}function textareaAutoResize(){$("textarea").autoResize({onResize:function(){$(this).css({opacity:.8})},animateCallback:function(){$(this).css({opacity:1})},animateDuration:100,extraSpace:20})}function uuid(a,b){var c,d="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split(""),e=[];if(b=b||d.length,a)for(c=0;a>c;c++)e[c]=d[0|Math.random()*b];else{var f;for(e[8]=e[13]=e[18]=e[23]="-",e[14]="4",c=0;36>c;c++)e[c]||(f=0|16*Math.random(),e[c]=d[19===c?3&f|8:f])}return e.join("")}var tipsImgOrder=0,beforeModal,ajaxReturn=!0,simpleDialogInterval,navTimeout,navTimeover,url=window.location.href;$(window).scroll(function(){$(window).scrollTop()>100?$(".back-to-top").css({display:"block"}):$(".back-to-top").fadeOut()}),$(".back-to-top").click(function(){return $("body,html").animate({scrollTop:0},200),!1}),$(window).resize(function(){backToTop()}),backToTop(),function(a){a.fn.autoResize=function(b){var c=a.extend({onResize:function(){},animate:!0,animateDuration:150,animateCallback:function(){},extraSpace:20,limit:1e3},b);return this.filter("textarea").each(function(){var b=a(this).css({resize:"none","overflow-y":"hidden"}),d=b.height(),e=function(){var c=["height","width","lineHeight","textDecoration","letterSpacing"],d={};return a.each(c,function(a,c){d[c]=b.css(c)}),b.clone().removeAttr("id").removeAttr("name").css({position:"absolute",top:0,left:-9999}).css(d).attr("tabIndex","-1").insertBefore(b)}(),f=null,g=function(){e.height(0).val(a(this).val()).scrollTop(1e4);var g=Math.max(e.scrollTop(),d)+c.extraSpace,h=a(this).add(e);if(f!==g){if(f=g,g>=c.limit)return void a(this).css("overflow-y","");c.onResize.call(this),c.animate&&"block"===b.css("display")?h.stop().animate({height:g},c.animateDuration,c.animateCallback):h.height(g)}};b.unbind(".dynSiz").bind("keyup.dynSiz",g).bind("keydown.dynSiz",g).bind("change.dynSiz",g)}),this}}(jQuery),!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(j.data_attribute))[j.effect](j.effect_speed),b.loaded=!0;var d=a.grep(i,function(a){return!a.loaded});if(i=a(d),j.load){var e=i.length;j.load.call(b,e,j)}}).attr("src",c.data(j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?e.height()+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document),!function(a){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=a();else if("function"==typeof define&&define.amd)define([],a);else{var b;b="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,b.Clipboard=a()}}(function(){return function a(b,c,d){function e(g,h){if(!c[g]){if(!b[g]){var i="function"==typeof require&&require;if(!h&&i)return i(g,!0);if(f)return f(g,!0);var j=new Error("Cannot find module '"+g+"'");throw j.code="MODULE_NOT_FOUND",j}var k=c[g]={exports:{}};b[g][0].call(k.exports,function(a){var c=b[g][1][a];return e(c?c:a)},k,k.exports,a,b,c,d)}return c[g].exports}for(var f="function"==typeof require&&require,g=0;g<d.length;g++)e(d[g]);return e}({1:[function(a,b,c){var d=a("matches-selector");b.exports=function(a,b,c){for(var e=c?a:a.parentNode;e&&e!==document;){if(d(e,b))return e;e=e.parentNode}}},{"matches-selector":2}],2:[function(a,b,c){function d(a,b){if(f)return f.call(a,b);for(var c=a.parentNode.querySelectorAll(b),d=0;d<c.length;++d)if(c[d]==a)return!0;return!1}var e=Element.prototype,f=e.matchesSelector||e.webkitMatchesSelector||e.mozMatchesSelector||e.msMatchesSelector||e.oMatchesSelector;b.exports=d},{}],3:[function(a,b,c){function d(a,b,c,d){var f=e.apply(this,arguments);return a.addEventListener(c,f),{destroy:function(){a.removeEventListener(c,f)}}}function e(a,b,c,d){return function(c){c.delegateTarget=f(c.target,b,!0),c.delegateTarget&&d.call(a,c)}}var f=a("closest");b.exports=d},{closest:1}],4:[function(a,b,c){c.node=function(a){return void 0!==a&&a instanceof HTMLElement&&1===a.nodeType},c.nodeList=function(a){var b=Object.prototype.toString.call(a);return void 0!==a&&("[object NodeList]"===b||"[object HTMLCollection]"===b)&&"length"in a&&(0===a.length||c.node(a[0]))},c.string=function(a){return"string"==typeof a||a instanceof String},c["function"]=function(a){var b=Object.prototype.toString.call(a);return"[object Function]"===b}},{}],5:[function(a,b,c){function d(a,b,c){if(!a&&!b&&!c)throw new Error("Missing required arguments");if(!h.string(b))throw new TypeError("Second argument must be a String");if(!h["function"](c))throw new TypeError("Third argument must be a Function");if(h.node(a))return e(a,b,c);if(h.nodeList(a))return f(a,b,c);if(h.string(a))return g(a,b,c);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function e(a,b,c){return a.addEventListener(b,c),{destroy:function(){a.removeEventListener(b,c)}}}function f(a,b,c){return Array.prototype.forEach.call(a,function(a){a.addEventListener(b,c)}),{destroy:function(){Array.prototype.forEach.call(a,function(a){a.removeEventListener(b,c)})}}}function g(a,b,c){return i(document.body,a,b,c)}var h=a("./is"),i=a("delegate");b.exports=d},{"./is":4,delegate:3}],6:[function(a,b,c){function d(a){var b;if("INPUT"===a.nodeName||"TEXTAREA"===a.nodeName)a.focus(),a.setSelectionRange(0,a.value.length),b=a.value;else{a.hasAttribute("contenteditable")&&a.focus();var c=window.getSelection(),d=document.createRange();d.selectNodeContents(a),c.removeAllRanges(),c.addRange(d),b=c.toString()}return b}b.exports=d},{}],7:[function(a,b,c){function d(){}d.prototype={on:function(a,b,c){var d=this.e||(this.e={});return(d[a]||(d[a]=[])).push({fn:b,ctx:c}),this},once:function(a,b,c){function d(){e.off(a,d),b.apply(c,arguments)}var e=this;return d._=b,this.on(a,d,c)},emit:function(a){var b=[].slice.call(arguments,1),c=((this.e||(this.e={}))[a]||[]).slice(),d=0,e=c.length;for(d;e>d;d++)c[d].fn.apply(c[d].ctx,b);return this},off:function(a,b){var c=this.e||(this.e={}),d=c[a],e=[];if(d&&b)for(var f=0,g=d.length;g>f;f++)d[f].fn!==b&&d[f].fn._!==b&&e.push(d[f]);return e.length?c[a]=e:delete c[a],this}},b.exports=d},{}],8:[function(a,b,c){"use strict";function d(a){return a&&a.__esModule?a:{"default":a}}function e(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}c.__esModule=!0;var f=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),g=a("select"),h=d(g),i=function(){function a(b){e(this,a),this.resolveOptions(b),this.initSelection()}return a.prototype.resolveOptions=function(){var a=arguments.length<=0||void 0===arguments[0]?{}:arguments[0];this.action=a.action,this.emitter=a.emitter,this.target=a.target,this.text=a.text,this.trigger=a.trigger,this.selectedText=""},a.prototype.initSelection=function(){if(this.text&&this.target)throw new Error('Multiple attributes declared, use either "target" or "text"');if(this.text)this.selectFake();else{if(!this.target)throw new Error('Missing required attributes, use either "target" or "text"');this.selectTarget()}},a.prototype.selectFake=function(){var a=this;this.removeFake(),this.fakeHandler=document.body.addEventListener("click",function(){return a.removeFake()}),this.fakeElem=document.createElement("textarea"),this.fakeElem.style.position="absolute",this.fakeElem.style.left="-9999px",this.fakeElem.style.top=(window.pageYOffset||document.documentElement.scrollTop)+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,document.body.appendChild(this.fakeElem),this.selectedText=h["default"](this.fakeElem),this.copyText()},a.prototype.removeFake=function(){this.fakeHandler&&(document.body.removeEventListener("click"),this.fakeHandler=null),this.fakeElem&&(document.body.removeChild(this.fakeElem),this.fakeElem=null)},a.prototype.selectTarget=function(){this.selectedText=h["default"](this.target),this.copyText()},a.prototype.copyText=function(){var a=void 0;try{a=document.execCommand(this.action)}catch(b){a=!1}this.handleResult(a)},a.prototype.handleResult=function(a){a?this.emitter.emit("success",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)}):this.emitter.emit("error",{action:this.action,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})},a.prototype.clearSelection=function(){this.target&&this.target.blur(),window.getSelection().removeAllRanges()},a.prototype.destroy=function(){this.removeFake()},f(a,[{key:"action",set:function(){var a=arguments.length<=0||void 0===arguments[0]?"copy":arguments[0];if(this._action=a,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function(){return this._action}},{key:"target",set:function(a){if(void 0!==a){if(!a||"object"!=typeof a||1!==a.nodeType)throw new Error('Invalid "target" value, use a valid Element');this._target=a}},get:function(){return this._target}}]),a}();c["default"]=i,b.exports=c["default"]},{select:6}],9:[function(a,b,c){"use strict";function d(a){return a&&a.__esModule?a:{"default":a}}function e(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}function g(a,b){var c="data-clipboard-"+a;return b.hasAttribute(c)?b.getAttribute(c):void 0}c.__esModule=!0;var h=a("./clipboard-action"),i=d(h),j=a("tiny-emitter"),k=d(j),l=a("good-listener"),m=d(l),n=function(a){function b(c,d){e(this,b),a.call(this),this.resolveOptions(d),this.listenClick(c)}return f(b,a),b.prototype.resolveOptions=function(){var a=arguments.length<=0||void 0===arguments[0]?{}:arguments[0];this.action="function"==typeof a.action?a.action:this.defaultAction,this.target="function"==typeof a.target?a.target:this.defaultTarget,this.text="function"==typeof a.text?a.text:this.defaultText},b.prototype.listenClick=function(a){var b=this;this.listener=m["default"](a,"click",function(a){return b.onClick(a)})},b.prototype.onClick=function(a){var b=a.delegateTarget||a.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new i["default"]({action:this.action(b),target:this.target(b),text:this.text(b),trigger:b,emitter:this})},b.prototype.defaultAction=function(a){return g("action",a)},b.prototype.defaultTarget=function(a){var b=g("target",a);return b?document.querySelector(b):void 0},b.prototype.defaultText=function(a){return g("text",a)},b.prototype.destroy=function(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)},b}(k["default"]);c["default"]=n,b.exports=c["default"]},{"./clipboard-action":8,"good-listener":5,"tiny-emitter":7}]},{},[9])(9)}),rebind();