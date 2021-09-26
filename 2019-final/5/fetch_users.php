<?php
session_start();
//設定臺北為預設時區
date_default_timezone_set("Asia/Taipei");

//當使用者未登入則導回login.php
if (!isset($_SESSION['uid'])) {
    header("Loction:login.php");
}


//連接資料庫
$connect = new mysqli("localhost", "root", "", "livechat");
$connect->set_charset("utf8");
if ($connect->connect_error) die($connect->connect_error);


//顯示除登入者以外的所有使用者
$sql = "SELECT * from account";
$result = $connect->query($sql);
$users = [];
while ($row = $result->fetch_assoc()) {
    $user = [];
    $uid = $row['uid'];
    array_push($user, $row['uname']);
    array_push($user, $uid);
    $sql2 = "SELECT activetime from login WHERE uid='$uid'";
    $loginUser = $connect->query($sql2);
    if ($loginUser->num_rows === 0) array_push($user, "離線");
    else {
        while ($row2 = $loginUser->fetch_assoc()) {
            $sub = time() - strtotime($row2["activetime"]);
            if ($sub < 10) {
                array_push($user, "在線");
            } else array_push($user, "離線");
        }
    }
    array_push($users, $user);
}
echo json_encode($users);
