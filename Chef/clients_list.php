<?php
    require __DIR__. '/connect.php';

    $page_name = 'clients_list';

    $per_page = 5;

    $p_sql = "SELECT * FROM `clients` LEFT JOIN `clients_profile_pics` ON `clients`.`sid`=`clients_profile_pics`.`clients_sid`";
    $p_stmt = $pdo->query($p_sql);
    $all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $t_sql = "SELECT COUNT(1) FROM clients";
    $t_stmt = $pdo->query($t_sql);
    $total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

    $total_page = ceil($total_rows/$per_page);

    if ($page<1) $page = 1;
    if ($page>$total_page) $page = $total_page;

    $sql = sprintf("SELECT * FROM clients LIMIT %s, %s", ($page-1)*$per_page, $per_page);
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
            <form class="form-inline d-flex" name="form1" action="clients_search.php" method="post">
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
                <div>
                    <a href="clients_profile_pic.php"><button type="button" class="btn btn-warning mr-2">管理圖片</button></a>
                    <a href="clients_add_test.php"><button type="button" class="btn btn-warning mr-2">快速新增測試資料</button></a>
                    <a href="clients_add.php"><button type="button" class="btn btn-warning">新增資料表</button></a>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-12 table-responsive card-list-table">
    <table class="table table-warning table-hover">
        <thead class="bg-warning text-nowrap">
        <tr>

            <th scope="col">#</th>

            <th scope="col">姓名</th>
            <th scope="col">手機</th>
            <th scope="col">電子信箱</th>
            <th scope="col">生日</th>
            <th scope="col">地址</th>
            <th scope="col">
                Edit <i class="far fa-edit"></i>
            </th>
            <th scope="col">
                Delete <i class="far fa-trash-alt"></i>
            </th>
            <th scope="col">用戶照片</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>

            <td data-title="#"><?= $row['sid'] ?></td>
<!--            <th>--><?//= $row['profile_pic'] ?><!--</th>-->
            <td data-title="姓名"><?= $row['name'] ?></a></td>
<!--            <th>--><?//= $row['Gender'] ?><!--</th>-->
            <td data-title="手機"><?= $row['mobile'] ?></td>
            <td data-title="電子信箱"><?= $row['email'] ?></td>
            <td data-title="生日"><?= $row['birthday'] ?></td>
            <td data-title="地址"><?= $row['address'] ?></td>
            <td data-title="Edit">
                <a href="clients_edit.php?sid=<?= $row['sid'] ?>"><i class="far fa-edit"></i></a>
            </td>
            <td data-title="Delete">
                <a href="javascript:delete_data(<?= $row['sid'] ?>)">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            <td data-title="用戶照片">
                <?php
                foreach ($all_pics as $pic) :
                    if ($row['sid'] == $pic['clients_sid']) : ?>
                        <a href="/mytest/Chef_pic/client_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['clients_sid']?>"><i class="fas fa-images"></i></a>
                    <?php endif;
                endforeach
                ?>
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
                location.href = 'clients_delete1.php?sid=' + sid;
            }

        }
</script>
<?php include __DIR__ . '/_html_footer.php'; ?>