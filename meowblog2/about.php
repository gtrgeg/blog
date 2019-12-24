<?php
/**
 * Created by PhpStorm.
 * User: 汪喵
 * Date: 2019/6/3
 * Time: 15:42
 */
?>

<?php
/*阅读的具体链接*/
/*包含基本的配置文件*/
include('config.php');
/*强制转换传来的文章pid*/
$pid = (int)$input->get('pid');
/*pid小于1 无效文章*/
//if($pid<1){
//    die('无效文章');
//}
$sql = "select * from page where pid='{$pid}' ";
$blog = $db->query($sql)->fetch_array(MYSQLI_ASSOC);
?>

<!--阅读界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $setting['title']; ?></title>
    <!--    --><?php //include(PATH . '/header.inc.php');?><!--  <!--所有的页面都需加载这个文件></!-->
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
    <div class="page-header"
    ">
    <h2><a href="index.php"><?php echo $setting['title']; ?></a></h2>
    <p><?php echo $setting['intro']; ?></p>
</div>
<!--导航条></!-->
<div style="margin-bottom: 20px">
    <ul class="nav nav-pills">
        <li role="presentation"><a href="index.php">Home</a></li>
        <li role="presentation"><a href="index.php">Articles</a></li>
        <li role="presentation" class="active"><a href="index.php">About</a></li>
    </ul>
</div>
<hr class="hr_1">

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-info">
            <div class="panel-heading" id="test" style="text-indent:0em;visibility: visible;letter-spacing: 1px">
                
            </div>
            <div class="panel-body " style="font-family: YouYuan;opacity: 0.8">
                <img src="img/ic_p10.jpg" style="height: 100px;width: 100px">
                <h2 style="text-shadow: 5px 5px 5px #FF0000;">身份证</h2>
                <p>
                    昵称：WangMeow <br>
                    性别：男 <br>
                    年龄：98后 <br>
                    学校：XX大学 <br>
                    介绍：计算机科学与技术专业在读，热爱编程，热爱美食。<br>
                    兴趣：编程、做菜。<br>
                    邮箱：XXXXXXX@163.com <br>
                </p>
                <h2 style="text-shadow: 5px 5px 5px #FF0000;">现状</h2>
                <p>
                    没事的时候敲一敲代码~<br>
                    <br>
                    <img src="img/ic_p11.jpg" style="height: 350px;width: 600px">
                </p>
            </div>
        </div>

    </div>

</div>
</div>
<script type="text/javascript">
    document.getElementById('test').innerHTML="关于admin";//js DOM
    document.getElementById('test').style.opacity=0.5;//js DOM
</script>
</body>
</html>
