<?php
if(isset($_POST['addtocart'])){
    $quantity = intval($_POST['quantity']);
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }    
    if(isset($_SESSION['cart'][$_POST['id']])){
        $_SESSION['cart'][$_POST['id']] += $quantity;
    }
    else{
        $_SESSION['cart'][$_POST['id']] = $quantity;
    }
    $item = selectOne("select * from sanpham where MaSanPham = '".$_POST['id']."'");
    if($_SESSION['cart'][$_POST['id']] > intval($item['SoLuong'])){
        $_SESSION['cart'][$_POST['id']] = intval($item['SoLuong']);
    }
    header('location:/san-pham/'.$_POST['id']);
}
$galleries = selectAll("select * from image where product_id = '".$sanpham['id']."' and type = 'product'");
$sanpham['Size'] = selectOne("select * from size where MaSize = '{$sanpham['Size']}'");
$sanpham['KieuDang'] = selectOne("select * from kieudang where MaKieuDang = '{$sanpham['KieuDang']}'");
$sanpham['MauSac'] = selectOne("select * from mausac where MaMauSac = '{$sanpham['MauSac']}'");
$sanpham['ChatLieu'] = selectOne("select * from chatlieu where MaChatLieu = '{$sanpham['ChatLieu']}'");

$template = 'san-pham';
