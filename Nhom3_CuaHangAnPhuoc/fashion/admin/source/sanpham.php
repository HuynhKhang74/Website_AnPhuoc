<?php
switch ($_GET['action']) {
    case 'list':
        $sanphams = selectAll('select * from sanpham order by SoLuong <> 0, id desc ');
        $template = 'sanpham/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $sanpham = selectOne("select * from sanpham where id='{$_GET['id']}'");
            if (!is_array($sanpham) || empty($sanpham)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=sanpham&action=list');
            }
        }
        $template = 'sanpham/edit';
        break;
    case 'save':
        $checkMaSP = selectOne("select MaSanPham from sanpham where MaSanPham = '{$_POST['MaSanPham']}' and id <> '{$_POST['id']}' ");
        if(is_array($checkMaSP) && !empty($checkMaSP)){
            alert('Mã sản phẩm đã tồn tại!', 'index.php?page=sanpham&action=list');
        }
        if(!checkURI('sanpham', $_POST['uri'], $_POST['id'])){
            alert('Tên đã tồn tại trong hệ thống!', 'index.php?page=sanpham&action=list');
        }
        foreach($_POST as $key => $param) {
            if ($param === '') {
                $_POST[$key] = NULL;
            }
        }
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
            $file = uploadFile('file');
        }
        elseif($_POST['file_curr'] != '') {
            $file = $_POST['file_curr'];
        }
        if (intval($_POST['id'])) {
            if (!update('sanpham', [
            'id' => $_POST['id'],
            'MaSanPham' => $_POST['MaSanPham'],
            'TenSanPham' => $_POST['TenSanPham'], 
            'HinhAnh' =>  $file, 
            'MoTaNgan' => $_POST['MoTaNgan'], 
            'MotaDai' => $_POST['MotaDai'], 
            'SoLuong' => $_POST['SoLuong'], 
            'GiaGoc' => $_POST['GiaGoc'], 
            'GiaBan' => $_POST['GiaBan'], 
            'NgungHoatDong' => $_POST['NgungHoatDong'], 
            'MoiRa' => $_POST['MoiRa'], 
            'DacSac' => $_POST['DacSac'],
            'LoaiSanPham' => $_POST['MaLoai'],
            'MauSac' => $_POST['MaMauSac'],
            'Size' => $_POST['MaSize'],
            'ChatLieu' => $_POST['MaChatLieu'],
            'KieuDang' => $_POST['MaKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=sanpham&action=list');
            }
        } else {
            if (!insert('sanpham', ['MaSanPham' => $_POST['MaSanPham'],
            'TenSanPham' => $_POST['TenSanPham'], 
            'HinhAnh' => $file, 
            'MoTaNgan' => $_POST['MoTaNgan'], 
            'MotaDai' => $_POST['MotaDai'], 
            'GiaGoc' => $_POST['GiaGoc'], 
            'GiaBan' => $_POST['GiaBan'], 
            'SoLuong' => $_POST['SoLuong'], 
            'NgungHoatDong' => $_POST['NgungHoatDong'], 
            'MoiRa' => $_POST['MoiRa'], 
            'DacSac' => $_POST['DacSac'],
            'LoaiSanPham' => $_POST['MaLoai'],
            'MauSac' => $_POST['MaMauSac'],
            'Size' => $_POST['MaSize'],
            'ChatLieu' => $_POST['MaChatLieu'],
            'KieuDang' => $_POST['MaKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=sanpham&action=list');
            }
        }
        redirect('index.php?page=sanpham&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("sanpham", "where id='{$_GET['id']}'");
            if ($num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=sanpham&action=list');
            }
        }
        redirect('index.php?page=sanpham&action=list');
        break;
    case 'show':
        if (isset($_GET['id'])) {
            update("sanpham", ['id' => $_GET['id'], 'enable' => 1]);

        }
        redirect('index.php?page=sanpham&action=list');
        break;
    case 'hide':
        if (isset($_GET['id'])) {
            update("sanpham", ['id' => $_GET['id'], 'enable' => 0]);
        }
        redirect('index.php?page=sanpham&action=list');
        break;
    case 'popular':
        if (isset($_GET['id'])) {
            update("sanpham", ['id' => $_GET['id'], 'popular' => 1]);
        }
        redirect('index.php?page=sanpham&action=list');
        break;
    case 'unpopular':
        if (isset($_GET['id'])) {
            update("sanpham", ['id' => $_GET['id'], 'popular' => 0]);
        }
        redirect('index.php?page=sanpham&action=list');
        break;
    default:
        redirect('index.php');
}