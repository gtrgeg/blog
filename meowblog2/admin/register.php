<?php
	/*包含一个配置文件*/
	include('../config.php');
		/*获取用户页面注册传来的用户名和密码数据*/
		$ausername=$_POST['ausername'];
		$apassword=$_POST['apassword'];
		$aconfirmpassword=$_POST['aconfirmpassword'];
		/*注册时的处理*/
		if($apassword!=$aconfirmpassword){
			echo "前后两次输入的密码不一致";
			exit;
		}
		/*将用户填入的数据插入到数据库的sql语句*/
		$sql="INSERT INTO admin(`ausername`,`apassword`) values('$ausername','$apassword')";
		/*提交sql语句到数据库处理*/
		$is=$db->query($sql);
		/*判断是否注册成功*/
		if($is){
			echo "<script>alert('注册成功');</script>";
			header("Location:../index.php");

		}else{
			echo "<script>alert('注册失败');</script>";
		}
	


?>




</body>

</html>
