<?php
session_start();
//連接資料庫
$connect = new mysqli("localhost", "root", "", "livechat");
$connect->set_charset("utf8");
if ($connect->connect_error) die($connect->connect_error);

//使用者如果已經登入則轉至chat.php
if (isset($_SESSION["uid"])) {
  header("Location: chat.php");
  exit();
}

//檢查使用者登入帳號與密碼並設定對應錯誤訊息
$uaccount = null;
$password = null;

if (isset($_POST['uaccount'])) {
  $uaccount = $_POST['uaccount'];
  $password = $_POST['password'];
}

$error = null;
if ($uaccount) {
  $sql = "SELECT password, uid FROM account WHERE uaccount = '$uaccount'";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();
  if (!$row) $error = "帳號錯誤";
  else {
    $rPassword = $row["password"];
    if ($password === $rPassword) {
      $uid = $row["uid"];
      $_SESSION["uid"] = $uid;
      $sql = "INSERT INTO login values ('', '$uid', now())";
      $connect->query($sql) or die($connect->error);
      $_SESSION['loginid'] = $connect->insert_id;
      header("Location: chat.php");
    } else {
      $error = "密碼錯誤";
    }
  }
}



?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>登入</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.4.1.min.js"></script>
</head>

<body>
  <div class="container">
    <h2 class="text-center text-primary">即時聊天系統-Live Chat</h2>
    <div class="row">
      <div class="col-md-4" style="margin:0 auto">
        <div class="card border-0">
          <form method="post">
            <div class="form-group">
              <label class="text-success">帳號</label>
              <input type="text" name="uaccount" class="form-control" required value="<?php if ($uaccount) echo $uaccount; ?>" />
            </div>
            <div class="form-group">
              <label class="text-success">密碼</label>
              <input type="password" name="password" class="form-control" required value="<?php if ($password) echo $password; ?>" />
            </div>
            <div class="form-group">
              <input type="submit" name="login" class="btn btn-info" value="登入" />
            </div>
          </form>
          <p class="text-danger">
            <?php
            //顯示登入錯誤訊息
            if ($error) echo ($error);
            ?>
          </p>
        </div>
      </div>
    </div>
</body>

</html>