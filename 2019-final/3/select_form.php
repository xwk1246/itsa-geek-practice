<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        select <br>
        (Enter fields to be selected, e.g. "*")<input name="field"><br>
        from <br>
        (Enter tables names. e.g. "table1. table2")<input name="tableName"><br>
        where<input name="where"><br>
        when<input name="when">.INTERVAL COVERS <input name="when_2">.INTERVAL <br>
        <input type="submit">
    </form>
    <?php
    if (isset($_GET["field"])) {
        $field = $_GET["field"];
        $tableName = $_GET["tableName"];
        $where = $_GET["where"];
        $when = $_GET["when"];
        $when_2 = $_GET["when_2"];
        $sql = "SELECT $field, $when.starting_time, $when.ending_time, $when_2.starting_time, $when_2.ending_time FROM $tableName WHERE $where AND $when.starting_time <= $when_2.starting_time AND $when.ending_time >= $when_2.ending_time";
        include_once "./db.php";
        $result = $connect->query($sql) or die($connect->error);
        while ($row = $result->fetch_assoc()) {
            echo $row[explode(", ", $field)[0]] . " " . $row[explode(", ", $field)[1]];
    ?>
            <br>
    <?php
        }
    }
    ?>
</body>

</html>