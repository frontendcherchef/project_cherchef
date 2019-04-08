<?php
require __DIR__ . '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if ($set) {
    //$show = "SELECT * FROM cooking_house where name = '$set'";
    $show = "SELECT * FROM activities WHERE name LIKE '%$set%'";
    $result = $pdo->query($show);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>

<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>

<br>
<div class="container">

<table class="table table-warning table-hover">
    <thead class="bg-warning">
        <tr>
            <th scope="col">#</th>
            <th scope="col">活動名稱</th>
            <th scope="col">帶領廚師</th>
            <th scope="col">地點</th>
            <th scope="col">時間</th>
            <div col-md-6>
                <th scope="col">活動長度</th>
                <th scope="col">價格</th>
                <th scope="col">內容</th>
                <th scope="col">細節</th>
                <th scope="col">人數上限</th>
                <th scope="col">刪除</th>
                <th scope="col">編輯</th>
            </div>
        </tr>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style">
            <td><?=$row['sid']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['chef']?></td>
            <td><?=$row['places']?></td>
            <td><?=$row['time']?></td>
            <td><?=$row['duration']?></td>
            <td><?=$row['price']?></td>
            <td><?=$row['content']?></td>
            <td><?=$row['details']?></td>
            <td><?=$row['u_limit']?></td>
            <!-- <td><a href="cooking_house_delete.php?sid=<?= $row['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>    -->
            <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>
            <td><a href="activities_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
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
            location.href = 'activities_data_delete.php?sid=' + sid;
        }
    }
</script>

<?php include __DIR__ . '/_html_footer.php' ?> 