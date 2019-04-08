<?php
require __DIR__.'/connect.php';?>


<?php

if(isset($_POST['sid'])) 
{
    //explode 函數的功能是用來切割字串，透過設定好的切割點，將字串切割為多個部份並儲存為 PHP Array 陣列
    $check = explode( "," , $_POST['sid']);
    foreach($check as $value){
       //  echo $value;
       $pdo->query("DELETE FROM add_utensils WHERE `sid`='$value'");
    
    }
    // delete單筆資料
    // $id = intval($_POST['sid']);
    // $result = $pdo->query("DELETE FROM `add_utensils` WHERE `sid`='$id'");
    // if($result) echo "Delete success";

    echo $_POST['sid'];
    return;

} else { 

    echo "GET NOT SET";
    return;
 }
 header('Location: '. $_SERVER['HTTP_REFERER']);
 ?>


