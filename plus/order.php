<?php
  //*******要先包含common.inc.php 然后   session_start(); 否则取不到session的值
  //*******因为common.inc.php 有关于session路径的配置
  include_once dirname(__FILE__).'./../include/common.inc.php';//包含配置文件
  session_start();
  require_once DEDEINC."/arc.partview.class.php";//包含partiew类
  //*****实例化 这个类的作用是得到头部导航栏和尾部信息 若不需要可以使用dedetemplate.class.php 这个类
  $pv = new PartView();
  if($_POST){
  if( CheckEmail($_POST['mail'])==false){//验证邮箱 方法在common.func.php 公用函数
    ShowMsg('邮箱格式错误','-1');
    exit();
  }
  if($_POST['userName']==""){
      ShowMsg('用户名不能为空','-1');
       exit();
  }else{
      $userName=htmlspecialchars($_POST['userName']);
  }
  if($_POST['tel']==""){
      ShowMsg('联系电话不能为空','-1');
       exit();
  }
  if($_POST['address']==""){
      ShowMsg('联系地址不能为空','-1');
       exit();
  }
  if($_SESSION['dd_ckstr']!=strtolower($_POST['validation'])){//验证 验证码 必须转换成小写
     ShowMsg('验证码错误',-1);
     exit();
  }
  $ordertime=now();
    $sql="insert into `#@__order`(userName,price1,price2,tel,address,userSex,carColor,carname,cartype,mail,ordertime,content) values('$userName','$_POST[price1]','$_POST[price2]','$_POST[tel]','$_POST[address]','$_POST[userSex]','$_POST[carColor]','$_POST[carname]','$_POST[cartype]','$_POST[mail]','$ordertime','$_POST[content]')";
    //********$db可直接使用 系统自动实例化了dedesql.class.php
    $affected = $db->ExecuteNoneQuery2($sql);//执行一条语句 返回影响值
     if($affected){
         ShowMsg('订购成功',-1);
     }
  }else{
  $pv->SetTemplet(DEDETEMPLATE.'/plus/order.htm');//设置模板
  $pv->Display();//显示页面
  }
//Resources from http://ｄｏｗｎ．ｌｉｅｈｕｏ．ｎｅｔ
?>