<?php
require __DIR__.'/connect.php';?>

<?php

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $file_name =$_GET['file_name'];
   // $upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/client_photo/';
    //$path = $upload_dir.$file_name;
    $path = 'C:/xampp/htdocs/Chef/pic/profile_pic/'.$file_name;

    echo $path;
    $result = $pdo->query("DELETE FROM `clients_kitchen_pics` WHERE `sid`='$id'");
    
    unlink($path);
    if($result) echo "Delete success";

} else { 

    echo "GET NOT SET";

 }
 header('Location: '. $_SERVER['HTTP_REFERER']);