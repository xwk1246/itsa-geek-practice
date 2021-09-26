<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center
        }

        #main-button {
            float: right;
        }

        table,
        th,
        td {
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        td a button {
            border-radius: 10px;
            background: radial-gradient(#eee, dodgerblue);
            padding: 5px;
            margin-inline: 5px;
            transition: filter 0.5s;
            cursor: pointer;
        }

        td a button:hover {
            filter: brightness(1.2);
        }
    </style>
</head>

<body>
    <h1>會員資料列表</h1>
    <div id="main-button">
        <a href="index.php">
            <button>列表</button>
        </a>
        <a href="form.php">
            <button>新增</button>
        </a>
    </div>
    <table align='center'>
        <th>姓名</th>
        <th>生日</th>
        <th>電子郵件</th>
        <th>行動電話</th>
        <th>編輯操作</th>
        </tr>
        <?php
        include 'db.php';

        $sql = 'select * from users;';
        $result = $connect->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['birthday'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td>
                    <a id="update" href="delete.php?id=<?php echo $row['ID']; ?>">
                        <button type="submit">編輯</button>
                    </a>
                    <a id="delete" href="delete.php?id=<?php echo $row['ID']; ?>">
                        <button style='background: radial-gradient(#eee, red);' type="submit">刪除</button>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script>
        const deleteButton = document.querySelector("#delete");
        deleteButton.onclick = () => {
            if (!confirm("你確定要刪除嗎?")) return false;
        }
    </script>
</body>

</html>