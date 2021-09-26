<?php
$low = $_POST["low"];
$up = $_POST["up"];
$connect = new mysqli("localhost", "root", "", "practice");
if ($connect->error) die($connect->error);;

$sql = "SELECT weight from height_weight WHERE height>=$low AND height<=$up";
$result = $connect->query($sql) or die($connect->error);

$count = $result->num_rows;
if ($count === 0) die('Nobody has a height in the specific range!');
else if ($count >= 10) {
    $sum = 0;
    while ($row = $result->fetch_assoc()) {
        $sum += intval($row['weight']);
    }
    echo $sum / $count;
} else if ($count === 1) {
    $random = rand(0, 2);
    if ($random) echo $result->fetch_assoc()["weight"] + rand(1, 10);
    else echo $result->fetch_assoc()["weight"] - rand(1, 10);
}
