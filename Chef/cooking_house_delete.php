<?php
require __DIR__.'/connect.php';

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $result = $pdo->query("DELETE FROM `cooking_house` WHERE `sid`='$id'");
    if($result) echo "Delete success";


} else { 

    echo "GET NOT SET";

 }
 header('Location: cooking_house.php');
 ?>


