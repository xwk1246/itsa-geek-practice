<?php
header("Location:index.php");

$filename = $_FILES["file"]["name"];
$data = $_POST['photoUrl'];

list($type, $data) = explode(';', $data);
list(, $type) = explode('/', $type);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
var_dump($data);

file_put_contents('files/image.' . $type, $data);
move_uploaded_file($_FILES['file']["tmp_name"], "files/" . $filename);

include 'db.php';
$sql = "insert into file values ('files/$filename')";
if ($connect->query($sql) === FALSE) die("Insert Error!!!");
exit;
