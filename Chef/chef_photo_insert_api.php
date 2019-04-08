<?php
require __DIR__. '/connect.php';
header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];

//合併時註解此行
$upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/chef_photo/';

//合併時取消註解
// $upload_dir = 'C:/xampp/htdocs/mytest/Chef_pic/chef_photo/';

//命名用
$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `chef_photo`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;

// 如果有sid且輸入之chef_sid!=0且存在 (未做)*chef_sid


$stmt = $pdo->prepare("SELECT * FROM chef WHERE sid=?");
$stmt->execute([$_POST['chef_sid']]); 
$user = $stmt->fetch();
if ($user) {
    

foreach($_FILES['my_file']['error'] as $k=>$error){
    
    $extension = pathinfo( $_FILES['my_file']['name'][$k] , PATHINFO_EXTENSION);

    if($error == UPLOAD_ERR_OK){
        move_uploaded_file(
            $_FILES['my_file']['tmp_name'][$k],
            $upload_dir. "c_".$last."_".$k.".". $extension
        );

    }


    if(!empty($_POST['chef_sid'])){
        $chef_sid = $_POST['chef_sid'];
        $result['post'] = $_POST; 
    
       
       if(empty($_FILES['my_file']))
       {
           exit;
       }
    
       $sql = "INSERT INTO `chef_photo`(
        `chef_sid`,`file_name`
        ) VALUES (
          ?,?
        )";
    try {
        $stmt = $pdo->prepare($sql);
    
        $stmt->execute([
            $_POST['chef_sid'],
            "c_".$last."_".$k.".".$extension

     
        ]);
    
        if($stmt->rowCount()==1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料新增錯誤';
        }
    } catch(PDOException $ex){
        $result['error'] =$ex->getMessage();
        $result['errorCode'] = 403;
        $result['errorMsg'] = '重複輸入';
    }








}

}



echo json_encode($result, JSON_UNESCAPED_UNICODE);

}
else {
        $result['errorCode'] = 404;
        $result['errorMsg'] = 'no such chef_sid';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
   
} 
?>