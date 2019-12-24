<?php
/*阅读的具体链接*/
/*包含基本的配置文件*/
include('config.php');
/*强制转换传来的文章pid*/
$pid = (int)$input->get('pid');
/*pid小于1 无效文章*/
if ($pid < 1) {
    die('无效文章');
}
$sql = "select * from page where pid='{$pid}' ";
$blog = $db->query($sql)->fetch_array(MYSQLI_ASSOC);
?>

<!--阅读界面<>/!-->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title><?php echo $setting['title']; ?></title>
    <!--	--><?php //include(PATH . '/header.inc.php');?><!--  <!--所有的页面都需加载这个文件></!-->
    <meta charset="uf-8">
    <!--引入了一个css文件，这里css文件是bootstrap里面的css文件></!-->
    <link rel="stylesheet" href="./theme/bootstrap/css/bootstrap.css">

    <!--加载jquery这个文件，bootstrap需要依赖于这个jquery文件></!-->
    <script src="./theme/js/jquery-3.2.1.min.js"></script>

    <!--引入一个script文件，这里script文件是bootstrap里面的script文件></!-->
    <script src="./theme/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class='container'>
    <div class="page-header"">
    <h2><a href="index.php"><?php echo $setting['title']; ?></a></h2>
    <p><?php echo $setting['intro']; ?></p>
</div>

<div style="margin-bottom: 20px">
    <ul class="nav nav-pills"> <!--导航条-->
        <li role="presentation"><a href="index.php">Home</a></li>
        <li role="presentation" class="active"><a href="index.php">Articles</a></li>
        <li role="presentation"><a href="about.php">About</a></li>
    </ul>
</div>
<hr class="hr_1">

<div class="row">
    <div class="col-md-9">

        <div class="panel panel-info">
            <div class="panel-heading" style="text-indent:0em;">
                <span>Title:<?php echo $blog['title']; ?></span>
                <span style="margin-left: 500px">Time:<?php echo $blog['uptime']; ?></span>
            </div>
            <div class="panel-body" style="font-family: YouYuan;">

                <?php echo $blog['content']; ?>

            </div>
        </div>

    </div>

    <div class="col-md-3">

        <div class="panel panel-info">
            <div class="panel-heading">作者简介：<?php echo $blog['author']; ?></div>
            <div class="panel-body">
                <div style="text-indent:2em;">Admin，一只普通大学生，Meow~ Meow~</div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>