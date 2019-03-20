<?php
require __DIR__.'/connect.php';?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<?php

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $file_name =$_GET['file_name'];
   // $upload_dir = 'C:/xampp/htdocs/test/Chef_pic/test/';
    //$path = $upload_dir.$file_name;
    
    //合併時註解此行 
    $path = 'C:/xampp/htdocs/project_cherchef/chef_pic/test/'.$file_name;
    
    //合併時取消註解
    // $path = 'C:/xampp/htdocs/test/Chef_pic/test/'.$file_name;

    echo $path;
    $result = $pdo->query("DELETE FROM `chef_photo` WHERE `sid`='$id'");
    
    unlink($path);
    if($result) echo "Delete success";

} else { 

    echo "GET NOT SET";

 }
 header('Location: '. $_SERVER['HTTP_REFERER']);