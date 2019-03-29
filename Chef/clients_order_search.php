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
//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM clients_order WHERE clients LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<div class="container pt-3">
<table class="table table-striped table-bordered">
<thead>
    <tr>

        <th scope="col">#</th>
        <th scope="col">訂購者姓名</th>
        <th scope="col">預約廚師</th>
        <th scope="col">套餐名</th>
        <th scope="col">廚師上門</th>
        <th scope="col">第三方空間</th>
        <th scope="col">人數</th>
        <th scope="col">訂購日期</th>
        <th scope="col">訂購時間</th>
        <th scope="col">總價</th>
        <th scope="col">
            Edit <i class="far fa-edit"></i>
        </th>
        <th scope="col">
            Delete <i class="far fa-trash-alt"></i>
        </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($rows as $row) : ?>
      <tr>
          <th><?= $row['sid'] ?></th>
          <th><?= $row['clients'] ?></a></th>
          <th><?= $row['chef'] ?></th>
          <th><?= $row['food_set'] ?></th>
          <th><?= $row['clients_house'] ?></th>
          <th><?= $row['cooking_house'] ?></th>
          <th><?= $row['people_num'] ?></th>
          <th><?= $row['order_date'] ?></th>
          <th><?= $row['order_time'] ?></th>
          <th><?= $row['total_price'] ?></th>
          <td>
              <a href="clients_edit.php?sid=<?= $row['sid'] ?>"><i class="far fa-edit"></i></a>
          </td>
          <th>
              <a href="javascript:delete_data(<?= $row['sid'] ?>)">
                  <i class="far fa-trash-alt"></i>
              </a>
          </th>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>




<?php
}
?>



<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'clients_delete1.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>