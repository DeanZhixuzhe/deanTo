<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>确认支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if (res.err_msg == "get_brand_wcpay_request:ok") {
					alert("支付成功");
					window.location.href = "result.php?result=success";
				}else{
					alert("支付失败");
					window.location.href = "result.php?result=fail";
				}
				// alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<style type="text/css">
		body{background: #F5F5F5; width: 99%; height: 99%;}
		div,p,h1,h2,h3,h4,h5,h6,ul,li,button{margin:0;}
		.title{width: 100%; text-align: center; font-size: 18px;}
		.jine{width: 100%; font-weight: bold; text-align: center; font-size: 40px;}
		.maijia{width: 100%; font-size: 14px; background: #fff; height: 50px; line-height: 50px; margin-top: 10px; border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee;}
		.maijia h4{float: left; color: #898787; margin-left: 20px; height: 46px; line-height: 46px; font-weight: normal;}
		.maijia p{float: right; margin-right: 20px; height: 46px; line-height: 46px;}
		.queren{width: 100%; margin-top: 20px; text-align: center;}
		.queren span{ border-radius: 5px; background: #0eb00e; border: 0;cursor: pointer;color: #fff; font-size: 16px; margin: auto; width: 94%; height: 46px; line-height: 46px; overflow: hidden; display: block;}
		.footer{width: 100%; text-align: center; position: absolute; bottom: 10px; color: #BBBBBB; font-size: 0.8em}
	</style>
</head>
<body>
	<div class="title"><?php echo $subject; ?></div>
	<div class="jine">￥<?php echo $total_fee; ?>.00</div>
    <div class="maijia"><h4>收款方</h4><p>TheOne浪漫策划公司</p></div>
	<div class="queren">
		<span onclick="callpay()" >立即支付</span>
	</div>
	<div class="footer">支付安全由中国人民财产保险股份有限公司承保</div>
</body>
</html>