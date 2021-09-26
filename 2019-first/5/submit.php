<?php
header('Location: index.php');

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$phone = $_POST['phone'];
include("db.php");
$sql = "insert into users value ('', '$name', '$birthday', '$email', '$phone')";
$result = $connect->query($sql);
