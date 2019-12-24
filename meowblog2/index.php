<?php
/*主界面*/
/*基本的配置文件*/
include('config.php');

/*从数据库setting中读取pagenum来定义一个分页的显示博客数量*/
$pageNum = $setting['pagenum'];

/*获取数据库博客的数据总量*/
$sql = "select count(*) AS total from page";
$total = $db->query($sql)->fetch_array(MYSQLI_ASSOC)['total'];
/*分页的页码总数*/
$maxPage = ceil($total / $pageNum);


/*获得当前page的参数*/
@$page = (int)$input->get('page');
if(!$page) $page = 1;

$page = $page < 1 ? 1 : $page;


/*当前页码的偏移量*/
$offset = ($page - 1) * $pageNum;

/*从数据库读取最新pageNum条的博客标题和内容*/
/*取出当前数据库列表中的信息并为实现分页效果*/
$sql = "select * from page order by pid desc limit {$offset},{$pageNum}";
$result = $db->query($sql);

$blogs=array();
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $blogs[]=$row;
}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <script src="js/jquery-3.3.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>热烈庆祝新中国成立70周年</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>

<!-- 图片轮播 -->
<div id="carousel-example-generic" class="carousel slide" 	data-wrap = true data-interval = "2000" data-ride="carousel"style="height:100%;background-color: white;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height: 680px;margin-left: 10%;text-align: center;">
        <div class="item active meow_item1">
            <img src="img/ic_p4.jpg" width="900px" height="900px">
            <p class="carousel-caption meow_item2">
               		新中国成立70周年发声亮剑	
            </p>
        </div>
        <div class="item meow_item1" >
            <img src="img/ic_p5.jpg">
            <p class="carousel-caption meow_item2">
                		中国70年发展历程
            </p>
        </div>
        <div class="item meow_item1">
            <img src="img/ic_p6.jpg">
            <p class="carousel-caption meow_item2">
                中国经济增长的过去与未来——庆祝新中国成立70周年
            </p>
        </div>
        <div class="item meow_item1">
            <img src="img/ic_p7.jpg">
            <p class="carousel-caption meow_item2">
                齐心协力，共同奋斗！
            </p>
        </div>
        <div class="item meow_item1">
            <img src="img/ic_p8.jpg">
            <p class="carousel-caption meow_item2">
                中华民族一家亲！
            </p>
        </div>
        <div class="item meow_item1">
            <img src="img/ic_p9.jpg">
            <p class="carousel-caption meow_item2">
                共创繁荣祖国
            </p>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container div_divider">

    <!-- <hr class="hr_1"><hr class="hr_2">       -->
    <div class="jumbotron meow_item3">
        <h2><?php echo $setting['title'];?></h2>
        <p class="meow_item4"><?php echo $setting['intro'];?> ​​​​</p>
    </div>

    <!-- <hr class="hr_1"><hr class="hr_2">        -->

    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="index.php">Home</a></li>
        <li role="presentation"><a href="index.php">Articles</a></li>
        <li role="presentation"><a href="about.php">About</a></li>
<!--        <a type="button" class="btn btn-success"></a>-->
        <!-- <small class="pull-right"><a class='btn btn-success' href="./admin/login.php">Sign In</a></small> -->
        <div class="container">
  <!-- 按钮：用于打开模态框 -->
   
  <!-- 模态框 -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <!-- 模态框头部 -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">登录界面</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <!-- 模态框主体 -->
        <div class="modal-body">
           <form method="post" action="do_login.php" >
            <div class="form-group">
              <label for="email">账号:</label>
              <input  class="form-control" name="uid" placeholder="Enter id">
            </div>
            <div class="form-group">
              <label for="pwd">密码:</label>
              <input type="password" class="form-control" name="pwd" placeholder="Enter password">
            </div>
            <input type="submit" >
           </form>
        </div>
      </div>
    </div>
  </div>
  
    <div class="modal fade" id="myModa2">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <!-- 模态框头部 -->
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;">注册界面</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <!-- 模态框主体 -->
        <div class="modal-body">
           <form method="post" action="./admin /register.php" >
            <div class="form-group">
              <label for="email">用户名:</label>
              <input  class="form-control" name="ausername" placeholder="Enter id">
            </div>
            <div class="form-group">
              <label for="pwd">密码:</label>
              <input type="password" class="form-control" name="apassword" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label for="pwd">请再次输入密码:</label>
              <input type="password" class="form-control" name="aconfirmpassword" placeholder="Enter password">
            </div>
            <input type="submit" >
           </form>
        </div>
      </div>
    </div>
  </div>
</div>
    </ul>


    <div class="row">
<!--         文章列表 185js DOM -->
        <div class="col-xs-9">

            <div class="list-group div_article">
                <h4 class="list-group-item-heading list-group-item active item_article_first" id="id1" onmouseover="document.getElementById('id1').style.color='pink'" onmouseout="document.getElementById('id1').style.color='white'" style="font-family: YouYuan;">
                    文章列表
                </h4>
                <?php foreach($blogs as $blog):?>
                <!-- 文章 -->
                <div class="list-group-item item_article">
                    <div class="row">
                        <div class="div_center col-xs-9" style="font-family: YouYuan;">
                            <div class="list-group-item-heading div_article_title">
                                <a href="read.php?pid=<?php echo $blog['pid'];?>">
                                    <?php echo $blog['title'];?>
                                </a>
                            </div>
                                <p class="list-group-item-text div_article_content">
                                    <?php echo mb_substr(strip_tags($blog['content']),0,80);?>
                                </p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

        </div>
        <!-- 右侧 -->
        <div class="col-xs-3 div_record">
            <!-- 用户信息 -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 10px;margin-right: 60px">
   Sign In
  </button>|
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModa2" style="margin-bottom: 10px;margin-left: 50px">
   Regist
  </button>
            <div class="jumbotron div_userinfo">
                <img class="iv_user_head img-circle" src="img/ic_p10.jpg" id="pic">
                <div style="display: inline-block; margin-left: 12px;font-size: 18px;">Admin</div>
            </div>

            <hr>
            <!-- 小功能列表 -->
            <div class="row div_little_func">
                <div class="col-xs-4">
                    <button class="btn btn-default btn-cricle" id="h">欢</button>
                </div>
                <div class="col-xs-4">
                    <button class="btn btn-default btn-cricle " id="y">迎</button>
                </div>
                <div class="col-xs-4">
                    <button class="btn btn-default btn-cricle " id="n">你</button>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href='#' aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php
            $hrefTpl = "<li><a href='index.php?page=%d'>%s</a></li>";
            for ($i = 1; $i <= $maxPage; $i++) {
                echo sprintf($hrefTpl, $i, "第{$i}页");
            }
            ?>
            <li>
                <a href='#' aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script type="text/javascript">
    $(document).ready(function(){
  $("#h ").mouseover(function(){
    $("#h").css("border-color","red");
  });
});
        $(document).ready(function(){
  $("#h ").mouseout(function(){
    $("#h").css("border-color","lightgray");
  });
});//jq
            $(document).ready(function(){
  $("#y ").mouseover(function(){
    $("#y").css("border-color","yellow");
  });
});
        $(document).ready(function(){
  $("#y ").mouseout(function(){
    $("#y").css("border-color","lightgray");
  });
});//jq
            $(document).ready(function(){
  $("#n").mouseover(function(){
    $("#n").css("border-color","blue");
  });
});
        $(document).ready(function(){
  $("#n").mouseout(function(){
    $("#n").css("border-color","lightgray");
  });
});//jq
            $(document).ready(function(){
  $("#pic").mouseover(function(){
    $("#pic").css("transform","rotate(180deg)");
  });
});
         $(document).ready(function(){
  $("#pic").mouseout(function(){
    $("#pic").css("transform","rotate(360deg)");
  });
});
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/init.js" type="text/script"></script>
<script src="js/util.js"></script>
</body>
</html>