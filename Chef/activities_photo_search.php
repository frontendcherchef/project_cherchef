<?php
require __DIR__ . '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php
if(isset($_POST['search_input']))
$set = $_POST['search_input'];
else if ($_GET['search_input'])
$set = $_GET['search_input'];
if ($set) {

        //先從activities以name查sid
        //再從activities_photo以sid查符合的資料


        //$show = "SELECT * FROM activities where name = '$set'";
        $show = "SELECT * FROM activities WHERE name LIKE '%$set%'";
        $result = $pdo->query($show);
        $r = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>
<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>


<div class="container">

<table class="table table-warning table-hover">
    <thead class="bg-warning">
        <tr>
            <th scope="col">#</th>
            <th scope="col">活動id</th>
            <th scope="col">活動名稱</th>
            </th>
            <th scope="col">file_name</th>
            <th scope="col">刪除</th>
            <th scope="col">編輯</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($r as $ro) : ?>
        <?php
        $sid = $ro['sid'];
        $show2 = "SELECT * FROM activities_photo WHERE activities_sid = $sid";
        $result2 = $pdo->query($show2);
        $rows = $result2->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style">
            <td><?= $row['sid'] ?></td>
            <td><?= $row['activities_sid'] ?></td>

            <?php

            $stmt2 = $pdo->prepare("SELECT * FROM activities WHERE sid=?");
            $stmt2->execute([$row['activities_sid']]);
            $user = $stmt2->fetch(PDO::FETCH_ASSOC);


            ?>

            <td><?= $user['name'] ?></td>
            <td><?= $row['file_name'] ?></td>
            <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name'] ?>')"><i class="fas fa-trash-alt"></i></a></td>
            <td><a href="activities_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
        <?php endforeach; ?>

        <?php endforeach; ?>
    </tbody>
</table>
<br>


</div>

<?php

}
?>



<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            location.href = 'activities_delete.php?sid=' + sid;
        }
    }
</script>

<?php include __DIR__ . '/_html_footer.php' ?> 