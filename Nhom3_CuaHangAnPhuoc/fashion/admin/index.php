<?php
session_start();
include '../library/functions.php';
include '../library/connection.php';

if (!isset($_SESSION['username']) || trim($_SESSION['username']) == '') {
    redirect('login.php');
}

if (!preg_match('/^\/admin\/index\.php.*$/', $_SERVER['REQUEST_URI'])) {
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <div class="left">
            <a href="index.php">Trang chủ</a>
            <a href="../" target="_blank">Xem website</a>
        </div>
        <div class="right">
            <div>Xin chào <?= $_SESSION['username'] ?>!</div>
            <div><a href="logout.php">Đăng xuất</a></div>
        </div>
    </header>
    <main>
        <div class="left">
            <a href="index.php?page=image&action=list">Quản lý Hình Ảnh</a>
            <a href="index.php?page=sanpham&action=list">Quản lý Sản Phẩm</a>
            <a href="index.php?page=loaisanpham&action=list">Quản lý Loại Sản Phẩm</a>
            <a href="index.php?page=size&action=list">Quản lý Size</a>
            <a href="index.php?page=chatlieu&action=list">Quản lý Chất Liệu</a>
            <a href="index.php?page=mausac&action=list">Quản lý Màu Sắc</a>
            <a href="index.php?page=kieudang&action=list">Quản lý Kiểu Dáng</a>
            <a href="index.php?page=tintuc&action=list">Quản lý Tin Tức</a>
            <a href="index.php?page=donhang&action=list">Quản lý Đơn Hàng</a>
        </div>
        <div class="right">
            <?php if (isset($_GET['page']) && is_file("source/{$_GET['page']}.php")) {
                include "source/{$_GET['page']}.php";
                include "template/{$template}.php";
            } else { ?>
                Trang chủ
            <?php } ?>
        </div>
    </main>
</body>
</html>