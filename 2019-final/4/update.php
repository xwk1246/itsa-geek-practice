<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
        }

        [type=submit] {
            width: 50px;
        }
    </style>
</head>

<body>
    <?php
    include 'db.php';

    $id = $_GET['id'];

    $sql = "select * from users where ID='$id'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="update_action.php" method="POST">
        <div>
            <label for="name">姓名:</label>
            <input id="name" name="name" type="text" value="<?php echo $row['name'] ?>">
        </div>
        <div>
            <label for="birthday">生日:</label>
            <input id="birthday" name="birthday" type="date" value="<?php echo $row['birthday'] ?>">
        </div>
        <div>
            <label for="email">電子郵件:</label>
            <input id="email" name="email" type="email" value="<?php echo $row['email'] ?>">
        </div>
        <div>
            <label for="phone">行動電話:</label>
            <input id="phone" name="phone" type="tel" value="<?php echo $row['phone'] ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <input type="submit" value="修改">
    </form>
</body>

</html>