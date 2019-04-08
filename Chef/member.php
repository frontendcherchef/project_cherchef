<?php 
require __DIR__.'/connect.php';

header("Content-Type:text/html; charset=utf-8");

// $per_page = 10;
// $page = isset($_GET['page'])? intval($_GET['page']):1;


//算總比數
$t_sql = "SELECT COUNT(1) FROM member";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];


//總頁數
// $total_pages = ceil($total_rows/$per_page);
// if($page>$total_pages) $page =$total_pages;
// if($page<1) $page =1;


// // ORDER BY sid DESC LIMIT 表示排序為降冪, 升冪要刪除 DESC
// $sql = sprintf("SELECT * FROM member ORDER BY sid DESC LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$sql = sprintf("SELECT * FROM member ORDER BY sid DESC LIMIT %s, %s", 0, $total_rows);
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
      <li class="breadcrumb-item active" style="color:orange;">成員資料表</li>
    </ol>
  </nav>

<!-- <div><?= $page. " / ".$total_pages." 頁，共 ".$total_rows." 筆資料" ?></div> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Search -->
            <!-- <form class="form-inline d-flex" name="form1" action="member_search.php" method="post">
            <input type="text" class="form-control col-12 col-md-6 mr-2 my-2" id="search_input" name="search_input" placeholder="搜尋">
            <button type="submit" class="btn btn-warning col-12 col-md-2 col-lg-1 my-md-2 mb-2" >Search</button>
            </form> -->
            <!-- -->
            <!-- <nav class="d-flex mb-2">
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
        
            </nav>  -->
            <div class="float-right ">
                    <a href="member_insert.php"><button type="button" class="btn btn-warning">新增成員</button></a>
                 <!--選擇顯示欄位-->
             <div class="btn btn-warning showSelect" style="position:relative;cursor:pointer">顯示欄位
                        <ul class="mySelects">
                            <li class="mySelect"> <input type="checkbox" id="email"> <label for="email">Email</label>
                            </li>
                            <li class="mySelect"> <input type="checkbox" id="name"> <label for="name">姓名</label>
                            </li>
                            <li class="mySelect"> <input type="checkbox" id="phone"> <label for="phone">電話</label>
                            </li>
                            <li class="mySelect"> <input type="checkbox" id="address"> <label for="address">地址</label>
                            </li>
                        </ul>
                    </div>
                    <!--選擇顯示欄位-->
                </div>
                <div class="buttons-toolbar ">
            </div>
            
        </div>

    </div>
    

<div class="row">
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
            >
<thead class="bg-warning text-nowrap">
    <tr>
    <th scope="col" data-sortable="true" data-align="center" data-field="sid">#</th>
      <th scope="col"  data-sortable="true" data-field="email" >Email</th>
      <th scope="col"  data-sortable="true" data-field="name" >姓名</th>
      <th scope="col"  data-sortable="true" data-field="phone" >電話</th>
      <th scope="col"  data-sortable="true" data-field="address" >地址</th>
      <!-- <th scope="col">刪除</th>
      <th scope="col">編輯</th> -->
      <th scope="col">更多操作</th>
    
    
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr>
      
      <td data-title="#"><?=$row['sid']?></td>
      <td data-title="Email" data-fieldName="email" ><?=$row['email'] ?></td>
      <td data-title="姓名" class="text-nowrap" data-fieldName="name"><?=$row['name']?></td>
      <td data-title="電話" class="text-nowrap" data-fieldName="phone"><?=$row['phone']?></td>
      <td data-title="地址"data-fieldName="address"><?=$row['address']?></td>

      <?php if ($row['email']=='admin@gmail.com'):?>
      <td></td>

      <?php else:?>
      <td data-title="刪除"><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a>
      <a href="member_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a>   
      </td>   
     
      <?php endif;?>
     
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>

</div>
<br>

<script>

//初始勾選全部
$(".mySelect input").prop("checked", true)
//選單顯示or隱藏
$(".showSelect").click(function() {
    $(".mySelects").toggleClass("active")
})
$(".mySelect").click(function(event) {
    event.stopPropagation();
})
$(".mySelect input").change(function(event) {
    console.log("c")
    $(".mySelect input:checkbox:not(:checked)").each(function() {
        let fieldName = $(this).attr("id")
        console.log(fieldName)
        $(`thead th[data-field=${fieldName}]`).hide();
        $(`tbody td[data-fieldName=${fieldName}]`).hide();
    })
    $(".mySelect input:checkbox:checked").each(function() {
        let fieldName = $(this).attr("id")
        console.log(fieldName)
        $(`thead th[data-field=${fieldName}]`).show();
        $(`tbody td[data-fieldName=${fieldName}]`).show();
    })
})
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'member_delete.php?sid=' + sid;
            }
        }
</script>



<?php include __DIR__. '/_html_footer.php';  ?>
