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
    ?>
    <form name="form" action="../replyPost_action.php" method="POST" accept-charset="UTF-8" align="center">
        <h3>回覆貼文</h3>
        <table>
            <tr>
                <th>發表人:</th>
                <th><input type="text" name="author" size="30" required /></th>
            </tr>
            <tr>
                <th>內容:</th>
                <th><textarea name="content" rows="10" cols="30" required></textarea></textarea></th>
            </tr>
        </table>
        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
        <input type="reset" value="清除表單" class="button">
        <input type="submit" align="right" value="送出" class="button">
    </form>
</body>

</html>