<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM add_utensils where name = '$set'";
$show = "SELECT * FROM add_utensils WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col">#</th>
        <th scope="col">會員編號</th>
        <th scope="col">產品名稱</th>
        <th scope="col">租借金額</th>
        <div col-md-6>
        <th scope="col">購買金額</th>
        <th scope="col">訂購數量</th>
        <th scope="col">詳細資訊</th>
        <th scope="col">產品特色</th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>
        </div>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
    <td>
        <a href="add_utensils_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit text-dark"></i></a>
    </td>
    
        <td><?=$row['sid']?></td>
        <td><?=$row['clients']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['rent']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['quantity']?></td>
        <td><?=$row['details']?></td>     
        <td><?=nl2br($row['intro'])?></td>
        <td>
            <a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class=" fas fa-trash-alt text-dark"></i></a>
        </td>   

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
                location.href = 'add_utensils_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>