<?php
  //*******Ҫ�Ȱ���common.inc.php Ȼ��   session_start(); ����ȡ����session��ֵ
  //*******��Ϊcommon.inc.php �й���session·��������
  include_once dirname(__FILE__).'./../include/common.inc.php';//���������ļ�
  session_start();
  require_once DEDEINC."/arc.partview.class.php";//����partiew��
  //*****ʵ���� �����������ǵõ�ͷ����������β����Ϣ ������Ҫ����ʹ��dedetemplate.class.php �����
  $pv = new PartView();
  if($_POST){
  if( CheckEmail($_POST['mail'])==false){//��֤���� ������common.func.php ���ú���
    ShowMsg('�����ʽ����','-1');
    exit();
  }
  if($_POST['userName']==""){
      ShowMsg('�û�������Ϊ��','-1');
       exit();
  }else{
      $userName=htmlspecialchars($_POST['userName']);
  }
  if($_POST['tel']==""){
      ShowMsg('��ϵ�绰����Ϊ��','-1');
       exit();
  }
  if($_POST['address']==""){
      ShowMsg('��ϵ��ַ����Ϊ��','-1');
       exit();
  }
  if($_SESSION['dd_ckstr']!=strtolower($_POST['validation'])){//��֤ ��֤�� ����ת����Сд
     ShowMsg('��֤�����',-1);
     exit();
  }
  $ordertime=now();
    $sql="insert into `#@__order`(userName,price1,price2,tel,address,userSex,carColor,carname,cartype,mail,ordertime,content) values('$userName','$_POST[price1]','$_POST[price2]','$_POST[tel]','$_POST[address]','$_POST[userSex]','$_POST[carColor]','$_POST[carname]','$_POST[cartype]','$_POST[mail]','$ordertime','$_POST[content]')";
    //********$db��ֱ��ʹ�� ϵͳ�Զ�ʵ������dedesql.class.php
    $affected = $db->ExecuteNoneQuery2($sql);//ִ��һ����� ����Ӱ��ֵ
     if($affected){
         ShowMsg('�����ɹ�',-1);
     }
  }else{
  $pv->SetTemplet(DEDETEMPLATE.'/plus/order.htm');//����ģ��
  $pv->Display();//��ʾҳ��
  }
//Resources from http://����������������
?>