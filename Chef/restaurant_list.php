<?php
require __DIR__ . '/connect.php';
$page_name = 'restaurant';

header("Content-Type:text/html; charset=utf-8");

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//抓圖片
$p_sql = "SELECT * FROM `restaurant` LEFT JOIN `restaurant_photo` ON `restaurant`.`sid`=`restaurant_photo`.`restaurant_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

//抓food_style的sid跟名字配對
$t_sql = "SELECT * FROM `food_style` ORDER BY `food_style`.`sid`";
$t_stmt = $pdo->query($t_sql);
$all_food_style = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

//算總比數
$t_sql = "SELECT COUNT(1) FROM `restaurant`";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM `restaurant` ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>
<br>
<div class="container">
    <div class="form_data_font_style"><?= '總共' . $total_rows . '筆資料' ?></div>
    <div class="form_data_font_style"><?= '總共' . $total_pages . '頁' ?></div>

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
                        <a class="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor ?>

                <li class="page-item <?= $page >= $total_pages ? 'disable' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

    <!-- 上排按鈕 -->
    <div class="center_div">
        <a href="restaurant_data_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增資料</button></a>
        <a href="restaurant_test_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增一筆測試資料</button></a>
        <a href="restaurant_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">管理圖片</button></a>
        <br>
    </div>
    <br>

    <!-- Search -->

    <form name="form1" action="restaurant_data_search.php" method="post">
        <div class="form-group " style="border:1px solid skyblue">
            <label for="search_input">&nbsp搜尋:</label>
            <div class="col-md-3 inline_block">
                <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="餐廳名稱">
            </div>
            <div class="col-md-3 inline_block">
                <button type="submit" class="btn btn-warning col-md-3">Enter</button></div>

        </div>
        <form>
            <!--  -->

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">餐廳名稱</th>
                        <th scope="col">電話</th>
                        <th scope="col">地址</th>
                        <th scope="col">營業時間</th>
                        <div col-md-6>
                            <th scope="col">網址</th>
                            <th scope="col">餐廳簡介</th>
                            <th scope="col">料理風格</th>
                            <th scope="col">刪除資料</th>
                            <th scope="col">編輯資料</th>
                            <th scope="col">圖片瀏覽</th>
                            <th scope="col">圖片編輯</th>

                        </div>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr class="form_data_font_style">
                            <td><?= $row['sid'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['open_time'] ?></td>
                            <td><?= $row['web'] ?></td>
                            <td><?= $row['intro'] ?></td>
                            <td>
                                <!-- 利用迴圈加條件判別，當輸入編號==料理風格sid時，echo料理風格name -->
                                <?php $cooking_food_styles = explode(",", $row['food_style']);
                                foreach ($cooking_food_styles as $cooking_food_style) :
                                    foreach ($all_food_style as $food_style) :
                                        if ($cooking_food_style == $food_style['sid']) :
                                            echo $food_style['name'] . "," ?>
                                        <?php endif;
                                    endforeach;
                                endforeach; ?>
                            </td>
                            <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><a href="restaurant_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                 <ul class="list-unstyled preview">
                                    <?php
                                    foreach ($all_pics as $pic) :
                                        if ($row['sid'] == $pic['restaurant_sid']) : ?>
                                        
                                            <li style = "margin:6px; width:72px; height:72px;">
                                                <a href="../Chef_pic/restaurant_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?= $pic['restaurant_sid'] ?>" style ="cursor: zoom-in;">
                                                    <!-- 掛的是原本一次顯示一張圖的光箱，有需要換光箱的話再改 -->
                                                    <img src="../Chef_pic/restaurant_photo/<?= $pic['file_name'] ?>" alt="" style = "width:100%; height:100%; object-fit:cover;">
                                                </a>
                                            </li>
                                        <?php endif;
                                    endforeach
                                    ?>
                                 </ul>
                            </td>
                            <td><a href="restaurant_photo_search.php?search_input=<?= $row['name'] ?>&restaurant_sid=<?= $row['sid'] ?>"><i class="fas fa-images"></i></a></td>


                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
</div>
<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            location.href = 'restaurant_delete.php?sid=' + sid;
        }
    }

    $("ul.preview li").on({
        mouseenter: function(){
            console.log("img here");
            $(this).css("filter", "brightness(55%)")
        },
        mouseleave: function(){
            // console.log("img here");
            $(this).css("filter", "brightness(100%)")
        }
    });


</script>
<?php include __DIR__ . '/_html_footer.php';  ?>