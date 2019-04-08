<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM chef where name = '$set'";
$show = "SELECT * FROM chef WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<table class="table-sm table-warning table-hover ">
    <thead class="bg-warning">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Mobile</th>
            <th scope="col">Birthday</th>
            <!-- <th scope="col">Pic</th> -->
            <th scope="col">Title</th>
            <th scope="col">Information</th>
            <th scope="col">Experience</th>
            <th scope="col">Area</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Own Kitchen</th>
            <th scope="col">Tool</th>
            <th scope="col">Note</th>
            <div col-md-6>              
                <th scope="col">刪除</th>
                <th scope="col">編輯</th>
            </div>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style">
            <td><?= $row['sid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['mobile'] ?></td>
            <td><?= $row['birthday'] ?></td>
			<!-- <td><?= $row['pic'] ?></td> -->
            <td><?= $row['title'] ?></td>
            <td><?= mb_strimwidth($row['info'],0, 100, "...", "UTF-8"); ?></td>
            <td><?= mb_strimwidth($row['experience'],0, 100, "...", "UTF-8");  ?></td>
            <td><?= $row['area'] ?></td>
			<td><?= $row['restaurant'] ?></td>
            <td><?= $row['own_kitchen'] ?></td>
            <td><?= $row['tool'] ?></td>
            <td><?= mb_strimwidth($row['note'],0, 20, "...", "UTF-8");  ?></td>
    
            <!-- <td><a href="chef_delete.php?sid=<?= $row['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>    -->
            <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>
            <td><a href="chef_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
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
                location.href = 'chef_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>