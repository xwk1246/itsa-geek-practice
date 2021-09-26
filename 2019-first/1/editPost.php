<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewPost</title>
</head>

<body>
    <?php
    include 'db.php';
    $id = $_GET['id'];

    $sql = "select id, title, content from post where id = '$id';";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form name="form" action="../editPost_action.php?id=<?php echo $id; ?>" method="POST" accept-charset="UTF-8" align="center">
        <h3>編輯貼文</h3>
        <table>
            <tr>
                <th>標題:</th>
                <th><input type="text" name="title" size="30" required value="<?php echo $row['title']; ?>" /></th>
            </tr>
            <tr>
                <th>內容:</th>
                <th><textarea name="content" rows="10" cols="30" required><?php echo $row['content']; ?></textarea></textarea></th>
            </tr>
            <tr>
                <th>通關密語:</th>
                <th><input type="text" name="secret" size="30" required /></th>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <input type="reset" value="清除表單" class="button" />
        <input type="submit" align="right" value="送出" class="button" />
    </form>
</body>

</html>