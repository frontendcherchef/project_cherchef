<?php 
require __DIR__.'/connect.php';
$page_name = 'cooking_house';

$per_page = 5;
$page = isset($_GET['page'])? intval($_GET['page']):1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM cooking_house";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
$total_pages = ceil($total_rows/$per_page);
if($page>$total_pages) $page =$total_pages;
if($page<1) $page =1;
$sql = sprintf("SELECT * FROM cooking_house ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<br>
<div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
<div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div>

<div class ="col-md-4 center_div">
<nav aria-label="...">
  <ul class="pagination pagination-sm">

  <li class="page-item <?= $page<=1 ?'disable':''?>"> 
        <a class ="page-link" href="?page=<?= $page-1 ?>">&lt;</a> 
  </li>

  <?php for($i=1;$i<=$total_pages;$i++): ?>
    <li class="page-item <?= $i==$page ? 'active': ''?>"> 
        <a class ="page-link" href="?page=<?= $i ?>"><?= $i ?></a> 
      </span>
    </li>
    <?php endfor ?>

    <li class="page-item <?= $page>=$total_pages ?'disable':''?>"> 
    <a class ="page-link" href="?page=<?= $page+1 ?>">&gt;</a> 
  </li>

  </ul>
</nav>
</div>

<!-- 上排按鈕 -->
<div class="center_div">
  <a href="cooking_house_data_insert.php"><button type="button" class="btn btn-primary  col-md-3  ">新增資料</button></a>
  <a href="cooking_house_insert.php"><button type="button" class="btn btn-primary  col-md-3  ">新增一筆測試資料</button></a>
  <a href="cooking_house_insert.php"><button type="button" class="btn btn-primary  col-md-3  ">管理圖片</button></a>
  <br>
</div>
<br>

<table class="table table-striped table-bordered">
<thead>
    <tr>     
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <div col-md-6>
      <th scope="col">Web</th>
      <th scope="col">Intro</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
      </div>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['phone']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['web']?></td>
      <td><?=$row['intro']?></td>
     <!-- <td><a href="cooking_house_delete.php?sid=<?= $row['sid']?>"><i class="fas fa-trash-alt"></i></a></td>    -->
     <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>   
     <td><a href="cooking_house_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br>
<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'cooking_house_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>