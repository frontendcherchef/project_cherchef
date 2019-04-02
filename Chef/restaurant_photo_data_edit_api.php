<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];
$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/restaurant_photo//';
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

$stmt = $pdo->prepare("SELECT * FROM restaurant WHERE sid=?");
$stmt->execute([$_POST['restaurant_sid']]); 
$user = $stmt->fetch();
if ($user) {

if(isset($_POST['restaurant_sid']) and !empty($sid))
{

    $restaurant_sid = $_POST['restaurant_sid'];
    $file_name = $_POST['file_name'];
    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($restaurant_sid) or empty($file_name)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $s_sql = "SELECT * FROM `restaurant_photo` WHERE `sid`=?";
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

    $sql = "UPDATE `restaurant_photo` SET 
                `restaurant_sid`=?
                WHERE `sid`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['restaurant_sid'],
            $sid
        ]);

            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
            move_uploaded_file(
                $_FILES['my_file']['tmp_name'],
                //$upload_dir. "c_h_".$last.$_FILES['my_file']['name'][$k]
                $upload_dir.$_POST['file_name']
            );

            //header('Location: '. $_SERVER['HTTP_REFERER']);
     
    } catch(PDOException $ex){
        $result['error'] =$ex->getMessage();
        $result['errorCode'] = 403;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
    
}

}
else{
    $result['errorCode'] = 404;
    $result['errorMsg'] = 'no restaurant_sid ';

}

echo json_encode($result, JSON_UNESCAPED_UNICODE);