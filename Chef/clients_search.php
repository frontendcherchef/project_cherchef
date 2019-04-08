<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM clients WHERE name LIKE '%$set%'";
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
        <th scope="col">Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Birthday</th>
        <th scope="col">Address</th>
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
          <th><?= $row['name'] ?></th>
          <th><?= $row['mobile'] ?></th>
          <th><?= $row['email'] ?></th>
          <th><?= $row['birthday'] ?></th>
          <th><?= $row['address'] ?></th>
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