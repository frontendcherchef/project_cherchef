<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM restaurant where name = '$set'";
$show = "SELECT * FROM restaurant WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<table class="table table-striped table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Open Time</th>
      <div col-md-6>
      <th scope="col">Web</th>
      <th scope="col">Intro</th>
      <th scope="col">Food Style</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
      </div>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
    <td><?=$row['sid']?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['phone']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['open_time']?></td>
      <td><?=$row['web']?></td>
      <td><?=$row['intro']?></td>
      <td><?=$row['food_style']?></td>
      <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>   
      <td><a href="restaurant_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
    </tr>
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
                location.href = 'restaurant_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>