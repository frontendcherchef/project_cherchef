<?php 
require __DIR__.'/connect.php';
$page_name = 'cooking_house';
header("Content-Type:text/html; charset=utf-8");
// $per_page = 10;
// $page = isset($_GET['page'])? intval($_GET['page']):1;
$p_sql = "SELECT * FROM `cooking_house` LEFT JOIN `cooking_house_photo` ON `cooking_house`.`sid`=`cooking_house_photo`.`cooking_house_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
//算總比數
$t_sql = "SELECT COUNT(1) FROM cooking_house";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
//總頁數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;
$sql = sprintf("SELECT * FROM cooking_house ORDER BY sid DESC LIMIT %s, %s", 0, $total_rows);
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
      <li class="breadcrumb-item active" style="color:orange;">料理空間資料表</li>
    </ol>
  </nav>

<!-- <div class="form_data_font_style" style="color:orange;">料理空間資料表</div>
<div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
<div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div> -->

<!-- 頁數切換 -->
<div class ="col-md-4 center_div">
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

</div>


<!-- 上排按鈕 -->
<div class=" ">
  <a href="cooking_house_data_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增資料</button></a>
  <a href="cooking_house_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增一筆測試資料</button></a>
  <a href="cooking_house_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">管理圖片</button></a>
  <br>
</div>
<br>
<!-- Search 
<form name="form1" action="cooking_house_data_search.php" method="post">
  <div class="form-group "style="border:1px solid skyorange">
    <label for="search_input" >&nbsp搜尋:</label>
    <div class="col-md-3 inline_block">
    <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="料理空間名稱">
    </div>
  <div class="col-md-3 inline_block">
  <button type="submit" class="btn btn-warning col-md-3" >Enter</button></div>
  
  </div>
<form>
 --> 

 <div class="col-lg-12 table-responsive card-list-table">
 <table class="table table-warning table-hover text-nowrap"
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
             clickToSelect="true"
            >
            <thead class="bg-warning text-nowrap">
    <tr>
    
      <th scope="col" data-sortable="true" data-align="center">#</th>
      <th scope="col"  data-sortable="true">Name</th>
      <th scope="col"  data-sortable="true">Phone</th>
      <th scope="col"  data-sortable="true">Address</th>
      <th scope="col">Web</th>
      <div col-md-6>
      <th scope="col">Intro</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
      <th scope="col">圖片瀏覽</th>
      <th scope="col">圖片編輯</th>
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
     <td>
        <?php 
            foreach ($all_pics as $pic) :
              if ($row['sid'] == $pic['cooking_house_sid']) : ?>
              <a href="/mytest/Chef_pic/cooking_house_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['cooking_house_sid']?>"><i class="fas fa-images"></i></a>
               <?php endif;
            endforeach
            ?>
      </td>
      <td><a href="cooking_house_photo_search.php?search_input=<?= $row['name'] ?>&cooking_house_sid=<?= $row['sid'] ?>"><i class="fas fa-images"></i></a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br>
</div>
<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'cooking_house_delete.php?sid=' + sid;
            }
        }
</script>



<?php include __DIR__. '/_html_footer.php';  ?>