<?php
require __DIR__.'/connect.php';?>

<?php

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $result = $pdo->query("DELETE FROM `member` WHERE `sid`='$id'");
    if($result) echo "Delete success";


} else { 

    echo "GET NOT SET";

 }
 header('Location: member.php');
 ?>


