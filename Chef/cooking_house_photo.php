<?php 
require __DIR__.'/connect.php';

$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/cooking_house_photo';

// $per_page = 10;
// $page = isset($_GET['page'])? intval($_GET['page']):1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM cooking_house_photo";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;
// $sql = sprintf("SELECT * FROM cooking_house_photo ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$sql = sprintf("SELECT * FROM cooking_house_photo ORDER BY sid LIMIT %s, %s", 1, $total_rows);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<br>
<div class="container pt-3">
<!-- breadcrumb -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb cyan lighten-4">
      <li class="breadcrumb-item"  ><a class="" style="color:skyblue;" href="index.php">Home</a></li>
      <li class="breadcrumb-item"  ><a class="" style="color:skyblue;" href="cooking_house.php">料理空間資料表</a></li>
      <li class="breadcrumb-item active" style="color:orange;">料理空間圖片資料表</li>
    </ol>
  </nav>

<!-- <h5 class="mb-2" style="color:#e29346">料理空間圖片資料表</h5> -->
<!-- <div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
<div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div> -->

<!-- 頁數切換 -->
<!-- <div class ="col-md-4 center_div"> -->
<!-- <nav aria-label="...">
  <ul class="pagination pagination-sm">

  <li class="page-item">
      <a class="page-link" href="?page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span></a>
    </li>

  <li class="page-item <?= $page<=1 ?'disable':''?>"> 
        <a class ="page-link" href="?page=<?= $page-1 ?>">&lt;</a> 
  </li>

  <?php for($i=1;$i<=$total_pages;$i++): ?>
    <li class="page-item <?= $i==$page ? 'active': ''?>"> 
        <a class ="page-link bg-warning border-warning"  href="?page=<?= $i ?>"><?= $i ?></a> 
      </span>
    </li>
    <?php endfor ?>

    <li class="page-item <?= $page>=$total_pages ?'disable':''?>"> 
    <a class ="page-link" href="?page=<?= $page+1 ?>">&gt;</a> 
  </li>

  <li class="page-item">
      <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>

  </ul>
</nav> -->
<!--  -->
<!-- </div> -->


<!-- 上排按鈕 -->
<div class="row">
        <div class="col-lg-12">
<div class="float-right mb-2">
  <!-- <a href="cooking_house_photo_insert.php"><button type="button" class="btn btn-warning mr-2">新增資料</button></a>
  <a href="cooking_house.php"><button type="button" class="btn btn-warning">回到料理空間資料表</button></a> -->

</div>
<div class="buttons-toolbar mb-2">
            </div>
</div>
</div>

<div class="row">
        <div class="col-lg-12 table-responsive card-list-table">
<table class="table table-warning table-hover"
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
<thead class="bg-warning text-nowrap">
    <tr>
      <th scope="col" data-sortable="true">#</th>
      <th scope="col" data-sortable="true">料理空間sid</th>
      <th scope="col" data-sortable="true">料理空間名稱</th></th>
      <th scope="col" data-sortable="true">檔名</th>
      <th scope="col">更多操作</th>
 
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
      <td data-title="#"><?=$row['sid']?></td>
      <td data-title="料理空間sid"><?=$row['cooking_house_sid']?></td>

   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM cooking_house WHERE sid=?");
   $stmt2->execute([$row['cooking_house_sid']]); 
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);

    
   ?>

      <td data-title="料理空間名稱"><?=$user['name']?></td>
     
<td>   <img style="width:100px" src="../Chef_pic/cooking_house_photo/<?= $row['file_name'] ?>">  </td>
     <td data-title="更多操作"><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt"></i></a>
     <a href="cooking_house_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>
<script>
        function delete_it(sid, file_name){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'cooking_house_photo_delete.php?sid=' + sid +'&file_name=' +file_name;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>