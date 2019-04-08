<?php 
require __DIR__.'/connect.php';

$upload_dir = 'C:/xampp/htdocs/Chef/pic/profile_pic/';

// $per_page = 10;
// $page = isset($_GET['page'])? intval($_GET['page']):1;

$p_sql = "SELECT * FROM `clients` LEFT JOIN `clients_profile_pics` ON `clients`.`sid`=`clients_profile_pics`.`clients_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

//算總比數
$t_sql = "SELECT COUNT(1) FROM clients_profile_pics";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;
// $sql = sprintf("SELECT * FROM clients_profile_pics ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$sql = sprintf("SELECT * FROM clients_profile_pics ORDER BY sid LIMIT %s, %s", 1, $total_rows);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<div class="container pt-3">
<!-- breadcrumb -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb cyan lighten-4">
      <li class="breadcrumb-item"  ><a class="" style="color:skyblue;" href="index.php">Home</a></li>
      <li class="breadcrumb-item active" style="color:orange;">會員圖片</li>
    </ol>
  </nav>

<!-- <div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
<div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div> -->

<!-- 頁數切換 -->
<!-- <div class ="col-md-4 center_div">
<nav aria-label="...">
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
        <a class ="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a> 
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
      <a href="clients_profile_pic_insert.php"><button type="button" class="btn btn-warning mr-2">新增資料</button></a>
      <a href="clients_list.php"><button type="button" class="btn btn-warning">回到用戶資料表</button></a>
    </div>
    <div class="buttons-toolbar mb-2">
    </div>
  </div>
</div>
<!-- Search -->

<!-- <form name="form1" action="clients_profile_pic_search.php" method="post">
  <div class="form-group "style="border:1px solid skyblue">
    <label for="search_input" >&nbsp搜尋:</label>
    <div class="col-md-3 inline_block">
    <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="用戶名稱">
    </div>
  <div class="col-md-3 inline_block">
  <button type="submit" class="btn btn-warning col-md-3" >Enter</button></div>
  
  </div>
<form> -->

<!-- -->
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
    <th scope="col" data-sortable="true">用戶ID</th>
    <th scope="col" data-sortable="true">姓名</th>
    <th scope="col">更多操作</th>
    <th scope="col">照片瀏覽</th>
</tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
      <td data-title="#"><?=$row['sid']?></td>
   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM clients WHERE sid=?");
   $stmt2->execute([$row['clients_sid']]);
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);

    
   ?>
      <td data-title="用戶ID"><?=$row['clients_sid']?></td>
      <td data-title="姓名"><?=$user['name']?></td>
     <td data-title="更多操作">
     <a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt"></i></a>
     <a href="clients_profile_pic_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
     <td data-title="照片瀏覽">
            <?php
            foreach ($all_pics as $pic) :
                if ($row['sid'] == $pic['clients_sid']) : ?>
                    <a href="/mytest/Chef_pic/client_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['clients_sid']?>"><i class="fas fa-images"></i></a>
                <?php endif;
            endforeach
            ?>
      </td>
<!--      <td><a href="clients_profile_pic_search.php?search_input=--><?//= $row['name'] ?><!--&cooking_house_sid=--><?//= $row['sid'] ?><!--"><i class="fas fa-images"></i></a></td>-->
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
                location.href = 'clients_profile_pic_delete.php?sid=' + sid +'&file_name=' +file_name;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php';  ?>