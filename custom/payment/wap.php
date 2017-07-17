<?php
error_reporting(0);
$trueprice = isset($_REQUEST['trueprice']) ? $_REQUEST['trueprice'] : 0; 
$title =  isset($_REQUEST['title']) ? $_REQUEST['title'] : '' ; 
$ua = $_SERVER['HTTP_USER_AGENT'];
$fromWeixin=false;
// if (strpos($ua, 'MicroMessenger') !== false) {
//     $fromWeixin=true;
// }
?>
<!DOCTYPE html>
<html>
	<head>
	<title>订单支付</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.2/jquery.min.js"></script>
<style>
    *{margin:0;padding:0}html,body,div,ul,li,p,span,em{margin:0}ul,ol{list-style:none}body{font-family:"Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;background:#f0eff5}.hidden{display:none}#main{width:100%;margin:0 auto;font-size:14px}.red-star{color:red;width:10px;display:inline-block}.null-star{color:#fff}#foot{margin-top:10px;position:absolute;bottom:15px;width:100%}.foot-ul{width:100%}.foot-ul li{width:100%;text-align:center;color:#666}.note-help{color:#999;font-size:12px;line-height:130%;margin-top:5px;width:100%;display:block}#btn-dd{margin:20px;text-align:center}.new-btn-login-sp{padding:1px;display:inline-block;width:75%}.new-btn-login{background-color:#02aaf1;color:#fff;font-weight:bold;border:0;width:100%;height:40px;border-radius:5px;font-size:20px}.foot-ul{width:100%}.one_line{display:block;height:1px;border:0;border-top:1px solid #eee;width:100%;margin-left:20px;margin:5px 0}.am-header{display:-webkit-box;display:-ms-flexbox;display:box;width:100%;position:relative;padding:7px 0;-webkit-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;background:#1d222d;height:50px;text-align:center;-webkit-box-pack:center;-ms-flex-pack:center;box-pack:center;-webkit-box-align:center;-ms-flex-align:center;box-align:center}.am-header h1{-webkit-box-flex:1;-ms-flex:1;box-flex:1;line-height:18px;text-align:center;font-size:18px;font-weight:300;color:#fff}#body{background:#fff;padding:20px 0}.hide{display:none !important}.paymode{background:#fff;margin-top:10px;width:100%;display:block;overflow:hidden}.paymode label{width:100%;margin:5px 0 5px 20px;display:block}.paymode label input{height:60px;line-height:60px;margin-left:10px;overflow:hidden}.paymode label img{width:205px;height:50px}.paymode h2{max-width:100%;background:#f0eff5;padding:15px 0 15px 20px;font-size:1.2em}.paymode h4{max-width:100%;background:#f0eff5;padding:15px 0 15px 20px;cursor:pointer}.footer{display:none;width:100%;text-align:center;background-color:#fff}.footer img{border:0;margin:0;width:100%}.header{width:100%;margin:0 auto;text-align:center;background-color:#fff}.header img{width:100%}.tabs_tit{height:40px;margin:auto;clear:both;margin-left:20px}.tabs_tit li{float:left;padding:5px 10px;cursor:pointer}.tabs_tit li.hover{background:#ff5a00;color:#fff}.on{display:block !important}.miaoshu{width:80%;margin:20px auto;text-align:center}.miaoshu img{width:100%}.jine{width:80%;margin:10px auto;text-align:center;font-size:18px}.jine input{border:0;font-size:26px;color:#ff6500;font-weight:bold;width:75px}.ddid{width:80%;margin:10px auto;text-align:center;font-size:16px;color:#666}.ddid input{border:0;font-size:16px;color:#666}.spname{width:80%;margin:10px auto;text-align:center}.spname input{border:0;font-size:16px;color:#666}.content{margin-top:20px;background:#fff}.content dt{width:100px;display:inline-block;float:left;margin-left:20px;text-align:right;color:#666;font-size:15px;margin-top:8px}.content dd{margin-left:120px;margin-bottom:5px}.content dd input{width:85%;height:28px;border:0;-webkit-border-radius:0;-webkit-appearance:none;font-size:15px}
    .showInWeixin{
    	background:#666;
    	width:100%;
    	height:150px;
    	display:none;
    	position:relative
    }
    .showInWeixin ._tip{
    	color:#fff;
    	font-size:16px;
    	padding-top:35px;
    	padding-left:40px;
    }
    .showInWeixin img{
    	width:60px;
    	height:60px;
    	position:absolute;
    	top:10px;
    	right:10px;	
    }
    .new-btn-login{
    	display:none;
    }
</style>
</head>
<body>
	<div class="showInWeixin" id="showInWeixin">
		<div class="_tip">
			<p>点击右上角菜单</p>
			<p>在默认浏览器中打开并支付</p>
		</div>
		<img src="images/short-arrow.png"/>
	</div>
    <div id="main">
        <form action="<?php if($_GET['pay']!='weixin'){?>alipay_wap/alipayapi.php<?php }else{?>wechat/example/jsapi.php<?php }?>" method=post target="_blank" name="payment" id="payment">
            <div id="body">
                <div class="miaoshu">
                    <img src="images/miaoshu_m.png">
                </div>
                <div class="jine">
                    待付金额：￥<input id="WIDtotal_fee" name="WIDtotal_fee" value="<?php echo $trueprice; ?>" readonly="ture"/>
                </div>
                <div class="ddid">
                    订单编号：<input id="WIDout_trade_no" name="WIDout_trade_no" readonly="ture" />
                </div>
                <div class="spname">
                    <input id="WIDsubject" name="WIDsubject" value="<?php  echo iconv('GBK','UTF-8',$title); ?>" readonly="ture"/>
                </div>
                <dl class="content">
                        <input id="WIDbody" name="WIDbody" value="【定金】" hidden="" readonly="ture" />
                    <dt>姓名：</dt>
                    <dd>
                        <input type="text" name="WIDname" placeholder="请输入您的姓名" style="border:1px solid #ccc">
                    </dd>
                    <div style="height:10px;"></div>
                    <dt>手机：</dt>
                    <dd>
                        <input type="text" name="WIDmobile" placeholder="请输入手机号" style="border:1px solid #ccc">
                    </dd>
                </dl>
            </div>
            <div class="paymode">
                <h2>选择支付方式</h2>
                <?php if($_GET['pay']!='weixin'){?>
				<label><img src="images/alipay_m.png"><input type="radio" name="pingtai" class="hide" value="alipay_pc/alipayapi.php" checked="checked" onclick="getValue()"></label>
                <?php }else{?>
                    <label><img src="images/wechat_m.png"><input type="radio" name="pingtai" class="hide" value="wechat/example/jsapi.php" onclick="getValue()"></label>
                    <?php }?>
			</div>
            <div class="paymode hide">
                <h4>更多支付方式</h4>
                <div class="hide">
                    
                </div>
            </div>
            <div id="btn-dd">
                <span class="new-btn-login-sp">
                    <button class="new-btn-login" type="submit" style="text-align:center;" id="submit-btn">确 认</button>
                </span>
            </div>
		</form>
    </div>
    <script type="text/html"></script>
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
	var fromWeixin=<?php echo $fromWeixin ? 'true' : 'false';?>;
function getValue(){
    var form = document.getElementById("payment");
    var radio = document.getElementsByName("pingtai");
    if (radio[1].checked) {
        form.method="get";
    }else{
        form.method="post";
    }
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
        document.getElementById("WIDout_trade_no").value = '1' + sYue + sMiao + sYeah + sHaomiao + sDay + '01';
    }
	GetDateNow();
</script>
<script type="text/javascript">
    $(document).ready(function() {
    	$('#submit-btn').show();
        $(".tab li").click(function() {
            var i = $(this).index();
            $(this).parent().find("li").removeClass("hover");
            $(this).addClass("hover");
            $(this).parent().parent().parent().find(".tabCon").removeClass("on");
            $(this).parent().parent().parent().find(".tabCon").eq(i).addClass("on");
        });
        $(".paymode h4").click(function(){
            if($(this).parent().find("div").hasClass("hide")){
                $(this).parent().find("div").removeClass("hide");
            }else{
                $(this).parent().find("div").addClass("hide");
            }
        });
        
        var oform = $('#payment');
        oform.submit(function () {
            var pingtai=$('#payment input[name="pingtai"]:checked ').val();
            if(pingtai=='alipay_pc/alipayapi.php'){
            	if(fromWeixin){
            		$("body,html").animate({
				        scrollTop: 0
				    }, 200);
            		$('#showInWeixin').slideDown();
            		return false;
            	}
            }else{
            	$('#showInWeixin').hide();
            }
            return true;
        });
        
    });
</script>
</html>