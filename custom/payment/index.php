<?php
$title = $_POST['title'];
$litpic = $_POST['litpic'];
$trueprice = $_POST['trueprice'];
$discounts = isset($_POST['discounts'])?$_POST['discounts']:'';
if (empty($discounts)) {
	$discountsCon = "";
}else{
	$discountsCon = "<h4>现在购买您可享受以下优惠</h4>";
	$discountsCon .= "<p>$discounts</p>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>TheOne浪漫策划收银台 - TheOne浪漫策划公司</title>
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
	body{overflow: hidden;}
	
	.cl{clear: both;}
	.isubmit{width: 100%; padding: 10px;}
	.alisubmit {width:270px;height:40px;line-height:40px; border:0;background-color:#FA6B69;font-size:16px;color:#FFF;cursor:pointer;margin-left:40px; margin-top: 5px; font-weight: bold;}
	.alisubmit:hover{background: #FF504D;}
	.header {width:820px; height:60px;margin:auto;background-color:#fff;overflow: hidden;}
	.header .logo{width: 120px; height: 50px; margin: 5px 0; float: left;}
	.header h2{font-size: 18px; color:#2E2E2E; float: left; width: 100px; height: 20px; line-height: 20px; margin: 20px 0 20px 10px;display: block;}

	.footer {width:100%;text-align: center; padding: 10px;}
	.footer img{border: 0;margin: 0;}
	.footer hr{width: 800px; margin: 10px auto; border :1px solid #EBEBEB; }
	.content {margin: 0;width:100%; height:auto;background-color:#ecedf2; padding-bottom: 10px; overflow: hidden;}
	.payform {width:820px;margin: auto; height: auto; /*border: 1px solid #e8e7e7; padding: 20px;*/}
	.hide{display: none !important;}
	.paymode{width: 100%; padding: 10px; text-align: left;}
	.paymode label{cursor: pointer; height: 40px; line-height: 40px; display: block; margin-right: 30px;  margin-bottom: 10px; position: relative;}
	.paymode label input{height: 40px; line-height: 40px; margin-right: 5px; overflow: hidden; cursor: pointer;}
	.paymode label img{width: 30px; height: 30px; margin: 5px 10px;}
	.paymode label span{height: 16px; line-height: 16px; position: absolute; top: 12px}
	.paymode label:hover span{color: #ff0000;}
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
	.miaoshu .m2 p strong{font-weight: normal; color: #ff0000;}
	.shopcon{width: 100%; padding: 10px; overflow: hidden;}
	.shopcon img{float: left; width: 160px;height: 160px; margin-right: 20px;}
	.shopcon .ri{float: left; width: 600px;}
	.shopcon h2{font-size: 18px; font-weight: bold;}
	.shopcon .shopyh{margin: 15px 0}
	.shopcon .shopyh h4{margin-left: 0;}
	.shopcon .shopyh p{line-height: 28px;}
	.shopcon p{line-height: 20px; font-size: 14px;}
	.shopcon p strong{font-weight: normal; color: #ff0000}
	.mok{width: 100%; background: #fff; height: auto; clear: both; margin-bottom: 10px;}
	.mok h4{height: 30px; line-height: 30px; font-size: 16px; margin-left: 10px; }

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
		<img src="http://www.1314theone.com/static/images/Logo_0101.png" class="logo">
		<h2>收银台</h2>
	</div>
	<div class="content">
	<form action="alipay_pc/alipayapi.php" class="payform" method="post" target="_blank" name="payment" id="payment">
		<div class="miaoshu">
			<div class="m1"><p>订单提交成功，请您尽快付款！订单号：<input type="text" name="WIDout_trade_no" id="out_trade_no" readonly="ture"></p><span>应付金额&nbsp;￥<input type="text" name="WIDtotal_fee" id="total_fee" value="<?php echo $trueprice; ?>" readonly="ture"></span></div>
			<div class="m2"><p>由于预定客户较多，为了避免档期和人员安排冲突，请您在<strong>15分钟</strong>内完成支付！<em><img src="images/bao.png">在线支付保障</em></p><span></span></div>
			<input type="text" name="WIDsubject" value="<?php echo $title; ?>" hidden readonly="ture">
		</div>
		<div class="mok">
			<h4>商品信息</h4>
			<div class="shopcon">
				<img src="<?php echo $litpic; ?>">
				<div class="ri">
					<h2><?php echo $title; ?></h2>
					<div class="shopyh"><?php echo $discountsCon; ?></div>
					<!-- <p>应付金额<strong><?php echo $trueprice; ?></strong>元</p> -->
				</div>
			</div>
		</div>
		<div class="mok">
			<h4>选择支付方式</h4>
			<div class="paymode">
				<label><input type="radio" name="pingtai" value="alipay_pc/alipayapi.php" checked="checked" onclick="getValue()"><img src="images/payaliicon.png"><span>支付宝支付</span></label>
				<label><input type="radio" name="pingtai" value="wechat/example/native.php" onclick="getValue()"><img src="images/paywechaticon.png"><span>微信支付</span></label>
				<label class="hide"><input type="radio" name="pingtai" value="tenpay" onclick="getValue()"><img src="images/tenpay.png"></label>
			</div>
			<div class="isubmit">
				<input type="submit" class="alisubmit" value ="确认支付">
			</div>
		</div>

		<div class="element hide">
			<div class="etitle">商品信息:</div>
			<div class="einput"><input type="text" name="WIDbody" value="" readonly="ture"></div>
		</div>
	</form>
	</div>
	<div class="footer">
		<p>Copyright &copy; 2017 TheOne 1314THEONE.com 版权所有</p>
		<hr>
		<img src="images/IASErdnJnLbiMvSoxkaQ.png">
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