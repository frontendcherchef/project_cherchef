<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php
if (isset($_POST['search_input'])){
    $set = $_POST['search_input'];
} elseif ($_GET['search_input']){
    $set = $_GET['search_input'];
}

if($set)
{

//先從sooking_house以name查sid
//再從cooking_house_photo以sid查符合的資料


//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM clients WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$r = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>




 <table class="table table-striped table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">用戶ID</th>
      <th scope="col">姓名</th>
      <th scope="col">圖片</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($r as $ro):?>
<?php
$sid =$ro['sid'];
$show2 = "SELECT * FROM clients_profile_pics WHERE clients_sid = $sid";
 $result2 =$pdo->query($show2);
 $rows = $result2->fetchAll(PDO::FETCH_ASSOC); 

?>

  <?php foreach($rows as $row):?>
  <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
      <td><?=$row['clients_sid']?></td>

   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM clients WHERE sid=?");
   $stmt2->execute([$row['clients_sid']]);
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);

   ?>

      <td><?=$user['name']?></td>
      <td><?=$row['file_name']?></td>
     <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt"></i></a></td>
     <td><a href="clients_profile_pic_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
    </tr>
<?php endforeach; ?>

<?php endforeach; ?>
</tbody>
</table> 
<br>

<?php
}
?>



<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'clients_profile_pic_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>