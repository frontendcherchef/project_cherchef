<?php
    require __DIR__. '/_cred.php';
    require __DIR__. '/connect.php';
    $page_name = 'data_food_set';

    // $per_page = 10;
    // $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $p_sql = "SELECT * FROM food_set_photo";
    $p_stmt = $pdo->query($p_sql);
    $all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

    $t_sql = "SELECT * FROM food_style";
    $t_stmt = $pdo->query($t_sql);
    $all_styles = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

    // 算總筆數
    $t_sql = "SELECT COUNT(1) FROM food_set";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

    // 總頁數
    // $total_pages = ceil($total_rows/$per_page);

    // if($page < 1) $page = 1;
    // if($page > $total_pages) $page = $total_pages;

    // ORDER BY sid DESC LIMIT 表示排序為降冪, 升冪要刪除 DESC
    // $sql = sprintf("SELECT a.sid, a.name, b.name c, a.food_style, a.food_set_price, a.food_set_content FROM food_set a INNER JOIN chef b ON a.chef = b.sid ORDER BY sid DESC LIMIT %s, %s", ($page-1)*$per_page, $per_page);
    $sql = sprintf("SELECT a.sid, a.name, b.name c, a.food_style, a.food_set_price, a.food_set_content FROM food_set a INNER JOIN chef b ON a.chef = b.sid ORDER BY sid DESC LIMIT %s, %s", 1, $total_rows);
    $stmt = $pdo->query($sql);
    // $stmt = $pdo->query("SELECT * FROM address_book"); 此為取全部

    // 所有資料一次拿出來
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
<div class="container pt-3">
    <h5 class="mb-2" style="color:#e29346">套餐資料表</h5>
    <!-- <div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div> -->
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <!-- <form class="form-inline d-flex" name="form1" action="<?=$page_name ?>_search.php" method="post">
            <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋名稱">
            <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button>
            </form> -->
            <!-- -->
            <!-- <nav class="d-flex mb-2">
                <ul class="pagination pagination-sm mb-0 mr-auto align-items-center">
                    <li class="page-item <?= $page<=1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">&lt;</a>
                    </li>
                    <?php for($i=1; $i<=$total_pages; $i++): ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                        <a class="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page>=$total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">&gt;</a>
                    </li>
                </ul>
            </nav> -->
            <div class="float-right mb-2">
                <a href="data_food_set_photo.php"><button type="button" class="btn btn-warning mr-2">管理圖片</button></a>
                <a href="data_food_set_insert.php"><button type="button" class="btn btn-warning">新增資料表</button></a>
            </div>
            <div class="buttons-toolbar mb-2">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive card-list-table">
            <table class="table table-warning table-hover"
             data-locale="zh-TW"
             data-toggle="table"
             data-pagination="true"
             data-page-list="[10, 25, 50, 100, 200, All]"
             data-sort-order="desc"
             data-search="true"
             data-search-align="left"
             data-pagination-pre-text="上一頁"
             data-pagination-next-text="下一頁"
             data-buttons-class="warning"
             data-buttons-toolbar=".buttons-toolbar"
            >
                <thead class="bg-warning text-nowrap">
                <tr>
                    <th scope="col" data-sortable="true">#</th>
                    <th scope="col" data-sortable="true">套餐名稱</th>
                    <th scope="col" data-sortable="true">廚師</th>
                    <th scope="col" data-sortable="true">料理風格</th>
                    <th scope="col" data-sortable="true">套餐價格</th>
                    <th scope="col" data-sortable="true">套餐描述</th>
                    <th scope="col">更多操作</th>
                    <th scope="col">圖片瀏覽</th>
                    <th scope="col">圖片編輯</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td data-title="#"><?= $row['sid'] ?></td>
                    <td data-title="套餐名稱"><?= $row['name'] ?></td>
                    <td data-title="廚師"><?= $row['c'] ?></td>
                    <td data-title="料理風格"><?php 
                    $styles=explode(",",$row['food_style']);
                    foreach($styles as $style):
                    foreach($all_styles as $food_style):
                        if($style==$food_style['sid']):
                            echo $food_style['name'].","
                        ?><?php endif;endforeach;endforeach; ?></td>
                    <td data-title="套餐價格"><?= $row['food_set_price'] ?></td>
                    <td data-title="套餐描述"><?= $row['food_set_content'] ?></td>
                    <td data-title="更多操作">
                        <a class="fascl fascl-edit" href="data_food_set_edit.php?sid=<?= $row['sid'] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="fascl fascl-trash" href="javascript: delete_it(<?= $row['sid'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td data-title="圖片瀏覽">
                        <?php 
                            foreach ($all_pics as $pic) :
                            if ($row['sid'] == $pic['food_set_sid']) : ?>
                            <a href="/mytest/Chef_pic/food_set_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['food_set_sid']?>"><i class="fas fa-images"></i></a>
                            <?php endif;
                            endforeach
                            ?>
                    </td>
                    <td data-title="圖片編輯"><a href="food_set_photo_search.php?search_input=<?= $row['name'] ?>&food_set_sid=<?= $row['sid'] ?>"><i class="fas fa-images"></i></a></td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
    <script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'data_food_set_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>