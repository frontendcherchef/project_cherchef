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

//先從sooking_house以name查sid
//再從cooking_house_photo以sid查符合的資料


//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM add_utensils WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$r = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<!-- 上排按鈕 -->
<br>
<div class="center_div">
    <a href="add_utensils_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增餐具圖片資料</button></a>
    <a href="add_utensils.php"><button type="button" class="btn btn-warning  col-md-3  ">回到餐具資料表</button></a>
    <a href="add_utensils_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">回到餐具圖片資料表</button></a>
<br>
</div>
<br>

<br>
 <table class="table table-striped table-bordered">
<thead>
<div class="container">
          <tr>
            <th scope="col" >#</th>
            <th scope="col">餐具sid</th>
            <th scope="col" >圖片路徑</th>
            <th scope="col"><i class="fas fa-trash-alt"></i></th>
            <th scope="col"><i class="fas fa-edit"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($r as $ro):?>
      <?php
      $sid =$ro['sid'];
      $show2 = "SELECT * FROM add_utensils_photo WHERE add_utensils_sid = $sid";
      $result2 =$pdo->query($show2);
      $rows = $result2->fetchAll(PDO::FETCH_ASSOC); 

      ?>

        <?php foreach($rows as $row):?>
        <tr class="form_data_font_style">

            <td><?=$row['sid']?></td>
            <td><?=$row['add_utensils_sid']?></td>

        <?php
        
        $stmt2 = $pdo->prepare("SELECT * FROM add_utensils WHERE sid=?");
        $stmt2->execute([$row['add_utensils_sid']]); 
        $user = $stmt2->fetch(PDO::FETCH_ASSOC);

          
        ?>

            <td><?=$row['file_name']?></td>
          <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt text-dark"></i></a></td>   
          <td><a href="add_utensils_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit text-dark"></i></a></td>   
        </tr>
      <?php endforeach; ?>

      <?php endforeach; ?>
      </tbody>
      </table> 
      <br>




      <?php
      }
      ?>

</div>

<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'add_utensils_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>