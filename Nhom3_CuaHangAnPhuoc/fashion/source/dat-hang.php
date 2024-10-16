<?php

$customer = selectOne('select kh.*, sdt.SoDienThoai from khachhang kh join khachhang_sodienthoai sdt on kh.MaKhachHang = sdt.MaKhachHang  where email = "' . $_SESSION['customer'] . '"');
$donhang = [
    'MaKhachHang' => $customer['MaKhachHang'],
    'NgayDatHang' => date('d/m/Y'),
    'DiaChiShip' => $customer['DiaChi'],
    'TongTien' => number_format($cart_total),


];
insert('donhang', $donhang);

include "library/phpmailer/class.phpmailer.php";

$phpmailer = new PHPMailer(true);
$detailsHtml = '<table class="table table-striped table-bordered" style="width: 100%;" border="1">
<tbody>
    <tr>
        <td style="text-align: center; padding: 8px;"><strong>STT</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Mã sản phẩm</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Màu sắc</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Đơn giá</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Số lượng</strong></td>
        <td style="text-align: center; padding: 8px;"><strong>Thành tiền</strong></td>
    </tr>';
$maxid = selectOne('select max(id) as MaxId from donhang');
foreach ($cart as $key => $sanpham) {
    $SoLuong = max(0, $sanpham['item']['SoLuong'] -  $sanpham['quantity']);
    query("update sanpham set SoLuong = '".$SoLuong."' where MaSanPham = '".$sanpham['item']['MaSanPham']."' ");
    $chitietdonhang = [
        'MaDonHang' => $maxid['MaxId'],
        'MaSanPham' => $sanpham['item']['MaSanPham'],
        'TenSanPham' => $sanpham['item']['TenSanPham'],
        'SoLuong' => $sanpham['quantity'],
        'DonGia' => $sanpham['item']['GiaBan']
    ];

    addItem('chitietdonhang', $chitietdonhang);

    $detailsHtml .= '<tr>
                <td style="text-align: center; padding: 8px;">'.($key + 1).'</td>
                <td style="text-align: left; padding: 8px;"><b>'.$sanpham['item']['TenSanPham'].'</b></td>
                <td style="text-align: left; padding: 8px;"><b>'.$sanpham['item']['MaSanPham'].'</b></td>
                <td style="text-align: center; padding: 8px;"><b>'.(isset($sanpham['item']['mausac_item']) ? $sanpham['item']['mausac_item']['TenMauSac'] : 'Mặc định').'</b></td>
                <td style="text-align: center; padding: 8px;"><b style="color: red;">'.number_format($sanpham['item']['GiaBan']).'</b>'.($sanpham['item']['GiaGoc'] != '' ? ' <br><b style="color: #777;"><del>'.$sanpham['item']['GiaGoc'].'đ</del></b>' : '').'</td>
                <td style="text-align: center; padding: 8px; color: blue; font-weight: bold;">'.$sanpham['quantity'].'</td>
                <td style="text-align: center; padding: 8px;"><b style="color: red;">'.number_format($sanpham['item']['GiaBan'] * $sanpham['quantity']).'</b>'.($sanpham['item']['GiaGoc'] != '' ? ' <br><b style="color: #777;"><del>'.number_format($sanpham['item']['GiaGoc'] * $sanpham['quantity']) .'đ</del></b>' : '').'</td>
            </tr>';
}
$detailsHtml .= '</tbody></table>';

$html = '
<h1 style="text-align: center;">
    <strong>Tin liên hệ mới từ '.$customer['TenKhachHang'].'</strong>
</h1>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
    <tbody>
        <tr>
            <td>
                <strong>Tên liên hệ</strong>
            </td>
            <td>
                <strong>'.$customer['TenKhachHang'].'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Điện thoại</strong>
            </td>
            <td>
                <strong>'.$customer['SoDienThoai'].'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Email</strong>
            </td>
            <td>
                <strong>'.$customer['email'].'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tổng số lượng</strong>
            </td>
            <td>
                <strong>'.$cart_quantity.'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Tổng tiền</strong>
            </td>
            <td>
                <strong>'.number_format($cart_total).'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Địa Chỉ</strong>
            </td>
            <td>
                <strong>'.$customer['DiaChi'].'</strong>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Ngày liên hệ</strong>
            </td>
            <td>
                <strong>'.date('d/m/Y H:i:s', time()).'</strong>
            </td>
        </tr>
        
    </tbody>
</table><div style="margin-top: 20px; margin-bottom: 10px; font-weight: bold;">Chi tiết đơn hàng:</div>'.$detailsHtml;

$sender = array(
    "host" => 'smtp.gmail.com',
    "port" => '587',
    "secure" => 'tls',
    "username" => 'phanchitai2505@gmail.com',
    "password" => 'gtetuosegzahvetl',
    "email" => 'phanchitai2505@gmail.com',
    "name" => 'An Phuoc Store'
);
$rcpt = array($customer['email']);
$content_arr = array(
    "subject" => "Tin liên hệ mới từ An Phuoc Store",
    "html" => $html,
    "text" => ''
);
$phpmailer->init($sender, $rcpt, $content_arr, 0);

$phpmailer->send();
unset($_SESSION['cart']);
alert('Đặt hàng thành công', '/');


exit();