<?php
/*
后台管理员登录之后php控制端
 */ 	
	include ('check.php');
?>

<!--后台管理员登录之后的界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<title>管理员登录</title>
	<?php include(PATH . '/header.inc.php');?>  <!--所有的页面都需加载这个文件></!-->
</head>
<body>
    <div> <!--管理员登录页面的标题部分></!-->
    <div align="center">
        <form action="up1.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="upfile" id="file">
    <input type="submit" name="submit" value="提交">
</form>
    </div>
    </div>
</body>
</html>