<?php
// 允许上传的图片后缀
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名

    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
//        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
  //      echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    //    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      //  echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("../upfiles/" . $_FILES["file"]["name"]))
        {
            echo "<script>alert('文件已经存在。');history.back();</script>";
	   //echo "<a href='http://lovey0u.cn/ljn/web/viewer.html?file=mypdf/ 

".$_FILES["file"]["name"]."'>查看链接</a>";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
          // echo $_FILES["file"]["name"]."<br>";echo "web/mypdf/" . $_FILES["file"]["name"];
	    if(move_uploaded_file($_FILES["file"]["tmp_name"], "../upfiles/" . $_FILES["file"]["name"])){


echo "<script>alert('上传成功');history.back();</script>";
//echo "<a href='http://lovey0u.cn/ljn/web/viewer.html?file=mypdf/ 

".$_FILES["file"]["name"]."'>查看链接</a>";

}
else echo "上传失败";
        
        //    echo "文件存储在: " . "../upfiles/" . $_FILES["file"]["name"];
        }
    }
?>
