
<?php
    include('../config.php');
    session_start();
  ?>
<!--后台管理员登录之后的界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<title>管理员登录</title>
	<?php include(PATH . '/header.inc.php');?>  <!--所有的页面都需加载这个文件></!-->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
        <script type="text/javascript">
$(document).ready(function(){
    $("#div2").hover(function(){
        $("#index-form").load("blog.php");
    });
});//js DOM和jq
$(document).ready(function(){
    $("#div3").hover(function(){
        $("#index-form").load("auser.php");
    });
});//js DOM和jq
$(document).ready(function(){
    $("#div4").hover(function(){
        $("#index-form").load("setting.php");
    });
});//js DOM和jq
$(document).ready(function(){
    $("#div5").hover(function(){
        $("#index-form").load("up.php");
    });
});//js DOM和jq
</script>
    <div>
     <!--管理员登录页面的标题部分></!-->
     <!--后台管理界面的上方标题></!-->
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">
                <!--              <img src="../img/ic_p12.png">-->
                Admin
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li><a href="#" id="div2">文章管理 <span class="sr-only">(current)</span></a></li>
                <li><a href="#" id="div3">用户管理</a></li>
                <li><a href="#" id="div4">系统管理</a></li>
                <li><a href="#" id="div5">文件上传</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> <?php echo $_SESSION['uid']; ?> <span class="caret"></span></a>
                    <!--输出此时登录的账户名></!-->
                    <ul class="dropdown-menu">
                        <li><a href="logout.php">退出</a></li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>

    <div align="center" id="index-form">
        <img src="../img/ic_p12.png" class="img-circle">
        <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-user">
            </span>用户:<?php echo $_SESSION['uid']; ?> 你已进入管理员界面~ 
        </button>
    </div>
    </div>
</body>
</html>