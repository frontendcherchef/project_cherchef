<?php
require __DIR__.'/connect.php';

if(isset($_GET['sid'])) 
{
    $id = intval($_GET['sid']);
    $result = $pdo->query("DELETE FROM `food_set_meal` WHERE `sid`='$id'");
    if($result) echo "Delete success";

} else { 

    echo "GET NOT SET";

}
header('Location: '. $_SERVER['HTTP_REFERER']);
?>