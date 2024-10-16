<?php
$page = 1;
$where = 'true';
if(isset($_GET['kieu-dang'])){
    $where.=' and KieuDang="'.$_GET['kieu-dang'].'"';
}
if(isset($_GET['mau-sac'])){
    $where.=' and MauSac="'.$_GET['mau-sac'].'"';
}
if(isset($_GET['chat-lieu'])){
    $where.=' and ChatLieu="'.$_GET['chat-lieu'].'"';
}
if(isset($_GET['kich-thuoc'])){
    $where.=' and Size="'.$_GET['kich-thuoc'].'"';
}
if(isset($_GET['keyword'])){
    $num_rows = selectOne("select count(id) as num_rows from sanpham where TenSanPham and enable > 0 and SoLuong > 0");
}
else{
    $num_rows = selectOne("select count(id) as num_rows from sanpham where LoaiSanPham='{$loaisanpham['MaLoai']}' and ".$where." and enable > 0 and SoLuong > 0");
}
$num_rows = floatval($num_rows['num_rows']);
$display = 6;
if (isset($_GET['soluong']) && intval($_GET['soluong']) > 0) {
    $display = intval($_GET['soluong']);
}
$numlinks = ceil($num_rows / $display);

$offset = 0;
if (isset($_GET['page']) && intval($_GET['page']) > 0) {
    $page = intval($_GET['page']);
    $offset = ($page - 1) * $display;
}
$sort = 1;
if (isset($_GET['sort']) && intval($_GET['sort']) > 0) {
    $sort = intval($_GET['sort']);
}

switch ($sort) {
    default:
    case 1:
        $orderBy = 'id desc';
        break;
    case 2:
        $orderBy = 'GiaBan asc';
        break;
    case 3:
        $orderBy = 'GiaBan desc';
        break;
}
if(isset($_GET['keyword'])){
    $sanphams = selectAll("select * from sanpham where TenSanPham and enable > 0 and SoLuong > 0 like '%{$_GET['keyword']}%' order by {$orderBy} limit {$offset},{$display}");
}
else{
    $sanphams = selectAll("select * from sanpham where LoaiSanPham='{$loaisanpham['MaLoai']}' and ".$where." and enable > 0 and SoLuong > 0 order by {$orderBy} limit {$offset},{$display}");
}
if (!is_array($sanphams)) {
    $sanphams = [];
}
$size = selectAll("select * from size");
$mausac = selectAll("select * from mausac");
$kieudang = selectAll("select * from kieudang");
$chatlieu = selectAll("select * from chatlieu");
$leftMenuItems = selectAll("select * from loaisanpham where DanhMucSanPham is null");   
$currentUrl = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
$template = 'danh-sach-san-pham';
$request = implode("/", $query);
$requestKieuDang = [];
$requestMauSac = [];
$requestKichThuoc = [];
$requestChatLieu = [];
foreach($_GET as $key => $value){
    if($key != 'kieu-dang'){
        $requestKieuDang[] = $key."=".$value;
    }
    if($key != 'mau-sac'){
        $requestMauSac[] = $key."=".$value;
    }
    if($key != 'kich-thuoc'){
        $requestKichThuoc[] = $key."=".$value;
    }
    if($key != 'chat-lieu'){
        $requestChatLieu[] = $key."=".$value;
    }
}
// $requestKieuDang = implode("&", $requestKieuDang);
// $requestMauSac = implode("&", $requestMauSac);
// $requestKichThuoc = implode("&", $requestKichThuoc);


