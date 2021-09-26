<?php
session_start();
//當使用者未登入則導回login.php
if (!isset($_SESSION['uid'])) {
  header('location:login.php');
  exit();
}
$uid = $_SESSION['uid'];


//連接資料庫
$connect = new mysqli("localhost", "root", "", "livechat");
$connect->set_charset("utf8");
if ($connect->connect_error) die($connect->connect_error);
$result = $connect->query("SELECT uname FROM account WHERE uid = $uid");
$row = $result->fetch_assoc() or die($connect->error);
$uname = $row['uname'];


//點選登出
$loginid = $_SESSION['loginid'];
if (isset($_POST['btnlogout'])) {
  $sql = "DELETE from login WHERE loginid='$loginid'";
  $connect->query($sql) or die($connect->error);
  session_destroy();
  header("Location: login.php");
  exit();
}


//點選開始交談設定收訊人名稱
$messageTo = "";
$messageToId = null;
if (isset($_POST['toid'])) {
  echo $_POST['toid'];
  $messageToId = $_POST['toid'];
  $sql = "SELECT uid, uname from account WHERE uid='$messageToId'";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();
  $messageTo = $row['uname'];
}



//點選傳送訊息新增訊息至messages資料表
if (isset($_POST['message'])) {
  $message = $_POST['message'];
  $messageToId = $_POST['messagetoid'];
  $sql = "INSERT INTO messages values ('', '$messageToId', '$uid', '$message', now())";
  $connect->query($sql) or die($connect->error);
}


?>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>即時訊息</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.4.1.min.js"></script>
  <style>
    table {
      width: 100%;
    }

    table,
    td {
      border: 1px solid gray;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center text-primary">即時訊息-Instant Message</h2>
    <form method="post">
      <p class="text-right text-secondary"><?php echo $uname; ?> 您好- <input type="submit" name="btnlogout" class="btn btn-link" value="登出"></p>
    </form>
    <div class="row">
      <!--訊息方塊 -->
      <div class="col-md-7">
        <div class="card">
          <div class="card-header bg-info text-white">
            訊息方塊-Messages
          </div>
          <div class="card-body" id="messages" style="height: 400px; overflow-y: auto; scrollbar-color: red green;"></div>
        </div>
      </div>
      <div class="col-md-5">
        <!--使用者方塊 -->
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="overflow-y: auto;">
              <div class="card-header bg-info text-white">
                使用者
              </div>
              <div class="card-body" id="users" style="height:150px">
                <table id="table">
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-top:10px;">
              <div class="card-header bg-info text-white">
                訊息
              </div>
              <div class="card-body" id="chatbox" style="height:190px">
                <form method="post">
                  <label class="text-primary" id="touser">收訊人：<?php echo $messageTo; ?></label>
                  <input type="hidden" name="messagetoid" value="<?php if ($messageToId) echo $messageToId; ?>">
                  <textarea rows="3" name="message" class="form-control" required></textarea>

                  <div class="text-right">
                    <input type="submit" name="btnmsg" value="傳送" class="btn btn-info">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  $(document).ready(function() {

    fetch_users();
    update_chat_data();
    setInterval(function() {
      update_login_status();
      fetch_users();
      update_chat_data();
    }, 5000);

    async function fetch_users() {
      const result = await fetch("fetch_users.php");
      const arr = await result.json();
      let tb = "";
      arr.forEach(user => tb += `<tr><td>${user[0]}</td><td>${user[2]}</td><td><form method="post" action="chat.php"><input type="submit" value="開始交談"><input type="text" name="toid" hidden value=${user[1]}></form></td></tr>`)
      const usersTable = document.querySelector('#table');
      usersTable.innerHTML = tb;
    }

    async function update_login_status() {
      const result = await fetch("update_login_status.php");
    }

    async function update_chat_data() {
      const result = await fetch("fetch_messages.php");
      const messageBox = document.querySelector('#messages');
      messageBox.innerHTML = await result.text();
    }
  });
</script>