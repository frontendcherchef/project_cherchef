<?php
require __DIR__ . '/_cred.php';
require __DIR__ . '/connect.php';
$page_name = 'data_food_set_class';

// $per_page = 10;
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 算總筆數
$t_sql = "SELECT COUNT(1) FROM food_set_class";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

// 總頁數
// $total_pages = ceil($total_rows / $per_page);

// if ($page < 1) $page = 1;
// if ($page > $total_pages) $page = $total_pages;

// ORDER BY sid DESC LIMIT 表示排序為降冪, 升冪要刪除 DESC
// $sql = sprintf("SELECT a.sid, a.name, b.name c FROM food_set_class a INNER JOIN food_set b ON a.food_set = b.sid ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$sql = sprintf("SELECT a.sid, a.name, b.name c FROM food_set_class a INNER JOIN food_set b ON a.food_set = b.sid ORDER BY sid DESC LIMIT %s, %s", 1, $total_rows);
$stmt = $pdo->query($sql);
// $stmt = $pdo->query("SELECT * FROM address_book"); 此為取全部

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/_html_header.php';  ?>
<?php include __DIR__ . '/_navbar.php';  ?>
<div class="container pt-3">
    <h5 class="mb-2" style="color:#e29346">套餐大項資料表</h5>
    <!-- <div><?= $page . " / " . $total_pages . " 頁，共 " . $total_rows . " 筆資料" ?></div> -->
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <!-- <form class="form-inline col-lg-12" name="form1" action="<?= $page_name ?>_search.php" method="post">
                <input type="text" class="form-control mr-sm-2" id="search_input" name="search_input" placeholder="搜尋名稱">
                <button type="submit" class="btn btn-warning my-2 my-sm-0">Search</button>
            </form> -->
            <!-- -->
            <!-- <nav class="d-flex mb-2"> -->
                <!-- <ul class="pagination pagination-sm mb-0 mr-auto align-items-center">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
                    </li>
                </ul> -->

            <!-- </nav> -->
            <div class="float-right mb-2">
                <a href="data_food_set_class_insert.php"><button type="button" class="btn btn-warning">新增資料表</button></a>
            </div>
            <div class="buttons-toolbar mb-2">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-warning table-hover text-nowrap"
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
                <thead class="bg-warning">
                    <tr>
                        <th scope="col" data-sortable="true" data-align="center">#</th>
                        <th scope="col" data-sortable="true">套餐大項</th>
                        <th scope="col" data-sortable="true">套餐</th>
                        <th scope="col" data-align="center">編輯</th>
                        <th scope="col" data-align="center">刪除</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td data-title="#"><?= $row['sid'] ?></td>
                        <td data-title="套餐大項"><?= $row['name'] ?></td>
                        <td data-title="套餐"><?= $row['c'] ?></td>
                        <td data-title="編輯">
                            <a class="fascl fascl-edit" href="data_food_set_class_edit.php?sid=<?= $row['sid'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        <td data-title="刪除">
                            <a class="fascl fascl-trash" href="javascript: delete_it(<?= $row['sid'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            location.href = 'data_food_set_class_delete.php?sid=' + sid;
        }
    }

    // 以下為即時搜尋新增

    // $("#search_input").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#myTable tr").filter(function() {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    //     });
    //     console.log($("#myTable tr:visible").length)
    // });

    // 以上為即時搜尋新增
    
    // $('#test').bootstrapTable({

    //     formatShowingRows: function (pageFrom, pageTo, totalRows) {
    //         return '第 ' + pageFrom + ' 頁&nbsp;&nbsp;共 ' + pageTo + ' 頁&nbsp;&nbsp;每頁顯示 ' + totalRows + ' 筆';
    //     }

    // });

</script>
<?php include __DIR__ . '/_html_footer.php';  ?> 