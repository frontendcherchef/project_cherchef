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
                <th scope="col" data-field="sid">#</th>
                <th scope="col" data-field="name">姓名</th>
                <th scope="col" data-field="gender">性別</th>
                <th scope="col" data-field="mobile">手機</th>
                <th scope="col" data-field="email">電子信箱</th>
                <th scope="col" data-field="birthday">生日</th>
                <th scope="col" data-field="address">地址</th>
                <th scope="col">更多操作</th>
            </tr>
        </thead>
        <tbody>
                    <?php foreach ($rows as $row) : ?>
                    <tr>

                        <td><?= '#'.$row['sid'] ?></td>
                        <td><?= $row['name'] ?></a></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['mobile'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['birthday'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td>
                            <a href="clients_detail.php?sid=<?= $row['sid'] ?>"><i class="far fa-eye"></i></a>
                            <a href="clients_edit.php?sid=<?= $row['sid'] ?>"><i class="far fa-edit"></i></a>
                            <a href="javascript:delete_data(<?= $row['sid'] ?>)"><i class="far fa-trash-alt"></i></a>
                        </td>
                        <!-- <td>
                            <?php
                            foreach ($all_pics as $pic) :
                                if ($row['sid'] == $pic['clients_sid']) : ?>
                            <a href="/pic/profile_pic/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?= $pic['clients_sid'] ?>"><i class="fas fa-images"></i></a>
                            <?php endif;
                    endforeach
                    ?>
                        </td> -->
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
    </table>
    </div>
    </div>

</div>
<script>
        function delete_data(sid) {
        Swal.fire({
            title: `確認刪除#${sid}的資料嗎？`,
            text: "一經刪除即無法復原",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '確認刪除'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                '已成功刪除該筆資料',
                'success'
                )
                location.href = 'clients_delete1.php?sid=' + sid;
            }
            })
        }
        

        $(document).ready( function () {
            $("#list").DataTable({
                bPaginate: false,
                bInfo: false,
            });
        } );
</script>
<?php include __DIR__ . '/_html_footer.php'; ?>