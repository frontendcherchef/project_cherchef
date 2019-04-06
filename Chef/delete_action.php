<?php
include_once("db_connect.php");
if(isset($_POST['sid'])) {
$id = trim($_POST['sid']);
$sql = "DELETE FROM add_utensils WHERE id in ($id)"
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
echo $id;
}
?>