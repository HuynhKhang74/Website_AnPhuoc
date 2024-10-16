<?php
$request = preg_replace('/(.+).html/', '$1', preg_replace('/^\/(.*)$/', '$1', $_SERVER['REQUEST_URI']));
if ($request != ''){
    $request = explode('/', $request);
    $query = [];
    foreach ($request as $k => $q) {
        $query['param-' . ($k + 1)] = preg_replace('/^([^?]+)\?.+$/', '$1', $q);
    }
}


if (isset($query['param-1']) && $query['param-1'] != '') {
    switch ($query['param-1']) {
        case 'danh-sach-san-pham':
            if(isset($_GET["keyword"])){
                $title = "Kết quả tìm kiếm";
                $source = 'danh-sach-san-pham';
            }
            else{
                $maLoai = $query['param-2'];
                $loaisanpham = selectOne("select * from loaisanpham where MaLoai='{$maLoai}'");
                
                if (is_array($loaisanpham) && !empty($loaisanpham)) {
                    $title = $loaisanpham['TenLoai'];
                    $source = 'danh-sach-san-pham';
                } else {
                    redirect('404.html');
                    exit;
                }
            }
            break;
        case 'san-pham':
            $maSanpham = $query['param-2'];
            $sanpham = selectOne("select * from sanpham where MaSanPham='{$maSanpham}'");
            if (is_array($sanpham) && !empty($sanpham)) {
                if($sanpham['SoLuong'] > 0){
                    $title = $sanpham['TenSanPham'];
                $source = 'san-pham';
                }
                else{
                    redirect('404.html');
                    exit;
                }
            } else {
                redirect('404.html');
                exit;
            }
            break;
        case 'gio-hang':
            $title = "Giỏ hàng";
            $source='gio-hang';
            break;
        case 'login':
            $title = "Đăng nhập";
            if(isset($_SESSION['customer'])){
                redirect('/');
            }
            $source='login';
            break;
        case 'register':
            $title = "Đăng ký";
            if(isset($_SESSION['customer'])){
                redirect('/');
            }
            $source='register';
            break;
        case 'logout':
            
            if(!isset($_SESSION['customer'])){
                redirect('/');
            }
            unset($_SESSION['customer']);
            back();
            break;
        case 'dat-hang':
            $source='dat-hang';
            break;
        case 'tin-tuc':
            $maTintuc = $query['param-2'];
            $tintuc = selectOne("select * from tintuc where MaTinTuc='{$maTintuc}'");
            if (is_array($tintuc) && !empty($tintuc)) {
                $title = $tintuc['TenTinTuc'];
                $source = 'tin-tuc';
            } else {
                redirect('404.html');
                exit;
            }
            break;
        case 'danh-sach-tin-tuc':
            $title = "Danh sách tin tức";
            $source='danh-sach-tin-tuc';
            break;

    }
} else {
    $title = 'An Phước Store';
    $source = 'index';
}

$cart = [];
$cart_quantity= 0;
$cart_total= 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id => $quantity ){
        $item = selectOne("select * from sanpham where MaSanPham='{$id}'");
        if(isset($item['MauSac'])){
            $item['mausac_item'] = selectOne("select * from mausac where MaMauSac='{$item['MauSac']}'");
        }
        if(isset($item['Size'])){
            $item['kichco_item'] = selectOne("select * from size where MaSize='{$item['Size']}'");
        }
        if(isset($item['KieuDang'])){
            $item['kieudang_item'] = selectOne("select * from kieudang where MaKieuDang='{$item['KieuDang']}'");
        }
        $cart_total +=  floatval($item['GiaBan']) * $quantity;
        $cart_quantity += $quantity;
        $cart[] = [
            'quantity'=>$quantity,
            'item'=> $item,
        ];
    }
}


