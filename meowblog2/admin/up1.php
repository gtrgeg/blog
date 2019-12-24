
<?php
// 创建连接

// var_dump($_FILES);
if(move_uploaded_file($_FILES['upfile']['tmp_name'],'../img/'.$_FILES['upfile']['name'])){
echo '上传成功！'; 
// var_dump('./img/'.$_FILES['upfile']['name']);
}

// 检测连接

?>
