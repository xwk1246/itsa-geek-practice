<?php

header("Location: index.php");

include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "update users set name='$name', birthday='$birthday', email='$email', phone='$phone' where ID='$id'";
if ($connect->query($sql) === TRUE) echo "Update Successfully!!";
else die("Update Error!!" . $connect->error);
