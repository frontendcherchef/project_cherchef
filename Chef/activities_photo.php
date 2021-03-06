<?php 
require __DIR__ . '/connect.php';

$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/act_photo/';

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM activities_photo";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM activities_photo ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>
<br>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb cyan lighten-4">
      <li class="breadcrumb-item"  ><a class="" style="color:skyblue;" href="index.php">Home</a></li>
      <li class="breadcrumb-item"  ><a class="" style="color:skyblue;" href="activities.php">活動資料表</a></li>
      <li class="breadcrumb-item active" style="color:orange;">活動圖片資料表</li>
    </ol>
  </nav>

<div class="form_data_font_style"><?= '總共' . $total_rows . '筆資料' ?></div>
<div class="form_data_font_style"><?= '總共' . $total_pages . '頁' ?></div>

<!-- 頁數切換 -->
<div class="col-md-4 center_div">
    <nav aria-label="...">
        <ul class="pagination pagination-sm">

            <li class="page-item">
                <a class="page-link" href="?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span></a>
            </li>

            <li class="page-item <?= $page <= 1 ? 'disable' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link bg-warning border-warning"  href="?page=<?= $i ?>"><?= $i ?></a>
                </span>
            </li>
            <?php endfor ?>

            <li class="page-item <?= $page >= $total_pages ? 'disable' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
            </li>

            <li class="page-item">
                <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>

        </ul>
    </nav>
    <!--  -->
</div>


<!-- 上排按鈕 -->
<div class="center_div">
    <a href="activities_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增資料</button></a>

    <br>
</div>
<br>
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
                    <td>   <img style="width:100px" src="../Chef_pic/act_photo/<?= $row['file_name'] ?>">  </td>
                    <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name'] ?>')"><i class="fas fa-trash-alt"></i></a></td>
                    <td><a href="activities_photo_data_edit.php?sid=<?= $row['sid'] ?>" ><i class="fas fa-edit"></i></a></td>


               
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
</div>
        <script>
            function delete_it(sid, file_name) {
                if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
                    location.href = 'activities_photo_delete.php?sid=' + sid + '&file_name=' + file_name;
                }
            }
        </script>
        <?php include __DIR__ . '/_html_footer.php';  ?> 