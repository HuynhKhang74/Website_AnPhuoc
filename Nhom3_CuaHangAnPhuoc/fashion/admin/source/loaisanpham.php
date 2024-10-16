<?php
switch ($_GET['action']) {
    case 'list':
        $loaisanphams = selectAll('select * from loaisanpham');
        $template = 'loaisanpham/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $loaisanpham = selectOne("select * from loaisanpham where id='{$_GET['id']}'");
            if (!is_array($loaisanpham) || empty($loaisanpham)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=loaisanpham&action=list');
            }
        }
        $template = 'loaisanpham/edit';
        break;
    case 'save':
        $checkMaSP = selectOne("select MaLoai from loaisanpham where MaLoai = '{$_POST['MaLoai']}' and id <> '{$_POST['id']}'");
        if(is_array($checkMaSP) && !empty($checkMaSP)){
            alert('Mã sản phẩm đã tồn tại!', 'index.php?page=sanpham&action=list');
            var_dump(is_array($checkMaSP) && !empty($checkMaSP));
            exit;
        }
        if(!isset($_POST['DanhMucSanPham']) || $_POST['DanhMucSanPham'] == ''){
            $_POST['DanhMucSanPham'] = null;
        }
        if (intval($_POST['id'])) {
            
            if (!update('loaisanpham', ['id' => $_POST['id'], 'MaLoai' => $_POST['MaLoai'],'TenLoai' =>  $_POST['TenLoai'], 'MoTa' => $_POST['MoTa'], 'DanhMucSanPham' => $_POST['DanhMucSanPham']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=loaisanpham&action=list');
            }
            // dump(update('loaisanpham', ['id' => $_POST['id'], 'MaLoai' => $_POST['MaLoai'],'TenLoai' =>  $_POST['TenLoai'], 'MoTa' => $_POST['MoTa'], 'DanhMucSanPham' => $_POST['DanhMucSanPham']]));
            // exit();
        } else {
            if (!insert('loaisanpham', ['MaLoai' => $_POST['MaLoai'],'TenLoai' =>  $_POST['TenLoai'], 'MoTa' => $_POST['MoTa'], 'DanhMucSanPham' => $_POST['DanhMucSanPham']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=loaisanpham&action=list');
            }
        }
        redirect('index.php?page=loaisanpham&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("loaisanpham", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=loaisanpham&action=list');
            }
        }
        redirect('index.php?page=loaisanpham&action=list');
        break;
    default:
        redirect('index.php');
}