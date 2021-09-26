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

        form {
            display: flex;
            flex-direction: column;
            width: 500px;
        }

        [type=submit] {
            width: 50px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
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
    <form action="submit.php" method="POST">
        <div>
            <label for="name">姓名:</label>
            <input id="name" name="name" type="text" required>
        </div>
        <div>
            <label for="birthday">生日:</label>
            <input id="birthday" name="birthday" type="date" placeholder="年/月/日" required>
        </div>
        <div>
            <label for="email">電子郵件:</label>
            <input id="email" name="email" type="email" required>
        </div>
        <div>
            <label for="phone">行動電話:</label>
            <input id="phone" name="phone" type="tel" pattern="^[0-9]{4}-[0-9]{6}" required>
        </div>
        <input type="submit" value="建立">
    </form>
</body>

</html>