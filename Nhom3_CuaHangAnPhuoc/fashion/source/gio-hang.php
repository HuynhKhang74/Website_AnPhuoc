<?php


if(isset($_POST['minus'])){
    if(isset($_SESSION['cart'][$_POST['id']])){
        $quantity = intval($_SESSION['cart'][$_POST['id']]);
        $_SESSION['cart'][$_POST['id']] = max($quantity - 1, 1);
    }
    header('location:/gio-hang');
}
if(isset($_POST['plus'])){
    if(isset($_SESSION['cart'][$_POST['id']])){
        $item = selectOne("select * from sanpham where MaSanPham = '".$_POST['id']."'");
        $quantity = intval($_SESSION['cart'][$_POST['id']]);
        $_SESSION['cart'][$_POST['id']] = min($quantity + 1, intval($item['SoLuong']));
    }
    header('location:/gio-hang');
}
if(isset($_POST['delete'])){
    unset($_SESSION['cart'][$_POST['id']]);
    header('location:/gio-hang');
}

$template = 'gio-hang';
