<?php 
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];
  
  //造连接对象
  $db = new MySQLi("localhost","root","","blog");
  
  //写SQL语句
  //SQL注入攻击
 
 $sql = "select * from admin where ausername='{$uid}' ";
 
 
 //执行SQL语句
  $reslut = $db->query($sql); 
 $n = $reslut->fetch_row();

 if($uid!="" && $pwd !="" )
 {
     if($n[2]==$pwd)
     {		session_start();
			       $_SESSION['uid']=$uid;
         header("location:./admin/transit.php");
										
			
		
     }
		  
     else
     {
         echo "用户名或密码错误！";
     }
 }
 else
 {
     echo "用户名密码不能为空";
 }
 ?>