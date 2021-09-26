<?php
echo "hello";
include "db.php";

$sql = "select * from post";
$data = "";
$result = $connect->query($sql);
while ($row = $result->fetch_assoc()) {
    $data = $data . "<tr><td>" . $row['title'] . "</td><td>" . $row["author"] . "</td></tr>";
}
echo $data;
