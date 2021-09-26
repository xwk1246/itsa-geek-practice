<?php
//設定臺北為預設時區
date_default_timezone_set('Asia/Taipei');

//當使用者未登入則導回login.php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:login.php');
    exit();
}

//連接資料庫
try {
    $conn = new PDO("mysql:host=localhost;dbname=livechat", "root", "");
} catch (PDOException $err) {
    die("資料庫無法連接");
}

$query = "UPDATE login SET activetime=now() WHERE loginid=?";
$stmt = $conn->prepare($query);
$stmt->execute(array($_SESSION["loginid"]));
echo $_SESSION["loginid"];
