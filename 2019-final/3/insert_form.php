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
    if (isset($_GET["table"])) {
        $table = $_GET["table"];
        $fieldNames = $_GET["fieldNames"];
        $value = $_GET["value"];
        $start = $_GET["start"];
        $end = $_GET["end"];
        $sql = "INSERT INTO $table ($fieldNames, starting_time, ending_time) values ($value, '$start', '$end')";
        include_once "./db.php";
        $connect->query($sql) or die($connect->error);
    }
    ?>
    <form>
        insert into<br />
        (Enter table name)<input type="text" name="table"><br />
        (Enter field names, e.g., "pid, courseid, name")<input type="text" name="fieldNames"><br />
        (Enter the value, e.g., "1, 2, 'Mary'")<input type="text" name="value"><br />
        (Enter starting time, e.g., "2001")<input type="text" name="start"><br />
        (Enter ending time, e.g., "2002")<input type="text" name="end"><br />
        <input type="submit" value="Next">
    </form>
</body>

</html>