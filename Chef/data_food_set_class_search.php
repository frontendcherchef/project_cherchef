<?php
    require __DIR__. '/_cred.php';
    require __DIR__. '/connect.php';
    header("Content-Type:text/html; charset=utf-8");
    $page_name = 'data_food_set_class';
    $set = $_POST['search_input'];

    $t_sql = "SELECT * FROM food_set";
    $t_stmt = $pdo->query($t_sql);
    $foodsets = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

    if($set)
    {
    $show = "SELECT * FROM food_set_class WHERE name LIKE '%$set%'";
    $result =$pdo->query($show);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        header('Location: data_food_set_class.php');
    }

?>
<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
<div class="container pt-3">
搜尋結果
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <table class="table table-warning table-hover text-nowrap">
                <thead class="bg-warning">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">套餐大項</th>
                    <th scope="col">套餐</th>
                    <th scope="col">編輯</th>
                    <th scope="col">刪除</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rows as $row): ?>
                <?php foreach($foodsets as $foodset): ?>
                <tr>
                    <td data-title="#"><?= $row['sid'] ?></td>
                    <td data-title="套餐大項"><?= $row['name'] ?></td>
                    <td data-title="套餐"><?php 
                        if($row['food_set']==$foodset['sid']):
                            echo $foodset['name']
                        ?><?php endif; ?></td>
                    <td data-title="編輯">
                        <a class="fascl fascl-edit" href="data_food_set_class_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a>
                    </td data-title="刪除">
                    <td><a class="fascl fascl-trash" href="javascript: delete_it(<?= $row['sid'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
    <script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'data_food_set_class_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>