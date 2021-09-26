<?php

header("Location: index.php");

include 'db.php';

$id = $_GET['id'];

$sql = "delete from users where ID='$id'";
if ($connect->query($sql) === TRUE) echo "Delete Successfully!!";
else die("Delete Error!!" . $connect->error);
