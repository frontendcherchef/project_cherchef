<?php 
require __DIR__.'/connect.php';
$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/add_utensils_photo/';
// $per_page = 10;
// $page = isset($_GET['page'])? intval($_GET['page']):1;
//算總比數
$t_sql = "SELECT COUNT(1) FROM add_utensils_photo";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
//總頁數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;
// $sql = sprintf("SELECT * FROM add_utensils_photo ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$sql = sprintf("SELECT * FROM add_utensils_photo ORDER BY sid LIMIT %s, %s", 1, $total_rows);
$stmt = $pdo->query($sql);
//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<br>
<div class="container pt-3">
<h5 class="mb-2" style="color:#e29346">餐具圖片</h5>
<!-- <div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div> -->
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->





    <!-- 上排按鈕 -->
    <div class="row">
        <div class="col-lg-12">
    <div class="float-right mb-2" >
      <!-- <a href="add_utensils_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增資料</button></a> -->
      <a href="add_utensils.php"><button type="button" class="btn btn-warning mr-2">回到餐具資料表</button></a>
      <a href="chef_data_insert.php"><i class="fas fa-plus-circle fa-2x text-warning mr-2"></i></a>
      <a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-minus-circle fa-2x text-warning"></i></a>
    </div>
    <div class="buttons-toolbar mb-2">
            </div>
</div>
</div>

<div class="row">
        <div class="col-lg-12 table-responsive card-list-table">
<table id="employee_grid" class="table table-warning table-hover"
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
             data-buttons-toolbar=".buttons-toolbar" width="60%" cellspacing="0">
<!-- <table class="table table-warning table-hover"> -->
<thead class="bg-warning text-nowrap">    
    <tr class="text-center">
      <th data-sortable="true"><input style="zoom: 1.5" type="checkbox" id="select_all"></th>
      <th scope="col" data-sortable="true">圖片編號</th>
      <th scope="col" data-sortable="true">餐具編號</th>
      <th scope="col" data-sortable="true">圖片路徑</th>
      <!-- <th scope="col"><i class="fas fa-trash-alt"></i></th> -->
      <th scope="col"><i class="fas fa-edit"></i></th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
    <td data-title="選擇"><input style="zoom: 1.5" type="checkbox" class="checkbox" data-emp-id="<?php echo $rows["id"]; ?>"></td>
      <td data-title="圖片編號"><?=$row['sid']?></td>
      <td data-title="餐具編號"><?=$row['add_utensils_sid']?></td>

   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM add_utensils WHERE sid=?");
   $stmt2->execute([$row['add_utensils_sid']]); 
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);
   ?>
    
   
<td>   <img style="width:100px" src="../Chef_pic/add_utensils_photo/<?= $row['file_name'] ?>">  </td>
     <!-- <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt text-dark"></i></a></td>    -->
     <td data-title="編輯"><a href="add_utensils_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit text-dark"></i></a></td>      
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>
      
      <!-- <div class ="col-md-2 center_div">
          <nav aria-label="...">
              <ul class="pagination pagination-sm">

                    <li class="page-item <?= $page<=1 ?'disable':''?>"> 
                          <a class ="page-link" href="?page=<?= $page-1 ?>">&lt;</a> 
                    </li>

                    <?php for($i=1;$i<=$total_pages;$i++): ?>
                    <li class="page-item <?= $i==$page ? 'active': ''?>"> 
                        <a class ="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a> 
                      
                    </li>
                    <?php endfor ?>

                    <li class="page-item <?= $page>=$total_pages ?'disable':''?>"> 
                    <a class ="page-link" href="?page=<?= $page+1 ?>">&gt;</a> 
                  </li>

              </ul>
          </nav>
      </div> -->

<script>
        $(document).on('click', '#select_all', function() {
        $(".checkbox").prop("checked", this.checked);
        $("#select_count").html($("input.checkbox:checked").length+" Selected");
        });
        $(document).on('click', '.checkbox', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
        $('#select_all').prop('checked', true);
        } else {
        $('#select_all').prop('checked', false);
        }
        $("#select_count").html($("input.checkbox:checked").length+" Selected");
        });
        function delete_it(sid, file_name){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'add_utensils_photo_delete.php?sid=' + sid +'&file_name=' +file_name;
            }
        }
</script>
<?php include __DIR__. '/_html_footer.php';  ?>