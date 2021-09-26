<?php
include "db.php";

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$secret = $_POST['secret'];

$sql = "select secret from post where id = '$id';";
$result = $connect->query($sql) or die($connect->error);
$row = $result->fetch_assoc();
if ($secret !== $row['secret']) die("Wrong secret!!");

header("Location: /post.php?id=$id");

$sql = "update post set title = '$title', content = '$content' where id = '$id';";
if ($connect->query($sql) === TRUE) echo "Update Successfully!!";
else die("Update Error!!" . $connect->error);
