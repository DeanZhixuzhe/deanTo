<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>收银台</title>
<script type="text/javascript">
function browserRedirect() {
        var sUserAgent = navigator.userAgent.toLowerCase();
        var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
        var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
        var bIsMidp = sUserAgent.match(/midp/i) == "midp";
        var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4"; 
        var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
        var bIsAndroid = sUserAgent.match(/android/i) == "android";
        var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce"; 
        var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
        if ((bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) )
        {                      
            window.location.href='wap.php';
        }             
}             
browserRedirect();
</script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://img.jb51.net/jslib/jquery/jquery.autogrow.js"></script> -->
<!-- <script type="text/javascript">
	$(function(){
		$("#total_fee").autogrow();
	})
</script> -->
</head>

<style>
	html,body {width:100%;min-width:1200px;height:auto;padding:0;margin:0;font-family:"微软雅黑";background-color:#ffffff;}
	li{list-style: none;}em{font-style: normal;}
	*{margin: 0;}
	.container {
		width:100%;
		min-width:100px;
		height:auto
	}
	.black {
		background-color:#242736
	}
	.blue {
		background-color:#0ae
	}
	.qrcode {
		width:1200px;
		margin:0 auto;
		height:30px;
		background-color:#242736
	}
	.littlecode {
		width:16px;
		height:16px;
		margin-top:6px;
		cursor:pointer;
		float:right
	}
	.showqrs {
		top:30px;
		position:absolute;
		width:100px;
		margin-left:-65px;
		height:160px;
		display:none
	}
	.shtoparrow {
		width:0;
		height:0;
		margin-left:65px;
		border-left:8px solid transparent;
		border-right:8px solid transparent;
		border-bottom:8px solid #e7e8eb;
		margin-bottom:0;
		font-size:0;
		line-height:0
	}
	.guanzhuqr {
		text-align:center;
		background-color:#e7e8eb;
		border:1px solid #e7e8eb
	}
	.guanzhuqr img {
		margin-top:10px;
		width:80px
	}
	.shmsg {
		margin-left:10px;
		width:80px;
		height:16px;
		line-height:16px;
		font-size:12px;
		color:#242323;
		text-align:center
	}
	.nav {
		width:1200px;
		margin:0 auto;
		height:70px;
	}
	.open,.logo {
		display:block;
		float:left;
		height:40px;
		width:85px;
		margin-top:20px
	}
	.divier {
		display:block;
		float:left;
		margin-left:20px;
		margin-right:20px;
		margin-top:23px;
		width:1px;
		height:24px;
		background-color:#d3d3d3
	}
	.open {
		line-height:30px;
		font-size:20px;
		text-decoration:none;
		color:#1a1a1a
	}
	.title {
		width:1200px;
		margin:0 auto;
		height:80px;
		line-height:80px;
		font-size:20px;
		color:#FFF
	}
	
	
	.element {
		width:600px;
		height:50px;
		margin-left:100px;
		font-size:20px
	}
	.etitle,.einput {
		float:left;
		height:26px
	}
	.etitle {
		width:150px;
		line-height:26px;
		text-align:right
	}
	.einput {
		width:200px;
		margin-left:20px
	}
	.einput input {
		width:398px;
		height:24px;
		border:0;
		font-size:16px
	}
	.mark {
        margin-top: 10px;
        width:500px;
        height:30px;
        margin-left:80px;
        line-height:30px;
        font-size:12px;
        color:#999
    }
	.legend {
		margin-left:100px;
		font-size:24px
	}
	.alisubmit {width:270px;height:40px;border:0;background-color:#ff5a00;font-size:16px;color:#FFF;cursor:pointer;margin-left:20px; margin-top: 5px;}
	.header {width:820px; height:80px;margin:auto;background-color:#fff;overflow: hidden;}
	.header .logo{width: 180px; height: 100px; margin: 0;}
	.footer { display: none;width:100%;text-align: center;}
	.footer img{border: 0;margin: 0;}
	.content {margin: 10px 0;width:100%; height:480px;background-color:#ecedf2;}
	.alipayform {width:820px;margin: auto; height: 500px; /*border: 1px solid #e8e7e7; padding: 20px;*/}
	.hide{display: none !important;}
	.paymode{width: 100%; padding: 10px; text-align: center;}
	.paymode label{cursor: pointer; height: 40px; line-height: 40px; margin-right: 10px;}
	.paymode label img{border: 1px solid #eae9e9; padding: 3px; width: 100px; height: 30px;}
	.paymode label input{height: 40px; line-height: 40px; margin-right: 5px; overflow: hidden; cursor: pointer;}
	.paymode label:hover img{border: 1px solid #ff6500;}
	.tabs_tit{width: 820px; height: 40px; margin: auto; clear: both;}
	.tabs_tit li{float: left; padding: 5px; cursor: pointer;}
	.tabs_tit li.hover{background: #ff5a00; color: #fff;}
	.on{display: block !important;}
	.miaoshu{width: 800px;height: 80px; margin: auto; overflow: hidden;}
	.miaoshu .m1{height: 40px; line-height: 40px; font-weight: bold; font-size: 16px; overflow: hidden;}
	.miaoshu .m1 p{float: left;}
	.miaoshu .m1 p input{width: 180px; background: #ecedf2; font-weight: bold; font-size: 14px; border: 0}
	.miaoshu .m1 span{float: right; font-weight: normal;}
	.miaoshu .m1 span input{color:#ff0000; border: 0; font-size: 14px; min-width: 30px; width: auto; max-width: 60px; background: #ecedf2;}
	.miaoshu .m2{height: 30px; line-height: 30px; font-size: 14px; overflow: hidden; color: #666;}
	.miaoshu .m2 p em{color: #4a86e8;}
	.info{background: url(images/bj.png) no-repeat; width: 820px; height: 285px; margin: auto; clear: both;}
	.info .ipt{float: left; margin-left: 410px; margin-top: 45px; width: 315px; height: 210px;}
	.info_con{width: 310px; height: 40px; font-size: 20px;}
	.ictitle,.icinput{float: left; height: 26px;}
	.ictitle {width:60px;line-height:26px;text-align:right}
	.icinput {width:200px;margin-left:20px}
	.icinput input {width:220px;height:24px;border:0;font-size:16px}
	.paymode_more{width: 750px; background: #fff; margin-top: 10px; margin-left: 5px;}
	.paymode_more h4{height: 30px; line-height: 30px; font-size: 16px; margin-left: 10px; cursor: pointer;}
	.paymode_more label{cursor: pointer; height: 40px; line-height: 40px; margin: 0 10px;}
	.paymode_more label img{border: 1px solid #eae9e9; padding: 3px; width: 100px; height: 30px;}
	.paymode_more label input{height: 40px; line-height: 40px; margin-right: 5px; overflow: hidden; cursor: pointer;}
	.paymode_more label:hover img{border: 1px solid #ff6500;}
</style>
<body>
	<div class="header">
		<img src="images/logo.png" class="logo">
	</div>
	<div class="content">
	<form action="alipay_pc/alipayapi.php" class="alipayform" method="post" target="_blank" name="payment" id="payment">
		<div class="miaoshu">
			<div class="m1"><p>订单提交成功，请您尽快付款！订单号：<input type="text" name="WIDout_trade_no" id="out_trade_no" readonly="ture"></p><span>应付金额&nbsp;￥<input type="text" name="WIDtotal_fee" id="total_fee" value="<?php $trueprice = $_POST['trueprice']; echo $trueprice; ?>" readonly="ture"></span></div>
			<div class="m2"><p>由于预定客户较多，为了避免档期和人员安排冲突，请您在15分钟内完成支付！<em><img src="images/bao.png">在线支付保障</em>请您放心购买。</p><span></span></div>
			<input type="text" name="WIDsubject" value="<?php $title = $_POST['title']; echo iconv('GBK','UTF-8',$title); ?>" hidden readonly="ture">
		</div>
		<div class="info">
			<div class="ipt">
				<div class="info_con">
					<div class="ictitle">姓名:</div>
					<div class="icinput"><input type="text" name="WIDname" placeholder="请输入您的姓名" style="border:1px solid #ccc"></div>
				</div>
				<div class="info_con">
					<div class="ictitle">手机:</div>
					<div class="icinput"><input type="text" name="WIDmobile" placeholder="请输入手机号" style="border:1px solid #ccc"></div>
				</div>
				<div class="paymode">
					<label><input type="radio" name="pingtai" value="alipay_pc/alipayapi.php" checked="checked" onclick="getValue()"><img src="images/alipay.png"></label>
				</div>
				<div class="isubmit">
					<input type="submit" class="alisubmit" value ="确认支付">
				</div>
			</div>
		</div>
		<div class="paymode_more">
			<h4>更多支付方式</h4>
			<div class="hide">
			<label><input type="radio" name="pingtai" value="wechat/example/native.php" onclick="getValue()"><img src="images/wechat.png"></label>
			<label class="hide"><input type="radio" name="pingtai" value="tenpay" onclick="getValue()"><img src="images/tenpay.png"></label>
			</div>
		</div>
		<div class="element hide">
			<div class="etitle">商品详情:</div>
			<div class="einput"><input type="text" name="WIDbody" value="【定金】" readonly="ture"></div>
		</div>
		
	</form>
	</div>
	<div class="tabs_tit">
		<ul class="tab">
			<li class="hover">求婚支付</li>
			<li>活动支付</li>
		</ul>
	</div>
	<div class="footer tabCon on">
		<img src="images/qiuhunpay_02.png">
		<img src="images/qiuhunpay_03.png">
		<img src="images/qiuhunpay_04.png">
		<img src="images/qiuhunpay_05.png">
		<img src="images/qiuhunpay_06.png">
		<img src="images/qiuhunpay_07.png">
	</div>
	<div class="footer tabCon">
		<img src="images/huodongpay_02.png">
		<img src="images/huodongpay_03.png">
		<img src="images/huodongpay_04.png">
		<img src="images/huodongpay_05.png">
		<img src="images/huodongpay_06.png">
		<img src="images/huodongpay_07.png">
	</div>
</body>
<script type="text/javascript">
function getValue(){
    var form = document.getElementById("payment");
    var radio = document.getElementsByName("pingtai");  
    for (i=0; i<radio.length; i++) {
        if (radio[i].checked) {
            form.action = radio[i].value;
        }
    }
}
</script>
<script language="javascript">
	function GetDateNow() {
		var vNow = new Date();
		var sNow = "";
		var sYeah = String(vNow.getFullYear());
		var sYue = String(vNow.getMonth() + 1);
		var sDay = String(vNow.getDate());
		var sShi = String(vNow.getHours());
		var sFen = String(vNow.getMinutes());
		var sMiao = String(vNow.getSeconds());
		var sHaomiao = String(vNow.getMilliseconds());
		sNow = sYeah + sYue + sDay + sShi + sFen + sMiao + sHaomiao;
		document.getElementById("out_trade_no").value = '1' + sYue + sMiao + sYeah + sHaomiao + sDay + '01';
	}
	GetDateNow();
</script>
<script type="text/javascript">
	$(document).ready(function() {
    	$(".tab li").click(function() {
        	var i = $(this).index();
        	$(this).parent().find("li").removeClass("hover");
        	$(this).addClass("hover");
        	$(this).parent().parent().parent().find(".tabCon").removeClass("on");
        	$(this).parent().parent().parent().find(".tabCon").eq(i).addClass("on");
    	});
    	$(".paymode_more h4").click(function(){
    		if($(this).parent().find("div").hasClass("hide")){
    			$(this).parent().find("div").removeClass("hide");
    		}else{
    			$(this).parent().find("div").addClass("hide");
    		}
    	});
    });
</script>
</html>