<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if(isset($_POST['name']) and !empty($sid)){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $web = $_POST['web'];
    $intro = $_POST['intro'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($phone) or empty($address) or empty($intro)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    if(mb_strlen($name)<2)
    {  
        $result['errorMsg'] = '料理空間名稱需大於2字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    } 
    if(strlen($address)<10)
    {
        $result['errorMsg'] = '地址需大於10字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    else
    {

    if(mb_strlen($name)<2)
    {  
        $result['errorMsg'] = '料理空間名稱需大於2字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    } 
    if(mb_strlen($address)<10)
    {
        $result['errorMsg'] = '地址需大於10字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    else
    {


        $s_sql = "SELECT * FROM `cooking_house` WHERE `sid`=?";
        $s_stmt = $pdo->prepare($s_sql);
        $s_stmt->execute([$sid]);

     switch($s_stmt->rowCount()){
            case 0:
             $result['errorCode'] = 410;
             $result['errorMsg'] = '該筆資料不存在';
             echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
             //break;
            case 1:
             $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
                if($row['sid']!=$sid){
                 $result['errorCode'] = 430;
                 $result['errorMsg'] = '該筆資料不存在';
                 echo json_encode($result, JSON_UNESCAPED_UNICODE);
                 exit;
                }
         }

        $sql = "UPDATE `cooking_house` SET 
                `name`=?,
                `phone`=?,
                `address`=?,
                `web`=?,
                `intro`=? 
                WHERE `sid`=?";

      try {
          $stmt = $pdo->prepare($sql);

            $stmt->execute([
              $_POST['name'],
              $_POST['phone'],
              $_POST['address'],
              $_POST['web'],
              $_POST['intro'],
              $sid
          ]);

             if($stmt->rowCount()==1) {
                $result['success'] = true;
                $result['errorCode'] = 200;
                 $result['errorMsg'] = '';
            } else {
               $result['errorCode'] = 402;
               $result['errorMsg'] = '資料沒有修改';
              }
        } catch(PDOException $ex){
             $result['errorCode'] = 403;
             $result['errorMsg'] = '資料更新發生錯誤';
        }
    }
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);