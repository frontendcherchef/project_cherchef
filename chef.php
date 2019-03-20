<?php 
require __DIR__ . '/connect.php';
$page_name = 'chef';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//抓tool的sid跟名字配對
$t_sql = "SELECT * FROM `tool` ORDER BY `tool`.`sid`";
$t_stmt = $pdo->query($t_sql);
$all_tool = $t_stmt->fetchAll(PDO::FETCH_ASSOC);

//算總比數
$t_sql = "SELECT COUNT(1) FROM chef";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM chef ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>
<br>
<div class="form_data_font_style" style="color:blue;">廚師資料表</div>
<div class="form_data_font_style"><?= '總共'.$total_rows.'筆資料' ?></div>
<div class="form_data_font_style"><?= '總共'.$total_pages.'頁' ?></div>

<!-- 頁數切換 -->
<div class ="col-md-4 center_div">
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
        <a class ="page-link" href="?page=<?= $i ?>"><?= $i ?></a> 
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
</nav>
<!--  -->
</div>


<!-- 上排按鈕 -->
<div class="center_div">
  <a href="chef_data_insert.php"><button type="button" class="btn btn-primary  col-md-3  ">新增資料</button></a>
  <a href="chef_insert.php"><button type="button" class="btn btn-primary  col-md-3  ">新增一筆測試資料</button></a>
  <a href="chef_photo.php"><button type="button" class="btn btn-primary  col-md-3  ">管理圖片</button></a>
  <br>
</div>
<br>
<!-- Search -->

<form name="form1" action="chef_data_search.php" method="post">
  <div class="form-group "style="border:1px solid skyblue">
    <label for="search_input" >&nbsp搜尋:</label>
    <div class="col-md-3 inline_block">
    <input type="text" class="form-control col-md-12" id="search_input" name="search_input" placeholder="廚師姓名">
    </div>
  <div class="col-md-3 inline_block">
  <button type="submit" class="btn btn-primary col-md-3" >Enter</button></div>
  
  </div>
</form>
<div class="table-responsive">
<table class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Mobile</th>
            <th scope="col">Birthday</th>
            <!-- <th scope="col">Pic</th> -->
            <th scope="col">Title</th>
            <th scope="col">Information</th>
            <th scope="col">Experience</th>
            <th scope="col">Area</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Own Kitchen</th>
            <th scope="col">Tool</th>
            <th scope="col">Note</th>
            <div col-md-6>              
                <th scope="col">刪除</th>
                <th scope="col">編輯</th>
            </div>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style" >
            <td><?= $row['sid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td class="text-break" ><?= $row['password'] ?></td>
            <td><?= $row['mobile'] ?></td>
            <td><?= $row['birthday'] ?></td>
			<!-- <td><?= $row['pic'] ?></td> -->
            <td><?= $row['title'] ?></td>
            <td><?= mb_strimwidth($row['info'],0, 100, "...", "UTF-8"); ?></td>
            <td><?= mb_strimwidth($row['experience'],0, 100, "...", "UTF-8");  ?></td>
            <td><?= $row['area'] ?></td>
			      <td><?= $row['restaurant'] ?></td>
            <td><?= $row['own_kitchen'] ?></td>
            <td>
            <!-- 利用迴圈加條件判別，當輸入編號==廚具sid時，echo廚具tool_name -->
            <?php $require_tools=explode(",",$row['tool']);
                  foreach($require_tools as $require_tool):
                  foreach ($all_tool as $tool) :
                  if($require_tool==$tool['sid']):
                  echo$tool['tool_name']."," ?>
              <?php endif;endforeach;endforeach; ?></td>
            <td><?= mb_strimwidth($row['note'],0, 20, "...", "UTF-8");  ?></td>
    
            <!-- <td><a href="chef_delete.php?sid=<?= $row['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>    -->
            <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>
            <td><a href="chef_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div
<br>
<script>
    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            location.href = 'chef_delete.php?sid=' + sid;
        }
    }
</script>
<?php include __DIR__ . '/_html_footer.php';  ?> 