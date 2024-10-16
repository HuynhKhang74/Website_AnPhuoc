<?php

session_start();
include '../library/functions.php';
include '../library/connection.php';

if (isset($_SESSION['username']) && trim($_SESSION['username']) != '') {
    redirect('index.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_escape_string($conn, strtolower($_POST['username']));
    $password = md5($_POST['password']);
    $user = selectOne("select username from user where username='{$username}' and password='{$password}'");
   
    if (is_array($user) && !empty($user)) {
        $_SESSION['username'] = $_POST['username'];
        redirect("index.php");
    } else {
        alert("Tên đăng nhập hoặc mật khẩu không đúng", "login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form class="login-form" action="./login.php" method="post">
        <div class="form-container">
            <div class="title">Vui lòng đăng nhập</div>
            <div class="form-line">
                <span>Tên đăng nhập:</span>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-line">
                <span>Mật khẩu:</span>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="form-line">
                <button type="submit">Đăng nhập</button>
            </div>
        </div>
    </form>
</body>
</html>