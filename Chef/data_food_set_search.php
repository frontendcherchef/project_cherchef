<?php
require __DIR__. '/_cred.php';
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
$page_name = 'data_food_set';
$set = $_POST['search_input'];

$t_sql = "SELECT * FROM food_style";
$t_stmt = $pdo->query($t_sql);
$all_styles = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

if($set)
{
$show = "SELECT * FROM food_set WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('Location: data_food_set.php');
}
?>

<?php include __DIR__. '/_html_header.php';  ?>
<?php include __DIR__. '/_navbar.php';  ?>
<div class="container pt-3">
搜尋結果
    <div class="row">
        <div class="col-lg-12 table-responsive card-list-table">
            <table class="table table-warning table-hover">
                <thead class="bg-warning text-nowrap">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">套餐名稱</th>
                    <th scope="col">廚師</th>
                    <th scope="col">料理風格</th>
                    <th scope="col">套餐價格</th>
                    <th scope="col">套餐描述</th>
                    <th scope="col">編輯</th>
                    <th scope="col">刪除</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td data-title="#"><?= $row['sid'] ?></td>
                    <td data-title="套餐名稱"><?= $row['name'] ?></td>
                    <td data-title="廚師"><?= $row['chef'] ?></td>
                    <td data-title="料理風格"><?php 
                    $styles=explode(",",$row['food_style']);
                    foreach($styles as $style):
                    foreach($all_styles as $food_style):
                        if($style==$food_style['sid']):
                            echo $food_style['name'].","
                        ?><?php endif;endforeach;endforeach; ?></td>
                    <td data-title="套餐價格"><?= $row['food_set_price'] ?></td>
                    <td data-title="套餐描述"><?= $row['food_set_content'] ?></td>
                    <td data-title="編輯">
                        <a class="fascl fascl-edit" href="data_food_set_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a>
                    </td>
                    <td data-title="刪除"><a class="fascl fascl-trash" href="javascript: delete_it(<?= $row['sid'] ?>)">
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
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'data_food_set_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>