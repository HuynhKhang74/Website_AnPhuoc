<?php
switch ($_GET['action']) {
    case 'list':
        $khachhangs = selectAll('select * from khachhang');
        $template = 'khachhang/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $khachhang = selectOne("select * from khachhang where id='{$_GET['id']}'");
            if (!is_array($khachhang) || empty($khachhang)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=khachhang&action=list');
            }
        }
        $template = 'khachhang/edit';
        break;
    case 'save':
        $checkMaSP = selectOne("select MaKhachHang from khachhang where MaKhachHang = '{$_POST['MaKhachHang']}' and id <> '{$_POST['id']}'");
        if(is_array($checkMaSP) && !empty($checkMaSP)){
            alert('Mã sản phẩm đã tồn tại!', 'index.php?page=khachhang&action=list');
        }
        if(!checkURI('khachhang', $_POST['uri'], $_POST['id'])){
            alert('Tên đã tồn tại trong hệ thống!', 'index.php?page=khachhang&action=list');
        }
        foreach($_POST as $key => $param) {
            if ($param === '') {
                $_POST[$key] = NULL;
            }
        }
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
            $file = uploadFile('file');
        }
        if (intval($_POST['id'])) {
            if (!update('khachhang', [
            'id' => $_POST['id'],
            'Makhachhang' => $_POST['Makhachhang'],
            'Tenkhachhang' => $_POST['Tenkhachhang'], 
            'HinhAnh' =>  $file, 
            'MoTaNgan' => $_POST['MoTaNgan'], 
            'MotaDai' => $_POST['MotaDai'], 
            'GiaGoc' => $_POST['GiaGoc'], 
            'GiaBan' => $_POST['GiaBan'], 
            'NgungHoatDong' => $_POST['NgungHoatDong'], 
            'MoiRa' => $_POST['MoiRa'], 
            'DacSac' => $_POST['DacSac'],
            'Loaikhachhang' => $_POST['MaLoai'],
            'MauSac' => $_POST['MaMauSac'],
            'ChatLieu' => $_POST['MaChatLieu'],
            'KieuDang' => $_POST['MaKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=khachhang&action=list');
            }
        } else {
            if (!insert('khachhang', ['Makhachhang' => $_POST['Makhachhang'],
            'Tenkhachhang' => $_POST['Tenkhachhang'], 
            'HinhAnh' => $file, 
            'MoTaNgan' => $_POST['MoTaNgan'], 
            'MotaDai' => $_POST['MotaDai'], 
            'GiaGoc' => $_POST['GiaGoc'], 
            'GiaBan' => $_POST['GiaBan'], 
            'NgungHoatDong' => $_POST['NgungHoatDong'], 
            'MoiRa' => $_POST['MoiRa'], 
            'DacSac' => $_POST['DacSac'],
            'Loaikhachhang' => $_POST['MaLoai'],
            'MauSac' => $_POST['MaMauSac'],
            'ChatLieu' => $_POST['MaChatLieu'],
            'KieuDang' => $_POST['MaKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=khachhang&action=list');
            }
        }
        redirect('index.php?page=khachhang&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("khachhang", "where id='{$_GET['id']}'");
            if ($num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=khachhang&action=list');
            }
        }
        redirect('index.php?page=khachhang&action=list');
        break;
    default:
        redirect('index.php');
}