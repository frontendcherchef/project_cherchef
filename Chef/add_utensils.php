<?php 
require __DIR__.'/connect.php';
$page_name = 'add_utensils';

$per_page =5;
$page = isset($_GET['page'])? intval($_GET['page']):1;


$p_sql = "SELECT * FROM `add_utensils` LEFT JOIN `add_utensils_photo` ON `add_utensils`.`sid`=`add_utensils_photo`.`add_utensils_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

//算總比數
$t_sql = "SELECT COUNT(1) FROM add_utensils";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數 ceil() 函數向上舍入為最接近的整數
$total_pages = ceil($total_rows/$per_page);
if($page>$total_pages) $page =$total_pages;
if($page<1) $page =1;

$sql = sprintf("SELECT * FROM add_utensils ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<br>
<div class="container">
      <div class="form_data_font_style" style="color:orange;">餐具資料表</div>
      <div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
      <div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div>
      <br>
      
      
      <div class="center_div">
          <a href="add_utensils_data_insert.php"><button type="button" class="btn btn-warning  col-md-2  ">新增資料</button></a>
          <a href="add_utensils_insert.php"><button type="button" class="btn btn-warning  col-md-2  ">新增一筆測試資料</button></a>
          <a href="add_utensils_photo.php"><button type="button" class="btn btn-warning  col-md-2  ">管理圖片</button></a>
        <br>
      </div>
      <br>
      <!-- Search -->

        <form name="form1" action="add_utensils_data_search.php" method="post">
        <div class="form-group "style="border:1px solid skyblue">
            <label for="search_input" >&nbsp搜尋:</label>
            <div class="col-md-3 inline_block">
            <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="商品名稱">
            </div>
        <div class="col-md-3 inline_block">
        <button type="submit" class="btn btn-warning col-md-3" >Enter</button></div>
        
        </div>
        <form>

<!-- -->


      <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">會員編號</th>
              <th scope="col">商品名稱</th>
              <th scope="col">租借金額</th>
              <th scope="col">購買金額</th>
              <th scope="col">訂購數量</th>
              <th scope="col">詳細資訊</th>
              <th scope="col">產品特色</th>
          <div col-md-6>
          <th scope="col"><i class="fas fa-edit"></i></th>
          <th scope="col"><i class="fas fa-trash-alt"></i></th>
          <th scope="col">圖片瀏覽<i class="fas fa-edit"></i></th>
          <th scope="col">圖片編輯<i class="fas fa-trash-alt"></i></th>
          </div>
          </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $row):?>
          <tr class="form_data_font_style">
             
                  <td><?=$row['sid']?></td>
                  <td><?=$row['clients']?></td>
                  <td><?=$row['name']?></td>
                  <td><?=$row['rent']?></td>
                  <td><?=$row['price']?></td>
                  <td><?=$row['quantity']?></td>
                  <td><?=$row['details']?></td>     
                  <td><?=nl2br($row['intro'])?></td>
                  <td><a href="add_utensils_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit text-dark"></i></a></td>
                  <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class=" fas fa-trash-alt text-dark"></i></a></td>   
                  <td>
                    <?php 
                        foreach ($all_pics as $pic) :
                        if ($row['sid'] == $pic['add_utensils_sid']) : ?>
                        <a href="/mytest/Chef_pic/add_utensils_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['add_utensils_sid']?>"><i class="fas fa-images"></i></a>
                        <?php endif;
                        endforeach
                    ?>
                  </td>
      <td><a href="add_utensils_photo_search.php?search_input=<?= $row['name'] ?>&add_utensils_sid=<?= $row['sid'] ?>"><i class="fas fa-images"></i></a></td>
         


    </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
      <br>
</div>

      <!-- 頁數切換 -->
      <div class ="col-md-2 center_div">
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
      </div>

      <!-- 上排按鈕 -->


    <script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'add_utensils_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>