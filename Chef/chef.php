<?php 
require __DIR__ . '/connect.php';
$page_name = 'chef';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$p_sql = "SELECT * FROM `chef` LEFT JOIN `chef_photo` ON `chef`.`sid`=`chef_photo`.`chef_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);

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
<div class="container pt-3">
<div style="color:orange;">廚師資料表</div>
<div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div>
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <form class="form-inline d-flex" name="form1" action="chef_data_search.php" method="post">
            <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋廚師姓名">
            <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button>
            </form>
           
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
                    <a href="chef_photo.php"><button type="button" class="btn btn-warning mr-2">管理圖片</button></a>
                    <a href="chef_insert.php"><button type="button" class="btn btn-warning">快速新增測試資料</button></a>
                    <a href="chef_data_insert.php"><button type="button" class="btn btn-warning">新增資料</button></a>
                </div>
            </nav>
        </div>
    </div>

<div class="row">
<div class="col-lg-12 table-responsive card-list-table">
    <table class="table table-warning table-hover">
        <thead class="bg-warning text-nowrap">
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
                    <th scope="col">圖片瀏覽</th>
                    <th scope="col">圖片編輯</th>
                </div>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
            <tr class="form_data_font_style">
                <td data-title="#"><?= $row['sid'] ?></td>
                <td data-title="Name"><?= $row['name'] ?></td>
                <td data-title="Email"><?= $row['email'] ?></td>
                <td data-title="Password" class="text-break"><?= $row['password'] ?></td>
                <td data-title="Mobile"class="text-break"><?= $row['mobile'] ?></td>
                <td data-title="Birthday"><?= $row['birthday'] ?></td>
                <!-- <td><?= $row['pic'] ?></td> -->
                <td data-title="Title"><?= $row['title'] ?></td>
                <td data-title="Information"><?= mb_strimwidth($row['info'],0, 100, "...", "UTF-8"); ?></td>
                <td data-title="Experience"><?= mb_strimwidth($row['experience'],0, 100, "...", "UTF-8");  ?></td>
                <td data-title="Area"><?= $row['area'] ?></td>
                <td data-title="Restaurant"><?= $row['restaurant']==1?"是":"否" ?></td>
                <td data-title="Own Kitchen"><?= $row['own_kitchen']==1?"是":"否" ?></td>
                <td data-title="Tool">
                    <!-- 利用迴圈加條件判別，當輸入編號==廚具sid時，echo廚具tool_name -->
                    <?php $require_tools=explode(",",$row['tool']);
                  foreach($require_tools as $require_tool):
                  foreach ($all_tool as $tool) :
                  if($require_tool==$tool['sid']):
                  echo $tool['tool_name']."," ?>
                    <?php endif;endforeach;endforeach; ?></td>
                <td data-title="Note"><?= mb_strimwidth($row['note'],0, 20, "...", "UTF-8");  ?></td>

                <!-- <td><a href="chef_delete.php?sid=<?= $row['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>    -->
                <td data-title="刪除"><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>
                <td data-title="編輯"><a href="chef_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
                <td data-title="圖片瀏覽">
                    <?php 
                      foreach ($all_pics as $pic) :
                        if ($row['sid'] == $pic['chef_sid']) : ?>
                    <a href="/mytest/Chef_pic/chef_photo/<?= $pic['file_name'] ?>"
                        data-lightbox="roadtrip+<?=$pic['chef_sid']?>"><i class="fas fa-images"></i></a>
                    <?php endif;
                    endforeach
            ?>
                </td>

                <td data-title="圖片編輯"><a
                        href="chef_photo_search.php?search_input=<?= $row['name'] ?>&chef_sid=<?= $row['sid'] ?>"><i
                            class="fas fa-images"></i></a></td>
            </tr>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
                      </div>
<script>
function delete_it(sid) {
    if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
        location.href = 'chef_delete.php?sid=' + sid;
    }
}
</script>
<?php include __DIR__ . '/_html_footer.php';  ?>