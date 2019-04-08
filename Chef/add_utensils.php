<?php 
require __DIR__.'/connect.php';
// $page_name = 'add_utensils';
// $per_page =5;
// $page = isset($_GET['page'])? intval($_GET['page']):1;
$p_sql = "SELECT * FROM `add_utensils` LEFT JOIN `add_utensils_photo` ON `add_utensils`.`sid`=`add_utensils_photo`.`add_utensils_sid`";
$p_stmt = $pdo->query($p_sql);
$all_pics = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
//算總比數
$t_sql = "SELECT COUNT(1) FROM add_utensils";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
//總頁數 ceil() 函數向上舍入為最接近的整數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;
// $sql = sprintf("SELECT * FROM add_utensils ORDER BY sid LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$sql = sprintf("SELECT * FROM add_utensils ORDER BY sid LIMIT %s, %s", 1, $total_rows);
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
      <li class="breadcrumb-item active" style="color:orange;">餐具資料表</li>
    </ol>
  </nav>


<!-- <div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div> -->
    <!-- <div><?= $total_rows ?></div> -->
    <!-- <div><?= $stmt->rowCount() ?></div> -->


   <!-- 上排按鈕 -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
                <!-- <form class="form-inline d-flex" name="form1" action="add_utensils_data_search.php" method="post"> -->
                  <!-- <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋餐具名稱"> -->
                  <!-- <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button> -->
                  <!-- <div class="center_div pt-3"> -->
                <div class="float-right mb-2">
                  <!-- <a href="chef_photo.php"><button type="button" class="btn btn-warning mr-2">管理圖片</button></a> -->
                  <!-- <a href="chef_insert.php"><button type="button" class="btn btn-warning mr-2">快速新增測試資料</button></a> -->
                      <a href="chef_data_insert.php"><i class="fas fa-plus-circle fa-2x text-warning mr-2"></i></a>
                      <a id="delete_records" href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-minus-circle fa-2x text-warning"></i></a>

                </div>
                <div class="buttons-toolbar mb-2">
            </div>
                
        </div>
    </div>
   <!-- </form> -->
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
          <tr class="text-center">
              <th><input style="zoom: 1.5" type="checkbox" id="select_all"></th>
              <th scope="col" data-sortable="true">商品編號</th>
              <th scope="col" data-sortable="true">會員編號</th>
              <th scope="col" data-sortable="true">商品名稱</th>
              <th scope="col" data-sortable="true">租借金額</th>
              <th scope="col" data-sortable="true">購買金額</th>
              <!-- <th scope="col">訂購數量</th> -->
              <th scope="col" data-sortable="true">詳細資訊</th>
              <th scope="col" data-sortable="true">產品特色</th>
          <div col-md-6 >
              <th scope="col">修改<i class="fas fa-edit"></i></th>
              <!-- <th scope="col"><i class="fas fa-trash-alt"></i></th> -->
              <!-- <th scope="col">瀏覽<i class="far fa-images"></i></i></th> -->
              <th scope="col">圖片<i class="far fa-images"></i></th>
              </div>
          </tr>
        </thead>
    <tbody>
        <?php foreach($rows as $row):?>
          <tr class="form_data_font_style ">
                  <td data-title="選擇"><input style="zoom: 1.5" type="checkbox" class="checkbox" data-id="<?php echo $rows["id"]; ?>"></td>
                  <td class="text-center" data-title="商品編號"><?=$row['sid']?></td>
                  <td class="text-center" data-title="會員編號"><?=$row['clients']?></td>
                  <td data-title="商品名稱"><?=$row['name']?></td>
                  <td class="text-center" data-title="租借金額"><?=$row['rent']?></td>
                  <td class="text-center" data-title="購買金額"><?=$row['price']?></td>
                  <!-- <td><?=$row['quantity']?></td> -->
                  <td data-title="詳細資訊"><?=nl2br($row['details'])?></td>     
                  <td data-title="產品特色"><?=nl2br($row['intro'])?></td>
                  <td class="text-center" data-title="修改"><a href="add_utensils_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit text-dark"></i></a></td>
                  <!-- <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class=" fas fa-trash-alt text-dark"></i></a></td>   
                  <td> -->
                    <!-- <?php 
                        foreach ($all_pics as $pic) :
                        if ($row['sid'] == $pic['add_utensils_sid']) : ?>
                        <a href="/mytest/Chef_pic/add_utensils_photo/<?= $pic['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['add_utensils_sid']?>"><i class="fas fa-images"></i></a>
                        <?php endif;
                        endforeach
                    ?> -->
                  
                  <td class="text-center" data-title="圖片"><a href="add_utensils_photo_search.php?search_input=<?= $row['name'] ?>&add_utensils_sid=<?= $row['sid'] ?>"><i class="far fa-images text-dark"></i></a></td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
</div>
</div>

      <!-- 頁數切換 -->
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
      // select_all
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
        // delete
        $('#delete_records').on('click', function(sid) {
            var add_utensils = [];
            $(".checkbox:checked").each(function() {
              add_utensils.push($(this).data('sid'));
            });
            if(add_utensils.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(add_utensils.length>1?"these":"this")+" row?";
            var checked = confirm(WRN_PROFILE_DELETE);
            if(checked == true) {
            var selected_values = add_utensils.join(",");
            $.ajax({
            type: "POST",
            url: "delete_action.php",
            cache:false,
            data: 'sid='+selected_values,
            success: function(response) {
            // remove deleted employee rows
            var sid = response.split(",");
            for (var i=0; i < sid.length; i++ ) { $("#"+sid[i]).remove(); } } }); } } });
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'add_utensils_delete.php?sid=' + sid;
            }
        }
    </script>
<?php include __DIR__. '/_html_footer.php';  ?>