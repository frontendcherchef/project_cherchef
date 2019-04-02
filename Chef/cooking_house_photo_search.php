<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

if(isset($_POST['search_input']))
   $set = $_POST['search_input'];
else if ($_GET['search_input'])
   $set = $_GET['search_input'];


if($set)
{

//先從sooking_house以name查sid
//再從cooking_house_photo以sid查符合的資料


//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM cooking_house WHERE name LIKE '%$set%'";
$result =$pdo->query($show);
$r = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>

<div class="container">
<!-- 上排按鈕 -->
<br>
<div class="center_div">
  <a href="cooking_house_photo_insert.php"><button type="button" class="btn btn-warning  col-md-3  ">新增圖片資料</button></a>
  <a href="cooking_house.php"><button type="button" class="btn btn-warning  col-md-3  ">回到料理空間資料表</button></a>
  <a href="cooking_house_photo.php"><button type="button" class="btn btn-warning  col-md-3  ">回到料理空間圖片資料表</button></a>
  <br>
</div>
<br>


<br>
 <table class="table table-warning table-hover">
<thead class="bg-warning">
    <tr>
      <th scope="col" >#</th>
      <th scope="col">cooking_house_sid</th>
      <th scope="col" >cooking_house_name</th></th>
      <th scope="col" >file_name</th>
      <th scope="col" >photo</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($r as $ro):?>
<?php
$sid =$ro['sid'];
$show2 = "SELECT * FROM cooking_house_photo WHERE cooking_house_sid = $sid";
 $result2 =$pdo->query($show2);
 $rows = $result2->fetchAll(PDO::FETCH_ASSOC); 

?>

  <?php foreach($rows as $row):?>
  <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
      <td><?=$row['cooking_house_sid']?></td>
   <?php
  
   $stmt2 = $pdo->prepare("SELECT * FROM cooking_house WHERE sid=?");
   $stmt2->execute([$row['cooking_house_sid']]); 
   $user = $stmt2->fetch(PDO::FETCH_ASSOC);

    
   ?>

      <td><?php
      if ($set<>'') :
        echo highlight_word($user['name'], $set);
      else:
        echo $user['name'];  
      endif?>
      </td>
      <td><?=$row['file_name']?></td>

      <td>
     
       <a href="/mytest/Chef_pic/cooking_house_photo/<?= $row['file_name'] ?>" data-lightbox="roadtrip+<?=$pic['cooking_house_sid']?>"><i class="fas fa-images"></i></a>
  
      </td>



     <td><a href="javascript: delete_it(<?= $row['sid'] ?>,'<?= $row['file_name']?>')"><i class="fas fa-trash-alt"></i></a></td>   
     <td><a href="cooking_house_photo_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
    </tr>
<?php endforeach; ?>

<?php endforeach; ?>
</tbody>
</table> 
<br>
      </div>


<?php
}
?>

<?php
function highlight_word( $content, $word) 
{
    $replace = '<span style="background-color: #ffb997;">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content
    return $content; // return highlighted data
}

?>


<script>
        function delete_it(sid){
            if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
                location.href = 'cooking_house_photo_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>