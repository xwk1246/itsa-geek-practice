<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td {
            border: 1px solid violet;
            border-collapse: collapse;
            padding: 10px;
            color: white;
        }

        a {
            color: white;
        }

        table {
            background: linear-gradient(90deg, red, blue);
        }
    </style>
</head>

<body>
    <?php
    include 'db.php';
    $id = $_GET["id"];
    $sql = " select * from post where id = '$id'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <table>
        <thead>
            <tr>
                <td>作者:</td>
                <td>文章標題: <?php echo $row['title'] ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['content']; ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="editPost.php?id=<?php echo $id ?>">編輯文章</a></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="replyPost.php?id=<?php echo $id ?>">回覆文章</a></td>
            </tr>
            <?php
            $sql = "select * from comment where post_id = '$id';";
            $result = $connect->query($sql) or die($connect->error);
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>