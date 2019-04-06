<?php
$db_host ='localhost';
$db_name ='chef';
$db_user ='';
$db_pass ='admin';
$dsn = sprintf('mysql:host=%s;dbname=%s', $db_host, $db_name);
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);

    // 連線使用的編碼設定
    $pdo->query("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $pdo->query("use `mytest`"); // 指定使用的資料庫Ｄ
} catch(PDOException $ex) {
    echo 'Connection failed:'. $ex->getMessage();
}

if(! isset($_SESSION)){
    session_start();
}
