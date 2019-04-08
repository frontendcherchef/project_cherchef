<?php
require __DIR__. '/connect.php';
header("Content-Type:text/html; charset=utf-8");
?>


<?php

$set = $_POST['search_input'];
if($set)
{
//$show = "SELECT * FROM cooking_house where name = '$set'";
$show = "SELECT * FROM cooking_house WHERE name LIKE '%$set%'OR phone LIKE '%$set%' OR address LIKE '%$set%' OR web LIKE '%$set%' OR intro LIKE '%$set%'";
$result =$pdo->query($show);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>


<br>
<div class="container">
<table class="table table-warning table-hover">
<thead class="bg-warning">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <div col-md-6>
      <th scope="col">Web</th>
      <th scope="col">Intro</th>
      <th scope="col">刪除</th>
      <th scope="col">編輯</th>
      </div>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row):?>
    <tr class="form_data_font_style">
      <td><?=$row['sid']?></td>
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
      <td><?php
      if ($set<>'') :
        echo highlight_word($row['web'], $set);
      else:
        echo $row['web'];  
      endif?>
      </td>
      <td><?php
      if ($set<>'') :
        echo highlight_word($row['intro'], $set);
      else:
        echo $row['intro'];  
      endif?>
      </td>
     <!-- <td><a href="cooking_house_delete.php?sid=<?= $row['sid']?>"><i class="fas fa-trash-alt"></i></a></td>    -->
     <td><a href="javascript: delete_it(<?= $row['sid'] ?>)"><i class="fas fa-trash-alt"></i></a></td>   
     <td><a href="cooking_house_data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>   
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