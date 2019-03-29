<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

if(isset($_POST['search_input']))
   $set = $_POST['search_input'];
else if ($_GET['search_input'])
   $set = $_GET['search_input'];


if($set)
{

//先從food_set以name查sid
//再從food_set_photo以sid查符合的資料


//$show = "SELECT * FROM food_set where name = '$set'";
$show = "SELECT * FROM food_set WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$r = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<!-- 上排按鈕 -->
<br>
<div class="center_div">
  <a href="food_set_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增圖片資料</button></a>
  <a href="food_set.php"><button type="button" class="btn btn-warning  col-md-3  ">回到套餐資料表</button></a>
  <a href="food_set_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">回到套餐圖片資料表</button></a>
  <br>
</div>
<br>


<br>
 <table class="table table-warning table-hover">
<thead class="bg-warning">
    <tr>
      <th scope="col" >#</th>
      <th scope="col">food_set_sid</th>
      <th scope="col" >food_set_name</th></th>
      <th scope="col" >file_name</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($r as $ro):?>
<?php
$sid =$ro['sid'];
$show2 = "SELECT * FROM food_set_photo WHERE food_set_sid = $sid";
 $result2 =$pdo->query($show2);
 $rows = $result2->fetchAll(PDO::FETCH_ASSOC); 

?>

  <?php foreach($rows as $row):?>
  <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
      <td><?=$row['food_set_sid']?></td>

   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM food_set WHERE sid=?");
   $stmt2->execute([$row['food_set_sid']]); 
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);

    
   ?>

      <td><?=$user['name']?></td>
      <td><?=$row['file_name']?></td>
     <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt"></i></a></td>   
     <td><a href="food_set_photo_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
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
                location.href = 'cooking_house_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>