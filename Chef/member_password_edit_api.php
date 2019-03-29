<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入有誤',
    'post' => [], // 做 echo 檢查      
        
];
$sid = isset($_SESSION['user'] ['sid']) ? intval($_SESSION['user'] ['sid']) : 0;

if( isset($_POST['old_password']) and isset($_POST['new_password']) 
and isset($_POST['new_password2']) )
{

    $password = $_POST['new_password'];
    $password2 = $_POST['new_password2'];
    $result['post'] = $_POST;  // 做 echo 檢查

    if($password!=$password2)
    {
        $result['errorCode'] = 433;
        $result['errorMsg'] = '兩次新密碼輸入需相同';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    }
    if(strlen($_POST['new_password'])<7 or strlen($_POST['new_password2'])<7)
    {
        $result['errorMsg'] = '密碼請輸入八個字以上';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    } 
    
    if(empty($password)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
 

    $s_sql = "SELECT * FROM `member` WHERE `sid`=?";
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

    $sql = "UPDATE `member` SET 
                `password`=?
                WHERE `sid`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            sha1(trim($_POST['new_password'])),

            $sid
        ]);

        if($stmt->rowCount()==1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';

        }
    } catch(PDOException $ex){
        $result['errorCode'] = 403;
        $result['errorMsg'] = '密碼更新發生錯誤';
    }
}
if($_POST['new_password']!=$_POST['new_password2'])
{
    $result['errorMsg'] = '新密碼兩次輸入需相同';
}
else if(strlen($_POST['new_password'])<8)
{
    $result['errorMsg'] = '密碼請輸入八個字以上';

}


echo json_encode($result, JSON_UNESCAPED_UNICODE);