<?php
$file = file("data.txt");

$connect = new mysqli('localhost', 'root', '', 'practice');
$connect->set_charset('utf8');
if ($connect->error) die($connect->error);

foreach ($file as $line) {
    list($height, $weight) = explode(" ", $line);
    $sql = "INSERT INTO height_weight VALUES ('', $height, $weight)";
    $connect->query($sql) or die($connect->error);
}
