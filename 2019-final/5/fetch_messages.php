<?php
//當使用者未登入則導回login.php
session_start();
if (!isset($_SESSION['uid'])) {
  header('location:login.php');
  exit();
}

//連接資料庫
try {
  $conn = new PDO("mysql:host=localhost;dbname=livechat;charset=utf8", "root", "");
} catch (PDOException $err) {
  die("資料庫無法連接");
}

$query = "SELECT * FROM messages WHERE touid=? OR fromuid=? ORDER BY msgtime DESC";
$stmt = $conn->prepare($query);
$stmt->execute(array($_SESSION["uid"], $_SESSION["uid"]));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = '<ul class="list-group list-group-flush overflow-auto">';
foreach ($rows as $row) {
  $oname = '';
  if ($row['fromuid'] != $_SESSION['uid']) {
    $query = "SELECT * FROM account WHERE uid=?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($row["fromuid"]));
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $oname = $r['uname'];
  }
  if (empty($oname))
    $output .= '<li class="list-group-item">' . $row["message"] . '<div class="text-right">- <small><em>' . $row['msgtime'] . '</em></small></div></li>';
  else
    $output .= '<li class="list-group-item">' . $oname . '-' . $row["message"] . '<div class="text-right">- <small><em>' . $row['msgtime'] . '</em></small></div></li>';
}
$output .= '</ul>';
echo $output;
