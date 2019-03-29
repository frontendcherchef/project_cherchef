<?php
    require __DIR__. '/connect.php';

    $page_name = 'clients_order';

    $per_page = 5;

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $t_sql = "SELECT COUNT(1) FROM clients_order";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

    $total_page = ceil($total_rows/$per_page);

    if ($page<1) $page = 1;
    if ($page>$total_page) $page = $total_page;

    $sql = sprintf("SELECT * FROM clients_order LIMIT %s, %s", ($page-1)*$per_page, $per_page);
    $stmt = $pdo->query($sql);

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<?php include __DIR__ . '/_html_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>

<div class="container pt-3">

<div><?= $page. " / ".$total_page." 頁，共 ".$total_rows." 筆資料" ?></div>
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <form class="form-inline d-flex" name="form1" action="clients_order_search.php" method="post">
            <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋會員姓名">
            <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button>
            </form>
            <!-- -->
            <nav class="d-flex mb-2">
                <ul class="pagination pagination-sm mb-0 mr-auto align-items-center">
                    <li class="page-item <?= $page<=1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">&lt;</a>
                    </li>
                    <?php for($i=1; $i<=$total_page; $i++): ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                        <a class="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page>=$total_page ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">&gt;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-12 table-responsive card-list-table">
    <table class="table table-warning table-hover">
        <thead class="bg-warning text-nowrap">
        <tr>

            <th scope="col">#</th>
            <th scope="col">訂購者姓名</th>
            <th scope="col">預約廚師</th>
            <th scope="col">套餐名</th>
            <th scope="col">廚師上門</th>
            <th scope="col">第三方空間</th>
            <th scope="col">人數</th>
            <th scope="col">訂購日期</th>
            <th scope="col">訂購時間</th>
            <th scope="col">總價</th>
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

            <td data-title="#"><?= $row['sid'] ?></td>
            <td data-title="訂購者姓名"><?= $row['clients'] ?></a></td>
            <td data-title="預約廚師"><?= $row['chef'] ?></td>
            <td data-title="套餐名"><?= $row['food_set'] ?></td>
            <td data-title="廚師上門"><?= $row['clients_house'] ?></td>
            <td data-title="第三方空間"><?= $row['cooking_house'] ?></td>
            <td data-title="人數"><?= $row['people_num'] ?></td>
            <td data-title="訂購日期"><?= $row['order_date'] ?></td>
            <td data-title="訂購時間"><?= $row['order_time'] ?></td>
            <td data-title="總價"><?= $row['total_price'] ?></td>
            <td data-title="Edit">
                <a href="clients_edit.php?sid=<?= $row['sid'] ?>"><i class="far fa-edit"></i></a>
            </td>
            <td data-title="Delete">
                <a href="javascript:delete_data(<?= $row['sid'] ?>)">
                    <i class="far fa-trash-alt"></i>
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
        function delete_data(sid) {
            if (confirm(`確認刪除編號${sid}的資料嗎？`)){
                location.href = 'clients_order_delete1.php?sid=' + sid;
            }

        }
</script>
<?php include __DIR__ . '/_html_footer.php'; ?>