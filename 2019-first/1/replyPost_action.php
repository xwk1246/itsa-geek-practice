<?php
include 'db.php';

$post_id = $_POST['post_id'];
$author = $_POST['author'];
$content = $_POST['content'];

header("Location: /post.php?id=$post_id");

$sql = "insert into comment values ('', '$content', '$author', '$post_id');";
if ($connect->query($sql) === TRUE) echo "Insert Successfully!!";
else die("Insert Error!!" . $connect->error);

exit;
