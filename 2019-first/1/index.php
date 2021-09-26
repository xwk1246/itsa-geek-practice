<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        table,
        td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 5px;
        }

        thead td {
            font-weight: bold;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    include 'db.php';

    $sql = "select * from post;";
    $result = $connect->query($sql);
    ?>
    <div class="container">
        <marquee scrollamount=50>hello</marquee>
        <a href="newPost.php">發表文章</a>
        <table>
            <thead>
                <tr></tr>
                <td>文章標題</td>
                <td>發表人</td>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
                    <td><?php echo $row['author']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script>
        setInterval(() => {
            $.get("getPost.php", {}, (data) => $('tbody').html(data));
        }, 1000);
    </script>
</body>

</html>