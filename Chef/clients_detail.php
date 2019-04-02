<?php

    require __DIR__. '/connect.php';

    $page_name = 'clients_detail';

    $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

    $sql = "SELECT * FROM clients WHERE sid=$sid";

    $stmt = $pdo->query($sql);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/_html_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">會員資料</h5>
                    <div style="border: 1px solid #cccccc; height: 200px; width: 150px; ">

                    </div>

                    <form method="post" name="form1"">
                        <input type="hidden" name="sid" value="<?= $row['sid']?>">
                        <div class="form-group">
                            <label for="name">姓名：<?= $row['name']?></label>
                        </div>
                        <div class="form-group">
                            <label for="name">性別：<?= $row['gender']?></label>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機：<?= $row['mobile']?></label>
                        </div>
                        <div class="form-group">
                            <label for="email">電子信箱：<?= $row['email']?></label>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="password">密碼: --><?//= $row['password']?><!--</label>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="address">地址：<?= $row['address']?></label>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日：<?= $row['birthday']?></label>
                        </div>

                        <a href="clients_list.php"><button id="back_btn" type="button" class="btn btn-warning">回到會員列表</button></a>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>


</script>
<?php include __DIR__. '/_html_footer.php'; ?>