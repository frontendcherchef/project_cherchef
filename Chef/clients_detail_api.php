<?php

    require __DIR__. '/connect.php';

    $page_name = 'clients_detail';

    $stmt = $pdo->query("SELECT * FROM `clients`");

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/_html_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">會員資料</h5>
                    <div style="border: 1px solid #cccccc; height: 200px;   width: 150px">
                    </div>
                    <?php foreach ($rows as $row): ?>
                    <form method="post" name="form1"">
                        <input type="hidden" name="sid" value="<?= $row['sid']?>">
                        <div class="form-group">
                            <label for="name">姓名: </label> <?= $row['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機: </label> <?= $row['mobile']?>">
                        </div>
                        <div class="form-group">
                            <label for="email">電子信箱: </label> <?= $row['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="password">密碼: </label> <?= $row['password']?>">
                        </div>
                        <div class="form-group">
                            <label for="address">地址: </label> <?= $row['address']?>">
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日: </label> <?= $row['birthday']?>">
                        </div>

                        <a href="clients_list.php"><button id="back_btn" type="button" class="btn btn-warning">回到會員列表</button></a>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__. '/_html_footer.php'; ?>
