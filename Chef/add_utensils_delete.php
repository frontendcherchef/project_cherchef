<?php
require __DIR__.'/connect.php';?>


<?php

if(isset($_GET['sid'])) 
{
    $id = trim($_GET['sid']);
    $result = $pdo->query("DELETE FROM `add_utensils` WHERE `sid`='$id'");
    if($result) echo "Delete success";


} else { 

    echo "GET NOT SET";

 }
 header('Location: add_utensils.php');
 ?>
