<?php
require __DIR__. '/connect.php';
require __DIR__. '/_cred.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM member WHERE email LIKE '%$set%'OR phone LIKE '%$set%' OR address LIKE '%$set%' OR name LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>
<div class="container">
<br>
<table class="table table-warning table-hover">
<thead class="bg-warning">
<thead class="bg-warning">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">密碼</th>
      <th scope="col">姓名</th>
      <th scope="col">電話</th>
      <th scope="col">地址</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
    </tr>
  </thead>
  </thead>
  <tbody>
  
  <?php foreach($rows as $row):?>

  

    <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
     
     <td><?php
      if ($set<>'') :
        echo highlight_word($row['email'], $set);
      else:
        echo $row['email'];  
      endif?>
      </td>

      <td><?=$row['password']?></td>

      <td><?php
      if ($set<>'') :
        echo highlight_word($row['name'], $set);
      else:
        echo $row['name'];  
      endif?>
      </td>
      
      <td><?php
      if ($set<>'') :
        echo highlight_word($row['phone'], $set);
      else:
        echo $row['phone'];  
      endif?>
      </td>
    
    <td><?php
      if ($set<>'') :
        echo highlight_word($row['address'], $set);
      else:
        echo $row['address'];  
      endif?>
      </td>

      <?php if ($row['email']=='admin@gmail.com'):?>
      <td></td>
      <?php else:?>
      <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>   
      <?php endif;?>
      <?php if ($row['email']=='admin@gmail.com'):?>
      <td></td>
      <?php else:?>
      <td><a href="member_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>  
      <?php endif;?>
     
    </tr>
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
                location.href = 'cooking_house_delete.php?sid=' + sid;
            }
        }
</script>

<?php include __DIR__. '/_html_footer.php'?>