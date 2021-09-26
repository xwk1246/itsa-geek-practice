<?php
header("Location: index.php");

include "db.php";
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$secret = $_POST['secret'];

$sql = "insert into post values ('', '$title', '$author', '$content', '$secret');";
if ($connect->query($sql) === TRUE) echo "Insert Successfully!!";
else die("Insert Error!!" . $connect->error);

exit;
