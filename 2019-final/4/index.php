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

        #paginator {
            margin-block: 10px;
        }

        #paginator a {
            color: black;
            /* background-color: yellow; */
            padding-top: 5px;
            padding-bottom: 10px;
            padding-inline: 15px;
            text-decoration: none;
            transition: filter 0.5s ease;
        }

        #paginator a:hover {
            background-color: lightgray;
        }

        #paginator a.active {
            color: white;
            background-color: dodgerblue;
            transition: filter 0.5s ease;
        }

        #paginator a.active:hover {
            filter: brightness(1.2);
        }
    </style>
</head>

<?php


include 'db.php';

$curPage = 1;
if (isset($_GET["page"]))
    $curPage = $_GET["page"];

$addons = '';
if (isset($_GET['name']) && $_GET['name'] !== '' || isset($_GET['email']) && $_GET['email'] !== '' || isset($_GET['phone']) && $_GET['phone'] !== '') {
    $query = [];
    if (isset($_GET['name']) && $_GET['name'] !== '') {
        $getName = $_GET['name'];
        $name = "name like '%$getName%'";
        array_push($query, $name);
    }
    if (isset($_GET['email']) && $_GET['email'] !== '') {
        $getEmail = $_GET['email'];
        $email = "email like '%$getEmail%'";
        array_push($query, $email);
    }
    if (isset($_GET['phone']) && $_GET['phone'] !== '') {
        $getPhone = $_GET['phone'];
        $phone = "phone like '%$getPhone%'";
        array_push($query, $phone);
    }
    $addons = " where " . implode(" and ", $query);
}

$sql = "select count(ID) from users " . $addons;
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$count = $row['count(ID)'];
$page = floor($row['count(ID)'] / 10) + 1;

$sql = "select * from users " . $addons . " limit " . ((($curPage - 1) * 10)) . ", 10;";
$result = $connect->query($sql);
?>
<h1>會員資料列表</h1>
<form action="index.php" method="get">
    <label>姓名
        <input type="text" name="name">
    </label>
    <label>電子郵件
        <input type="text" name="email">
    </label>
    <label>電話
        <input type="text" name="phone">
    </label>
    <input type="submit" value="查詢">
</form>
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
    if ($result) {
        for ($i = 0; $i < ($curPage == $page ? $count % 10 : 10); $i += 1) {
            $row = $result->fetch_assoc();
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
    }
    ?>
</table>
<div id="paginator" align="center">
    <a href="index.php?page=1&name=<?php echo isset($_GET["name"]) && $_GET["name"] ?>&email=<?php echo isset($_GET["email"]) && $_GET["email"] ?>&phone=<?php echo isset($_GET["phone"]) && $_GET["phone"] ?>"><</a>
    <?php
    for ($i = 1; $i <= $page; $i += 1) {
    ?>
        <a href="index.php?page=<?php echo $i; ?>&name=<?php echo isset($_GET["name"]) && $_GET["name"] ?>&email=<?php echo isset($_GET["email"]) && $_GET["email"] ?>&phone=<?php echo isset($_GET["phone"]) && $_GET["phone"] ?>"><?php echo $i; ?></a>
    <?php
    }
    ?>
    <a href="index.php?page=<?php echo $page; ?>&name=<?php echo isset($_GET["name"]) && $_GET["name"] ?>&email=<?php echo isset($_GET["email"]) && $_GET["email"] ?>&phone=<?php echo isset($_GET["phone"]) && $_GET["phone"] ?>">></a>
</div>
<script>
    const paginator = document.querySelector('#paginator');
    paginator.children[<?php echo $curPage ?>].className = 'active';
    const deleteButton = document.querySelector("#delete");
    deleteButton.onclick = () => {
        if (!confirm("你確定要刪除嗎?")) return false;
    }
</script>
</body>

</html>