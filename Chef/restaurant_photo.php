<?php
require __DIR__ . '/connect.php';

$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/restaurant_photo//';

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM restaurant_photo";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM restaurant_photo ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

//抓圖片
$p_sql = "SELECT * FROM `restaurant` LEFT JOIN `restaurant_photo` ON `restaurant`.`sid`=`restaurant_photo`.`restaurant_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>
<div class="container">
  <br>
  <div class="form_data_font_style" style="color:orange;">餐廳圖片資料表</div>
  <div class="form_data_font_style"><?= '總共' . $total_rows . '筆資料' ?></div>
  <div class="form_data_font_style"><?= '總共' . $total_pages . '頁' ?></div>

  <!-- 頁數切換 -->
  <div class="col-md-4 center_div">
    <nav aria-label="...">
      <ul class="pagination pagination-sm">

        <li class="page-item">
          <a class="page-link" href="?page=1" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span></a>
        </li>

        <li class="page-item <?= $page <= 1 ? 'disable' : '' ?>">
          <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
        </li>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
          <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link bg-warning border-warning" href="?page=<?= $i ?>"><?= $i ?></a>
            </span>
          </li>
        <?php endfor ?>

        <li class="page-item <?= $page >= $total_pages ? 'disable' : '' ?>">
          <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
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
    <a href="restaurant_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增圖片</button></a>
    <a href="restaurant_list.php"><button type="button" class="btn btn-warning  col-md-3  ">回到餐廳資料表</button></a>
    <br>
  </div>
  <br>


  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">餐廳sid</th>
        <th scope="col">餐廳名稱</th>
        <th scope="col">圖檔名</th>
        <th scope="col">縮圖</th>
        <th scope="col">刪除</th>
        <th scope="col">編輯</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style">
          <td><?= $row['sid'] ?></td>
          <td><?= $row['restaurant_sid'] ?></td>

          <?php
          $stmt2 = $pdo->prepare("SELECT * FROM restaurant WHERE sid=?");
          $stmt2->execute([$row['restaurant_sid']]);
          $user = $stmt2->fetch(PDO::FETCH_ASSOC);
          ?>

          <td><?= $user['name'] ?></td>
          <td><?= $row['file_name'] ?></td>
          <td>
            <?php foreach ($all_pics as $pic) :
              if ($row['file_name'] == $pic['file_name']) : ?>
                <div class="preview" style="margin:6px; width:72px; height:72px;">
                  <a href="../Chef_pic/restaurant_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?= $pic['restaurant_sid'] ?>" style="cursor: zoom-in;">
                    <img src="../Chef_pic/restaurant_photo/<?= $pic['file_name'] ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                  </a>
                </div>
              <?php endif;
            endforeach
            ?>
          </td>
          <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name'] ?>')"><i class="fas fa-trash-alt"></i></a></td>
          <td><a href="restaurant_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
</div>
<script>
  function delete_it(sid, file_name) {
    if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
      location.href = 'restaurant_photo_delete.php?sid=' + sid + '&file_name=' + file_name;
    }
  }

  $(".preview").on({
    mouseenter: function() {
      console.log("img here");
      $(this).css("filter", "brightness(55%)")
    },
    mouseleave: function() {
      // console.log("img here");
      $(this).css("filter", "brightness(100%)")
    }
  });
</script>
<?php include __DIR__ . '/_html_footer.php';  ?>