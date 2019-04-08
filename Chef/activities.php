<?php 
require __DIR__ . '/connect.php';
$page_name = 'activities';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


//抓全部照片
$p_sql = "SELECT * FROM `activities` LEFT JOIN `activities_photo` ON `activities`.`sid`=`activities_photo`.`activities_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

//算總比數
$t_sql = "SELECT COUNT(1) FROM activities";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM activities ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
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
      <li class="breadcrumb-item active" style="color:orange;">活動資料表</li>
    </ol>
  </nav>
<div class="form_data_font_style"><?= '總共' . $total_rows . '筆資料' ?></div>
<div class="form_data_font_style"><?= '總共' . $total_pages . '頁' ?></div>

<div class="col-md-4 center_div">
    <nav aria-label="...">
        <ul class="pagination pagination-sm">

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

        </ul>
    </nav>
</div>

<!-- 上排按鈕 -->
<div class="center_div">
    <a href="activities_data_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增資料</button></a>
    <a href="activities_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增一筆測試資料</button></a>
    <a href="activities_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">管理圖片</button></a>
    <br>
</div>
<br>

<!-- Search -->

<form name="form1" action="activities_data_search.php" method="post">
    <div class="form-group " style="border:1px solid skyorange">
        <label for="search_input">&nbsp搜尋:</label>
        <div class="col-md-3 inline_block">
            <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="活動名稱">
        </div>
        <div class="col-md-3 inline_block">
            <button type="submit" class="btn btn-warning col-md-3">Enter</button></div>

    </div>
    <form>

        <!-- -->



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
                        <th scope="col">照片瀏覽</th>
                        <th scope="col">照片編輯</th>
                    </div>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                <tr class="form_data_font_style">
                    <td><?= $row['sid'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['chef'] ?></td>
                    <td><?= $row['places'] ?></td>
                    <td><?= $row['time'] ?></td>
                    <td><?= $row['duration'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['content'] ?></td>
                    <td><?= $row['details'] ?></td>
                    <td><?= $row['u_limit'] ?></td>

                    <!-- <td><a href="activities_delete.php?sid=<?= $row['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>    -->
                    <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>

                    <td><a href="activities_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
                    <!-- 照片瀏覽與刪除欄位 -->
                    <!-- 光箱   -->
                    <td>
                    <ul class="list-unstyled preview">
                                    <?php
                                    foreach ($all_pics as $pic) :
                                        if ($row['sid'] == $pic['activities_sid']) : ?>
                                        
                                            <li style = "margin:6px; width:72px; height:72px;">
                                                <a href="../Chef_pic/act_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?= $pic['restaurant_sid'] ?>" style ="cursor: zoom-in;">
                                                    <!-- 掛的是原本一次顯示一張圖的光箱，有需要換光箱的話再改 -->
                                                    <img src="../Chef_pic/act_photo/<?= $pic['file_name'] ?>" alt="" style = "width:100%; height:100%; object-fit:cover;">
                                                </a>
                                            </li>
                                        <?php endif;
                                    endforeach
                                    ?>
                                 </ul>
      </td>
                    <td><a href="activities_photo_search.php?search_input=<?= $row['name'] ?>&activities_sid=<?= $row['sid'] ?>"><i class="fas fa-images"></i></a></td>


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
                        </div>
        <script>
            function delete_it(sid) {
                if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
                    location.href = 'activities_delete.php?sid=' + sid;
                }
            }
        </script>


        <?php include __DIR__ . '/_html_footer.php';  ?> 