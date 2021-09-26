<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["tableName"]) && isset($_GET["fieldType"])) {
        $tableName = $_GET["tableName"];
        $fieldType = $_GET["fieldType"];
        $sql = "CREATE TABLE $tableName ($fieldType, starting_time INT, ending_time INT)";
        echo $sql;
        include_once "./db.php";
        $connect->query($sql) or die($connect->error);
    }
    ?>
    <form style="display: flex; flex-direction:column" method="GET">
        <label>create table
            <input name="tableName">
        </label>
        <label>Enter fields and types, e.g., "id int, name char(10)"
            <input name="fieldType">
        </label>
        <input type="submit" style="width: 80px;">
    </form>
</body>

</html>