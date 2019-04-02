<?php 
require __DIR__.'/connect.php';
$page_name = 'tool';

$per_page = 5;
$page = isset($_GET['page'])? intval($_GET['page']):1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM tool";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
$total_pages = ceil($total_rows/$per_page);
if($page>$total_pages) $page =$total_pages;
if($page<1) $page =1;
$sql = sprintf("SELECT * FROM tool ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<div class="container pt-3">
<div style="color:orange">廚具資料表</div>
<div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div>
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <form class="form-inline d-flex" name="form1" action="tool_data_search.php" method="post">
            <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋名稱">
            <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button>
            </form>
            <!-- -->
            <nav class="d-flex mb-2">
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
                <div>
                    <a href="tool_insert.php"><button type="button" class="btn btn-warning mr-2">快速新增測試</button></a>
                    <a href="tool_data_insert.php"><button type="button" class="btn btn-warning">新增資料表</button></a>
                </div>
            </nav>
        </div>
        <div class="col-lg-12 table-responsive card-list-table">
<table class="table table-warning table-hover">
<thead class="bg-warning">
    <tr>     
      <th scope="col">#</th>
      <th scope="col">Tool Name</th>
      <div col-md-6>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
      </div>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr>
      <td><?=$row['sid']?></td>
      <td><?=$row['tool_name']?></td>
     <!-- <td><a href="tool_delete.php?sid=<?= $row['sid']?>"><i class="fas fa-trash-alt"></i></a></td>    -->
     <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>   
     <td><a href="tool_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br>
</div>
</div>
<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'tool_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>