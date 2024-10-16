<?php
if(isset($_POST['register'])){
    
    $sdt = selectOne('select count(SoDienThoai) as Count from khachhang_sodienthoai where SoDienThoai = "'. $_POST['phone'].'"');
    $email = selectOne('select count(MaKhachHang) as Count from khachhang where email = "'. $_POST['email'].'"');
    if(intval($sdt['Count']) || intval($email['Count'])){
        alert('Email hoặc số điện thoại đã được sử dụng đã được sử dụng');
        back();
    }
    else{
        $maxid = selectOne('select if(count(MaKhachHang) > 0, max(id), count(MaKhachHang)) + 1 as MaxId from khachhang');
        $item = [
            'MaKhachHang'=>'KH0'.$maxid['MaxId'],
            'TenKhachHang'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>md5($_POST['password']),
            'DiaChi'=>($_POST['address'])
        ];
        insert('khachhang', $item);
        $sdt=[
            'SoDienThoai'=>$_POST['phone'],
            'MaKhachHang'=>$item['MaKhachHang']
        ];
        insert('khachhang_sodienthoai', $sdt);
        alert('Đăng kí thành công !!!', '/login');
    }
}
$template = 'register';